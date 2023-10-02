@extends('layouts.simple.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>สร้างข้อมูลลูกค้า</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form class="form theme-form" action="#" method="POST">
                    @csrf
                    @php
                    $cus_id = date("hs-ymd");
              @endphp
                    <div class="card-body">
                        <form action="#">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">ชื่อ-นามสกุล</label>
                                        <input class="form-control input-air-primary" name="travel_name" id="travel1" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="cus_address">ที่อยู่</label>
                                        <textarea class="form-control input-air-primary" name="cus_address" rows="5" cols=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">จังหวัด</label>
                                        <input class="form-control input-air-primary" name="#" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">เบอร์โทรติดต่อ</label>
                                        <input class="form-control input-air-primary" name="#" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">วันเดินทาง</label>
                                        <input class="form-control input-air-primary" name="#" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">เส้นทาง</label>
                                        <input class="form-control input-air-primary" name="#" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">จำนวน</label>
                                        <input class="form-control input-air-primary" name="#" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">หมายเหตุ</label>
                                        <input class="form-control input-air-primary" name="#" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button class="btn btn-success" type="submit">บันทึก</button>
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