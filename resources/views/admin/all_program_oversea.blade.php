@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">รายการโปรแกรมทัวร์ (ต่างประเทศ)</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>รายการโปรแกรมทัวร์ (ต่างประเทศ)</h5>
                        <hr>
                        @php
                            $pos_id = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 12);
                        @endphp
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('admin.list_oversea')}}" class="btn btn-outline-info" ><i class="fa fa-picture-o"></i> รายการสถานที่</a>
                            <a href="{{ route('admin.new_package_oversea', ['id' => $pos_id]) }}" class="btn btn-outline-info" ><i class="fa fa-plus-square-o"></i> เพิ่มโปรแกรมใหม่</a>
                           
                          </div>


                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <b>{{ session('success') }}</b>
                                </div>
                            @endif
                            @php
                                $i ='1';
                            @endphp
                            <div class="dt-ext table-responsive">
                                <table class="display table-bordered" id="table-program-oversea">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อโปรแกรมทัวร์</th>
                                            <th>ประเทศ</th>
                                            <th>เมือง</th>
                                            <th>วันที่เพิ่ม</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($list_program as $item)
                                        <tr>
                                            <td>@php
                                                echo $i++;
                                            @endphp</td>
                                            <td><a href="{{ route('admin.preview_package_os', ['id' => $item->package_id]) }}">{{ $item->package_name }}</a></td>
                                            <td>{{ $item->ct_nameTHA }}</td>
                                            <td>{{ $item->name_city }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y ') }}</td>
                                           
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
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>

<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
<script>
    $(function(){
        $("#table-program-oversea").dataTable(
            {
            dom: 'Bfrtip',
            buttons: [
                'pageLength','excel','print'
            ],
                "pageLength": 25,
                "language": {
                    "info":"แสดงผล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "search":"ค้นหา:",
                    "lengthMenu":"แสดงผล _MENU_ รายการ",
                    "zeroRecords":"ไม่พบข้อมูล",
                    "paginate": {
                        "next":"ต่อไป",
                        "previous":"ก่อนหน้า"
                    }
                }
            });
    });
</script>
@endsection
