<section id="services" class="py-16 sm:py-20 lg:py-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Section header --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 sm:mb-14 text-center md:text-left">
      <div>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight text-white">
          Layanan <span class="text-impost-primary">Kami</span>
        </h2>
      </div>
      <p class="text-xs md:text-base font-normal leading-relaxed text-white max-w-sm md:text-right mx-auto md:mx-0">
        End-to-end digital solutions berfokus pada peningkatan omset, visibilitas, dan efisiensi.
      </p>
    </div>

    @if ($services->isEmpty())
      <div class="flex items-center justify-center py-20 border border-white/6 rounded-[2rem] bg-white/2">
        <x-empty-card item="Layanan" />
      </div>
    @else
      @php $serviceList = $services->values(); @endphp

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($serviceList as $i => $service)
          <div class="relative rounded-[1.75rem] overflow-hidden border border-white/[0.08] aspect-[4/3]">

            {{-- Background image from database --}}
            @if ($service->cover_path)
              <img src="{{ asset('storage/' . $service->cover_path) }}" alt="{{ $service->service_name }}"
                class="absolute inset-0 w-full h-full object-cover" loading="lazy">
            @else
              <div class="absolute inset-0 flex items-center justify-center bg-white/[0.03]">
                <svg class="w-10 h-10 text-white/10" fill="none" stroke="currentColor" stroke-width="1"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
              </div>
            @endif

            {{-- Gradient so the text stays readable over the photo --}}
            <div class="absolute inset-0 bg-gradient-to-b from-impost-fifth via-impost-fifth/55 to-transparent">
            </div>

            {{-- Title & description --}}
            <div class="relative z-10 p-5 sm:p-6">
              <h3 class="font-bold text-lg sm:text-xl leading-snug text-white mb-2">
                {{ $service->service_name }}
              </h3>
              <p class="text-xs font-medium leading-relaxed text-white">
                {{ $service->description }}
              </p>
            </div>


          </div>
        @endforeach
      </div>

    @endif
  </div>
</section>
