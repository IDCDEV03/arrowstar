@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ความต้องการพิเศษ</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">                        
                        @foreach ($travel_tip as $row)
                           โปรแกรม : {{$row->package_name}} ({{$row->name_th}})                    
                      </div>
                            <div class="card-body">
                                <form action="{{route('admin.insert_tips')}}" method="post">
                                 @csrf
                                 <input type="hidden" name="package_id" value="{{request()->id}}">
                                <div class="mb-2">
                                    <label for="program_req">ความต้องการพิเศษ</label>
                                    <textarea class="form-control" id="program_req" name="program_req" rows="3"></textarea>
                                  </div>
                                  <div class="mb-2">
                                    <label for="program_remark">หมายเหตุ<span style="color: red">*</span> </label>
                                    <textarea class="form-control" id="program_remark" name="program_remark" rows="3"></textarea>
                                 
                                  </div>
  
                                  <div class="mb-2">
                                    <label for="f1-last-name">ข้อควรระวัง</label>
                                    <textarea class="form-control" id="tips_box" name="program_tips" rows="3"></textarea>
                                  </div>

                                  <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">บันทึก</button>
                                  </div>
                                </form>
                            </div>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
