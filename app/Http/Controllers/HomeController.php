<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function travel_index()
    {
        return view('index.home');
    }
}
