@extends('layouts.backend') @section('title', 'รายการธนาคาร')

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
                            <a href="#" data-href="{{ url('backend/bank/form/0') }}" data-modal-name="ajaxModal"
                                role="button" class="btn btn-dark btn-create">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="bank-table">
                            <thead>
                                <tr>
                                    <th scope="col">รหัส</th>
                                    <th scope="col">ชื่อธนาคาร</th>
                                    <th scope="col">รูปภาพ</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">สาขา</th>
                                    <th scope="col">บัญชีธนาคาร</th>
                                    <th scope="col">เลขบัญชี</th>
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
<script src="{{ asset('js/backend/bank.min.js') }}"></script>
@endsection
