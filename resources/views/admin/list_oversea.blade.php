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
<li class="breadcrumb-item active">ประเทศ</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>รายการสถานที่ (ต่างประเทศ)</h5>   
               <hr> 
               <a class="btn btn-info" href="{{route('admin.all_program_oversea')}}">โปรแกรมทัวร์ต่างประเทศ</a>               
               <a class="btn btn-secondary" href="{{route('admin.all_program')}}">โปรแกรมทัวร์ในประเทศ</a>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <b>{{ session('success') }}</b>
                </div>
                 @endif
                 @php
                         $i = '1';
                 @endphp
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="example-oversea">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อสถานที่</th>
                                <th>ประเทศ</th>
                                <th>เมือง</th> 
                                <th>ประเภท</th>                              
                             
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($list_oversea as $row)  
                            <tr>
                                <td>@php
                                
                                    echo $i++;
                                @endphp</td>
                                <td><a href="{{route('admin.data_oversea',['id'=>$row->travel_id])}}" > {{$row->travel_name}} </a></td>
                                <td> {{$row->ct_nameTHA}} </td>
                                <td> {{$row->city_name}} </td>
                                <td> {{$row->type_travel}} </td>
                                                        
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

        $('#example-oversea').DataTable({
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
                },
                
        });

</script>

@endsection