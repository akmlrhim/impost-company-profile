@extends('layouts.public')
@section('content')
  <x-home.hero />

  <x-home.about />

  <x-home.service :services="$services" />
@endsection
