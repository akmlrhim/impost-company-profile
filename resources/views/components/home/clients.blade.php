<section id="clients" class="border-y border-white/[0.07] overflow-hidden">

  @if (isset($clients) && count($clients))

    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col sm:flex-row sm:items-stretch">

        {{-- Left: label --}}
        <div
          class="flex-shrink-0 px-4 sm:px-6 lg:px-8 py-5 sm:py-0 sm:flex sm:items-center
          sm:border-r border-white/[0.07] sm:w-56 lg:w-64 xl:w-72">
          <p class="text-sm font-bold text-white leading-snug">
            Dipercaya oleh <span class="text-impost-primary">200+</span> bisnis<br class="hidden sm:block">
            di Kalimantan Selatan
          </p>
        </div>

        {{-- Right: marquee logos --}}
        <div class="flex-1 relative overflow-hidden py-5">

          {{-- Fade left --}}
          <div
            class="pointer-events-none absolute left-0 top-0 bottom-0 w-12 z-10
            bg-gradient-to-r from-impost-fifth to-transparent">
          </div>
          {{-- Fade right --}}
          <div
            class="pointer-events-none absolute right-0 top-0 bottom-0 w-12 z-10
            bg-gradient-to-l from-impost-fifth to-transparent">
          </div>

          {{-- Skeleton --}}
          <div id="clients-skeleton" class="flex items-center gap-10 px-4 animate-pulse">
            @for ($i = 0; $i < 6; $i++)
              <div class="h-7 w-20 rounded bg-white/[0.06] flex-shrink-0"></div>
            @endfor
          </div>

          {{-- Marquee --}}
          <div id="clients-marquee" class="opacity-0 transition-opacity duration-500">
            <div class="flex w-max animate-marquee">
              @foreach ([1, 2] as $_)
                <div class="flex items-center gap-10 sm:gap-14 px-8 shrink-0">
                  @foreach ($clients as $client)
                    <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename }}"
                      class="h-9 sm:h-11 w-auto max-w-[120px] object-contain rounded-full
                        opacity-80 hover:opacity-100
                        transition-opacity duration-300 flex-shrink-0"
                      loading="lazy" decoding="async">
                  @endforeach
                </div>
              @endforeach
            </div>
          </div>

        </div>

      </div>
    </div>

    <script>
      (function() {
        const skeleton = document.getElementById('clients-skeleton');
        const marquee = document.getElementById('clients-marquee');
        const imgs = marquee ? marquee.querySelectorAll('img') : [];
        let loaded = 0;

        function reveal() {
          if (skeleton) skeleton.style.display = 'none';
          if (marquee) marquee.style.opacity = '1';
        }
        if (!imgs.length) {
          reveal();
          return;
        }
        imgs.forEach(img => {
          if (img.complete) {
            if (++loaded >= imgs.length) reveal();
          } else {
            img.addEventListener('load', () => {
              if (++loaded >= imgs.length) reveal();
            }, {
              once: true
            });
            img.addEventListener('error', () => {
              if (++loaded >= imgs.length) reveal();
            }, {
              once: true
            });
          }
        });
        setTimeout(reveal, 1200);
      })();
    </script>
  @else
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
      <x-empty-card item="Klien" />
    </div>
  @endif

</section>
