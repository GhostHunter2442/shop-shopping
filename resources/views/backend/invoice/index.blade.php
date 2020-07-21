@extends('layouts.backend') @section('title', 'รายการสั่งซื้อ สินค้า')

@section('content')
<div id="app">
    <!-- Main row -->
    {{-- <section class="content"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->

                <div class="card card-info card-outline">
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="invoice-table">
                            <thead>
                                <tr>
                                    <th scope="col">เลขที่สั่งซื้อ</th>
                                    <th scope="col">ผู้สั่ง</th>
                                    <th scope="col">ชำระเงิน</th>
                                    <th scope="col">ธนาคาร</th>
                                    {{-- <th scope="col">สลิป</th> --}}
                                    <th scope="col">ยอดเงิน</th>
                                    <th scope="col">จ่ายผ่านบัตร</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col" style="width: 150px;">ดำเนินการ</th>
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
<script src="{{ asset('js/backend/invoice.min.js') }}"></script>
@endsection
