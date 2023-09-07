<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\new_package_tour;
use App\Models\new_package;
use App\Models\travel_img;
use Carbon\Carbon;

class AdminController extends Controller
{

  public function list_travel($id)
  {
    $list_travel = DB::table('travel_lists')
    ->where('province', '=' , $id)
    ->get();
    return view('admin.list_travel',compact('list_travel'));
  }

  public function new_travel()
  {
    $province_list = DB::table('province_list')   
    ->join('geographies_list','province_list.geography_id','=','geographies_list.id')
    ->select('province_list.*','geographies_list.name')
    ->orderBy('province_list.name_th', 'ASC')
    ->get();
    return view('admin.new_travel', compact('province_list'));
  }

    public function list_province()
  {
    $province_list = DB::table('province_list')   
    ->join('geographies_list','province_list.geography_id','=','geographies_list.id')
    ->select('province_list.*','geographies_list.name')
    ->orderBy('province_list.name_th', 'ASC')
    ->get();
    return view('admin.list_province', compact('province_list'));
  }

  public function new_package($id)
  {
    $province_th = DB::table('province_list')
    ->where('id', '=', $id)
    ->get();
    return view('admin.new_package',compact('province_th'));    
  }

  public function list_program($id)
  {
    $list_program = DB::table('package_news')
    ->join('province_list', 'province_list.id' , '=' , 'package_news.province_id')
    ->where('package_news.province_id','=',$id)
    ->get();
    return view('admin.list_program',compact('list_program'));    
  }

  public function new_package_add ($id)
  {   
    $new_tours = DB::table('package_news')
    ->join('province_list', 'province_list.id' , '=' , 'package_news.province_id')
    ->where('package_news.package_id', '=', $id)
    ->get();
    return view('admin.new_package_add',compact('new_tours'));    
  }

  public function preview_package($id)
  {

    $package_pre = DB::table('package_news')
    ->join('province_list', 'province_list.id' , '=' , 'package_news.province_id')
    ->where('package_news.package_id', '=', $id)
    ->get();

    $package_place = DB::table('new_package_tours')
    ->where('package_id', '=' , $id) 
    ->get();

    return view('admin.preview_package',compact('package_pre','package_place'));    
  }
  
  public function save_tourist(Request $request)
  {
    $pk_id = $request->pk_id;

    foreach($request->add as $key => $value) {
      new_package_tour::create($value);              
    }

    return redirect()->route('admin.preview_package',['id' => $pk_id])->with('success', "สร้างโปรแกรมใหม่เรียบร้อยแล้ว");
  }

  public function save_program(Request $request)
  {
    $pk_id = Str::random(10);

    DB::table('package_news')->insert([
      'province_id' => $request->province_id,
      'package_id' => $pk_id,
      'package_name' => $request->package_name,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('admin.new_package_add',['id' => $pk_id])->with('success', "สร้างโปรแกรมใหม่เรียบร้อยแล้ว");
  }
 
  public function delete_program($id)
  {
    DB::table('package_news')
    ->leftjoin('new_package_tours','package_news.package_id','=','new_package_tours.package_id')
    ->where('package_news.package_id', '=', $id)
    ->delete();
    return redirect()->back()->with('success', "ลบเรียบร้อยแล้ว");
  }  

  public function insert_travel(Request $request)
  {
    $travel_id = $request->travel_id;
    $travel_img = $request->file('travel_img');

       //อัพโหลดและบันทึกข้อมูล
      if ($request->hasFile('travel_img')) {
        $upload_location = 'travel_img';
        foreach ($request->travel_img as $key => $images) {
          $imageName = time() . rand(1, 99) . '.' . $images->extension();
          $images->move($upload_location, $imageName);
  
          travel_img::insert([
            'travel_id' => $travel_id,
            'travel_img' => $imageName,
            'created_at' => Carbon::now()
          ]);
        }
      }

    DB::table('travel_lists')->insert([
        'travel_id' => $travel_id,
        'province' => $request->province1,
        'travel_name' => $request->travel_name,
        'travel_detail' => $request->travel_detail,
        'created_at' => Carbon::now()
    ]);

    return redirect()->route('list_province')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

}
