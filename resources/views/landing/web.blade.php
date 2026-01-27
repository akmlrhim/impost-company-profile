@extends('layouts.public')
@section('content')
  <div class="antialiased selection:bg-impost-primary selection:text-impost-fifth">

    {{-- Hero Section  --}}
    @include('landing.sections.web.hero')

    {{-- Problem Section --}}
    @include('landing.sections.web.problem')

    {{-- Portfolio  --}}
    @include('landing.sections.web.portfolio')

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
