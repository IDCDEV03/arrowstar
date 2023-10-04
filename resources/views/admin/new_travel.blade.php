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

        @error('travel_img')
        <div class="alert alert-danger">
          {{ $message }}
        </div>     
        @enderror

         <div class="card">    
            <div class="card-body">   
              <form class="form theme-form" action="{{route('admin.insert_travel')}}" method="POST" enctype="multipart/form-data">
                @csrf          
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="province1">จังหวัด</label>
                        <select class="form-select input-air-primary" name="province1" id="province1">
                          <option selected disabled>เลือกจังหวัด..</option>
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
                        <label class="form-label" for="travel_city">เมือง</label>
                        <input class="form-control input-air-primary" name="travel_city" id="travel_city" type="text">
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="type_travel">ประเภท</label>
                        <select class="form-select input-air-primary" name="type_travel" id="type_travel">
                          <option selected disabled>เลือกประเภท..</option>
                          @foreach ($type_list as $item)  
                          <option value="{{$item->number_type}}"> {{$item->type_travel}} </option>
                          @endforeach
                        </select> 
                      </div>
                    </div>
                  </div>
            
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel1">ชื่อสถานที่</label>
                        <input class="form-control input-air-primary" name="travel_name" id="travel1" type="text">
                      </div>
                    </div>
                  </div>

               
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel3">เลือกรูปภาพ</label>
                         <span class="txt-info">(อัพโหลดได้สูงสุด 3 ภาพ)</span>
                        <input class="form-control" type="file" name="travel_img[]" multiple accept="image/*">  
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel4">รายละเอียดสถานที่</label>
                        <textarea name="travel_detail" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel_remark">Tips ข้อควรระวัง</label>
                        <textarea name="travel_remark" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">บันทึก</button>
                    <input class="btn btn-light" type="reset" value="ยกเลิก">
                  </div>
                </form>
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
@endsection