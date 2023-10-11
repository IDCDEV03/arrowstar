@extends('layouts.authentication.master')
@section('title', 'Login เข้าสู่ระบบ')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/travel_bg.png') }}"
                    alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo text-start" href="#"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/logo1.png') }}" width="120px" alt="looginpage"><img
                            class="img-fluid for-dark" src="{{ asset('assets/images/logo1.png') }}" width="120px"
                                    alt="looginpage">
                                 </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" action="{{ route('login.perform') }}" method="POST">
                                @csrf
                                <h4>เข้าสู่ระบบ</h4>
                                <p>สำหรับผู้ดูแลระบบ</p>
                                @if (session('message'))
                                    <div class="alert alert-danger" role="alert">
                                        <b>{{ session('message') }}</b>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required>

                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" name="remember" value="remember">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
