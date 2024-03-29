@extends('layouts.backend') @section('title', 'หมวดหมู่สินค้า')

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
                <a href="#" data-href="{{ url('backend/category/form/0') }}" data-modal-name="ajaxModal" role="button" class="btn btn-dark btn-create">
                    เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="category-table">
                <thead>
                    <tr>
                        <th scope="col">ชื่อหมวดหมู่สินค้า</th>
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
@include('layouts.modal')
@endsection

@section('script')
<script src="{{ asset('js/backend/category.min.js') }}"></script>
@endsection
