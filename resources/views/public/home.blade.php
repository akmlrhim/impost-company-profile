@extends('layouts.public')
@section('content')
  <x-home.hero />

  <x-home.vsl />

  <x-home.clients :clients="$clients" />

  <x-home.about :portfolios="$portfolios" />

  <x-home.services :servicesForDesktop="$servicesForDesktop" :servicesForMobile="$servicesForMobile" />

  <x-home.works />

  <x-home.testimonials :testimonials="$testimonials" />
@endsection
