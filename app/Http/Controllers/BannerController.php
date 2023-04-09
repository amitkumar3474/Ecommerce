<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->paginate(5);
        return view('banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'slider_image' =>'required',
            'status'       => 'required'
        ]);
        $bannerdata = $request->all();
        $data = [
            'name'   => $bannerdata['name'],
            'status' => $bannerdata['status']
        ];
        $banner = Banner::create($data);
        if($request->hasFile('slider_image') && $request->file('slider_image')->isValid()){
            $banner->addMediaFromRequest('slider_image')->toMediaCollection('slider_image');
        }
        return redirect()->route('banner.index')->with('success', "Banner created successfully...");
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
        $banner = Banner::where('id', $id)->first();
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'name'         => 'required',
            'status'       => 'required'
        ]);
        $bannerdata = $request->only('name', 'status');
        Banner::where('id', $banner->id)->update($bannerdata);
        if($request->hasFile('slider_image') && $request->file('slider_image')->isValid()){
            $banner->clearMediaCollection('profile_image');
            $banner->addMediaFromRequest('slider_image')->toMediaCollection('slider_image');
        }
        return redirect()->route('banner.index')->with('success', "Record Updated successfully....");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id', $id)->delete();
        return redirect()->route('banner.index')->withSuccess('Record deleted successfully....');
    }
}
