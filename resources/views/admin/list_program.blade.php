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
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('delete'))
                <div class="alert alert-danger">
                    {{ session('delete') }}
                </div>
                 @endif

                 <h5 class="card-title">
                    จังหวัด : {{ $province_name }}
                 </h5>
<hr>
                <div class="dt-ext table-responsive">
                    <table class="display" id="dataTables01">
                        <thead>
                            <tr>
                                <th>โปรแกรมทัวร์</th>
                                <th>จังหวัด</th>  
                                <th></th>
                                <th></th>                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_program as $item)
                            <tr>
                                <td><a href="{{ route('admin.preview_package', ['id' => $item->package_id]) }}">
                                    {{ $item->package_name }}
                                </a>
                                </td>
                                <td> {{ $item->name_th }} </td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="{{route('admin.print_preview',['id' => $item->package_id])}}" target="_blank">
                                    <i data-feather="download"></i>
                                </a>
                                </td> 
                                <td>
                                    <a class="btn btn-danger btn-xs" 
                                    href="{{route('admin.delete_program',['id'=>$item->package_id])}}" onclick="return confirm('ต้องการลบ ใช่หรือไม่?');">
                                        <i data-feather="trash-2"></i>
                                    </a>
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
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>

<script src="{{asset('assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('assets/js/scrollbar/custom.js')}}"></script>
 <!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>

    <!-- Plugins JS start-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
 <!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<script>
    $(function(){
        $("#dataTables01").dataTable(
            {
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