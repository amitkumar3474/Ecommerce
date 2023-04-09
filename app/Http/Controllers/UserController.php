<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('roles', function($row){
                    $role = "";
                    foreach($row->roles as $_role){
                        $role .= $_role->name." | <br>";
                    }
                    return $role;
                })
                ->addColumn('profile_image', function($row){
                    $primage = $row->getFirstMediaUrl('profile_image');
                    return '<img src='.$primage.'  width="50"/>'; 
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('user.edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('user.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <input class="delete btn btn-danger btn-sm" type="submit" value="Delete">
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'profile_image','roles'])
                ->make(true);
        }
        // $users = User::orderBy('id', 'DESC')->paginate(5);
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
            'roles' => 'required'
        ]);
        $userData = $request->all();
        $data = [
            'name'     => $userData['name'],
            'email'    => $userData['email'],
            'password' => Hash::make($userData['password']) 
        ];
        $user = User::create($data);
        $user->syncRoles($userData['roles']);

        if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }
        return redirect()->route('user.index')->with('success', "User created successfully...");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);
        $userData = $request->all();
        $data = $request->only('name', 'email', 'password');
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        User::where('id', $user->id)->update($data);
        $user->syncRoles($userData['roles']);

        if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }
        return redirect()->route('user.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->withSuccess('Record deleted successfully....');
    }

    /**
     * Show the loginform 
     */

    public function login()
    {
        return view('login');
    }

    /**
     * Login Dashboard
     */

    public function loginpost(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $userData = $request->only('email', 'password');
        if(Auth::attempt($userData)){
            return redirect()->route('dashboard')->with('success', "Logged in successfully....");
        }else{
            return redirect()->route('login')->with('error', "Invalid Credentials....");
        }
    }

    /**
     * Dashboard logout.
     */

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "Logout successfully....");
    }

    /**
     * Registration form 
     */

    public function registration()
    {
        return view('registration');
    } 

    /**
     * Store a newly created resource in storage.
    */

    public function registrationpost(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password',
            'roles' => 'required'
        ]);
        $userData = $request->all();
        $data = [
            'name'     => $userData['name'],
            'email'    => $userData['email'],
            'password' => Hash::make($userData['password']) 
        ];
        $user = User::create($data);
        $user->syncRoles($userData['roles']);
        return redirect()->route('login')->with('success', "User created successfully...");
    } 

}
