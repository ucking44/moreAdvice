<?php

namespace App\Http\Controllers;

use App\Background;
use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $about = About::all();
        // $news = News::all();
        // $banner = Banner::all();
        $background = Background::all();
        $media = Media::all();
        return view('background', compact('media', 'backround'));
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
            'title'       => 'required',
            'description' => 'required',
            'media'       => 'required|file'
        ]);

        $filenameWithExtension = $request->file('media')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('media')->getClientOriginalName();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('media')->move('album_covers', $filenameToStore);
        //dd($path);

        $media = new Media();
        $media->name = $request->input('name');
        $media->title = $request->input('title');
        $media->description = $request->input('description');
        $media->media = $filenameToStore;
        //dd($media);

        $media->save();

        return redirect()->back()->with('status', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        return view('media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        $this->validate($request, [
            'name'        => 'required',
            'title'       => 'required',
            'description' => 'required',

        ]);

        $media->name = $request->input('name');
        $media->title = $request->input('title');
        $media->description = $request->input('description');
        $media->update();

        return redirect()->back()->with('status', 'Media Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function delete(Media $media)
    {
        $media->delete();

        return redirect()->back()->with('status', 'Data Deleted Successfully');
    }
}
