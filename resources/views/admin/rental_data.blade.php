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
                        <h5>สนใจบริการเช่ารถ</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" id="button" onclick="window.print()"> <i class="icofont icofont-printer"></i> พิมพ์ข้อมูล</button>
                        <p></p>
                        @foreach ($rental_car as $item)
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
                                            <td>หน่วยงาน</td>
                                            <td class="w-50">
                                                {{$item->member_company}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td class="w-50">
                                                {{ $item->member_phone }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ประเภทรถ</td>
                                            <td class="w-50">
                                                {{$item->car_type}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ประเภทใช้รถ</td>
                                            <td class="w-50">
                                                {{$item->category_car}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>จำนวนผู้โดยสาร</td>
                                            <td class="w-50">
                                                {{$item->number_people}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ที่อยู่ต้นทาง</td>
                                            <td class="w-50">
                                                จังหวัด {{$item->start_province}} {{$item->start_amphur}}
                                                ({{$item->place_start}})
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ที่อยู่ปลายทาง</td>
                                            <td class="w-50">
                                                จังหวัด {{$item->end_province}} {{$item->end_amphur}}
                                                ({{$item->place_end}})
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>วันที่ไป-กลับ </td>
                                            <td class="w-50">
                                                @if ($item->go_date != null)
                                                    {{ Carbon\Carbon::parse($item->go_date)->format('d/m/Y') }} -
                                                    {{ Carbon\Carbon::parse($item->back_date)->format('d/m/Y') }}
                                                @else
                                                    <span class="text-danger">ไม่ได้ระบุข้อมูล</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>แผนการเดินทาง</td>
                                            <td class="w-50">
                                               {{$item->roadmap}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>จำนวนรถที่ต้องการใช้</td>
                                            <td class="w-50">
                                                {{$item->number_car}} คัน
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>อีเมล</td>
                                            <td class="w-50">
                                                {{$item->member_email}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ความต้องการพิเศษ</td>
                                            <td class="w-50">
                                                {{$item->req_detail}}
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
