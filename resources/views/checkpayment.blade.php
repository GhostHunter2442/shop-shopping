@extends('layouts.frontend')

@section('content')

        <check-payment paymentid={!!$paymentid!!} addressid={!!$addressid!!}  discount={!!$discount!!}></check-payment>

@endsection
