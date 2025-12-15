<section id="services">
  <div class="py-6 px-4 mx-auto max-w-7xl sm:py-12 lg:px-6">
    <div class="max-w-3xl mb-8 lg:mb-16">
      <h2
        class="mb-4 text-4xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight pb-2">
        Layanan Kami
      </h2>
      <p class="text-white text-sm">
        Kami menyediakan layanan digital end-to-end yang berfokus pada peningkatan omset, visibilitas merek, dan
        efisiensi pemasaran. Setiap layanan dirancang dengan pendekatan strategis yang sesuai dengan kebutuhan bisnis
        Anda.
      </p>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($services as $s)
        <div
          class="border-2 border-impost-fourth bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-md overflow-hidden">
          <div class="relative h-48 overflow-hidden">
            @if ($s->cover)
              <img src="{{ asset('storage/' . $s->cover) }}" alt="{{ $s->services_name }}"
                class="w-full h-full object-cover" />
            @else
              <div class="w-full h-full flex items-center justify-center">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
            @endif

          </div>
          <div class="p-6">
            <h3 class="mb-3 text-md font-bold text-white">{{ $s->service_name }}</h3>
            <p class="text-white font-medium text-sm">
              {{ $s->description }}
            </p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
