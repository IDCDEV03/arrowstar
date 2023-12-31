@extends('layouts.simple.master')

@section('css')
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
                 
                    <div class="card-body">  
                        <form class="form theme-form" action="{{route('admin.insert_customer')}}" method="POST">
                        @csrf                               
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">ชื่อ-นามสกุล</label>
                                        <input class="form-control input-air-primary" name="user_fullname" id="travel1" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="cus_address">ที่อยู่</label>
                                        <textarea class="form-control input-air-primary" name="user_address" rows="5" cols=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">จังหวัด</label>
                                        <select class="form-select input-air-primary" name="user_province" id="user_province">
                                            <option selected disabled>เลือกจังหวัด..</option>
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
                                        <input class="form-control input-air-primary" name="user_phone" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">วันเดินทาง</label>
                                        <input class="form-control input-air-primary digits"  type="date" name="user_datetravel">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">เส้นทาง</label>
                                        <input class="form-control input-air-primary" name="user_program" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">จำนวน</label>
                                        <input class="form-control input-air-primary" name="user_amount" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">หมายเหตุ</label>
                                        <textarea class="form-control input-air-primary" name="user_remark" rows="5"></textarea>
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
@endsection