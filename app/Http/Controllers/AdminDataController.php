<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminDataController extends Controller
{
    public function new_tips($id)
    {   
        $travel_tip = DB::table('package_news')
        ->join('province_list', 'province_list.id' , '=' , 'package_news.province_id')
        ->where('package_news.package_id', '=', $id)
        ->get();

      return view('admin.create_tips',['id' => $id],compact('travel_tip'));    
    }
  
}
