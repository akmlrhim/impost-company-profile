<section id="clients" class="py-12 sm:py-16 border-y border-white/6 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">

    @if (isset($clients) && count($clients))

      <p class="text-center text-xs font-bold text-impost-primary uppercase tracking-[0.2em] mb-8 sm:mb-10">
        Dipercaya oleh klien-klien terbaik kami
      </p>

      <div class="relative overflow-hidden">
        {{-- Fade edges --}}
        <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-20 z-10 bg-gradient-to-r from-impost-fifth to-transparent"></div>
        <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-20 z-10 bg-gradient-to-l from-impost-fifth to-transparent"></div>

        {{-- Skeleton --}}
        <div id="clients-skeleton" class="flex gap-6 px-4 justify-center animate-pulse">
          @for ($i = 0; $i < 7; $i++)
            <div class="h-14 w-14 sm:h-16 sm:w-16 rounded-full bg-white/5 flex-shrink-0"></div>
          @endfor
        </div>

        <div id="clients-marquee" class="opacity-0 transition-opacity duration-500">
          <div class="flex w-max animate-marquee">
            @foreach ([1, 2] as $_)
              <div class="flex items-center gap-10 sm:gap-14 lg:gap-16 px-5 shrink-0">
                @foreach ($clients as $client)
                  <div class="h-14 w-14 sm:h-16 sm:w-16 lg:h-18 lg:w-18 rounded-full overflow-hidden flex-shrink-0 ring-1 ring-white/10 opacity-35 hover:opacity-80 transition-all duration-300 grayscale hover:grayscale-0">
                    <img src="{{ asset('storage/'.$client->client_logo) }}" alt="{{ $client->filename }}"
                      class="w-full h-full object-cover"
                      loading="lazy" decoding="async">
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <script>
        (function() {
          const skeleton = document.getElementById('clients-skeleton');
          const marquee  = document.getElementById('clients-marquee');
          const imgs     = marquee ? marquee.querySelectorAll('img') : [];
          let loaded = 0;
          function reveal() { if(skeleton) skeleton.style.display='none'; if(marquee) marquee.style.opacity='1'; }
          if (!imgs.length) { reveal(); return; }
          imgs.forEach(img => {
            if (img.complete) { if(++loaded >= imgs.length) reveal(); }
            else {
              img.addEventListener('load',  ()=>{ if(++loaded>=imgs.length) reveal(); }, { once:true });
              img.addEventListener('error', ()=>{ if(++loaded>=imgs.length) reveal(); }, { once:true });
            }
          });
          setTimeout(reveal, 1200);
        })();
      </script>

    @else
      <div class="flex items-center justify-center py-10 border border-white/6 rounded-2xl bg-white/2">
        <x-empty-card item="Klien" />
      </div>
    @endif

  </div>
</section>
