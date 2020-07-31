
@extends('layouts.frontend')

@section('content')

        <check-paymentomise paymentid={!!$paymentid!!} addressid={!!$addressid!!} bankid={!!$bankid!!} discount={!!$discount!!}></check-paymentomise>

@endsection
