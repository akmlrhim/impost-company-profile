@extends('layouts.public')
@section('content')
  <x-home.hero />

  <x-home.vsl />

  <x-home.clients :clients="$clients" />

  <x-home.about />

  <x-home.works />

  <x-home.services :servicesForDesktop="$servicesForDesktop" :servicesForMobile="$servicesForMobile" />

  <x-home.studycase :studyCaseForDesktop="$studyCaseForDesktop" :studyCaseForMobile="$studyCaseForMobile" />

  <x-home.testimonials :testimonials="$testimonials" />
@endsection
