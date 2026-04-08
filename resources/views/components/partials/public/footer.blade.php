<footer class="bg-impost-fifth text-gray-300 relative overflow-hidden font-sans border-t border-white/10">

  <div
    class="max-w-7xl mx-auto px-5 sm:px-6 pt-10 sm:pt-14 md:pt-16 pb-8 sm:pb-10 md:pb-12 text-center border-b border-white/[0.07]">

    <a href="{{ route('home') }}" class="inline-flex items-center justify-center mb-5 sm:mb-7">
      <img src="{{ asset('img/logo_original.webp') }}" alt="Impost Media Logo"
        class="h-10 sm:h-12 md:h-14 w-auto object-contain" loading="lazy" />
    </a>

    <div
      class="flex flex-col items-center justify-center gap-2 sm:gap-4 text-xs sm:text-sm text-white/50 text-center sm:text-left">
      <div class="flex flex-col items-center justify-center gap-1 w-full">
        <span class="font-semibold text-white/70 whitespace-nowrap">Address:</span>
        <span class="text-center">Jl. Kawamara No.3, Landasan Ulin Tengah, Banjarbaru, Kalimantan Selatan
          70724</span>
      </div>
    </div>

  </div>

  <div class="max-w-7xl mx-auto px-5 sm:px-6 py-8 sm:py-10 md:py-12 border-b border-white/[0.07]">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 sm:gap-10">

      <div>
        <h4 class="text-sm font-bold text-white tracking-widest uppercase mb-4">Our Works</h4>
        <ul class="space-y-3">
          @php
            $works = [
                ['label' => 'Portfolio', 'href' => route('portfolio')],
                ['label' => 'Study Case', 'href' => route('study-case')],
            ];
          @endphp
          @foreach ($works as $item)
            <li>
              <a href="{{ $item['href'] }}"
                class="text-sm sm:text-base text-white/50 hover:text-impost-primary transition-colors duration-200">
                {{ $item['label'] }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div>
        <h4 class="text-sm font-bold text-white tracking-widest uppercase mb-4">Informasi</h4>
        <ul class="space-y-3">
          @php
            $infoLinks = [
                ['label' => 'Articles / Insights', 'route' => 'article.all'],
                ['label' => 'Careers', 'route' => 'careers'],
                ['label' => 'Media Resources', 'route' => 'docs'],
                ['label' => 'Legal & Privacy', 'route' => 'legal'],
            ];
          @endphp
          @foreach ($infoLinks as $link)
            <li>
              <a href="{{ route($link['route']) }}"
                class="text-sm sm:text-base text-white/50 hover:text-impost-primary transition-colors duration-200">
                {{ $link['label'] }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div>
        <h4 class="text-sm font-bold text-white tracking-widest uppercase mb-4">Perusahaan</h4>
        <ul class="space-y-3">
          @php
            $company = [
                ['label' => 'Tentang Kami', 'route' => 'about'],
                ['label' => 'Contact', 'route' => 'contact'],
                ['label' => 'Blog', 'route' => 'article.all'],
            ];
          @endphp
          @foreach ($company as $item)
            <li>
              <a href="{{ route($item['route']) }}"
                class="text-sm sm:text-base text-white/50 hover:text-impost-primary transition-colors duration-200">
                {{ $item['label'] }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div>
        <h4 class="text-sm font-bold text-white tracking-widest uppercase mb-4">Kontak Kami</h4>
        <div class="space-y-3">

          <a href="https://wa.me/6283147802761" target="_blank" rel="noopener noreferrer"
            class="flex items-center gap-2.5 group">
            <div
              class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-impost-primary group-hover:border-impost-primary transition-all duration-300">
              <svg class="w-3.5 h-3.5 text-white/50 group-hover:text-black" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
              </svg>
            </div>
            <span class="text-sm sm:text-base text-white/50 group-hover:text-impost-primary transition-colors">+62
              831-4780-2761</span>
          </a>

          <a href="https://instagram.com/impostmedia" target="_blank" rel="noopener noreferrer"
            class="flex items-center gap-2.5 group">
            <div
              class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-impost-primary group-hover:border-impost-primary transition-all duration-300">
              <svg class="w-3.5 h-3.5 text-white/50 group-hover:text-black" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.069-4.85.069-3.204 0-3.584-.012-4.849-.069-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
              </svg>
            </div>
            <span
              class="text-sm sm:text-base text-white/50 group-hover:text-impost-primary transition-colors">@impostmedia</span>
          </a>

          <a href="https://linkedin.com/company/cv-impost-media-indonesia" target="_blank" rel="noopener noreferrer"
            class="flex items-center gap-2.5 group">
            <div
              class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-impost-primary group-hover:border-impost-primary transition-all duration-300">
              <svg class="w-3.5 h-3.5 text-white/50 group-hover:text-black" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
              </svg>
            </div>
            <span class="text-sm sm:text-base text-white/50 group-hover:text-impost-primary transition-colors">CV.
              Impost Media
              Indonesia</span>
          </a>

          <a href="mailto:adm.impostmedia@gmail.com" class="flex items-center gap-2.5 group">
            <div
              class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-impost-primary group-hover:border-impost-primary transition-all duration-300">
              <svg class="w-3.5 h-3.5 text-white/50 group-hover:text-black" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
              </svg>
            </div>
            <span
              class="text-sm sm:text-base text-white/50 group-hover:text-impost-primary transition-colors">adm.impostmedia@gmail.com</span>
          </a>

        </div>
      </div>

    </div>
  </div>

  <div class="max-w-7xl mx-auto px-5 sm:px-6 py-4 sm:py-5 flex flex-col sm:flex-row items-center justify-between gap-2">
    <p class="text-xs sm:text-sm text-white/30 text-center sm:text-left">
      © {{ date('Y') }} <span class="text-white/50 font-semibold">CV. Impost Media Indonesia</span>. All rights
      reserved.
    </p>
    <p class="text-xs sm:text-sm text-white/20 text-center sm:text-right">
      Senin – Sabtu &nbsp;·&nbsp; 09:00 – 17:00 WITA
    </p>
  </div>

</footer>

@push('scripts')
  <script>
    (function() {
      window.loadMap = function(el) {
        el.innerHTML =
          '<div class="w-full h-full flex items-center justify-center bg-gray-900"><svg class="animate-spin h-7 w-7 text-impost-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/></svg></div>';
        setTimeout(() => {
          el.innerHTML =
            '<iframe src="https://maps.google.com/maps?q=Impost+Media&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full rounded-xl"></iframe>';
        }, 300);
        el.removeAttribute('onclick');
        el.classList.remove('cursor-pointer', 'group');
      };
    })();
  </script>
@endpush
