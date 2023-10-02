@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">รายการโปรแกรมทัวร์</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>รายการโปรแกรมทัวร์</h5>
                        <hr>
                        <a class="btn btn-primary" href="#">โปรแกรมทัวร์ต่างประเทศ</a>
                        <a class="btn btn-secondary" href="{{ route('admin.all_program') }}">โปรแกรมทัวร์ในประเทศ</a>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <b>{{ session('success') }}</b>
                                </div>
                            @endif
                            <div class="dt-ext table-responsive">
                                <table class="display" id="table-province">
                                    <thead>
                                        <tr>
                                            <th>ชื่อโปรแกรมทัวร์</th>
                                            <th>จังหวัด/ประเทศ</th>
                                            <th>เมือง</th>
                                            <th>ตั้งค่า</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_program as $item)
                                            <tr>
                                                <td>{{ $item->package_name }}</td>
                                                <td>{{ $item->name_th }}</td>
                                                <td>**</td>
                                                <td><a href="{{ route('admin.preview_package', ['id' => $item->package_id]) }}" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-navicon"></i>
                                                </a></td>
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
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script>
        $(function() {
            $("#table-province").dataTable({
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
