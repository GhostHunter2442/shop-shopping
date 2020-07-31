@extends('layouts.frontend')

@section('content')

        <checkout-payment paymentid={!!$paymentid!!} addressid={!!$addressid!!} bankid={!!$bankid!!}  discount={!!$discount!!}></checkout-payment>

@endsection
