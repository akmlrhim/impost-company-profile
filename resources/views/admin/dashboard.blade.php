@extends('layouts.admin')
@section('content')
  <div>
    <div class="bg-white rounded-lg border border-gray-200 p-8 mb-6">
      <div class="flex items-start justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-gray-900 mb-2">Selamat Datang Kembali, Admin</h1>
          <p class="text-sm text-gray-600">Semoga hari anda produktif dan menyenangkan</p>
        </div>
      </div>
    </div>

    {{-- aksi cepat  --}}
    <div class="bg-white rounded-lg border border-gray-200 p-6">
      <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Action</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3">

        <a href="{{ route('services.create') }}" wire:navigate
          class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-monitor-cloud-icon lucide-monitor-cloud text-gray-600 mb-2 w-6 h-6">
            <path d="M11 13a3 3 0 1 1 2.83-4H14a2 2 0 0 1 0 4z" />
            <path d="M12 17v4" />
            <path d="M8 21h8" />
            <rect x="2" y="3" width="20" height="14" rx="2" />
          </svg>
          <span class="text-sm font-medium text-gray-700">Tambah Layanan</span>
        </a>

        <button
          class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
          <svg class="w-6 h-6 text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
            </path>
          </svg>
          <span class="text-sm font-medium text-gray-700">Lihat Laporan</span>
        </button>

        <button
          class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
          <svg class="w-6 h-6 text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
            </path>
          </svg>
          <span class="text-sm font-medium text-gray-700">Kelola Pengguna</span>
        </button>

        <button
          class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
          <svg class="w-6 h-6 text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
          </svg>
          <span class="text-sm font-medium text-gray-700">Pengaturan</span>
        </button>

      </div>
    </div>
  </div>
@endsection
