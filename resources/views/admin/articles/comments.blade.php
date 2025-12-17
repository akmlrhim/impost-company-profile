@extends('layouts.admin')
@section('content')
  <div class="space-y-4">

    <div class="bg-white border border-gray-200 rounded-lg p-6">
      <div class="flex items-start justify-between mb-4">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gray-900 text-white rounded-full flex items-center justify-center font-semibold">
            AR
          </div>
          <div>
            <h3 class="text-sm font-semibold text-gray-900">Ahmad Rizki</h3>
            <p class="text-xs text-gray-500">ahmad.rizki@email.com</p>
          </div>
        </div>
        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
          Disetujui
        </span>
      </div>
      <p class="text-sm text-gray-700 leading-relaxed">
        Artikelnya sangat membantu! Penjelasannya detail dan mudah dipahami. Saya jadi lebih paham tentang topik ini.
        Terima kasih sudah berbagi informasi yang bermanfaat.
      </p>
      <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
        <span class="text-xs text-gray-400">2 jam yang lalu</span>
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

  </div>
@endsection
