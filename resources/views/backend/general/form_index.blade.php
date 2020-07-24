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
                    {{-- <form id="saveForm" method="post" enctype="multipart/form-data" action="{{ route('updateForm.index')}}"> --}}

                         <form novalidate class="{{ ($errors->any()) ? 'was-validated' : 'needs-validation' }}" method="post" enctype="multipart/form-data"
                        action="{{ route('updateForm.index') }}">
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
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" required>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">อีเมล
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="email" value="{{ $data->email }}" class="form-control" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="adress">ทีอยู่
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="adress" value="{{ $data->adress }}" class="form-control" required>
                                    @if ($errors->has('adress'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adress') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="phonenumber">เบอร์โทร
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="phonenumber" value="{{ $data->phonenumber }}" class="form-control" required>
                                    @if ($errors->has('phonenumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label for="open_time">เวลาเปิด
                                                <span class="text-danger">*</span>
                                            </label>

                                          <div class="input-group date" id="open_time" data-target-input="nearest">
                                            <input type="text" name="open_time" value="{{ $data->open_time }}" class="form-control datetimepicker-input" data-target="#open_time" required>

                                            <div class="input-group-append" data-target="#open_time" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                            @if ($errors->has('open_time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('open_time') }}</strong>
                                            </span>
                                            @endif
                                            </div>

                                        </div>

                                      </div>

                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label for="close_time">เวลาปิด
                                                <span class="text-danger">*</span>
                                            </label>

                                          <div class="input-group date" id="close_time" data-target-input="nearest">
                                            <input type="text"  name="close_time" value="{{ $data->close_time }}" class="form-control datetimepicker-input" data-target="#close_time" required>

                                            <div class="input-group-append" data-target="#close_time" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                            @if ($errors->has('close_time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('close_time') }}</strong>
                                            </span>
                                            @endif
                                            </div>

                                        </div>

                                      </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="latitude">พิกัด ละติจูด
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="latitude" value="{{ $data->latitude }}" class="form-control" required>
                                    @if ($errors->has('latitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="longitude">พิกัด ละจิจูด
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="longitude" value="{{ $data->longitude }}" class="form-control" required>
                                    @if ($errors->has('longitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                    @endif
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
<script>
loadingCustom();
$.LoadingOverlay('hide');
</script>
@if (session('message'))
<script>

    toastr["{{ session('status') }}"]("{{ session('message') }}", '', {
        progressBar: true,
        timeOut: 1500,
        extendedTimeOut: 1500
        });


</script>
@endif
<script>
//Timepicker
$('#open_time').datetimepicker({
    format: 'LT'
  })
  $('#close_time').datetimepicker({
    format: 'LT'
  })
</script>
@endsection
