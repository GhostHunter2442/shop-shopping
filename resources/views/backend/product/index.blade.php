@extends('layouts.backend') @section('title', 'รายการสินค้า')

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
                        {{-- <h3 class="card-title">หมวดหมู่สินค้า </h3> --}}
                        <div class="pull-right">
                            <a href="#" data-href="{{ url('backend/product/form/0') }}" data-modal-name="ajaxModal"
                                role="button" class="btn btn-dark btn-create">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="product-table">
                            <thead>
                                <tr>
                                    <th scope="col">รหัส</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">รูปภาพ</th>
                                    <th scope="col">ประเภทสินค้า</th>
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
<!-- /.container-fluid -->
{{-- </section> --}}


{{-- ajax model --}}
@include('layouts.large_modal')
@endsection

@section('script')
<script src="{{ asset('js/backend/product.min.js') }}"></script>
@endsection
