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

                <div class="text-center mb-3 pb-3">
                    <h4 class="text-primary text-uppercase" style="letter-spacing: 2px;">รถบัส VIP / รถตู้ VIP</h4>
                    <a href="{{ route('rent_car') }}" class="btn btn-primary mb-3">สนใจใช้บริการ</a>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <b>{{ session('success') }}</b>
                        </div>
                    @endif

                </div>

                <div class="container">
                    <div class="row mb-3">
                        @foreach ($gall_list1 as $item)
                            <div class="col-sm">
                                <img src="{{ asset($item->gall_path) }}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-3">
                        @foreach ($gall_list2 as $item)
                            <div class="col-sm">
                                <img src="{{ asset($item->gall_path) }}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>

                    <div class="row mb-3">
                        @foreach ($gall_list3 as $item)
                            <div class="col-sm">
                                <img src="{{ asset($item->gall_path) }}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>

                    <div class="row mb-3">
                        @foreach ($gall_list4 as $item)
                            <div class="col-sm">
                                <img src="{{ asset($item->gall_path) }}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        <!-- Gall End -->
    @endsection

</body>

</html>
