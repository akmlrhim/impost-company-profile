<section id="clients" class="py-10 sm:py-12 md:py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">

    @if (isset($clients) && count($clients))
      <p class="mb-6 sm:mb-10 md:mb-12 text-impost-primary font-extrabold tracking-wide text-sm lg:text-base uppercase">
        Klien yang telah bekerja sama dengan kami
      </p>
      
      <div class="relative overflow-hidden">

        {{-- Skeleton --}}
        <div id="clients-skeleton" class="flex gap-4 sm:gap-6 px-4 justify-center animate-pulse">
          @for ($i = 0; $i < 8; $i++)
            <div
              class="h-8 sm:h-10 md:h-12 w-16 sm:w-20 md:w-24 rounded-md bg-gradient-to-r from-gray-700 via-gray-600 to-gray-700">
            </div>
          @endfor
        </div>

        {{-- Marquee --}}
        <div id="clients-marquee" class="marquee-wrapper opacity-0 transition-opacity duration-500">
          <div class="flex w-max animate-marquee">

            @foreach ([1, 2] as $pass)
              <div class="flex items-center gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12 px-3 sm:px-4 shrink-0">
                @foreach ($clients as $client)
                  <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename }}"
                    class="h-8 sm:h-10 lg:h-12 xl:h-16 w-auto object-contain opacity-70 hover:opacity-100 transition-opacity duration-300"
                    decoding="async" loading="lazy">
                @endforeach
              </div>
            @endforeach

          </div>
        </div>

      </div>

      <script>
        (function() {
          const skeleton = document.getElementById('clients-skeleton');
          const marquee = document.getElementById('clients-marquee');
          const imgs = marquee.querySelectorAll('img');
          let loaded = 0;

          function reveal() {
            skeleton.style.display = 'none';
            marquee.style.opacity = '1';
          }

          if (!imgs.length) {
            reveal();
            return;
          }

          function onLoad() {
            if (++loaded >= imgs.length) reveal();
          }

          imgs.forEach(img => {
            if (img.complete) {
              onLoad();
            } else {
              img.addEventListener('load', onLoad, {
                once: true
              });
              img.addEventListener('error', onLoad, {
                once: true
              });
            }
          });

          setTimeout(reveal, 1200);
        })();
      </script>
    @else
      <div class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
        <x-empty-card item="Klien" />
      </div>
    @endif

  </div>
</section>
