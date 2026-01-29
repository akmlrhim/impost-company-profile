@extends('layouts.admin')

@section('content')
  <div class="space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
      <div>
        <p class="text-sm text-gray-500 mt-1">Selamat datang kembali, {{ Auth::user()->name }}!</p>
      </div>
      <div class="mt-4 md:mt-0">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
          {{ now()->format('l, d F Y') }}
        </span>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 bg-indigo-50 rounded-lg text-indigo-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
          </svg>
        </div>
        <div class="ml-4">
          <p class="text-sm font-medium text-gray-500">Total Artikel</p>
          <p class="text-2xl font-bold text-gray-900">12</p>
        </div>
      </div>

      <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 bg-blue-50 rounded-lg text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
        <div class="ml-4">
          <p class="text-sm font-medium text-gray-500">Layanan Aktif</p>
          <p class="text-2xl font-bold text-gray-900">8</p>
        </div>
      </div>

      <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 bg-purple-50 rounded-lg text-purple-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </div>
        <div class="ml-4">
          <p class="text-sm font-medium text-gray-500">Total Portfolio</p>
          <p class="text-2xl font-bold text-gray-900">15</p>
        </div>
      </div>

      <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center">
        <div class="p-3 bg-orange-50 rounded-lg text-orange-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </div>
        <div class="ml-4">
          <p class="text-sm font-medium text-gray-500">Total Klien</p>
          <p class="text-2xl font-bold text-gray-900">24</p>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden h-full">
        <div class="p-5 border-b border-gray-100 bg-gray-50/50">
          <div class="flex items-center space-x-2">
            <div class="w-1 h-6 bg-indigo-500 rounded-full"></div>
            <h2 class="text-lg font-bold text-gray-900">Konten Website</h2>
          </div>
          <p class="text-xs text-gray-500 mt-1 pl-3">Kelola apa yang tampil di halaman depan.</p>
        </div>

        <div class="p-6">
          <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('articles.create') }}"
              class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl hover:bg-indigo-50 hover:border-indigo-200 hover:shadow-sm transition group bg-white">
              <div
                class="p-3 bg-gray-100 rounded-full group-hover:bg-indigo-100 group-hover:text-indigo-600 transition mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 7v14" />
                  <path
                    d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
                </svg>
              </div>
              <span class="text-sm font-semibold text-gray-700 group-hover:text-indigo-700">Tulis Artikel</span>
            </a>

            <a href="{{ route('portfolio.create') }}"
              class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl hover:bg-indigo-50 hover:border-indigo-200 hover:shadow-sm transition group bg-white">
              <div
                class="p-3 bg-gray-100 rounded-full group-hover:bg-indigo-100 group-hover:text-indigo-600 transition mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M15 2h-4a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8" />
                  <path d="M16.706 2.706A2.4 2.4 0 0 0 15 2v5a1 1 0 0 0 1 1h5a2.4 2.4 0 0 0-.706-1.706z" />
                  <path d="M5 7a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h8a2 2 0 0 0 1.732-1" />
                </svg>
              </div>
              <span class="text-sm font-semibold text-gray-700 group-hover:text-indigo-700">Tambah Portfolio</span>
            </a>

            <a href="{{ route('services.create') }}"
              class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl hover:bg-indigo-50 hover:border-indigo-200 hover:shadow-sm transition group bg-white col-span-2">
              <div class="flex items-center space-x-3">
                <div
                  class="p-2 bg-gray-100 rounded-full group-hover:bg-indigo-100 group-hover:text-indigo-600 transition">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                      d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z" />
                  </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 group-hover:text-indigo-700">Tambah Layanan Baru</span>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden h-full">
        <div class="p-5 border-b border-gray-100 bg-gray-50/50">
          <div class="flex items-center space-x-2">
            <div class="w-1 h-6 bg-emerald-500 rounded-full"></div>
            <h2 class="text-lg font-bold text-gray-900">Data Perusahaan</h2>
          </div>
          <p class="text-xs text-gray-500 mt-1 pl-3">Kelola data internal, klien, dan pengguna sistem.</p>
        </div>

        <div class="p-6">
          <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('clients.create') }}"
              class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl hover:bg-emerald-50 hover:border-emerald-200 hover:shadow-sm transition group bg-white">
              <div
                class="p-3 bg-gray-100 rounded-full group-hover:bg-emerald-100 group-hover:text-emerald-600 transition mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path d="M12 10h.01" />
                  <path d="M12 14h.01" />
                  <path d="M12 6h.01" />
                  <path d="M16 10h.01" />
                  <path d="M16 14h.01" />
                  <path d="M16 6h.01" />
                  <path d="M8 10h.01" />
                  <path d="M8 14h.01" />
                  <path d="M8 6h.01" />
                  <path d="M9 22v-3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                  <rect x="4" y="2" width="16" height="20" rx="2" />
                </svg>
              </div>
              <span class="text-sm font-semibold text-gray-700 group-hover:text-emerald-700">Input Klien</span>
            </a>

            <a href="{{ route('teams.create') }}"
              class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl hover:bg-emerald-50 hover:border-emerald-200 hover:shadow-sm transition group bg-white">
              <div
                class="p-3 bg-gray-100 rounded-full group-hover:bg-emerald-100 group-hover:text-emerald-600 transition mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                  <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                  <circle cx="9" cy="7" r="4" />
                </svg>
              </div>
              <span class="text-sm font-semibold text-gray-700 group-hover:text-emerald-700">Tambah Tim</span>
            </a>

            <a href="{{ route('users.create') }}"
              class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 hover:shadow-sm transition group bg-white col-span-2">
              <div class="flex items-center space-x-3">
                <div class="p-2 bg-gray-100 rounded-full group-hover:bg-gray-200 group-hover:text-gray-800 transition">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                  </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 group-hover:text-gray-900">Buat User Baru</span>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection
