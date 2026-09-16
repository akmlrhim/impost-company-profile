@extends('layouts.public')

@section('title', 'Promo Digital Marketing | Impost Media')
@section('meta_description',
  'Promo spesial digital marketing untuk bisnis Anda bersama Impost Media Digital Marketing Agency di Banjarbaru.')

@push('head')
  <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
  @include('landing.sections.promo.hero')

  @include('landing.sections.promo.problem')

  @include('landing.sections.promo.solution')

  @include('landing.sections.promo.pricing')

  @include('landing.sections.promo.register')
@endsection
