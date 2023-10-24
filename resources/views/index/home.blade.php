@extends('index.index_app')
<body>
@section('content')


@if(session('success'))
<script type="text/javascript">alert("บันทึกข้อมูลเรียบร้อยแล้ว")</script>
@endif 

    <!-- Carousel Start -->
    <div class="container-fluid">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('plugin_index/img/bg_ar03.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">ArrowStar</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                        <a href="{{route('contact')}}" class="btn btn-primary py-md-3 px-md-5 mt-2">ฝากข้อมูลติดต่อ</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('plugin_index/img/beach1.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            <a href="{{route('contact')}}" class="btn btn-primary py-md-3 px-md-5 mt-2">ฝากข้อมูลติดต่อ</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{asset( 'plugin_index/img/ArrowStar.png')}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">ArrowStar</h1>
                        <p>Assist your traveling happiness delight tours, Transporation and Speacial Events (License 51/00815 Thailand)</p>
                        <p class="text-primary">ทัวร์ในประเทศและต่างประเทศ อบรม สัมมนา ศึกษาดูงาน (ใบอนุญาตประกอบการธุรกิจนำเที่ยวเลขที่ 51/00815)</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-2.jpg" alt="">
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Destination Start -->
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">บริการเช่ารถ</h6>
                <a href="{{route('van_list')}}" class="h1">รถบัส VIP / รถตู้ VIP</a>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="{{asset('plugin_index/img/5353349.jpg')}}" alt="">                 
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('plugin_index/img/55353350-2.jpg')}}" alt="">                    
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('plugin_index/img/42456_1.jpg')}}" alt="">                    
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="{{asset('plugin_index/img/van4.png')}}" alt="">                 
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('plugin_index/img/van1.png')}}" alt="">                    
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('plugin_index/img/van2.png')}}" alt="">                    
                    </div>
                </div>                
            </div>
        </div>
    
    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">                       
                        <h1 class="text-white">ติดต่อสอบถาม</h1>
                    </div>
                    <p class="text-white">แอโร่สตาร์ ทราเวล จัดทัวร์ในประเทศ ต่างประเทศ ศึกษาดูงาน สัมมนา จัดกรุ๊ปเหมา
                    </p> 
                    <p class="text-white">
                    211/10 หมู่ที่ 4 ตำบลหนองขอนกว้าง อำเภอเมืองอุดีธานี จังหวัดอุดรธานี 41000</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>ใบอนุญาตประกอบการธุรกิจนำเที่ยวเลขที่ 51/00815</li>
                        <li class="py-2"><i class="fa fa-envelope text-primary mr-3"></i> arrowstartravel114@gmail.com</li>
                        <li class="py-2"><i class="fa fa-phone text-primary mr-3"></i>062-1481969</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">ฝากข้อมูลติดต่อ</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form action="{{route('save_contact_index')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="ชื่อ-นามสกุล" name="member_name" required />
                                </div>
                            
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="เบอร์โทรศัพท์" maxlength="10" required="required" name="member_phone" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="inputSubject" name="contact_subject" required>
                                        <option selected disabled>โปรดเลือกหัวข้อที่ต้องการติดต่อ..</option>
                                        <option value="จัดกรุ๊ปทัวร์" style="color:blue">จัดกรุ๊ปทัวร์</option>
                                    <option style="color:#694800" value="ท่องเที่ยวเชิงสุขภาพ">ท่องเที่ยวเชิงสุขภาพ</option>
                                    <option style="color:#da1d7b" value="ท่องเที่ยวชุมชน">ท่องเที่ยวชุมชน</option>
                                    <option style="color:#ff6d02" value="สัมมนา/ศึกษาดูงาน">สัมมนา/ศึกษาดูงาน</option>
                                    <option style="color:#64ca05" value="เช่ารถตู้/รถบัส">เช่ารถตู้/รถบัส</option>
                                    <option style="color:#3706bd" value="ของฝาก/ของที่ระลึก">ของฝาก/ของที่ระลึก</option>
                                    <option style="color:rgb(183, 9, 218)" value="อื่นๆ">อื่นๆ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Line ID (ถ้ามี)" name="member_line" />
                                </div>
                                <div class="form-group">
                                   <textarea class="form-control" name="SubjectDetail" id="" cols="30" rows="4" placeholder="รายละเอียดที่ต้องการสอบถาม"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LcN4ZEoAAAAAFTNNFLE0s4pc91mQArTSZKT2KHh"></div>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit">ส่งข้อความ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->



@endsection
   
</body>
</html>