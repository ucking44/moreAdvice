<?php

namespace App\Http\Controllers;

use App\About;
use App\Background;
use App\Banner;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use App\News;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('about', compact('about'));
    }

}
