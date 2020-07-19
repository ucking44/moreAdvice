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
        //$media = Media::all();
        //$background = Background::all();
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
        //dd($banner);

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

//     $this->validate($request, [
    //         'name'        => 'required',
    //         'schedule' => 'required',
    //         'logo'       => 'required|mimes:jpeg,bmp,png,jpg',
    //     ]);

    // $image = $request->file('image');
    //     if(isset($image))
    //     {
    //         $currentDate = Carbon::now()->toDateString();
    //         // $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

    //         if(!Storage::disk('public')->exists('logos'))
    //         {
    //             Storage::disk('public')->makeDirectory('logos');
    //         }

    //         $banner = Image::make($image->getRealPath())->resize(1600,479)->save('jpg', 'png', 'jpeg', 'bmp');
    //         //$category->save('jpg', 'png', 'jpeg', 'bmp');
    //         Storage::disk('public')->put('logos/'.$imagename,$banner);

    //         if(!Storage::disk('public')->exists('logos/slider'))
    //         {
    //             Storage::disk('public')->makeDirectory('logos/slider');
    //         }

    //         $slider = Image::make($image->getRealPath())->resize(500,333)->save('jpg', 'png', 'jpeg', 'bmp');
    //         Storage::disk('public')->put('logos/slider/'.$imagename,$slider);


    //     } else {
    //         $imagename = "default.png";
    //     }

    //     $banner->name = $request->name;
    //     $banner->logo = $imagename;
    //     $banner->schedule = $request->input('schedule');
    //     $banner->update();


    //$this->validate($request, [
        //         'name'        => 'required',
        //         'schedule' => 'required',
        //         'logo'       => 'required|mimes:jpeg,bmp,png,jpg',
        //     ]);

        // $image = $request->file('image');
        //     if(isset($image))
        //     {
        //         $currentDate = Carbon::now()->toDateString();
        //         // $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //         if(!Storage::disk('public')->exists('logos'))
        //         {
        //             Storage::disk('public')->makeDirectory('logos');
        //         }

        //         $banner = Image::make($image->getRealPath())->resize(1600,479)->save('jpg', 'png', 'jpeg', 'bmp');
        //         //$category->save('jpg', 'png', 'jpeg', 'bmp');
        //         Storage::disk('public')->put('logos/'.$imagename,$banner);

        //         if(!Storage::disk('public')->exists('logos/slider'))
        //         {
        //             Storage::disk('public')->makeDirectory('logos/slider');
        //         }

        //         $slider = Image::make($image->getRealPath())->resize(500,333)->save('jpg', 'png', 'jpeg', 'bmp');
        //         Storage::disk('public')->put('logos/slider/'.$imagename,$slider);


        //     } else {
        //         $imagename = "default.png";
        //     }

        //     $banner = new Banner();
        //     $banner->name = $request->name;
        //     $banner->logo = $imagename;
        //     $banner->schedule = $request->input('schedule');
        //     $banner->save();
