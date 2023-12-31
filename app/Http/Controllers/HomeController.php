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

    public function rent_car()
    {
        $list_province = DB::table('province_list')
        ->orderBy('name_th','ASC')
        ->get();

        return view('index.rent_car',compact('list_province'));
    }

    public function save_rent_car(Request $request)
    {
        DB::table('rental_car')->insert([
            'car_type' => $request->car_type,
            'start_province' => $request->start_province,
            'start_amphur' => $request->start_amphur,
            'place_start' => $request->place_start,
            'end_province' => $request->end_province,
            'end_amphur' => $request->end_amphur,
            'place_end' => $request->place_end,
            'go_date' => $request->go_date,
            'back_date' => $request->back_date,
            'category_car' => $request->category_car,
            'roadmap' => $request->roadmap,
            'number_people' => $request->number_people,
            'number_car' => $request->number_car,
            'member_name' => $request->member_name,
            'member_phone' => $request->member_phone,
            'member_email' => $request->member_email,
            'member_company' => $request->member_company,
            'req_detail' => $request->req_detail,
            'status' => '0',
            'created_at' => Carbon::now()
        ]);

        $msg_alert = "\n" . "ชื่อ: " . $request->member_name . "\n" . "เบอร์โทร: " . $request->member_phone . "\n" . "ติดต่อบริการเช่ารถ" . "\n" . "ประเภทรถ: " . $request->car_type. "\n" . "เช็คที่รายละเอียดที่เว็บไซต์: http://arrowstartravel114.com/admin";
        $this->LineAlert($msg_alert);
        
        return redirect()->route('van_list')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function travel()
    {
        $travel_os = DB::table('package_oversea')
            ->where('is_show', '=', '1')
            ->orderBy('created_at', 'DESC')
            ->limit('5')
            ->get();

        $sum_travel_os = DB::table('package_oversea')
            ->join('tbl_country', 'package_oversea.country_id', '=', 'tbl_country.rec')
            ->where('package_oversea.is_show', '=', '1')
            ->get();

        return view('index.travel', compact('travel_os', 'sum_travel_os'));
    }

    public function travel_page($id)
    {
        $print_data = DB::table('program_oversea_lists')
            ->join('travel_lists_oversea', 'program_oversea_lists.program_travel_os_id', '=', 'travel_lists_oversea.travel_id')
            ->where('program_oversea_lists.program_package_id', '=', $id)
            ->where('travel_lists_oversea.travel_type', '=', '1')
            ->orderBy('program_oversea_lists.program_day_count', 'ASC')
            ->get();

        $travel_detail = DB::table('package_oversea')
            ->where('package_id', '=', $id)
            ->get();

        $sum_travel_os = DB::table('package_oversea')
            ->join('tbl_country', 'package_oversea.country_id', '=', 'tbl_country.rec')
            ->where('package_oversea.is_show', '=', '1')
            ->get();

        return view('index.travel-page', ['id' => $id], compact('sum_travel_os', 'travel_detail', 'print_data'));
    }

    public function van_list()
    {
        $gall_list1 = DB::table('travel_gall')
            ->whereIn('id', [1, 2, 3])
            ->orderBy('id', 'ASC')
            ->get();

        $gall_list2 = DB::table('travel_gall')
            ->whereIn('id', [4, 5, 6])
            ->orderBy('id', 'ASC')
            ->get();

        $gall_list3 = DB::table('travel_gall')
            ->whereIn('id', [7, 8, 9])
            ->orderBy('id', 'ASC')
            ->get();

        $gall_list4 = DB::table('travel_gall')
            ->whereIn('id', [10, 11, 12])
            ->orderBy('id', 'ASC')
            ->get();

        return view('index.van', compact('gall_list1', 'gall_list2', 'gall_list3', 'gall_list4'));
    }


    public function LineAlert($msg)
    {
        //Arrowstar_line_noti
        //$sToken = "aG3CWrJeAalofs84noMe6FRahdehg8Lbbj2ivZScifo";

        //personal_line
        $sToken = 'voGmGu1AvbR9VbDkC0dY2fTLJxQgOUEryUCfxsjGbx7';
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

        if ($request->hasFile('file_input')) {
            $file_input = $request->file('file_input');
            $name_gen = hexdec(uniqid());
            $file_ext = strtolower($file_input->getClientOriginalExtension());
            $file_name = $name_gen . '.' . $file_ext;
            $upload_location = 'travel_img/';
            $full_path = $upload_location . $file_name;

            $file_input->move($upload_location, $file_name);

            DB::table('contact')->insert([
                'member_name' => $request->member_name,
                'member_phone' => $request->member_phone,
                'contact_subject' => $request->contact_subject,
                'SubjectDetail' => $request->SubjectDetail,
                'from_date' => $request->from_date,
                'finish_date' => $request->finish_date,
                'req_quotations' => $request->quotations,
                'member_line' => $request->member_line,
                'file_input' => $full_path,
                'created_at' => Carbon::now()
            ]);
        } else {
            DB::table('contact')->insert([
                'member_name' => $request->member_name,
                'member_phone' => $request->member_phone,
                'contact_subject' => $request->contact_subject,
                'SubjectDetail' => $request->SubjectDetail,
                'from_date' => $request->from_date,
                'finish_date' => $request->finish_date,
                'req_quotations' => $request->quotations,
                'member_line' => $request->member_line,
                'created_at' => Carbon::now()
            ]);
        }

        $msg_alert = "\n" . "ชื่อ: " . $member_name . "\n" . "เบอร์โทร: " . $member_phone . "\n" . "หัวข้อติดต่อ: " . $subject . "\n" . "รายละเอียด: " . $sj_detail;
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

        $msg_alert = "\n" . "ชื่อ: " . $member_name . "\n" . "เบอร์โทร: " . $member_phone . "\n" . "หัวข้อติดต่อ: " . $subject . "\n" . "รายละเอียด: " . $sj_detail;
        $this->LineAlert($msg_alert);

        return redirect()->route('/')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function preview_download($id)
    {
        $program_id = $id;
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

        return view('index.preview_download', ['id' => $program_id], compact('print_data', 'pk_news', 'img_data', 'single_data', 'program_day_dt'));
    }
}
