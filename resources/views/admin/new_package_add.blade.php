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
                   @endif
                   <div class="card-header">
                    ชื่อแพ็คเกจ : {{ $package_name }}
                  </div>          
                  @php
                      $i = '1';
                  @endphp             
                            <div class="card-body">
                              <form class="f1" method="post">
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
                                <div class="f1-step">
                                  <div class="f1-step-icon">
                                    <i class="fa fa-edit"></i>
                                  </div>
                                  <p>ระบุรายละเอียดเพิ่มเติม</p>
                                </div>
                              </div>

                              <fieldset>
                              <h5 class="card-title">เลือกสถานที่ท่องเที่ยว</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th>เลือก</th>
                                          <th scope="col">ชื่อสถานที่</th>
                                          <th scope="col">รายละเอียด</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($new_tours as $item)
                                        <tr>
                                          <th scope="row">
                                            @php
                                             echo $i++;   
                                            @endphp
                                          </th>
                                          <td>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                        </td>
                                          <td>{{$item->travel_name}}</td>
                                          <td>#</td>
                                          
                                        </tr>
                                        @endforeach
                                      </tbody>

                                  </table>     

                                 
<hr>
<div class="f1-buttons">
  <button class="btn btn-primary btn-next" type="button">Next</button>
</div>

                              </fieldset>


                              <fieldset>
                                <div class="mb-2">
                                  <label class="sr-only" for="f1-email">Email</label>
                                  <input class="f1-email form-control" id="f1-email" type="text" name="f1-email" placeholder="Email..." required="">
                                </div>
                                <div class="mb-2">
                                  <label class="sr-only" for="f1-password">Password</label>
                                  <input class="f1-password form-control" id="f1-password" type="password" name="f1-password" placeholder="Password..." required="">
                                </div>
                                <div class="mb-2">
                                  <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                  <input class="f1-repeat-password form-control" id="f1-repeat-password" type="password" name="f1-repeat-password" placeholder="Repeat password..." required="">
                                </div>
                                <div class="f1-buttons">
                                  <button class="btn btn-primary btn-previous" type="button">Previous</button>
                                  <button class="btn btn-primary btn-next" type="button">Next</button>
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
@endsection
