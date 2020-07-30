@extends('layouts.backend') @section('title', 'คูปองส่วนลด')

@section('content')
<div id="app">
      <!-- Main row -->
      {{-- <section class="content"> --}}
        <div class="container-fluid">
 <div class="row">
   <div class="col-md-12">
         <!-- Default box -->

         <div class="card card-info card-outline">
        <div class="card-header">


            <div class="pull-right">
                <a href="#" data-href="{{ url('backend/coupon/form/0') }}" data-modal-name="ajaxModal" role="button" class="btn btn-dark btn-create">
                    เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="coupon-table">
                <thead>
                    <tr>
                        <th scope="col">code</th>
                        <th scope="col">ชื่อโปรโมชั่น</th>
                        <th scope="col">ส่วนลด %</th>
                        <th scope="col">ลดสูงสุด</th>
                        <th scope="col">วันหมดอายุ</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col" style="width: 200px;">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

  </div>
</div>
</div>
</div>

{{-- ajax model --}}
@include('layouts.large_modal')
@endsection

@section('script')
<script src="{{ asset('js/backend/coupon.min.js') }}"></script>
@endsection
