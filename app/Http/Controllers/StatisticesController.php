<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticesController extends Controller
{
    public function statistices(){
        return view('statistices.index');
    }
}
