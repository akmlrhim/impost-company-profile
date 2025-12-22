@extends('layouts.admin')
@section('content')
  <div class="space-y-4">

    @forelse ($article as $a)
      <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start justify-between mb-4">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gray-900 text-white rounded-full flex items-center justify-center font-semibold">
              AR
            </div>
            <div>
              <h3 class="text-sm font-semibold text-gray-900">{{ $article->comments->fullname }}</h3>
              <p class="text-xs text-gray-500">{{ $article->comments->email }}</p>
            </div>
          </div>
          <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
            Disetujui
          </span>
        </div>
        <p class="text-sm text-gray-700 leading-relaxed">
          {{ $article->comments->comment }}
        </p>
        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
          <span class="text-xs text-gray-400">{{ $article->comments->created_at->diffForHumans() }}</span>
          <div class="flex gap-2">
            <button
              class="text-xs text-gray-600 hover:text-gray-900 px-3 py-1 border border-gray-200 rounded hover:bg-gray-50 transition-colors">
              Edit
            </button>
            <button
              class="text-xs text-gray-600 hover:text-gray-900 px-3 py-1 border border-gray-200 rounded hover:bg-gray-50 transition-colors">
              Hapus
            </button>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-12">
        <div class="flex flex-col items-center justify-center text-center">
          <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <p class="text-gray-500 text-sm font-medium">Tidak ada komentar ditemukan, pada artikel ini.</p>
          <a href="{{ route('articles.index') }}"
            class="text-blue-600 hover:text-blue-500 hover:underline font-medium text-sm">Kembali ?</a>
        </div>
      </div>
    @endforelse
  </div>
@endsection
