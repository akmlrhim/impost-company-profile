<section id="services">
  <div class="py-6 px-4 mx-auto max-w-7xl sm:py-12 lg:px-6">
    <div class="max-w-3xl mb-8 lg:mb-12">
      <h2
        class="mb-4 text-4xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight pb-2">
        Layanan Kami
      </h2>
      <p class="text-white text-sm">
        Kami menyediakan layanan digital end-to-end yang berfokus pada peningkatan omset, visibilitas merek, dan
        efisiensi pemasaran. Setiap layanan dirancang dengan pendekatan strategis yang sesuai dengan kebutuhan bisnis
        anda.
      </p>
    </div>

    <div x-data="{
        nextUrl: '{{ $services->nextPageUrl() }}',
        prevUrl: '{{ $services->previousPageUrl() }}',
        isLoading: false,
    
        async loadPage(url) {
            if (this.isLoading || !url) return;
            this.isLoading = true;
    
            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
    
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
    
                // Ambil grid baru
                const newGrid = doc.querySelector('#services-grid .grid');
                const oldGrid = document.querySelector('#services-grid .grid');
    
                if (newGrid && oldGrid) {
                    oldGrid.innerHTML = newGrid.innerHTML;
                }
    
                // Update URLs - ambil langsung dari container yang baru
                const newContainer = doc.querySelector('[data-next-url]');
                if (newContainer) {
                    const nextAttr = newContainer.getAttribute('data-next-url');
                    const prevAttr = newContainer.getAttribute('data-prev-url');
    
                    this.nextUrl = (nextAttr && nextAttr !== '' && nextAttr !== 'null') ? nextAttr : null;
                    this.prevUrl = (prevAttr && prevAttr !== '' && prevAttr !== 'null') ? prevAttr : null;
    
                    console.log('Updated URLs - Next:', this.nextUrl, 'Prev:', this.prevUrl);
                }
            } catch (error) {
                console.error('Error loading page:', error);
            } finally {
                this.isLoading = false;
            }
        },
    
        nextPage() {
            if (this.nextUrl) {
                this.loadPage(this.nextUrl);
            }
        },
    
        prevPage() {
            if (this.prevUrl) {
                this.loadPage(this.prevUrl);
            }
        }
    }" data-next-url="{{ $services->nextPageUrl() }}"
      data-prev-url="{{ $services->previousPageUrl() }}">

      <!-- Navigation Buttons -->
      <div class="flex justify-end gap-2 mb-4">
        <button @click="prevPage()" :disabled="!prevUrl || isLoading"
          :class="{ 'opacity-50 cursor-not-allowed': !prevUrl || isLoading }"
          class="px-4 py-2 bg-impost-primary hover:bg-impost-secondary text-white rounded-md transition-colors duration-200 disabled:hover:bg-impost-primary">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <button @click="nextPage()" :disabled="!nextUrl || isLoading"
          :class="{ 'opacity-50 cursor-not-allowed': !nextUrl || isLoading }"
          class="px-4 py-2 bg-impost-primary hover:bg-impost-secondary text-white rounded-md transition-colors duration-200 disabled:hover:bg-impost-primary">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- Services Grid -->
      <div id="services-grid" class="relative">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-show="!isLoading" x-transition>
          @forelse ($services as $s)
            <div
              class="border-2 border-impost-fourth bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-md overflow-hidden">
              <div class="relative h-48 overflow-hidden">
                @if ($s->cover_path)
                  <img src="{{ asset('storage/' . $s->cover_path) }}" alt="{{ $s->service_name }}"
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
          @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-sm font-medium text-white">
              Belum ada layanan tersedia.
            </div>
          @endforelse
        </div>

        <div x-show="isLoading" x-transition
          class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded-md">
          <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-impost-primary"></div>
        </div>
      </div>

    </div>

  </div>
</section>
