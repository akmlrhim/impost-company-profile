@extends('layouts.public')

@section('title', 'Jasa Pembuatan Website Profesional | Impost Media')
@section('meta_description',
  'Jasa pembuatan website profesional untuk bisnis Anda bersama Impost Media Digital Marketing Agency di Banjarbaru.')

@push('head')
  <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
  <div class="antialiased selection:bg-impost-primary selection:text-impost-fifth">

    {{-- Hero Section  --}}
    @include('landing.sections.web.hero')

    {{-- Problem Section --}}
    @include('landing.sections.web.problem')

    {{-- Portfolio temporarily hidden --}}
    {{-- @include('landing.sections.web.portfolio') --}}

    {{-- Testimonials --}}
    @include('landing.sections.web.testimonials')

    {{-- Pricing  --}}
    @include('landing.sections.web.pricing')

    {{-- WhyUs  --}}
    @include('landing.sections.web.whyus')

    {{-- Contact --}}
    @include('landing.sections.web.contact')
  </div>
@endsection
