<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::orderBy('id', 'DESC')->paginate(5);   
        return view('block.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('block.create');
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
            'heading'     => 'required',
            'status'      => 'required',
            'description' => 'required',
            'identifier'  => 'required|unique:blocks'
        ]);
        $blockdata = $request->all();
        $data = [
            'name'        => $blockdata['name'],
            'heading'     => $blockdata['heading'],
            'status'      => $blockdata['status'],
            'description' => $blockdata['description'],
            'identifier'  => $blockdata['identifier']
        ];
        Block::create($data);
        return redirect()->route('block.index')->with('success', "Block created successfully...");
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
        $block = Block::where('id', $id)->first();
        return view('block.edit', compact('block'));
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
            'heading'     => 'required',
            'status'      => 'required',
            'description' => 'required',
            'identifier'  => 'required|unique:blocks,identifier,' .$id
        ]);
        $blockdata = $request->only( 'name', 'heading', 'status', 'description', 'identifier');
        Block::where('id', $id)->update($blockdata);
        return redirect()->route('block.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Block::where('id', $id)->delete();
        return redirect()->route('block.index')->withSuccess('Record deleted successfully....');
    }
}
