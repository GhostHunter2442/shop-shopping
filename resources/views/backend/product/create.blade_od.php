@extends('layouts.backend')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">สินค้า</h3>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">เพิ่มสินค้า</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มสินค้า</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form class="form-horizontal" action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-12">
                                    <input type="name" name="name" class="form-control" id="name" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ราคา</label>
                                <div class="col-sm-12">
                                    <input type="price" name="price" class="form-control" id="price"
                                        placeholder="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                <div class="col-sm-12">
                                    {{Form::select('category_id',$category, null,
                               ['placeholder' => 'เลือกประเภทสินค้า...','class'=>'form-control select2'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">รูปภาพ</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture">
                                        <label class="custom-file-label" for="customFile">เลือกรูปภาพ...</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                               <a href="{{route('product.index')}}" class="btn btn-default ">ยกเลิก </a>
                                <button type="submit" class="btn btn-success ">บันทึก</button>

                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>


                <!-- /.card-body -->


                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
