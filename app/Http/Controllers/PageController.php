<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $pages = Page::orderBy('id', 'DESC')->paginate(5);
        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
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
            'name'        => 'required',
            'status'      => 'required',
            'heading'     => 'required',
            'description' => 'required',
            'url_key'     => 'required|unique:pages'
        ]);
        $pageData = $request->all();
        $data = [
            'name'        => $pageData['name'],
            'status'      => $pageData['status'],
            'heading'     => $pageData['heading'],
            'description' => $pageData['description'],
            'url_key'     => $pageData['url_key'],
        ];
        Page::create($data);
        return redirect()->route('page.index')->with('success', "Page created successfully...");
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
        $page = Page::where('id', $id)->first();
        return view('page.edit', compact('page'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'status'      => 'required',
            'heading'     => 'required',
            'description' => 'required',
            'url_key'     => 'required|unique:pages,url_key,' .$id
        ]);

        $pagedata = $request->only('name', 'status', 'heading', 'description', 'url_key');
        Page::where('id', $id)->update($pagedata);
        return redirect()->route('page.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::where('id', $id)->delete();
        return redirect()->route('page.index')->withSuccess('Record deleted successfully....');
    }
}
