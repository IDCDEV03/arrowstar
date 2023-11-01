@extends('layouts.simple.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลติดต่อ</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ฝากข้อมูลติดต่อ</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" id="button" onclick="window.print()"> <i class="icofont icofont-printer"></i> พิมพ์ข้อมูล</button>
                        <p></p>
                        @foreach ($contact_data as $item)
                            <div class="table-responsive">
                                <table id="printTable" class="table table-bordered table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>ชื่อ-นามสกุล</td>
                                            <td class="w-50">
                                                {{ $item->member_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td class="w-50">
                                                {{ $item->member_phone }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>หัวข้อติดต่อ</td>
                                            <td class="w-50">
                                                {{ $item->contact_subject }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>รายละเอียด</td>
                                            <td class="w-50">
                                                {{ $item->SubjectDetail }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LINE ID</td>
                                            <td class="w-50">
                                                {{ $item->member_line }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ช่วงเวลา </td>
                                            <td class="w-50">
                                                @if ($item->from_date != null)
                                                    {{ Carbon\Carbon::parse($item->from_date)->format('d/m/Y') }} -
                                                    {{ Carbon\Carbon::parse($item->finish_date)->format('d/m/Y') }}
                                                @else
                                                    <span class="text-danger">ไม่ได้ระบุข้อมูล</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>กำหนดการ</td>
                                            <td class="w-50">
                                                @if ($item->file_input != null)
                                                    <a href="{{ asset($item->file_input) }}"><i
                                                            class="icofont icofont-download-alt"></i> ดาวน์โหลด </a>
                                                @else
                                                    <span class="text-danger">ไม่ได้อัพโหลดเอกสาร</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ต้องการใบเสนอราคา</td>
                                            <td class="w-50">
                                                {{ $item->req_quotations }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>วันที่ติดต่อ</td>
                                            <td class="w-50">
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function printData() {

            var divToPrint = document.getElementById("printTable");
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th, table td {' +
                'border:1px solid #000;' +
                'padding;0.5em;' +
                '}' +
                '</style>';
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write('<title>Print Contact</title>');
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
        }

        document.querySelector("#button").addEventListener("click", function() {
            printData();
        });
    </script>
@endsection
