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

    public function print_program(Request $request)
    {
      $program_id = $request->id;
      $print_data = DB::table('program_travel_lists')
      ->join('package_news','program_travel_lists.program_package_id','=','package_news.package_id')
      ->join('travel_list','program_travel_lists.program_travel_id','=','travel_list.travel_id')
      ->where('program_travel_lists.program_package_id','=',$program_id)
      ->get();

      return redirect()->route('admin.print_preview', ['id' => $program_id],compact('print_data'));
    }
  
}
