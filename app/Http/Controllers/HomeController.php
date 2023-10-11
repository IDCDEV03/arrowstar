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

    public function save_contact(Request $request)
    {
       DB::table('contact')->insert([
                'member_name' => $request->member_name,
                'member_phone' => $request->member_phone,
                'contact_subject' => $request->contact_subject,
                'SubjectDetail' =>$request->SubjectDetail,
                'member_line' => $request->member_line,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('/')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
