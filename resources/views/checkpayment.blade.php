@extends('layouts.frontend')

@section('content')

        <check-payment paymentid={!!$paymentid!!} addressid={!!$addressid!!}></check-payment>

@endsection
