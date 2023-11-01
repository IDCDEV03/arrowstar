@extends('index.index_app')

<body>
    @section('content')
        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">บริการเช่ารถ</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('/') }}">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">BUS/VAN</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Gall Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">


                <div class="card border-primary">
                    <div class="card-header">
                        ติดต่อบริการเช่ารถ
                    </div>
                    <div class="card-body text-primary">

                        <!--start_form-->
                        <form action="{{route('save_rental')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="car_type">เลือกประเภทรถ</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="car_type" id="car_type1" value="รถบัส">
                                    <label class="form-check-label" for="car_type1">รถบัส</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="car_type" id="car_type2" value="รถตู้">
                                    <label class="form-check-label" for="car_type2">รถตู้</label>
                                </div>
                            </div>

                            <hr>
                            <h5 class="text-primary">ที่อยู่ต้นทาง</h5>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="start_province">เลือกจังหวัด<span class="text-danger">*</span></label>
                                        <select class="form-control" id="start_province" name="start_province">
                                            <option selected disabled>เลือก..</option>
                                            @foreach ($list_province as $data)
                                                <option value="{{ $data->name_th }}">{{ $data->name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
    
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="start_province">อำเภอ/เขต<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="start_amphur" required>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="place_start">สถานที่รับผู้โดยสาร<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="place_start"
                                    placeholder="โปรดระบุรายละเอียดสถานที่รับ เช่น บริษัท โรงแรม โรงเรียน" name="place_start" required>
                            </div>
                   


                    </div>
                </div>
                <br>
                <div class="card border-success">
                    <div class="card-body text-success">
                        <h5 class="text-success">ที่อยู่ปลายทาง</h5>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="end_province">เลือกจังหวัด<span class="text-danger">*</span></label>
                                    <select class="form-control" id="end_province" name="end_province">
                                        <option selected disabled>เลือก..</option>
                                        @foreach ($list_province as $data)
                                            <option value="{{ $data->name_th }}">{{ $data->name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="start_province">อำเภอ/เขต<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="end_amphur">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="place_end">สถานที่ปลายทาง<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="place_end"
                                placeholder="โปรดระบุรายละเอียดสถานที่ปลายทาง เช่น บริษัท โรงแรม โรงเรียน" name="place_end" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="go_date">วันที่เดินทางไป<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="go_date" id="go_date" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="back_date">วันที่เดินทางกลับ<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="back_date" id="back_date" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category_car">ประเภทการใช้รถ<span class="text-danger">*</span></label>
                                <select id="category_car" name="category_car" class="form-control">
                                    <option selected disabled>เลือก...</option>
                                    <option value="ส่ง-รับ">ส่ง-รับ</option>
                                    <option value="ส่ง-รับ กลางวันไม่ใช้รถ">ส่ง-รับ กลางวันไม่ใช้รถ</option>
                                    <option value="ใช้ทุกวัน">ใช้ทุกวัน</option>
                                    <option value="ส่งเท่านั้น">ส่งเท่านั้น</option>
                                    <option value="รับกลับเท่านั้น">รับกลับเท่านั้น</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roadmap">รายละเอียด/แผนการเดินทาง</label>
                            <textarea name="roadmap" id="roadmap" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="number_people">จำนวนผู้โดยสาร<span class="text-danger">*</span></label>
                                    <input type="number" name="number_people" class="form-control" required>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="start_province">จำนวนรถที่ต้องการใช้ (คัน)</label>
                                    <input type="number" name="number_car" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <br>

                <div class="card border-info">
                    <div class="card-body text-info">
                        <h5 class="text-info">ข้อมูลลูกค้า</h5>
                        <hr>
                        <div class="form-group row">
                            <label for="member_name" class="col-sm-4 col-form-label">ชื่อ-นามสกุล
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="member_name" name="member_name" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="member_phone" class="col-sm-4 col-form-label">เบอร์โทรศัพท์<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="member_phone" id="member_phone" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="member_email" class="col-sm-4 col-form-label">อีเมล<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" name="member_email" id="member_email" placeholder="สำหรับส่งใบเสนอราคา" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="member_company" class="col-sm-4 col-form-label">ชื่อหน่วยงาน/บริษัท (ถ้ามี)</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="member_company" id="member_company" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="req_detail" class="col-sm-4 col-form-label">รายละเอียดอื่นๆ/ความต้องการพิเศษ</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="req_detail" id="req_detail" cols="30" rows="3"></textarea>
                            </div>
                          </div>


                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-block btn-primary">บันทึกข้อมูล</button>
                </form>







            </div>
        </div>
        <!-- Gall End -->
    @endsection

</body>

</html>
