@extends('layouts.public')

@section('title', 'Impost Media | Agensi Digital Marketing di Kalimantan Selatan')
@section('meta_description', 'Impost Media adalah All in One Integrated Digital Marketing Agency di Banjarbaru,
  Kalimantan Selatan. Performance-based advertising dengan jaminan uang kembali.')

@section('content')
  <x-home.hero />

  <x-home.clients :clients="$clients" />

  <x-home.vsl />

  <x-home.about :portfolios="$portfolios" :portfolioCategories="$portfolioCategories" />

  <x-home.services :services="$services" />

  <x-home.portfolio :portfolios="$portfolios" :portfolioCategories="$portfolioCategories"></x-home.portfolio>

  <x-home.works />

  <x-home.testimonials :testimonials="$testimonials" />

  <x-home.faq></x-home.faq>
@endsection
