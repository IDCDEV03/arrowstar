@extends('layouts.simple.master')
@section('title', 'สถานที่ท่องเที่ยว')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">         
                    
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                 @endif
@foreach ($data_travel as $item)  
                 <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label pt-0">ชื่อสถานที่ท่องเที่ยว</label>
                    <div class="col-sm-9">
                      <div class="form-control-static">
                   {{$item->travel_name}}
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label pt-0">จังหวัด</label>
                    <div class="col-sm-9">
                      <div class="form-control-static">
                   {{$item->name_th}}
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label pt-0">รายละเอียดสถานที่ท่องเที่ยว</label>
                    <div class="col-sm-9">
                      <div class="form-control-static">
                   {!! $item->travel_detail !!} 
                      </div>
                    </div>
                  </div>
                  @endforeach

                  <label class="col-sm-3 col-form-label pt-0">ภาพสถานที่ท่องเที่ยว</label>



                  <div class="row">
                    @foreach ($travel_img as $row)
                    <div class="col-sm">
<img src="{{asset('travel_img/'.$row->travel_img)}}" class="img-fluid img-thumbnail" width="300px" alt="">
                    </div>
                    @endforeach
              
                  </div>


            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection