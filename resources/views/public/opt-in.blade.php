@extends('layouts.public')

@section('title', 'OPT-IN | Impost Media')
@section('meta_description',
  'Tonton video dan isi form opt-in Impost Media untuk mendapatkan informasi digital marketing eksklusif.')

@push('head')
  <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
  <div class="pt-20 md:pt-16">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
      <div class="max-w-3xl mx-auto text-center mb-8 md:mb-14">
        <span class="text-base sm:text-lg md:text-xl font-semibold tracking-widest text-impost-primary uppercase">
          OPT-IN
        </span>
        <div class="mt-2 md:mt-4 mx-auto w-12 md:w-16 h-1 bg-impost-primary rounded-full"></div>

        <div class="relative w-full overflow-hidden rounded-lg aspect-video mt-12">
          <div class="sp-embed-player" data-id="cOVn6hnrjSc" data-aspect-ratio="1.777778" data-padding-top="56.250000%"
            style="position:relative;width:100%;padding-top:56.250000%;height:0;">
            <script src="https://go.screenpal.com/player/appearance/cOVn6hnrjSc"></script><iframe style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;"
              scrolling="no" src="https://go.screenpal.com/player/cOVn6hnrjSc?ff=1&title=0"
              allowfullscreen="true"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
