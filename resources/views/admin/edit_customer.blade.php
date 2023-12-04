@extends('layouts.simple.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>แก้ไขข้อมูลลูกค้า</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">

         <div class="card">    
          <form class="form theme-form" action="{{route('admin.update_customer')}}" method="POST" >
              @csrf
           @foreach ($data_customer as $list)   
            <input type="hidden" name="user_id" value="{{request()->id}}">
            <div class="card-body">   
            
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">ชื่อ-นามสกุล</label>
                            <input class="form-control input-air-primary" name="user_fullname" id="travel1" type="text" value="{{$list->user_fullname}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="cus_address">ที่อยู่</label>
                            <textarea class="form-control input-air-primary" name="user_address" rows="5" cols="">{{$list->user_address}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">จังหวัด</label>
                            <select class="form-select input-air-primary" name="user_province" id="user_province">
                                <option selected value="{{$list->user_province}}">-{{$list->user_province}}</option>
                                @foreach ($province_th as $row)  
                                <option value="{{$row->name_th}}"> {{$row->name_th}} </option>
                                @endforeach
                              </select>    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">เบอร์โทรติดต่อ</label>
                            <input class="form-control input-air-primary" name="user_phone" value="{{$list->user_phone}}" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">วันเดินทาง</label>
                            <input class="form-control input-air-primary digits"  type="date" name="user_datetravel" value="{{$list->user_datetravel}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">เส้นทาง</label>
                            <input class="form-control input-air-primary" name="user_program" type="text" value="{{$list->user_program}}">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">จำนวน</label>
                            <input class="form-control input-air-primary" name="user_amount" type="text" value="{{$list->user_amount}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">หมายเหตุ</label>
                            <textarea class="form-control input-air-primary" name="user_remark" rows="5">{{$list->user_remark}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-success" type="submit">บันทึก</button>
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
<!-- ckeditor -->
<script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
  <script>
  CKEDITOR.replace('travel_detail',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  } );
  </script>
  <script>
  CKEDITOR.replace('travel_remark',{    
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  } );
  </script>
@endsection