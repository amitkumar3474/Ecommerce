<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        $status = 'Enable';
                    }else{
                        $status = 'Disable';
                    }
                    return $status;
                })
                ->addColumn('show_in_menu', function($row){
                    if($row->show_in_menu == 1){
                        $show_in_menu = 'Yes';
                    }else{
                        $show_in_menu = 'No';
                    }
                    return $show_in_menu;
                })
                ->addColumn('thumbnail_image', function($row){
                    $thimage = $row->getFirstMediaUrl('thumbnail_image');
                    return '<img src='.$thimage.'  width="50"/>'; 
                })
                ->addColumn('banner_image', function($row){
                    $bnimage = $row->getFirstMediaUrl('banner_image');
                    return '<img src='.$bnimage.'  width="50"/>'; 
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('category.edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('category.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <input class="delete btn btn-danger btn-sm" type="submit" value="Delete">
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'thumbnail_image', 'banner_image'])
                ->make(true);
        }

        // $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Category::all();
        return view('category.create');
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
            'name'              => 'required',
            'status'            => 'required',
            'show_in_menu'      => 'required',
            'parent_id'         => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'thumbnail_image'   => 'required',
            'banner_image'      => 'required',
            'is_featured'       => 'required',
            'url_key'           => 'required|unique:categories'
        ]);
        $categorydata = $request->all();
        $data = ([
            'name'              => $categorydata['name'],
            'status'            => $categorydata['status'],
            'show_in_menu'      => $categorydata['show_in_menu'],
            'parent_id'         => $categorydata['parent_id'],
            'short_description' => $categorydata['short_description'],
            'description'       => $categorydata['description'],
            'thumbnail_image'   => $categorydata['thumbnail_image'],
            'banner_image'      => $categorydata['banner_image'],
            'is_featured'       => $categorydata['is_featured'],
            'url_key'           => $categorydata['url_key'] 
        ]);
        $category = Category::create($data);

        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $category->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }

        if($request->hasFile('banner_image') && $request->file('banner_image')->isValid()){
            $category->addMediaFromRequest('banner_image')->toMediaCollection('banner_image');
        }

        return redirect()->route('category.index')->with('success', "Categorys created successfully...");
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
        $category = Category::where('id', $id)->first();
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'              => 'required',
            'status'            => 'required',
            'show_in_menu'      => 'required',
            'parent_id'         => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'is_featured'       => 'required',
            'url_key'           => 'required|unique:categories,url_key,' .$category->id
        ]);
        $categorydata = $request->only('name', 'status', 'show_in_menu', 'parent_id', 'short_description', 'description', 'thumbnail_image', 'banner_image','is_featured', 'url_key');
        Category::where('id', $category->id)->update($categorydata);

        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $category->clearMediaCollection('thumbnail_image');
            $category->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }

        if($request->hasFile('banner_image') && $request->file('banner_image')->isValid()){
            $category->clearMediaCollection('banner_image');
            $category->addMediaFromRequest('banner_image')->toMediaCollection('banner_image');
        }

        return redirect()->route('category.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('category.index')->withSuccess('Record deleted successfully....');
    }
}
