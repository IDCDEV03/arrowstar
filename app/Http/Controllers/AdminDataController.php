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
      ->join('province_list', 'province_list.id', '=', 'package_news.province_id')
      ->where('package_news.package_id', '=', $id)
      ->get();

    return view('admin.create_tips', ['id' => $id], compact('travel_tip'));
  }

  public function new_tips_os($id)
  {
    $travel_tip = DB::table('package_oversea')
      ->join('tbl_country', 'tbl_country.rec', '=', 'package_oversea.country_id')
      ->where('package_oversea.package_id', '=', $id)
      ->get();

    return view('admin.create_tips_os', ['id' => $id], compact('travel_tip'));
  }

  public function print_program(Request $request)
  {
    $program_id = $request->id;
    $print_data = DB::table('program_travel_lists')
      ->join('travel_lists', 'program_travel_lists.program_travel_id', '=', 'travel_lists.travel_id')
      ->where('program_travel_lists.program_package_id', '=', $program_id)
      ->get();

    $pk_news = DB::table('package_news')
      ->select('package_news.package_name')
      ->where('package_news.package_id', '=', $program_id)
      ->get();

    $img_data = DB::table('program_travel_lists')
      ->join('travel_lists', 'program_travel_lists.program_travel_id', '=', 'travel_lists.travel_id')
      ->join('travel_imgs', 'travel_lists.travel_id', '=', 'travel_imgs.travel_id')
      ->select('program_travel_lists.program_package_id', 'travel_lists.travel_id', 'travel_imgs.travel_id', 'travel_imgs.travel_img')
      ->where('program_travel_lists.program_package_id', '=', $program_id)
      ->groupBy('travel_imgs.travel_img')
      ->get();

    $single_data = DB::table('package_news')
      ->where('package_id', '=', $program_id)
      ->get();

    return view('admin.print_preview', ['id' => $program_id], compact('print_data', 'pk_news', 'img_data', 'single_data'));
  }

  public function print_program_os(Request $request)
  {
    $program_id = $request->id;
    $print_data = DB::table('program_oversea_lists')
      ->join('travel_lists_oversea', 'program_oversea_lists.program_travel_os_id', '=', 'travel_lists_oversea.travel_id')
      ->where('program_oversea_lists.program_package_id', '=', $program_id)
      ->orderBy('program_oversea_lists.program_day_count', 'ASC')
      ->get();

    $pk_news = DB::table('package_oversea')
      ->where('package_oversea.package_id', '=', $program_id)
      ->get();

    $img_data = DB::table('program_oversea_lists')
      ->join('travel_lists_oversea', 'program_oversea_lists.program_travel_os_id', '=', 'travel_lists_oversea.travel_id')
      ->join('travel_imgs_oversea', 'travel_lists_oversea.travel_id', '=', 'travel_imgs_oversea.travel_os_id')
      ->select('program_oversea_lists.program_package_id', 'travel_lists_oversea.travel_id', 'travel_imgs_oversea.travel_os_id', 'travel_imgs_oversea.travel_os_img')
      ->where('program_oversea_lists.program_package_id', '=', $program_id)
      ->groupBy('travel_imgs_oversea.travel_os_img')
      ->get();

    $single_data = DB::table('package_oversea')
      ->where('package_id', '=', $program_id)
      ->get();

    $program_day_dt = DB::table('program_day_detail_os')
      ->where('pk_id', '=', $program_id)
      ->get();

    return view('admin.print_preview_os', ['id' => $program_id], compact('print_data', 'pk_news', 'img_data', 'single_data', 'program_day_dt'));
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
    $list_program = DB::table('package_oversea')
      ->join('tbl_country', 'tbl_country.rec', '=', 'package_oversea.country_id')
      ->orderBy('package_oversea.created_at', 'desc')
      ->get();

    return view('admin.all_program_oversea', compact('list_program'));
  }

  public function new_package_oversea()
  {
    $country_list = DB::table('tbl_country')
      ->select('tbl_country.rec', 'tbl_country.ct_nameTHA')
      ->orderBy('tbl_country.ct_nameTHA', 'asc')
      ->get();

    return view('admin.new_package_oversea', compact('country_list'));
  }

  public function create_customer()
  {
    $province_th = DB::table('province_list')
      ->orderBy('name_th', 'asc')
      ->get();

    return view('admin.create_customer', compact('province_th'));
  }

  public function list_oversea()
  {
    $list_oversea = DB::table('travel_lists_oversea')
      ->join('tbl_country', 'travel_lists_oversea.country_id', '=', 'tbl_country.rec')
      ->join('travel_type', 'travel_lists_oversea.travel_type', '=', 'travel_type.number_type')
      ->orderBy('travel_lists_oversea.travel_created_at', 'DESC')
      ->get();

    return view('admin.list_oversea', compact('list_oversea'));
  }

  public function insert_travel_oversea(Request $request)
  {
    $tr_id = Str::random(11);
    $travel_img = $request->file('travel_img');

    $request->validate(
      [
        'travel_img.*' => 'mimes:jpg,jpeg,png|max:5048',
        'travel_img' =>  'max:3'
      ],
      [
        'travel_img.max' => "ไม่สามารถอัพโหลดได้เกิน 3 ภาพ"
      ]
    );

    //อัพโหลดและบันทึกข้อมูล
    if ($request->hasFile('travel_img')) {
      $upload_location = 'travel_img/';
      foreach ($request->travel_img as $key => $images) {
        $imageName = time() . rand(1, 99) . '.' . $images->extension();
        $full_path = $upload_location . $imageName;
        $images->move($upload_location, $imageName);

        DB::table('travel_imgs_oversea')->insert([
          'travel_os_id' => $tr_id,
          'travel_os_img' => $full_path,
          'created_at' => Carbon::now()
        ]);
      }
    }

    DB::table('travel_lists_oversea')->insert([
      'travel_id' => $tr_id,
      'travel_name' => $request->travel_name,
      'country_id' => $request->name_country,
      'city_name' => $request->city_name,
      'travel_detail' => $request->travel_detail,
      'travel_remark' => $request->travel_remark,
      'travel_type' => $request->type_travel,
      'travel_created_at' => Carbon::now()
    ]);

    return redirect()->route('admin.list_oversea')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function data_oversea($id)
  {
    $data_oversea = DB::table('travel_lists_oversea')
      ->join('tbl_country', 'travel_lists_oversea.country_id', '=', 'tbl_country.rec')
      ->join('travel_type', 'travel_lists_oversea.travel_type', '=', 'travel_type.number_type')
      ->where('travel_lists_oversea.travel_id', '=', $id)
      ->get();

    $travel_img = DB::table('travel_imgs_oversea')
      ->where('travel_imgs_oversea.travel_os_id', '=', $id)
      ->get();

    $count_img = DB::table('travel_imgs_oversea')
      ->where('travel_imgs_oversea.travel_os_id', '=', $id)
      ->count();

    return view('admin.travel_detail_oversea', ['id' => $id], compact('data_oversea', 'travel_img', 'count_img'));
  }

  public function list_customer()
  {
    $list_user = DB::table('customer_data')
      ->orderBy('id', 'asc')
      ->get();

    return view('admin.list_customer', compact('list_user'));
  }

  public function list_contact()
  {
    $list_contact = DB::table('contact')
      ->orderBy('id', 'desc')
      ->get();

    return view('admin.list_contact', compact('list_contact'));
  }

  public function contact_data($id)
  {
    $contact_data = DB::table('contact')
      ->where('id', '=', $id)
      ->get();

    return view('admin.contact_data', compact('contact_data'));
  }

  public function list_rental()
  {
    $rental_data = DB::table('rental_car')
      ->get();

    return view('admin.list_rental', compact('rental_data'));
  }

  public function rental_data($id)
  {
    $rental_car = DB::table('rental_car')
      ->where('id', '=', $id)
      ->get();

    return view('admin.rental_data', compact('rental_car'));
  }


  public function save_program_oversea(Request $request)
  {
    $pos_id = $request->id;

    $package_cover = $request->file('package_cover');
    $name_gen = hexdec(uniqid());
    $package_cover_ext = strtolower($package_cover->getClientOriginalExtension());
    $package_cover_name = $name_gen . '.' . $package_cover_ext;
    $upload_location = 'travel_img/';
    $full_path = $upload_location . $package_cover_name;

    $package_cover->move($upload_location, $package_cover_name);

    DB::table('package_oversea')->insert([
      'package_id' => $pos_id,
      'package_code_os' => $request->package_code,
      'country_id' => $request->country_id,
      'name_city' => $request->city_name,
      'package_name' => $request->package_name,
      'package_day' => $request->package_day,
      'package_night' => $request->package_night,
      'package_cover' => $full_path,
      'is_show' => $request->is_show,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('admin.new_package_add_os', ['id' => $pos_id])->with('success', "สร้างโปรแกรมใหม่เรียบร้อยแล้ว");
  }

  public function new_package_add_os($id)
  {
    $new_tours = DB::table('travel_lists_oversea')
      ->join('package_oversea', 'package_oversea.country_id', '=', 'travel_lists_oversea.country_id')
      ->join('tbl_country', 'travel_lists_oversea.country_id', '=', 'tbl_country.rec')
      ->where('travel_lists_oversea.travel_type', '=', '1')
      ->orderBy('travel_lists_oversea.travel_created_at', 'desc')
      ->groupBy('travel_lists_oversea.travel_id')
      ->get();

    $package_day = DB::table('package_oversea')
      ->where('package_id', '=', $id)
      ->get();

    $food_lists = DB::table('travel_lists_oversea')
      ->join('package_oversea', 'package_oversea.country_id', '=', 'travel_lists_oversea.country_id')
      ->where('travel_lists_oversea.travel_type', '=', '2')
      ->orderBy('travel_lists_oversea.travel_created_at', 'desc')
      ->groupBy('travel_lists_oversea.travel_id')
      ->get();

    $program_day = DB::table('program_oversea_lists')
      ->select('program_oversea_lists.program_day_count')
      ->where('program_oversea_lists.program_package_id', '=', $id)
      ->groupBy('program_oversea_lists.program_day_count')
      ->orderBy('program_oversea_lists.id', 'DESC')
      ->limit('1')
      ->get();

    $pk_news = DB::table('package_oversea')
      ->select('package_oversea.package_name')
      ->where('package_oversea.package_id', '=', $id)
      ->first();

    $hotel_lists = DB::table('travel_lists_oversea')
      ->join('package_oversea', 'package_oversea.country_id', '=', 'travel_lists_oversea.country_id')
      ->join('tbl_country', 'travel_lists_oversea.country_id', '=', 'tbl_country.rec')
      ->where('travel_lists_oversea.travel_type', '=', '4')
      ->orderBy('travel_lists_oversea.travel_created_at', 'desc')
      ->groupBy('travel_lists_oversea.travel_id')
      ->get();

    $pk_news_data = [
      'package_name' => $pk_news->package_name
    ];

    return view('admin.new_package_add_os', $pk_news_data, compact('new_tours', 'food_lists', 'program_day', 'hotel_lists', 'package_day'));
  }


  public function edit_package_os($id)
  {
    $data_travel_os = DB::table('package_oversea')
      ->join('tbl_country', 'package_oversea.country_id', '=', 'tbl_country.rec')
      ->where('package_oversea.package_id', '=', $id)
      ->get();

    return view('admin.edit_package_os', ['id' => $id], compact('data_travel_os'));
  }

  public function update_package_os(Request $request)
  {
    if ($request->hasFile('package_cover')) {
      $cover_img = $request->file('travel_img');
      $name_gen = hexdec(uniqid());
      $cover_img_ext = strtolower($cover_img->getClientOriginalExtension());
      $cover_img_name = $name_gen . '.' . $cover_img_ext;
      $upload_location = 'travel_img/';
      $full_path = $upload_location . $cover_img_name;

      $cover_img->move($upload_location, $cover_img_name);

      DB::table('package_oversea')
        ->where('package_id', '=', $request->package_id)
        ->update([
          'name_city' => $request->city_name,
          'package_name' => $request->package_name,
          'package_cover' => $full_path,
          'is_show' => $request->is_show,
          'updated_at' => Carbon::now()
        ]);
      return redirect()->route('admin.preview_package_os', ['id' => $request->package_id]);
    } else {
      DB::table('package_oversea')
        ->where('package_id', '=', $request->package_id)
        ->update([
          'name_city' => $request->city_name,
          'package_name' => $request->package_name,
          'is_show' => $request->is_show,
          'updated_at' => Carbon::now()
        ]);
      return redirect()->route('admin.preview_package_os', ['id' => $request->package_id]);
    }
  }

  public function edit_customer($id)
  {
    $data_customer = DB::table('customer_data')
      ->where('customer_data.id', '=', $id)
      ->get();

    $province_th = DB::table('province_list')
      ->orderBy('name_th', 'asc')
      ->get();

    return view('admin.edit_customer', ['id' => $id], compact('data_customer', 'province_th'));
  }

  public function update_customer(Request $request)
  {

    DB::table('customer_data')
      ->where('id', '=', $request->user_id)
      ->update([
        'user_fullname' => $request->user_fullname,
        'user_address' => $request->user_address,
        'user_province' => $request->user_province,
        'user_phone' => $request->user_phone,
        'user_datetravel' => $request->user_datetravel,
        'user_program' => $request->user_program,
        'user_amount' => $request->user_amount,
        'user_remark' => $request->user_remark,
        'updated_at' => Carbon::now()
      ]);
    return redirect()->route('admin.list_customer')->with('success', "แก้ไขข้อมูลเรียบร้อยแล้ว");
  }
}
