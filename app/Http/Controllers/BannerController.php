<?php

namespace App\Http\Controllers;

use App\Background;
use App\Banner;
use App\Media;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('background', compact('banner', 'background', 'media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'schedule' => 'required',
            'logo'       => 'required|image',
        ]);

        $filenameWithExtension = $request->file('logo')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('logo')->getClientOriginalName();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('logo')->move('logos', $filenameToStore);

        $banner = new Banner();
        $banner->name = $request->input('name');
        $banner->schedule = $request->input('schedule');
        $banner->logo = $filenameToStore;
        $banner->save();

        return redirect()->back()->with('status', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('media.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'name'        => 'required',
            'schedule' => 'required',

        ]);

        $banner->name = $request->input('name');
        $banner->schedule = $request->input('schedule');
        $banner->update();

        return redirect()->back()->with('status', 'Media Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function delete(Banner $banner)
    {
        $banner->delete();

        return redirect()->back()->with('status', 'Data Deleted Successfully');
    }
}
