@extends('layouts.simple.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>สนใจบริการเช่ารถ</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('delete'))
                            <div class="alert alert-danger" role="alert">
                                <b>{{ session('delete') }}</b>
                            </div>
                        @endif
@php
    $i='1';
@endphp
                        <div class="dt-ext table-responsive">
                            <table class="display table table-bordered" id="customer_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ประเภทรถ</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>ที่อยู่ต้นทาง</th>
                                        <th>ที่อยู่ปลายทาง</th>
                                        <th>วันที่ไป</th>
                                        <th>วันที่กลับ</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rental_data as $item)
                                        <tr>
                                            <td>
                                                @php
                                                    echo $i++;
                                                @endphp
                                            </td>
                                              <td><a href="{{route('admin.rental_data',['id' => $item->id])}}">{{$item->member_name}}</a></td> 
                                              <td>{{$item->car_type}}</td> 
                                              <td>{{$item->member_phone}}</td>
                                              <td> {{$item->start_province}} {{$item->start_amphur}} ({{$item->place_start}}) </td>
                                              <td>{{$item->end_province}} {{$item->end_amphur}} ({{$item->place_end}}) </td>
                                              <td>{{ Carbon\Carbon::parse($item->go_date)->format('d/m/Y') }}</td>
                                              <td>{{ Carbon\Carbon::parse($item->back_date)->format('d/m/Y') }}</td>
                                              <td>
                                                <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบ ใช่หรือไม่?');">ลบ</a>
                                              </td>
                                        </tr>
                                    @endforeach
                                    

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>

    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
    <script>
        $(function() {
            $("#customer_table").dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pageLength', 'excel', 'print'
                ],
                "pageLength": 25,
                "language": {
                    "info": "แสดงผล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "search": "ค้นหา:",
                    "lengthMenu": "แสดงผล _MENU_ รายการ",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "paginate": {
                        "next": "ต่อไป",
                        "previous": "ก่อนหน้า"
                    }
                }
            });
        });
    </script>
@endsection
