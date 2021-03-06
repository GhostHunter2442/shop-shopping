@extends('layouts.backend') @section('title', 'Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{$categoryCount}}</h3>

                        <p>ประเภทสินค้า</p>
                    </div>

                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{$productCount}}<sup style="font-size: 20px"></sup></h3>

                        <p>สินค้าทั้งหมด</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{$UserCount}}</h3>

                        <p>ผู้ใช้งาน</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$OrderCount}}</h3>

                        <p>รายการสั่งสินค้า</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ยินดีต้อนรับ</h3>

                    </div>
                    <div class="card-body">
                       My shopping
                    </div>


                </div> --}}
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
<script>
 var simplebar = new Nanobar();
    simplebar.go(100);
</script>
@endsection
