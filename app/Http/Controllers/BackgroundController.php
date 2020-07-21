<?php

namespace App\Http\Controllers;

use App\About;
use App\Background;
use App\Banner;
use App\Media;
use App\News;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        $news = News::all();
        $banner = Banner::all();
        $media = Media::all();
        $background = Background::all();
        return view('background', compact('background', 'media', 'banner', 'news', 'about'));
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
        $background = new Background();

        $background->name = $request->input('name');
        $background->save();

        return redirect('background')->with('status', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function show(Background $background)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function edit(Background $background)
    {
        return view('background.edit', compact('background'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Background $background)
    {
        $background->name = $request->input('name');
        $background->update();

        return redirect('background')->with('status', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function destroy(Background $background)
    {
        $background->delete();

        return redirect('background')->with('status', 'Data Deleted Successfully');
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
