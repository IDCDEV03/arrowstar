@extends('layouts.simple.master')
@section('title', 'สถานที่ท่องเที่ยว')

@section('css')
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
                        @endif
                        @foreach ($data_travel as $item)
                            <a href="{{ route('admin.edit_travel', ['id' => request()->id]) }}"
                                class="btn btn-sm btn-secondary">แก้ไข</a>
                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">ชื่อสถานที่</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        {{ $item->travel_name }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">ประเภท</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        {{ $item->type_travel }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">จังหวัด</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        {{ $item->name_th }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">รายละเอียดสถานที่</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        {!! $item->travel_detail !!}
                                    </div>
                                </div>
                            </div>


                            @if ($item->travel_remark == null)
                            @else
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label pt-0">Tips ข้อควรระวัง</label>
                                    <div class="col-sm-9">
                                        <div class="form-control-static">
                                            {!! $item->travel_remark !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach




                        <hr>
                        <label class="col-sm-3 col-form-label pt-0">ภาพสถานที่</label>

                        <div class="row">
                            <div class="col-sm">
                                @if ($count_img == '3')
                                    <label class="txt-danger">เพิ่มภาพครบจำนวนที่กำหนดแล้ว</label>
                                @else
                                    <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#upload_img">เพิ่มภาพสถานที่</button>
                                @endif
                            </div>

                            @foreach ($travel_img as $row)
                                <div class="col-sm">
                                    <img src="{{ asset($row->travel_img) }}" class="img-fluid img-thumbnail" width="300px"
                                        alt="">
                                    <a href="{{ route('admin.delete_travel_img', ['id' => $row->id]) }}"
                                        onclick="return confirm('ต้องการลบ ใช่หรือไม่?');"
                                        class="btn btn-xs btn-danger">ลบ</a>
                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="upload_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพ</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.insert_image_extra') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="travel_id" value="{{ request()->id }}">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">เลือกรูปภาพ</label>
                            <input class="form-control" name="travel_img" type="file" accept="image/*" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">ปิด</button>
                    <button class="btn btn-secondary" type="submit">บันทึก</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
