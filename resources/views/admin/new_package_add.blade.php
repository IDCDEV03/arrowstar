@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>เพิ่มโปรแกรมทัวร์ใหม่</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                
                   @if (session('success'))
                   <div class="alert alert-success" role="alert">
                       <b>{{ session('success') }}</b>
                   </div>                       
                   @elseif (session('error'))
                   <div class="alert alert-danger" role="alert">
                    <b>{{ session('error') }}</b>
                   </div>   
                   @endif
                   <div class="card-header">
                    ชื่อแพ็คเกจ : {{ $package_name }}
                  </div>          
                  @php
                      $i = '1';
                  @endphp             
                            <div class="card-body">
                              <form class="f1" action="{{route('admin.insert_program_travel')}}" method="post">
                                @csrf
                       <input type="hidden" name="package_id" value="{{request()->id}}">
                              <div class="f1-steps">
                                <div class="f1-progress">
                                  <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                                </div>
                                <div class="f1-step active">
                                  <div class="f1-step-icon">
                                    <i class="fa fa-image"></i>
                                  </div>
                                  <p>เลือกสถานที่ท่องเที่ยว</p>
                                </div>
                                <div class="f1-step">
                                  <div class="f1-step-icon">
                                    <i class="fa fa-coffee"></i>
                                  </div>
                                  <p>เลือกร้านอาหาร</p>
                                </div>                              
                              </div>

                              <fieldset>
                              
@php
$day_program = $program_day+1;
@endphp
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="mb-3">      
                                    <label class="form-label txt-secondary" for="program_day">วันที่ในกำหนดการ</label>                           
                                    <input type="text" class="form-control input-air-primary  form-control-sm" name="program_day" id="program_day" value="{{$day_program}}" readonly>                                    
                                  </div>
                                </div>
                              </div>

                              <hr>
                              <h5 class="card-title">เลือกสถานที่ท่องเที่ยว</h5>
                                <table class="table table-hover display" id="basic-1">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">ชื่อสถานที่</th>
                                          <th>เลือก</th>
                                          <th scope="col">รายละเอียด</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($new_tours as $item)
                                        <tr>
                                          <th scope="row">
                                            <input type="hidden" name="province_id" value="{{$item->province_id}}">
                                            <input type="hidden" name="program_day_all" value="{{$item->package_day}}">
                                            @php
                                             echo $i++;  
                                             $package_all_day = $item->package_day; 
                                            @endphp
                                          
                                          </th>                                         
                                          <td>{{$item->travel_name}}</td>
                                          <td>
                                            <div class="form-check checkbox checkbox-primary mb-0">
                                              <input class="form-check-input" id="checkbox-primary-{{$item->travel_id}}" type="checkbox" name="travel_id[]" value="{{$item->travel_id}}">
                                              <label class="form-check-label" for="checkbox-primary-{{$item->travel_id}}">เลือก</label>
                                            </div>
                                          </td>
                                          <td><a href="{{ route('admin.data_travel', ['id' => $item->travel_id]) }}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-info-circle"></i></a></td>
                                          
                                        </tr>
                                        @endforeach
                                      </tbody>
                                  </table>     

                                 
<hr>
<div class="f1-buttons">
  <button class="btn btn-primary btn-next" type="button">ต่อไป</button>
</div>

                              </fieldset>


                              <fieldset>                               
                                <h5 class="card-title">เลือกร้านอาหาร</h5>
                                <table class="table table-hover display" id="food-list">
                                    <thead>
                                        <tr>                                         
                                          <th>เลือก</th>
                                          <th scope="col">ชื่อสถานที่</th>
                                          <th scope="col">รายละเอียด</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($food_lists as $row)
                                        <tr>                                      
                                          <td>{{$row->travel_name}}</td>
                                          <td>
                                            <div class="form-check checkbox checkbox-info mb-0">
                                              <input class="form-check-input" id="checkbox-info-{{$row->travel_id}}" type="checkbox" name="travel_id[]" value="{{$row->travel_id}}">
                                              <label class="form-check-label" for="checkbox-info-{{$row->travel_id}}">เลือก</label>
                                            </div>
                                          </td>
                                          <td><a href="{{ route('admin.data_travel', ['id' => $row->travel_id]) }}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-info-circle"></i></a></td>
                                          
                                        </tr>
                                        @endforeach
                                      </tbody>

                                  </table>  
                                  <hr>

                                <div class="f1-buttons">
                                  <button class="btn btn-primary btn-previous" type="button">ย้อนกลับ</button>                                
                                      @if ($package_all_day == $day_program) 
                                      <button name="action" class="btn btn-success btn-submit" type="submit" value="action1">เสร็จสิ้น</button>
                                      @elseif($package_all_day > $day_program)
                                      <button name="action" class="btn btn-secondary btn-submit" type="submit" value="action2">เพิ่มกำหนดการ</button>
                                      @endif                        
                                </div>
                              </fieldset>
                            </form>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('script')
<script src="{{asset('assets/js/form-wizard/form-wizard-three.js')}}"></script>
<script src="{{asset('assets/js/form-wizard/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
