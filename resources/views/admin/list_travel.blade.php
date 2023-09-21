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
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <h5 class="card-header">จังหวัด {{ $province_name }}</h5>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="dt-ext table-responsive">
                            <table class="display" id="dataTables01">
                                <thead>
                                    <tr>
                                        <th>สถานที่</th>
                                        <th>ประเภท</th>
                                        <th>อัพเดทล่าสุด</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_travel as $item)
                                        <tr>
                                            <td>
                                                {{ $item->travel_name }}
                                            </td>
                                            <td> {{ $item->type_travel }} </td>
                                            <td>{{ Carbon\Carbon::parse($item->travel_created_at)->format('d/m/Y H:i') }}
                                            </td>

                                            <td>
                                                <div class="btn-group btn-group-pill" role="group"
                                                    aria-label="Basic example">
                                                    <a href="{{ route('admin.data_travel', ['id' => $item->travel_id]) }}"
                                                        class="btn btn btn-outline-light txt-dark " type="button"> <i
                                                            class="fa fa-info-circle"></i></a>
                                                    <a class="btn btn btn-outline-light txt-dark " type="button"><i
                                                            class="fa fa-trash-o"></i></a>

                                                </div>
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
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script>
        $(function() {
            $("#dataTables01").dataTable({
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
