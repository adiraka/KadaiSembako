@extends('template.layout')

@section('content')

@include('frontarea.partials.slider')

{{-- @include('frontarea.partials.promo') --}}

{{-- @include('frontarea.partials.ads') --}}

@include('frontarea.partials.popular-product')

@include('frontarea.partials.support')

@include('frontarea.partials.subscribe')

@endsection