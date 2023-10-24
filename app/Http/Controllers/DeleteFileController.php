<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\travel_img;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class DeleteFileController extends Controller
{
    public function delete_travel_img(Request $request)
    {
        $id = $request->id;
     
        $travel_img = travel_img::find($id);
        $image_path = $travel_img->travel_img;
        unlink($image_path);

        $delete_data_img = DB::table('travel_imgs')
        ->where('id','=',$id)
        ->delete();

        return redirect()->back()->with('success', "ลบเรียบร้อยแล้ว");    
    }

    public function delete_travel_img_os(Request $request)
    {
        $id = $request->id;
     
        $travel_img = DB::table('travel_imgs_oversea')->find($id);
        $image_path = $travel_img->travel_os_img;
        unlink($image_path);

        $delete_data_img = DB::table('travel_imgs_oversea')
        ->where('id','=',$id)
        ->delete();

        return redirect()->back()->with('success', "ลบเรียบร้อยแล้ว");    
    }

    public function delete_travel_place(Request $request)
    {
        $id = $request->id;
        $province = $request->province;

       $place_delete = DB::table('travel_lists')
        ->leftjoin('program_travel_lists','travel_lists.travel_id','=','program_travel_lists.program_travel_id')
        ->where('travel_lists.travel_id','=',$id)
        ->delete();

        return redirect()->route('admin.list_travel',['id' => $province])->with('error', "ลบสถานที่เรียบร้อยแล้ว");        
    }
    
    public function delete_program($id)
  {
    DB::table('package_news')
    ->leftjoin('program_travel_lists','package_news.package_id','=','program_travel_lists.program_package_id')
    ->where('package_news.package_id', '=', $id)
    ->delete();
    return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");
  }  

  public function delete_contact($id)
  {
    DB::table('contact')
    ->where('id','=',$id)
    ->delete();

    return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");
  }

  public function delete_package_os($id)
  {
    DB::table('package_oversea')
    ->where('package_id','=',$id)
    ->delete();

    DB::table('program_oversea_lists')
    ->where('program_package_id','=',$id)
    ->delete();

    return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");
  }

  public function delete_travel_os($id)
  {
     DB::table('travel_lists_oversea')
      ->leftjoin('program_oversea_lists','travel_lists_oversea.travel_id','=','program_oversea_lists.program_travel_os_id')
      ->where('travel_lists_oversea.travel_id','=',$id)
      ->delete();

      return redirect()->route('admin.list_oversea')->with('success', "ลบสถานที่เรียบร้อยแล้ว");     
  }
  

}
