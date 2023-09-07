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
                    
                        @foreach ($new_tours as $row)
                        @php 
                            $id = $row->package_id;
                        @endphp

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label pt-0">จังหวัด</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="province_id" 
                                                value="{{ $row->id }}">
                                           
                                                <div class="form-control-static">
                                                    {{ $row->name_th }} 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label pt-0">ชื่อแพ็คเกจ</label>
                                            <div class="col-sm-9">
                                                <div class="form-control-static">
                                                    {{ $row->package_name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="colFormLabelSm26">ระบุสถานที่ท่องเที่ยว</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="form theme-form" action="{{ route('admin.save_tourist') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $row->package_id }}" name="pk_id">
                                <table class="table" id="table" name="table">
                                    <tbody>
                                        <tr>
                                            <td width='10%'><input type="hidden" 
                                                name="add[0][package_id]" class="form-control" 
                                                value="{{ $row->package_id }}" readonly></td>
                                            <td><input type="text" 
                                                name="add[0][program_place]" class="form-control"></td>
                                            <td>
                                                <button type="button" name="add_btn" id="add_btn"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

    <script type="text/javascript">
        var i = 0;
        $('#add_btn').click(function() {
            ++i;
            $('#table').append(
                '<tr><td width="10%"><input type="hidden" name="add['+i+'][package_id]" class="form-control" value="@php echo $id @endphp" readonly></td><td><input type="text" name="add['+i+'][program_place]" class="form-control" /></td><td><button type="button" name="remove" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td></tr>');
        });

        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    </script>
@endsection
