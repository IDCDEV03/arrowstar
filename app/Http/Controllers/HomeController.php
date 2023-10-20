<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function travel_index()
    {
        return view('index.home');
    }

    public function contact()
    {
        return view('index.contact');
    }

    public function service()
    {
        return view('index.service');
    }

    public function health_tour()
    {
        return view('index.health');
    }

    public function community()
    {
        return view('index.community');
    }

    public function travel()
    {
        $travel_os = DB::table('package_oversea')        
        ->where('is_show','=','1')
        ->orderBy('created_at','DESC')
        ->limit('5')
        ->get();

        $sum_travel_os = DB::table('package_oversea')
        ->join('tbl_country','package_oversea.country_id','=','tbl_country.rec')
        ->where('package_oversea.is_show','=','1')
        ->get();

        return view('index.travel',compact('travel_os','sum_travel_os'));
    }

    public function travel_page($id)
    {
        $print_data = DB::table('program_oversea_lists')
        ->join('travel_lists_oversea', 'program_oversea_lists.program_travel_os_id', '=', 'travel_lists_oversea.travel_id')
        ->where('program_oversea_lists.program_package_id', '=', $id)
        ->where('travel_lists_oversea.travel_type','=','1')
        ->orderBy('program_oversea_lists.program_day_count','ASC')
        ->get();

        $travel_detail = DB::table('package_oversea')
        ->where('package_id','=',$id)
        ->get();

        $sum_travel_os = DB::table('package_oversea')
        ->join('tbl_country','package_oversea.country_id','=','tbl_country.rec')
        ->where('package_oversea.is_show','=','1')
        ->get();
        
        return view('index.travel-page',['id' => $id],compact('sum_travel_os','travel_detail','print_data'));
    }

    public function van_list()
    {
        $gall_list1 = DB::table('travel_gall')
        ->whereIn('id', [1, 2, 3])
        ->orderBy('id','ASC')
        ->get();

        $gall_list2 = DB::table('travel_gall')
        ->whereIn('id', [4, 5, 6])
        ->orderBy('id','ASC')
        ->get();

        $gall_list3 = DB::table('travel_gall')
        ->whereIn('id', [7, 8, 9])
        ->orderBy('id','ASC')
        ->get();

        $gall_list4 = DB::table('travel_gall')
        ->whereIn('id', [10, 11, 12])
        ->orderBy('id','ASC')
        ->get();

        return view('index.van',compact('gall_list1','gall_list2','gall_list3','gall_list4'));
    }


    public function LineAlert($msg)
    {
        $sToken = "aG3CWrJeAalofs84noMe6FRahdehg8Lbbj2ivZScifo";
        $sMessage = $msg;

        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
    }

    public function save_contact(Request $request)
    {
        $member_name = $request->member_name;
        $member_phone = $request->member_phone;
        $subject = $request->contact_subject;
        $sj_detail = $request->SubjectDetail;
        DB::table('contact')->insert([
            'member_name' => $request->member_name,
            'member_phone' => $request->member_phone,
            'contact_subject' => $request->contact_subject,
            'SubjectDetail' => $request->SubjectDetail,
            'member_line' => $request->member_line,
            'created_at' => Carbon::now()
        ]);

        $msg_alert = "\n"."ชื่อ: ".$member_name."\n"."เบอร์โทร: ".$member_phone."\n"."หัวข้อติดต่อ: ".$subject."\n"."รายละเอียด: ".$sj_detail;     
        $this->LineAlert($msg_alert);

        return redirect()->route('contact')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function save_contact_index(Request $request)
    {
        $member_name = $request->member_name;
        $member_phone = $request->member_phone;
        $subject = $request->contact_subject;
        $sj_detail = $request->SubjectDetail;

        DB::table('contact')->insert([
            'member_name' => $request->member_name,
            'member_phone' => $request->member_phone,
            'contact_subject' => $request->contact_subject,
            'SubjectDetail' => $request->SubjectDetail,
            'member_line' => $request->member_line,
            'created_at' => Carbon::now()
        ]);

        $msg_alert = "\n"."ชื่อ: ".$member_name."\n"."เบอร์โทร: ".$member_phone."\n"."หัวข้อติดต่อ: ".$subject."\n"."รายละเอียด: ".$sj_detail;     
        $this->LineAlert($msg_alert);

        return redirect()->route('/')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function preview_download($id)
  {
    $program_id = $id;
    $print_data = DB::table('program_oversea_lists')
      ->join('travel_lists_oversea', 'program_oversea_lists.program_travel_os_id', '=', 'travel_lists_oversea.travel_id')
      ->where('program_oversea_lists.program_package_id', '=', $program_id)
      ->orderBy('program_oversea_lists.program_day_count','ASC')
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
      ->where('pk_id','=',$program_id)
      ->get();

    return view('index.preview_download', ['id' => $program_id], compact('print_data', 'pk_news', 'img_data', 'single_data','program_day_dt'));
  }

}
