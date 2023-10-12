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

        return view('index.van',compact('gall_list1','gall_list2','gall_list3'));
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
}
