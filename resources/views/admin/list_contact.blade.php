@extends('layouts.simple.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>ฝากข้อมูลติดต่อ</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">                 
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <b>{{ session('success') }}</b>
                </div>
                 @endif
            
                 <div class="dt-ext table-responsive">
                    <table class="display table" id="customer_table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ชื่อ-นามสกุล</th>                   
                          <th>เบอร์โทรศัพท์</th>
                          <th>หัวข้อ</th>
                          <th>รายละเอียด</th>
                          <th>Line ID</th>
                          <th>วันที่ติดต่อ</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list_contact as $item) 
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->member_name}}</td>
                          <td> {{$item->member_phone}} </td>
                          <td>{{$item->contact_subject}}</td>
                          <td>{{$item->SubjectDetail}}</td>
                          <td>{{$item->member_line}}</td>                          
                          <td> {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
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
        $("#customer_table").dataTable(
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