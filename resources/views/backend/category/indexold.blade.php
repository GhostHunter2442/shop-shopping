@extends('layouts.backend')

@section('content')



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
                        <h3 class="card-title">ประเภทสินค้าทั้งหมด {{$countRow}} รายการ</h3>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">รหัส</th>
                                    <th scope="col">หมวดสินค้า</th>
                                    <th scope="col">วันที่เพิ่ม</th>
                                    <th scope="col">วันที่เเก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($category as $c)
                                <tr>
                                <th scope="row">{{$c->id}}</th>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->created_at}}</td>
                                    <td>{{$c->updated_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
