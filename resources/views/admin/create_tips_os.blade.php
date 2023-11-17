@extends('layouts.simple.master')
@section('title', 'รายการโปรแกรมทัวร์')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>รายละเอียดเพิ่มเติม</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">                        
                        @foreach ($travel_tip as $row)
                           โปรแกรม : {{$row->package_name}} ({{$row->ct_nameTHA}})                    
                      </div>
                            <div class="card-body">
                                <form action="{{route('admin.insert_tips_os')}}" method="post">
                                 @csrf
                                 <input type="hidden" name="package_id" value="{{request()->id}}">
                                
                                 <div class="mb-2">
                                    <label for="program_req">ความต้องการพิเศษ</label>
                                    <textarea class="form-control" id="program_req" name="program_req" rows="3">{{$row->program_spacial_req}}</textarea>
                                  </div>

                                  <div class="mb-2">
                                    <label for="program_remark">หมายเหตุ<span style="color: red">*</span> </label>
                                    <textarea class="form-control" id="program_remark" name="program_remark" rows="3">{{$row->program_remark}}</textarea>
                                 
                                  </div>
                                  
                                  <div class="mb-2">
                                    <label for="f1-last-name">ข้อควรระวัง (Tips)</label>
                                    <textarea class="form-control" id="program_tips" name="program_tips" rows="3">{{$row->program_tips}}</textarea>
                                  </div>
                                 
                                  <div class="mb-2">
                                    <label for="f1-last-name"><span class="txt-info" style="font-weight: bold">ราคารวม</span></label>
                                    <textarea class="form-control" id="price_total" name="price_total" rows="3">{{$row->price_total}}</textarea>
                                  </div>

                                  <div class="mb-2">
                                    <label for="f1-last-name"><span class="txt-danger" style="font-weight: bold"> ราคาไม่รวม</span></label>
                                    <textarea class="form-control" id="price_notin" name="price_notin" rows="3">{{$row->price_notin}}</textarea>
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('program_tips',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  } ),
  CKEDITOR.replace('price_total',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  }),
  CKEDITOR.replace('price_notin',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  });
  CKEDITOR.replace('program_remark',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  });
  CKEDITOR.replace('program_req',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  });
  </script>
@endsection
