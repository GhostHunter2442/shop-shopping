@extends('layouts.frontend')
@section('content')

{{-- <check-out :distotal="disTotal"></check-out> --}}
<check-out discount={!!$discount!!}></check-out>

@endsection


