@extends('layouts.backend') @section('title', 'ข้อมูลเวป')

@section('content')
<div id="app">
    <!-- Main row -->
    {{-- <section class="content"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->

                <div class="card card-info card-outline">
                    <form id="saveForm" method="post" enctype="multipart/form-data" action="{{ route('updateForm.index')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>

                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name">ชื่อเวป
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">อีเมล
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="email" value="{{ $data->email }}" class="form-control">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="adress">ทีอยู่
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="adress" value="{{ $data->adress }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="phonenumber">เบอร์โทร
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="phonenumber" value="{{ $data->phonenumber }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="open_time">เวลาเปิด
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="open_time" value="{{ $data->open_time }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="close_time">เวลาปิด
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="close_time" value="{{ $data->close_time }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="latitude">พิกัด ละติจูด
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="latitude" value="{{ $data->latitude }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="longitude">พิกัด ละจิจูด
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="longitude" value="{{ $data->longitude }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary upload-image">บันทึก</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
{{-- </section> --}}



@endsection

@section('footerscript')
@if (session('message'))
<script>

    toastr["{{ session('status') }}"]("{{ session('message') }}", '', {
        progressBar: true,
        timeOut: 1500,
        extendedTimeOut: 1500
        });
</script>
@endif
@endsection
