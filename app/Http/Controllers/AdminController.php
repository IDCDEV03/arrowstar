<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerData;
use App\Models\program_travel_lists;
use App\Models\travel_img;
use Carbon\Carbon;

class AdminController extends Controller
{

  public function list_travel($id)
  {
    $list_travel = DB::table('travel_lists')
      ->join('province_list', 'travel_lists.province', '=', 'province_list.id')
      ->join('travel_type', 'travel_lists.travel_type', '=', 'travel_type.number_type')
      ->where('travel_lists.province', '=', $id)
      ->get();

    $province_travel = DB::table('province_list')
      ->select('province_list.name_th')
      ->where('province_list.id', '=', $id)
      ->first();

    $data_name_province = [
      'province_name' => $province_travel->name_th
    ];

    return view('admin.list_travel', $data_name_province, compact('list_travel'));
  }

 

  public function new_travel()
  {
    $province_list = DB::table('province_list')
      ->join('geographies_list', 'province_list.geography_id', '=', 'geographies_list.id')
      ->select('province_list.*', 'geographies_list.name')
      ->orderBy('province_list.name_th', 'ASC')
      ->get();

    $type_list = DB::table('travel_type')
      ->get();

    return view('admin.new_travel', compact('province_list', 'type_list'));
  }

  public function new_travel_oversea()
  {
    $country_list = DB::table('tbl_country')
      ->orderBy('ct_nameTHA', 'ASC')
      ->get();

    $type_list = DB::table('travel_type')
      ->get();

    return view('admin.new_travel_oversea', compact('country_list', 'type_list'));
  }

  public function list_province()
  {
    $province_list = DB::table('province_list')
      ->join('geographies_list', 'province_list.geography_id', '=', 'geographies_list.id')
      ->select('province_list.*', 'geographies_list.name')
      ->orderBy('province_list.name_th', 'ASC')
      ->get();

    return view('admin.list_province', compact('province_list'));
  }

  public function new_package($id)
  {
    $province_th = DB::table('province_list')
      ->where('id', '=', $id)
      ->get();
    return view('admin.new_package', compact('province_th'));
  }

  public function list_program($id)
  {
    $list_program = DB::table('package_news')
      ->join('province_list', 'province_list.id', '=', 'package_news.province_id')
      ->where('package_news.province_id', '=', $id)
      ->orderBy('package_news.created_at', 'desc')
      ->get();


    $province_travel = DB::table('province_list')
      ->select('province_list.name_th')
      ->where('province_list.id', '=', $id)
      ->first();

    $data_name_province = [
      'province_name' => $province_travel->name_th
    ];

    return view('admin.list_program', $data_name_province, compact('list_program'));
  }

  public function new_package_add($id)
  {
    $new_tours = DB::table('travel_lists')
      ->join('package_news', 'package_news.province_id', '=', 'travel_lists.province')
      ->where('package_news.package_id', '=', $id)
      ->where('travel_lists.travel_type', '=', '1')
      ->orderBy('travel_lists.travel_created_at', 'desc')
      ->groupBy('travel_lists.travel_id')
      ->get();

    $food_lists = DB::table('travel_lists')
      ->join('package_news', 'package_news.province_id', '=', 'travel_lists.province')
      ->where('package_news.package_id', '=', $id)
      ->where('travel_lists.travel_type', '=', '2')
      ->orderBy('travel_lists.travel_created_at', 'desc')
      ->groupBy('travel_lists.travel_id')
      ->get();

    $program_day = DB::table('program_travel_lists')      
      ->select('program_travel_lists.program_day_count','program_travel_lists.program_package_id')
      ->where('program_travel_lists.program_package_id', '=', $id)
      ->groupBy('program_travel_lists.program_day_count')
      ->orderBy('program_travel_lists.id','DESC')
      ->limit('1')      
      ->sum('program_day_count');

    $pk_news = DB::table('package_news')
      ->select('package_news.package_name')
      ->where('package_news.package_id', '=', $id)
      ->first();

    $pk_news_data = [
      'package_name' => $pk_news->package_name
    ];

    return view('admin.new_package_add', $pk_news_data, compact('new_tours', 'food_lists', 'program_day'));
  }

