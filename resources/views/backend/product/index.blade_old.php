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
                    <li class="breadcrumb-item active">สินค้า</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">สินค้าทั้งหมด {{$product->total()}} รายการ</h3>
                        <div class="pull-right">
                            <a href="{{ route('product.create') }}" class="btn btn-primary ">เพิ่มสินค้า</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">รหัส</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">Vat</th>
                                    <th scope="col">รูปภาพ</th>
                                    <th scope="col">ประเภทสินค้า</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $p)
                                <tr>
                                    <th scope="row">{{$p->id}}</th>
                                    <td>{{str_limit($p->name,20)}}</td>
                                    <td>{{number_format($p->price,2)}}</td>
                                    <td>{{$p->vatproduct}}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/resize/'.$p->picture)}}" alt="" width="60">
                                    </td>
                                    <td>{{$p->category->name}}</td>
                                    <td>{{$p->statusname}}</td>
                                    <td>
                                    <a href="{{ route('product.edit',['id'=>$p->id]) }}" class="btn btn-info btn-sm d-inline mr-2">
                                            <li class="fa fa-pencil text-white"></li>
                                        </a>
                                    <form   method="post" class="d-inline" action="{{ route('product.destroy', ['id'=>$p->id]) }}" onsubmit="return confirm('ยืนยันการลบข้อมูล ?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <li class="fa fa-trash text-white"></li>
                                            </button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$product->links()}}
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection

@section('footerscript')
@if (session('feedback'))
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'บันทึกเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
        })
</script>
@endif
@endsection
