@extends('layouts.admin')

@section('content')
  <x-flash />

  <div class="space-y-4">

    <div class="bg-white p-4 rounded-lg border border-gray-200">
      <h2 class="text-lg font-semibold">
        <span class="text-gray-600">{{ $article->title }}</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse ($comments as $comment)
        <div class="bg-white border border-gray-200 rounded-lg p-6">

          <div class="flex items-start justify-between mb-4">
            <div class="flex items-center space-x-3">

              <div class="w-10 h-10 bg-gray-900 text-white rounded-full flex items-center justify-center font-semibold">
                {{ collect(explode(' ', $comment->fullname))->map(fn($word) => strtoupper(substr($word, 0, 1)))->join('') }}
              </div>

              <div>
                <h3 class="text-sm font-semibold text-gray-900">
                  {{ $comment->fullname }}
                </h3>
                <p class="text-xs text-gray-500">{{ $comment->email }}</p>
              </div>
            </div>

            @php
              $statusClass = match ($comment->status) {
                  'approved' => 'bg-green-100 text-green-800',
                  'decline' => 'bg-red-100 text-red-800',
                  'pending' => 'bg-yellow-100 text-yellow-800',
              };
            @endphp

            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusClass }}">
              {{ ucfirst($comment->status) }}
            </span>

          </div>

          <p class="text-sm text-gray-700 leading-relaxed">
            {{ $comment->comment }}
          </p>

          <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-xs text-gray-400">
              {{ $comment->created_at->diffForHumans() }}
            </span>

            <div class="flex gap-2">
              @if ($comment->status !== 'approved')
                <form action="{{ route('articles.comments.status', [$article, $comment]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="approved">
                  <button type="submit"
                    class="px-3 py-1 bg-success-strong text-white rounded-md text-xs cursor-pointer font-medium">Setujui</button>
                </form>
              @endif

              @if ($comment->status !== 'decline')
                <form action="{{ route('articles.comments.status', [$article, $comment]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="decline">
                  <button type="submit"
                    class="px-3 py-1 bg-danger-strong text-white rounded-md text-xs cursor-pointer font-medium">Tolak</button>
                </form>
              @endif

            </div>
          </div>

        </div>
      @empty
        <div class="col-span-full bg-white p-12 text-center rounded-lg border border-gray-200">
          <p class="text-gray-500">Tidak ada komentar ditemukan pada artikel ini.</p>
          <a href="{{ route('articles.index') }}" class="text-blue-600 hover:underline text-sm">
            Kembali
          </a>
        </div>
      @endforelse
    </div>

    <div class="mt-6">
      {{ $comments->links() }}
    </div>

  </div>
@endsection