  public function preview_package($id)
  {

    $package_pre = DB::table('package_news')
      ->join('province_list', 'province_list.id', '=', 'package_news.province_id')
      ->where('package_news.package_id', '=', $id)
      ->get();

    $package_place = DB::table('program_travel_lists')
      ->join('travel_lists', 'program_travel_lists.program_travel_id', '=', 'travel_lists.travel_id')
      ->join('travel_type', 'travel_lists.travel_type', '=', 'travel_type.number_type')
      ->where('program_travel_lists.program_package_id', '=', $id)
      ->get();

    return view('admin.preview_package', compact('package_pre', 'package_place'));
  }


  public function save_program(Request $request)
  {
    $pk_id = Str::random(10);

    DB::table('package_news')->insert([
      'province_id' => $request->province_id,
      'package_id' => $pk_id,
      'package_name' => $request->package_name,
      'package_day' => $request->package_day,
      'package_night' => $request->package_night,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('admin.new_package_add', ['id' => $pk_id])->with('success', "สร้างโปรแกรมใหม่เรียบร้อยแล้ว");
  }


  public function save_package_oversea(Request $request)
  {
    $pos_id = Str::random(10);

    DB::table('package_oversea')->insert([
      'package_id' => $pos_id,
      'country_id' => $request->country_id,  
      'city_name' => $request->city_name,   
      'package_name' => $request->package_name,
      'package_day' => $request->package_day,
      'package_night' => $request->package_night,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('admin.new_package_add', ['id' => $pos_id])->with('success', "สร้างโปรแกรมใหม่เรียบร้อยแล้ว");
  }


  public function insert_program_travel(Request $request)
  {

    $action = $request->input('action');
    $pk_id = $request->package_id;

    if ($action == 'action1') {

      $travel_list = $request->input('travel_id');

      foreach ($travel_list as $item) {
        program_travel_lists::insert([
          'program_province_id' => $request->province_id,
          'program_package_id' => $pk_id,
          'program_travel_id' => $item,
          'program_day_count' => $request->program_day,
          'created_at' => Carbon::now()
        ]);
      }
      return redirect()->route('admin.preview_package', ['id' => $pk_id]);
    } elseif ($action == 'action2') {

      $travel_list = $request->input('travel_id');
      foreach ($travel_list as $item) {
        program_travel_lists::insert([
          'program_province_id' => $request->province_id,
          'program_package_id' => $pk_id,
          'program_travel_id' => $item,
          'program_day_count' => $request->program_day,
          'created_at' => Carbon::now()
        ]);
      }
      return redirect()->route('admin.new_package_add', ['id' => $pk_id])->with('success', "สร้างกำหนดการเรียบร้อยแล้ว");
    }
  }

  public function insert_travel(Request $request)
  {
    $travel_id = Str::random(12);

    $request->validate(
      [
        'travel_img.*' => 'mimes:jpg,jpeg,png|max:2048',
        'travel_img' =>  'max:3'
      ],
      [
        'travel_img.max' => "ไม่สามารถอัพโหลดได้เกิน 3 ภาพ"
      ]
    );

    if ($request->hasFile('travel_img')) {
      $upload_location = 'travel_img/';
      foreach ($request->travel_img as $key => $images) {
        $imageName = time() . rand(1, 99) . '.' . $images->extension();
        $full_path = $upload_location . $imageName;
        $images->move($upload_location, $imageName);

        DB::table('travel_imgs')->insert([
          'travel_id' => $travel_id,
          'travel_img' => $full_path,
          'created_at' => Carbon::now()
        ]);
      }
    }
 
    DB::table('travel_lists')->insert([
      'travel_id' => $travel_id,
      'province' => $request->province1,
      'travel_city' => $request->travel_city,
      'travel_name' => $request->travel_name,
      'travel_detail' => $request->travel_detail,
      'travel_remark' => $request->travel_remark,
      'travel_type' => $request->type_travel,
      'travel_created_at' => Carbon::now()
    ]);

    return redirect()->route('list_province')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
 
  }


  public function insert_image_extra(Request $request)
  {
    $tid = $request->travel_id;
    $travel_img = $request->file('travel_img');
    $name_gen = hexdec(uniqid());
    $travel_img_ext = strtolower($travel_img->getClientOriginalExtension());
    $travel_img_name = $name_gen . '.' . $travel_img_ext;
    $upload_location = 'travel_img/';
    $full_path = $upload_location . $travel_img_name;

    $travel_img->move($upload_location, $travel_img_name);

    DB::table('travel_imgs')->insert([
      'travel_id' => $request->travel_id,
      'travel_img' => $full_path,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('admin.data_travel', ['id' => $tid])->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function data_travel($id)
  {
    $data_travel = DB::table('travel_lists')
      ->join('province_list', 'travel_lists.province', '=', 'province_list.id')
      ->join('travel_type', 'travel_lists.travel_type', '=', 'travel_type.number_type')
      ->where('travel_lists.travel_id', '=', $id)
      ->get();

    $travel_img = DB::table('travel_imgs')
      ->where('travel_imgs.travel_id', '=', $id)
      ->get();

    $count_img = DB::table('travel_imgs')
      ->where('travel_imgs.travel_id', '=', $id)
      ->count();

    return view('admin.travel_detail', ['id' => $id], compact('data_travel', 'travel_img', 'count_img'));
  }

  public function edit_travel($id)
  {
    $data_travel = DB::table('travel_lists')
      ->join('province_list', 'travel_lists.province', '=', 'province_list.id')
      ->join('travel_type', 'travel_lists.travel_type', '=', 'travel_type.number_type')
      ->where('travel_lists.travel_id', '=', $id)
      ->get();

    $province_list = DB::table('province_list')
      ->join('geographies_list', 'province_list.geography_id', '=', 'geographies_list.id')
      ->select('province_list.*', 'geographies_list.name')
      ->orderBy('province_list.name_th', 'ASC')
      ->get();

    $type_list = DB::table('travel_type')
      ->get();

    return view('admin.edit_travel', ['id' => $id], compact('data_travel', 'province_list', 'type_list'));
  }

  public function update_travel(Request $request)
  {
    $travel_id = $request->travel_id;
    $province_id = $request->province1;

    if ($province_id == '0') {
      DB::table('travel_lists')
        ->where('travel_id', '=', $travel_id)
        ->update([
          'travel_id' => $travel_id,
          'travel_city' => $request->travel_city,
          'travel_name' => $request->travel_name,
          'travel_detail' => $request->travel_detail,
          'travel_remark' => $request->travel_remark,
          'travel_updated_at' => Carbon::now()
        ]);
    } else {
      DB::table('travel_lists')
        ->where('travel_id', '=', $travel_id)
        ->update([
          'travel_id' => $travel_id,
          'province' => $province_id,
          'travel_city' => $request->travel_city,
          'travel_name' => $request->travel_name,
          'travel_detail' => $request->travel_detail,
          'travel_remark' => $request->travel_remark,
          'travel_updated_at' => Carbon::now()
        ]);
    }
    return redirect()->route('admin.data_travel', ['id' => $travel_id])->with('success', "แก้ไขข้อมูลเรียบร้อยแล้ว");
  }


  public function create_user()
  {
    return view('admin.create_user');
  }

  public function insert_customer(Request $request)
  {
    $created_at = Carbon::now();
    $input = $request->all();
    $input['created_at'] = $created_at;
    CustomerData::create($input);

    return redirect()->route('admin.list_customer')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function insert_tips(Request $request)
  {
    $package_id = $request->package_id;

    DB::table('package_news')
      ->where('package_id', '=', $package_id)
      ->update([
        'program_spacial_req' => $request->program_req,
        'program_remark' => $request->program_remark,
        'program_tips' => $request->program_tips,
        'updated_at' => Carbon::now(),
      ]);
    return redirect()->route('admin.preview_package', ['id' => $package_id]);
  }
}
