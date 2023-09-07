@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>เพิ่มโปรแกรมทัวร์ใหม่</h3>
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
                    <form class="form theme-form" 
                    action="{{ route('admin.save_program') }}" method="POST">
                        @csrf
                        @foreach ($province_th as $row)
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">จังหวัด</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="province_id" 
                                                value="{{ $row->id }}">
                                           
                                                <div class="form-control-static">
                                                    {{ $row->name_th }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="package_name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <hr>
                                <button type="submit" class="btn btn-success">บันทึก</button>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('script')

@endsection
