@extends('layouts.backend') @section('title', 'Dashboard ยอดขาย')

@section('content')
<div id="app">
    <section class="content">
        <div class="container-fluid">

          <div class="row">

            <div class="col-md-8">

              <div class="card">

                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold " id="price_sum"></span>
                      <span class="text-bold-detail" id="sale_year"></span>

                    </p>
                    <div class="ml-auto d-flex flex-column  ">

                        <div class="btn-group">
                            <button type="button" id="monthly" class="btn btn-default btn-years">ปี 2020</button>
                            <button type="button" id="monthlast" class="btn btn-default btn-monthlast">12 เดือน</button>
                            <button type="button" id="years" class="btn btn-default  btn-monthly">ยอดขายเดือนนี้</button>
                          </div>
                    </div>
                  </div>
                  <!-- /.d-flex -->


                  <div id="world-map-markers" style="height: 325px; overflow: hidden">
                    <div >
                        <canvas id="myAreaChart" width="100%" height="30%"></canvas>

                    </div>
                  </div>



                </div>
              </div>

              <!-- /.card -->
              <div class="row">
                <div class="col-md-6">
                  <!-- DIRECT CHAT -->
                  <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                      <h3 class="card-title">ยอดขายสินค้า</h3>
                      <div class="pull-right">
                        <span class="badge badge-success" id="chow_tex_price"></span>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <!-- Conversations are loaded here -->
                      {{-- <div class="direct-chat-messages"> --}}
                        <div class="card-body table-responsive p-0">
                        <table class="table table-valign-middle table-sm "  id="charttop-table">

                            <thead >
                              <tr>
                                {{-- <th style="width: 10px">#</th> --}}
                                <th style="width: 250px">สินค้า</th>
                                <th ><i class="fa fa-shopping-cart" aria-hidden="true"></i></th>
                                <th style="width: 50px">ยอด</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      {{-- </div> --}}

                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">ช่องทางการชำระเงิน</h3>
                          <div class="pull-right">
                            <span class="badge badge-success" id="show_text"></span>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" >

                                <canvas id="pieChartYear" width="100%" height="70%"></canvas>

                        </div>
                      </div>

                </div>

              </div>

            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->

              <div class="info-box mb-3 bg-teal">
                <span class="info-box-icon" ><ion-icon class="ion ion-trophy"></ion-icon></span>

                <div class="info-box-content" >
                  <span class="info-box-text"><span id="sale_year_text"></span>
                  <span class="info-box-number"><span id="price_sum_text"></span></span>
                </div>

                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-cyan">
                <span class="info-box-icon" > <ion-icon class="ion ion-archive"></ion-icon></span>

                <div class="info-box-content">
                    <span class="info-box-text"><span id="order_text"></span>
                    <span class="info-box-number"><span id="order_sum"></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->

              <!-- /.info-box -->
              <div class="info-box  mb-4 bg-orange">
                <span class="info-box-icon"><ion-icon class="ion ion-cube"></ion-icon></span>

                <div class="info-box-content">
                    <span class="info-box-text"><span id="product_text"></span>
                    <span class="info-box-number"><span id="product_sum"></span>
                </div>
                <!-- /.info-box-content -->
              </div>





              <div class="card card-sales ">
                <div class="card-header">
                  <h3 class="card-title">สินค้าขายดี</h3>
                  <div class="pull-right">
                  <span class="badge badge-success" id="show_text_top"></span>
                </div>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        <div>
                        <canvas id="pieChartTopPrice"  width="100%" height="70%"></canvas>
                    </div>
                     </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
</div>
<!-- /.container-fluid -->
{{-- </section> --}}


{{-- ajax model --}}
@include('layouts.large_modal')
@endsection

@section('script')


<script>

</script>
<script src="{{ asset('js/backend/create-charts.min.js') }}"></script>
@endsection
