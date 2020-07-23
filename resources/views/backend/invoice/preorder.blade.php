@extends('layouts.backend') @section('title', 'เตรียมจัดส่ง สินค้า')

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
                            <a data-href="http://localhost/shopping/public/backend/invoice/order_file/export" role="button" class="btn btn-success btn-exportall">
                                จัดส่งทั้งหมด
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="preorder-table">
                            <thead>
                                <tr>
                                    <th scope="col">เลขที่สั่งซื้อ</th>
                                    <th scope="col">ผู้สั่ง (user ใช้งาน)</th>
                                    <th scope="col">ชำระเงิน</th>
                                    <th scope="col">ธนาคาร</th>

                                    <th scope="col">ยอดเงิน</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col" style="width: 100px;">ดำเนินการ</th>
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
{{-- @include('layouts.large_modal') --}}
@endsection

@section('script')
<script src="{{ asset('js/backend/preorder.min.js') }}"></script>
@endsection
