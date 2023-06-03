<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;

class HomeController extends Controller
{
    function home(){
        $roomTypes = Roomtype::all();
        $roomtypeimgs = Roomtypeimage::all();
        return view('home',['roomTypes' => $roomTypes, 'roomtypeimgs' => $roomtypeimgs]);
    }
}
