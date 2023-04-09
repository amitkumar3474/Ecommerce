<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('permissions', function($row){
                    $per = "";
                    foreach($row->permissions as $_per){
                        $per .= $_per->name." | <br>";
                    }
                    return $per;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('role.edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('role.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <input class="delete btn btn-danger btn-sm" type="submit" value="Delete">
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'permissions'])
                ->make(true);
        }

        // $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
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
            'permissions' => 'required'
        ]);
        $roleData = $request->all();
        $data = [
            'name' => $roleData['name'] 
        ];
        $role = Role::create($data);
        $role->syncPermissions($roleData['permissions']);
        return redirect()->route('role.index')->with('success', "Role created successfully...");
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
        $permissions = Permission::all();
        $role = Role::where('id', $id)->first();
        return view('role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $id = $role->id;
        $roleData = $request->all();
        $updatedata = $request->only('name');
        Role::where('id', $id)->update($updatedata);
        $role->syncPermissions($roleData['permissions']);
        return redirect()->route('role.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->route('role.index')->withSuccess('Record deleted successfully....');   
    }
}
