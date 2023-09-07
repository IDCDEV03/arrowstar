@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>โปรแกรมทัวร์</h3>
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
                                    <label class="col-sm-3 col-form-label">จังหวัด</label>
                                    <div class="col-sm-9">
                                        <div class="form-control-static">
                                            {{ $row->name_th }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                    <div class="col-sm-9">
                                        <div class="form-control-static">
                                                {{$row->package_name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
@php
    $i = 1;
@endphp
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col"><strong>สถานที่ท่องเที่ยว</strong></th>
                                </tr>
                              </thead>
                              <tbody> 
                                @foreach ($package_place as $data)
                                <tr>
                                  <th scope="row">
                                    @php
                                      echo $i++;
                                  @endphp</th>
                                  <td>{{$data->program_place}}</td>
                                </tr>
                                @endforeach
                          
                              </tbody>
                            </table>
                        </div>  
                        <hr>
                        <button class="btn btn-primary" type="button">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('script')

@endsection
