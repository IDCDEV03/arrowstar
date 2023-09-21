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
    ->join('province_list','travel_lists.province','=','province_list.id')
    ->join('travel_type','travel_lists.travel_type','=','travel_type.number_type')
    ->where('travel_lists.province', '=' , $id)
    ->get();

    $province_travel = DB::table('province_list')
    ->select('province_list.name_th') 
    ->where('province_list.id','=',$id)
    ->first();

    $data_name_province = [
      'province_name' => $province_travel->name_th
    ];

    return view('admin.list_travel',$data_name_province,compact('list_travel'));
  }

  public function new_travel()
  {
    $province_list = DB::table('province_list')   
    ->join('geographies_list','province_list.geography_id','=','geographies_list.id')
    ->select('province_list.*','geographies_list.name')
    ->orderBy('province_list.name_th', 'ASC')
    ->get();

    $type_list = DB::table('travel_type')
    ->get();

    return view('admin.new_travel', compact('province_list','type_list'));
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


    $province_travel = DB::table('province_list')
    ->select('province_list.name_th') 
    ->where('province_list.id','=',$id)
    ->first();

    $data_name_province = [
      'province_name' => $province_travel->name_th
    ];

    return view('admin.list_program',$data_name_province,compact('list_program'));    
  }

  public function new_package_add ($id)
  {   
    $new_tours = DB::table('travel_lists')
   ->join('package_news','package_news.province_id','=','travel_lists.province')
   ->where('package_news.package_id','=',$id)
   ->orderBy('travel_lists.travel_created_at', 'desc')
   ->groupBy('travel_lists.travel_id')
   ->get();

   $pk_news = DB::table('package_news')
   ->select('package_news.package_name') 
   ->where('package_news.package_id','=',$id)
   ->first();

   $pk_news_data = [
    'package_name' => $pk_news->package_name
   ];

    return view('admin.new_package_add',$pk_news_data,compact('new_tours'));    
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
        'travel_type' => $request->type_travel,
        'travel_created_at' => Carbon::now()
    ]);

    return redirect()->route('list_province')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function data_travel ($id)
  {
    $data_travel = DB::table('travel_lists')
    ->join('province_list','travel_lists.province','=','province_list.id')
    ->where('travel_lists.travel_id','=',$id)
    ->get();

    $travel_img = DB::table('travel_imgs')
    ->where('travel_imgs.travel_id','=',$id)
    ->get();

    return view('admin.travel_detail',['id' => $id],compact('data_travel','travel_img')); 
  }


  public function create_user()
  {   
    return view('admin.create_user');    
  }

}
