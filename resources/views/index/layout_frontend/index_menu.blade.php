  <!-- Topbar Start -->
  <div class="container-fluid bg-light pt-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <p><i class="fa fa-envelope mr-2"></i>arrowstartravel114@gmail.com</p>
                    <p class="text-body px-3">|</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>(+66)621481969</p>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                   
                    <a class="text-primary pl-3" href="{{route('login.show')}}">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{route('/')}}" class="navbar-brand">
                <img src="{{ asset('plugin_index/img/logo1.png') }}" alt="" width="80px">
                <span class="text-dark">ARROW</span><span class="text-primary">STAR</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                   <a href="#" class="nav-item nav-link">โปรแกรมทัวร์</a>
                <a href="{{route('service')}}" class="nav-item nav-link">แพ็คเกจ-บริการ</a>
                <a href="{{route('van_list')}}" class="nav-item nav-link">รถบัส/รถตู้</a>
                <a href="{{route('health')}}" class="nav-item nav-link">ท่องเที่ยวเชิงสุขภาพ</a>
                <a href="#" class="nav-item nav-link">ท่องเที่ยวชุมชน</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">ฝากข้อมูลติดต่อ</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
