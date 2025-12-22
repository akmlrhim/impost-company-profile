<section class="mt-16" id="comment-section">
  <div class="mb-8">
    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white">
      Komentar <span
        class="text-sm sm:text-base lg:text-lg font-normal text-gray-500">({{ $article->comments->count() }})</span>
    </h2>
  </div>

  <x-flash />


  {{-- form komentar  --}}
  <div class="bg-gray-900 border border-gray-800 rounded-md p-4 sm:p-6 mb-8">
    <h3 class="text-base sm:text-lg font-semibold text-white mb-4">Tulis Komentar</h3>

    <form class="space-y-4" action="{{ route('article.comment') }}" method="POST">
      @csrf

      {{-- ambil id artikel  --}}
      <input type="hidden" name="article_id" value="{{ $article->id }}">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="fullname" class="block mb-2 text-xs sm:text-sm font-medium text-gray-300">
            Nama Lengkap <span class="text-red-400">*</span>
          </label>
          <input type="text" id="fullname" name="fullname"
            class="w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-white bg-gray-950 border border-gray-800 rounded-md focus:ring-1 focus:ring-primary-500 focus:border-primary-500 placeholder-gray-500"
            placeholder="Masukkan nama lengkap anda" value="{{ old('fullname') }}" />
          @error('fullname')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

        </div>

        <div>
          <label for="email" class="block mb-2 text-xs sm:text-sm font-medium text-gray-300">
            Email <span class="text-red-400">*</span>
          </label>
          <input type="email" id="email" name="email"
            class="w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-white bg-gray-950 border border-gray-800 rounded-md focus:ring-1 focus:ring-primary-500 focus:border-primary-500 placeholder-gray-500"
            placeholder="nama@gmail.com" value="{{ old('email') }}" />
          @error('email')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
      </div>

      <div>
        <label for="comment" class="block mb-2 text-xs sm:text-sm font-medium text-gray-300">
          Komentar <span class="text-red-400">*</span>
        </label>
        <textarea id="comment" name="comment" rows="5"
          class="w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-white bg-gray-950 border border-gray-800 rounded-md focus:ring-1 focus:ring-primary-500 focus:border-primary-500 placeholder-gray-500 resize-none"
          placeholder="Bagikan pendapat anda...">{{ old('comment') }}</textarea>
        @error('comment')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
        <p class="mt-2 text-xs text-gray-500">
          Komentar anda akan ditinjau sebelum dipublikasikan
        </p>
      </div>

      <div class="flex items-center justify-between pt-2">
        <button type="submit"
          class="py-2 sm:py-2.5 px-4 sm:px-6 text-xs sm:text-sm font-semibold text-white bg-primary-600 rounded-md hover:bg-primary-700 focus:ring-2 focus:ring-primary-500">
          Kirim Komentar
        </button>

        <button type="reset" class="text-xs sm:text-sm text-gray-500 hover:text-white">
          Reset Form
        </button>
      </div>
    </form>

  </div>

  <div x-data="{ showAll: false, limit: 3 }" class="space-y-4">
    <h3 class="text-base sm:text-lg font-semibold text-white">
      Semua Komentar
    </h3>

    @forelse ($article->comments as $index => $c)
      <article x-show="showAll || {{ $index }} < limit" x-transition
        class="bg-gray-900 border border-gray-800 rounded-md p-4 sm:p-5">
        <div class="flex items-start gap-4">
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-2">
              <h4 class="text-xs sm:text-sm font-semibold text-white">
                {{ $c->fullname }}
              </h4>
              <span class="text-xs text-gray-600">•</span>
              <time class="text-xs text-gray-500">
                {{ $c->created_at->diffForHumans() }}
              </time>
            </div>

            <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
              {{ $c->comment }}
            </p>
          </div>
        </div>
      </article>
    @empty
      <p class="text-xs sm:text-sm text-gray-500">
        Belum ada komentar
      </p>
    @endforelse

    @if ($article->comments->count() > 3)
      <div class="pt-2">
        <button @click="showAll = !showAll"
          class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 text-xs sm:text-sm font-semibold text-white bg-blue-600 hover:bg-blue-500 rounded-md transition">
          <span x-text="showAll ? 'Sembunyikan komentar' : 'Lihat komentar lainnya'"></span>
        </button>
      </div>
    @endif
  </div>
</section>
