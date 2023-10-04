@extends('layouts.simple.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>เพิ่มสถานที่</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">

         <div class="card">    
          <form class="form theme-form" action="{{route('admin.update_travel')}}" method="POST" >
              @csrf
           @foreach ($data_travel as $list)   
            <input type="hidden" name="travel_id" value="{{request()->id}}">
            <div class="card-body">   
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="province1">จังหวัด</label>
                        <select class="form-select input-air-primary" name="province1" id="province1">
                            <option value="0" selected>-{{$list->name_th}}</option>  
                            @foreach ($province_list as $row) 
                          <option value="{{$row->id}}"> {{$row->name_th}} </option>
                          @endforeach
                        </select>                      
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="type_travel">ประเภท ::  {{$list->type_travel}}</label>
                      </div>
                    </div>
                  </div>
            
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel1">ชื่อสถานที่</label>
                        <input class="form-control input-air-primary" name="travel_name" id="travel1" type="text" value="{{$list->travel_name}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel_city">เมือง</label>
                        <input class="form-control input-air-primary" name="travel_city" id="travel_city" type="text" value="{{$list->travel_city}}">
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel4">รายละเอียดสถานที่</label>
                        <textarea name="travel_detail" class="form-control" rows="5">{{$list->travel_detail}}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel_remark">Tips ข้อควรระวัง</label>
                        <textarea name="travel_remark" class="form-control" rows="5">{{$list->travel_remark}}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">บันทึก</button>
                    <input class="btn btn-light" type="reset" value="ยกเลิก">
                  </div>
                </form>
                @endforeach
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

 <!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>

    <!-- Plugins JS start-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
 <!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
 $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        ]
      });
  </script>
  <script>
    $('#summernote2').summernote({
           tabsize: 2,
           height: 120,
           toolbar: [
             ['style', ['style']],
             ['font', ['bold', 'underline', 'clear']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['table', ['table']],
           ]
         });
     </script>
@endsection