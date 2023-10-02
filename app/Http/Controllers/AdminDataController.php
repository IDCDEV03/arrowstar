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
      ->join('travel_lists','program_travel_lists.program_travel_id','=','travel_lists.travel_id')
      ->where('program_travel_lists.program_package_id','=',$program_id)
      ->get();

      $pk_news = DB::table('package_news')
      ->select('package_news.package_name')
      ->where('package_news.package_id', '=', $program_id)
      ->get();

      $img_data = DB::table('program_travel_lists')
      ->join('travel_lists','program_travel_lists.program_travel_id','=','travel_lists.travel_id')
      ->join('travel_imgs','travel_lists.travel_id','=','travel_imgs.travel_id')
      ->select('program_travel_lists.program_package_id','travel_lists.travel_id','travel_imgs.travel_id','travel_imgs.travel_img')
      ->where('program_travel_lists.program_package_id','=',$program_id)
      ->groupBy('travel_imgs.travel_img')
      ->get();

      $single_data = DB::table('package_news')
      ->where('package_id','=',$program_id)
      ->get();

      return view('admin.print_preview',['id' => $program_id],compact('print_data','pk_news','img_data','single_data'));  
    }

    public function all_program()
    {
      $list_program = DB::table('package_news')
        ->join('province_list', 'province_list.id', '=', 'package_news.province_id') 
        ->orderBy('package_news.created_at', 'desc')
        ->get();
  
      return view('admin.all_program', compact('list_program'));
    }
  
    public function all_program_oversea()
    {
           return view('admin.all_program_oversea');
    }

    public function new_package_oversea()
    {
      $country_list = DB::table('tbl_country')
      ->select('tbl_country.rec','tbl_country.ct_nameTHA')
      ->orderBy('tbl_country.ct_nameTHA','asc')
      ->get();

      return view('admin.new_package_oversea',compact('country_list'));
    }

    public function create_customer()
    {
           return view('admin.create_customer');
    }
  
}
