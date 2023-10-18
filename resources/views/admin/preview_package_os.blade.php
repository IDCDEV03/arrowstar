@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>โปรแกรมทัวร์ (ต่างประเทศ)</h3>
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

                    @foreach ($package_pre as $row)
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ประเทศ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                {!! $row->ct_nameTHA !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                {!! $row->package_name !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ความต้องการพิเศษ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                {!! $row->program_spacial_req!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label txt-danger">หมายเหตุ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static txt-danger">
                                                {!! $row->program_remark!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tips ข้อควรระวัง</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                {!! $row->program_tips !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label txt-info">ราคารวม</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                <span class="txt-info">{!! $row->price_total !!}</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label txt-danger">ราคาไม่รวม</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                               <span class="txt-danger">{!! $row->price_notin!!}</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="{{route('admin.create_tips_os', ['id' => request()->id])}}">เพิ่มความต้องการพิเศษ / Tips / หมายเหตุ</a>
                         <a href="{{route('admin.print_preview_os',['id' => request()->id])}}" class="btn btn-success" target="_blank">พิมพ์เอกสารโปรแกรม</a>
                    </div>
                </div>
            </div>
            @php
                $i = 1;
            @endphp
            <div class="card">
                <div class="card-header">
                   รายการสถานที่ในโปรแกรมทัวร์นี้
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><strong>สถานที่</strong></th>
                                    <th>ประเภท</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package_place as $data)
                                    <tr>
                                        <th scope="row">
                                            @php
                                                echo $i++;
                                            @endphp</th>
                                        <td>{{ $data->travel_name }}</td>
                                        <td> {{ $data->type_travel }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
@endsection
