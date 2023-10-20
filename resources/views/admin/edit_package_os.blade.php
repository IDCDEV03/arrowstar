@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขข้อมูลโปรแกรมทัวร์</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <form class="form theme-form" action="{{ route('admin.update_package_os') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ request()->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    @foreach ($data_travel_os as $data)
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">ภาพปก</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="package_cover"
                                                    accept="image/*">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">ประเทศ</label>
                                            <div class="col-sm-9">
                                                <div class="form-control-static">
                                                    {{ $data->ct_nameTHA }}
                                                </div>
                                            </div>
                                        </div>



                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">เมือง</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="city_name"
                                                    value="{{ $data->name_city }}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="package_name"
                                                    value="{{ $data->package_name }}">
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <strong>ตั้งค่าการแสดงผลบนหน้าเว็บไซต์</strong>
                                        </div>
                                        <div class="col">
                                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                                <div class="form-check form-check-inline radio radio-primary">
                                                    <input class="form-check-input" id="radioinline1" type="radio"
                                                        name="is_show" value="1"
                                                        @php
if ($data->is_show == '1') {
                                                      echo 'checked';
                                                    } @endphp>
                                                    <label class="form-check-label mb-0" for="radioinline1">เปิด</label>
                                                </div>
                                                <div class="form-check form-check-inline radio radio-secondary">
                                                    <input class="form-check-input" id="radioinline2" type="radio"
                                                        name="is_show" value="0"
                                                        @php
if ($data->is_show == '0') {
                                                      echo 'checked';
                                                    } @endphp>
                                                    <label class="form-check-label mb-0" for="radioinline2">ไม่เปิด</label>
                                                </div>

                                            </div>

                                        </div>
                                </div>
                            </div>
                            @endforeach

                            <hr>
                            <button type="submit" class="btn btn-success">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
@endsection
