@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
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

                    <form class="form theme-form" action="{{ route('admin.save_program_oversea', ['id' => request()->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header b-l-secondary border-3">
                            <h5>เพิ่มโปรแกรมทัวร์ใหม่ (ต่างประเทศ)</h5>
                          </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">รหัสโปรแกรมทัวร์</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="package_code" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ภาพปก</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="package_cover" accept="image/*"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ประเทศ</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single col-sm-12" name="country_id">
                                                <option selected disabled>เลือกประเทศ..</option>
                                                @foreach ($country_list as $item)
                                                    <option value="{{ $item->rec }}">{{ $item->ct_nameTHA }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">เมือง</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="city_name" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="package_name" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="package_day">จำนวนวัน</label>
                                            <input class="form-control" id="package_day" type="number" name="package_day"
                                                required>
                                            <small class="form-text text-muted">ระบุเป็นตัวเลข</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="package_night">จำนวนคืน</label>
                                            <input class="form-control" id="package_night" type="number"
                                                name="package_night" required>
                                            <small class="form-text text-muted">ระบุเป็นตัวเลข</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <strong>ตั้งค่าการแสดงผลบนหน้าเว็บไซต์</strong>
                                    </div>
                                    <div class="col">
                                        <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                            <div class="form-check form-check-inline radio radio-primary">
                                                <input class="form-check-input" id="radioinline1" type="radio"
                                                    name="is_show" value="1" checked>
                                                <label class="form-check-label mb-0" for="radioinline1">เปิด</label>
                                            </div>
                                            <div class="form-check form-check-inline radio radio-secondary">
                                                <input class="form-check-input" id="radioinline2" type="radio"
                                                    name="is_show" value="0">
                                                <label class="form-check-label mb-0" for="radioinline2">ไม่เปิด</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



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
