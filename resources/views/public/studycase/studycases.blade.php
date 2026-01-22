@extends('layouts.public')

@section('content')
  @php
    $categories = $studyCase->pluck('category')->unique()->values();
  @endphp

  <main class="pt-24 sm:pt-42 py-8 sm:py-16 antialiased bg-[#0a0a0a] min-h-screen">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="mb-8 md:mb-12 text-center">
        <h1
          class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent uppercase tracking-tight">
          {{ $title }}
        </h1>
      </div>

      <div class="mb-10 w-full max-w-4xl mx-auto">
        {{-- Mobile: Select Option --}}
        <div class="block md:hidden">
          <div class="relative">
            <select id="mobile-filter"
              class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-xl py-3 px-5 pr-12 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-sm font-medium shadow-lg">
              <option value="all">Semua Kategori</option>
              @foreach ($categories as $cat)
                <option value="{{ $cat }}">{{ $cat }}</option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Desktop: Pills --}}
        <div class="hidden md:flex flex-wrap justify-center gap-3">
          <button type="button" data-filter="all"
            class="filter-pill active group relative rounded-full px-6 py-2 text-sm font-bold transition-all duration-300 border border-impost-primary bg-impost-primary text-black hover:-translate-y-0.5 hover:shadow-[0_0_15px_rgba(var(--impost-primary),0.4)]">
            <span class="uppercase tracking-wide">Semua</span>
          </button>

          @foreach ($categories as $cat)
            <button type="button" data-filter="{{ $cat }}"
              class="filter-pill group relative rounded-full px-6 py-2 text-sm font-bold transition-all duration-300 border border-white/20 text-white hover:border-impost-primary hover:text-impost-primary hover:-translate-y-0.5 bg-white/5 backdrop-blur-sm">
              <span class="uppercase tracking-wide">{{ $cat }}</span>
            </button>
          @endforeach
        </div>
      </div>

      <section class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 py-6 mb-8" id="study-case-grid">

          @forelse ($studyCase as $s)
            <a href="{{ route('detail-study-case', $s->slug) }}"
              class="study-case-item group block h-full transition-all duration-500" data-category="{{ $s->category }}">

              <div
                class="relative h-full overflow-hidden rounded-2xl border border-white/10 bg-[#121212] transition-all duration-500 hover:border-impost-primary/50 hover:shadow-[0_0_30px_rgba(var(--impost-primary),0.15)] hover:-translate-y-2">

                <div class="relative aspect-[4/3] overflow-hidden">
                  <div class="absolute top-4 left-4 z-20">
                    <span
                      class="px-3 py-1 text-[10px] font-bold uppercase tracking-wider bg-black/60 backdrop-blur-md border border-white/10 text-white rounded-full">
                      {{ $s->category }}
                    </span>
                  </div>

                  @if ($s->cover_path)
                    <img src="{{ asset('storage/' . $s->cover_path) }}" alt="{{ $s->name }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                  @else
                    <div
                      class="w-full h-full bg-[#1a1a1a] flex items-center justify-center group-hover:bg-[#222] transition-colors">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="w-16 h-16 text-white/10 group-hover:text-impost-primary/50 transition-colors">
                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        <rect width="20" height="14" x="2" y="6" rx="2" />
                      </svg>
                    </div>
                  @endif

                  <div
                    class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300">
                  </div>

                  <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform scale-75 group-hover:scale-100">
                    <div
                      class="w-12 h-12 rounded-full bg-impost-primary/90 backdrop-blur-sm flex items-center justify-center text-black shadow-lg">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                      </svg>
                    </div>
                  </div>
                </div>

                <div class="absolute bottom-0 left-0 right-0 p-6 z-20">
                  <h3
                    class="text-white text-lg md:text-xl font-bold leading-tight mb-1 group-hover:text-impost-primary transition-colors duration-300 line-clamp-2">
                    {{ $s->name }}
                  </h3>
                  <div class="h-0.5 w-0 bg-impost-primary group-hover:w-16 transition-all duration-500 ease-out"></div>
                </div>

              </div>
            </a>
          @empty
            <div class="col-span-full py-12">
              <x-empty-card item="Study Case" />
            </div>
          @endforelse

          <div id="no-results" class="hidden col-span-full text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-4">
              <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <h3 class="text-lg font-medium text-white">Tidak ditemukan</h3>
            <p class="text-gray-400 text-sm mt-1">Tidak ada study case untuk kategori ini.</p>
          </div>

        </div>

        <div class="mt-8" id="pagination-wrapper">
          <x-custom-pagination :items="$studyCase" />
        </div>
      </section>
    </div>
  </main>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const studyCaseLinks = document.querySelectorAll('a[href*="study-case/"], .study-case-link');
      studyCaseLinks.forEach(link => {
        link.addEventListener('click', function() {
          sessionStorage.setItem('studyCaseSource', 'full');
        });
      });

      const filterPills = document.querySelectorAll('.filter-pill');
      const mobileSelect = document.getElementById('mobile-filter');
      const gridItems = document.querySelectorAll('.study-case-item');
      const noResultsMsg = document.getElementById('no-results');
      const paginationWrapper = document.getElementById('pagination-wrapper');

      function filterItems(category) {
        let visibleCount = 0;

        gridItems.forEach(item => {
          const itemCategory = item.getAttribute('data-category');

          if (category === 'all' || itemCategory === category) {
            item.style.display = 'block';
            item.classList.add('animate-in', 'fade-in', 'zoom-in-95', 'duration-300');
            visibleCount++;
          } else {
            item.style.display = 'none';
            item.classList.remove('animate-in', 'fade-in', 'zoom-in-95');
          }
        });

        if (visibleCount === 0) {
          noResultsMsg.classList.remove('hidden');
        } else {
          noResultsMsg.classList.add('hidden');
        }

        if (paginationWrapper) {
          paginationWrapper.style.display = (category === 'all') ? 'block' : 'none';
        }
      }

      function updateActiveState(category) {
        filterPills.forEach(pill => {
          const pillCategory = pill.getAttribute('data-filter');
          if (pillCategory === category) {
            pill.classList.remove('border-white/20', 'text-white', 'bg-white/5');
            pill.classList.add('border-impost-primary', 'bg-impost-primary', 'text-black',
              'shadow-[0_0_15px_rgba(var(--impost-primary),0.4)]');
          } else {
            pill.classList.add('border-white/20', 'text-white', 'bg-white/5');
            pill.classList.remove('border-impost-primary', 'bg-impost-primary', 'text-black',
              'shadow-[0_0_15px_rgba(var(--impost-primary),0.4)]');
          }
        });

        if (mobileSelect) {
          mobileSelect.value = category;
        }
      }

      filterPills.forEach(pill => {
        pill.addEventListener('click', function() {
          const category = this.getAttribute('data-filter');
          updateActiveState(category);
          filterItems(category);
        });
      });

      if (mobileSelect) {
        mobileSelect.addEventListener('change', function() {
          const category = this.value;
          updateActiveState(category);
          filterItems(category);
        });
      }

    });
  </script>
@endpush
