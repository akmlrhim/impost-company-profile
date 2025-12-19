@extends('layouts.public')
@section('content')
  <x-home.hero :clients="$clients" />

  <x-home.about />

  <x-home.services :services="$services" />

  <x-home.articles :articles="$articles" />
@endsection
