@extends('layouts.public')
@section('content')
  <x-home.hero />

  <x-home.clients :clients="$clients" />

  <x-home.vsl />


  <x-home.about :portfolios="$portfolios" :portfolioCategories="$portfolioCategories" />

  <x-home.services :services="$services" />

  {{-- portfolio  --}}
  <x-home.portfolio :portfolios="$portfolios" :portfolioCategories="$portfolioCategories"></x-home.portfolio>

  <x-home.works />

  <x-home.testimonials :testimonials="$testimonials" />

  <x-home.faq></x-home.faq>
@endsection
