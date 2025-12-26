@extends('layouts.public')
@section('content')
  <x-home.hero />

  <x-home.vsl />

  <x-home.clients :clients="$clients" />

  <x-home.about />

  <x-home.services :servicesForDesktop="$servicesForDesktop" :servicesForMobile="$servicesForMobile" />

  <x-home.articles :articles="$articles" />
@endsection
