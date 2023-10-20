@extends('index.index_app')

<body>
    @section('content')
        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">ท่องเที่ยวชุมชน</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('/') }}">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Community Tourism</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Gall Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
               
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Community Tourism</h6>
                    <h1>ท่องเที่ยวชุมชน</h1>
                </div>

                <div class="container">
                  <div class="card">
                    <div class="card-body">
                    <p>
                        <mark>การท่องเที่ยวชุมชน (Community Tourism)</mark> เป็นอีกหนึ่งรูปแบบการท่องเที่ยวที่กำลังได้รับความนิยมอยู่ในขณะนี้  เพราะนอกจากจะได้ไปเรียนรู้วิถีชีวิตชุมชนที่เรียบง่ายมีเอกลักษณ์เฉพาะชุมชนนั้น  ได้สัมผัสรอยยิ้มและการต้อนรับที่แสนอบอุ่นแล้ว  พื้นที่ตั้งของชุมชมแต่ละแห่งส่วนใหญ่ยังมีความสมบูรณ์ของทรัพยากรธรรมชาติ อากาศบริสุทธิ์  เมื่อได้มาเที่ยวเหมือนได้รับการชาร์ตพลังไปในตัว อีกทั้งการมาท่องเที่ยวชุมชนสามารถช่วยกระจายรายได้ไปสู่ชุมชน ทำให้สามารถเลี้ยงตัวเองได้แบบยั่งยืน
                      </p>
                   
                      <p>ขอขอบคุณข้อมูลจาก : www.paiduaykan.com</p>

                    </div>
                  </div>
                      <div class="row mb-3">                   
                      <div class="col-sm">
                        <img src="{{asset('index_gall/commu01.jpg')}}" class="img-fluid" alt="">
                      </div>  
                      <div class="col-sm">
                        <img src="{{asset('index_gall/commu02.jpg')}}" class="img-fluid" alt="">
                      </div>   
                      <div class="col-sm">
                        <img src="{{asset('index_gall/commu03.jpg')}}" class="img-fluid" alt="">
                      </div>                  
                    </div>
                    <a href="{{route('contact')}}" class="btn btn-success btn-block ">ติดต่อสอบถามรายละเอียดเพิ่มเติม</a>
                    
              </div>

            </div>
        </div>
        <!-- Gall End -->
    @endsection

</body>

</html>

