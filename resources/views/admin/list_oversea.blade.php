@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
<link href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sb-1.6.0/datatables.min.css" rel="stylesheet">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">ประเทศ</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>รายการสถานที่</h5>   
               <hr> 
               <a class="btn btn-primary" href="{{route('admin.all_program_oversea')}}">โปรแกรมทัวร์ต่างประเทศ</a>               
               <a class="btn btn-secondary" href="{{route('admin.all_program')}}">โปรแกรมทัวร์ในประเทศ</a>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <b>{{ session('success') }}</b>
                </div>
                 @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="example-oversea">
                        <thead>
                            <tr>
                                <th>ชื่อสถานที่</th>
                                <th>ประเทศ</th>
                                <th>เมือง</th> 
                                <th>ประเภท</th>                              
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($list_oversea as $row)  
                            <tr>
                                <td> {{$row->travel_name}} </td>
                                <td> {{$row->ct_nameTHA}} </td>
                                <td> {{$row->city_name}} </td>
                                <td> {{$row->type_travel}} </td>
                                <td> <a href="{{route('admin.data_oversea',['id'=>$row->travel_id])}}" class="btn btn-sm btn-info">View</a> </td>                               
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
<script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sb-1.6.0/datatables.min.js"></script>

<script>

        $('#example-oversea').DataTable({
            dom:'lBfrtip',
            buttons: [
                'excelHtml5','print'
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
                },
                
        });

</script>

@endsection