@extends('layouts.backend') @section('title', 'รายการจัดส่ง สินค้า')

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
                        <div class="pull-left">
                            {{-- <button class="btn btn-success btn-exporttrack" >โหลดฟอร์ม</button> --}}
                            <a data-href="http://localhost/shopping/public/backend/invoice/order_file/trackexport" role="button" class="btn btn-success btn-exporttrack">
                                โหลดฟอร์ม
                            </a>
                        </div>
                        <div class="pull-right">
                            <form  id="saveForm" method="post" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group">

                                  <tr>

                                   <td width="30">
                                    <div class='file-input'>
                                        <input type="file"  name="select_file" id="select_file" />
                                        <span class='button'>Choose</span>
                                        <span class='label' data-js-label>เลือกไฟล์ .xslx</label>
                                      </div>
                                   </td>

                                   <td width="30%" align="left">
                                  {{-- <input type="submit" name="upload" id="uploadSubmit" class="btn btn-info" value="อัพโหลดไฟล์"> --}}
                                  <button type="submit" class="btn btn-info" name="upload" id="uploadSubmit">
                                    <i class="fa fa-upload" aria-hidden="true"></i> อัพโหลดไฟล์
                                </button>
                                     <button class="btn btn-info d-none" id="loading_btn" type="button" disabled>
                                       <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">  <i class="fas fa-sync fa-spin"></i></span>

                                       กำลังโหลด...
                                   </button>

                                   </td>
                                  </tr>
                                </div>


                                  <div class="progress-bar d-none" id="progressBar">
                                    <div class="progress-bar-fill">
                                        <span class="progress-bar-text">0%</span>
                                    </div>
                                </div>
                                <div id="uploadStatus"></div>
                   </form>
                        </div>
                    </div>

                    <div class="card-body">
                        @csrf
                        <table class="table table-bordered table-hover" id="order-table">
                            <thead>
                                <tr>
                                    <th scope="col">เลขที่สั่งซื้อ</th>
                                    <th scope="col">ผู้รับสินค้า</th>
                                    <th scope="col">เลขพัสดุ</th>
                                    <th scope="col" style="width: 200px;">สถานะ</th>

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
<!-- /.container-fluid -->
{{-- </section> --}}


{{-- ajax model --}}
@include('layouts.large_modal')
@endsection

@section('script')
<script src="{{ asset('js/backend/order.min.js') }}"></script>
@endsection
