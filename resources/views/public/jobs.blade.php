@extends('layouts.public')

@section('title', 'Karir | Impost Media')
@section('meta_description',
  'Bergabunglah bersama tim Impost Media. Lihat lowongan karir terbaru dan jadilah bagian
  dari agensi digital marketing terkemuka di Kalimantan Selatan.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased antialiased bg-[#0a0a0a]">
    <div class="mx-auto max-w-7xl px-3 sm:px-4 lg:px-8">

      {{-- Header --}}
      <div class="mb-8 sm:mb-10 md:mb-14 text-center">
        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-5xl font-bold mb-3 sm:mb-4 text-impost-primary leading-tight">
          Karir
        </h1>
        <p class="text-gray-300 text-xs sm:text-sm md:text-base max-w-4xl mx-auto font-light leading-relaxed px-2">
          Kesempatan karier terbuka untuk anda yang siap berkembang dan berkontribusi bersama IMPOST MEDIA.
        </p>
      </div>

      {{-- Image Grid --}}
      <section class="w-full">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6 mb-10 sm:mb-12">

          @php
            $jobImages = [
                'img/loker/2.webp',
                'img/loker/3.webp',
                'img/loker/4.webp',
                'img/loker/5.webp',
                'img/loker/6.webp',
                'img/loker/7.webp',
                'img/loker/8.webp',
                'img/loker/9.webp',
                'img/loker/10.webp',
                'img/loker/11.webp',
                'img/loker/12.webp',
                'img/loker/13.webp',
                'img/loker/14.webp',
                'img/loker/15.webp',
            ];
          @endphp

          @forelse($jobImages as $index => $image)
            <div
              class="group relative rounded-xl sm:rounded-2xl overflow-hidden bg-[#121212] border border-white/5 hover:border-impost-primary/30 transition-all duration-300 hover:-translate-y-1 cursor-pointer"
              onclick="openImageModal('{{ asset($image) }}')">

              {{-- Image Container --}}
              <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden">
                <img src="{{ asset($image) }}" alt="Lowongan {{ $index + 1 }}"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy">

              </div>

            </div>
          @empty
            <div class="col-span-full py-12 text-center">
              <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-4">
                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <p class="text-gray-400 text-sm">Belum ada lowongan tersedia</p>
            </div>
          @endforelse

        </div>
      </section>

    </div>
  </main>

  {{-- Image Modal --}}
  <div id="imageModal" class="fixed inset-0 z-[9999] hidden items-center justify-center p-4 bg-black/95 backdrop-blur-sm"
    onclick="closeImageModal()">
    <button
      class="absolute top-20 right-4 sm:top-24 sm:right-6 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition-colors z-[10000]"
      onclick="closeImageModal()">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    <img id="modalImage" src="" alt="Detail Lowongan"
      class="max-w-full max-h-[80vh] sm:max-h-[85vh] rounded-lg shadow-2xl object-contain mt-16 sm:mt-20"
      onclick="event.stopPropagation()">
  </div>

  @push('scripts')
    <script>
      function openImageModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.src = src;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
      }

      function closeImageModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
      }

      // Close on escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeImageModal();
      });
    </script>
  @endpush
@endsection
