@extends('layouts.backend') @section('title', 'Top Bank')

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
                        <div class="pull-left">


        {{-- {{var_dump($months)}}<br> --}}
         {{--  {{var_dump($year)}} --}}
         {{-- <br>--}}

         <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <select id="selectmonth" class="select2 form-control" >
                    <option value="0">เดือน</option>
                    @foreach ($months as $month  )

                    <option value="{{ $month}}"> {{ $month }} </option>
                    @endforeach
                   </select>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <select id="selectyear"  class="select2 form-control" >
                    <option value="0">ปี</option>
                    @foreach ($years as $year)

                    <option value="{{ $year}}"> {{ $year }} </option>
                    @endforeach
                   </select>
            </div>
            <div class="form-group col-md-2 col-sm-12">
                <button class="btn btn-info btn-search" id="search_btn">ค้นหา</button>
            </div>
        </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="topbank-table">
                            <thead>
                                <tr>
                                    <th scope="col">ธนาคาร</th>
                                    <th scope="col">ยอดรวม</th>
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

@endsection

@section('script')
<script src="{{ asset('js/backend/reporttopbank.min.js') }}"></script>
@endsection
