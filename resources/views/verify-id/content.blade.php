@extends('verify-id.layout')
@section('content')
  <div class="bg-slate-50 font-sans text-slate-900 selection:bg-blue-100 selection:text-blue-900 py-10 sm:py-16">
    <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="text-center mb-6 sm:mb-8 animate-in fade-in slide-in-from-top-4 duration-700">
        <h1 class="text-2xl font-extrabold text-slate-900 sm:text-3xl tracking-tight">Profil Karyawan</h1>
        <p class="mt-1.5 sm:mt-2 max-w-xl mx-auto text-xs sm:text-sm text-slate-500">
          Detail informasi dan identitas resmi personel perusahaan.
        </p>
      </div>

      <section class="animate-in fade-in slide-in-from-bottom-8 duration-700">
        <div
          class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden relative">

          <div class="p-4 sm:p-8">
            <div class="flex flex-col md:flex-row gap-5 sm:gap-8 items-center md:items-start">

              <div class="flex flex-col items-center gap-4 shrink-0 w-full md:w-auto">
                <div class="relative">
                  <div
                    class="w-24 h-24 sm:w-40 sm:h-40 rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-100 border border-slate-200 shadow-inner ring-4 ring-slate-50">
                    <img alt="Foto {{ $employee->fullname }}" class="w-full h-full object-cover"
                      src="{{ asset('storage/' . $employee->photo) }}"
                      onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($employee->fullname) }}&background=0D8ABC&color=fff&size=256'" />
                  </div>
                  <div
                    class="absolute -bottom-2 -right-2 bg-emerald-500 p-1.5 sm:p-2 rounded-xl border-4 border-white shadow-lg text-white"
                    title="Verified Member">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </div>
                </div>

                <div
                  class="bg-slate-50 p-2 sm:p-2.5 rounded-xl sm:rounded-2xl border border-slate-100 w-full flex flex-col items-center mt-1">
                  <div
                    class="w-14 h-14 sm:w-20 sm:h-20 bg-white rounded-lg border border-dashed border-slate-300 flex items-center justify-center mb-1 shadow-sm p-1">
                    <img src="{{ asset('storage/' . $employee->qr_code_id) }}" alt="QR Code"
                      class="w-full h-full object-contain">
                  </div>
                  <span class="text-[9px] sm:text-[10px] font-mono text-slate-500 font-medium tracking-widest">QR
                    CODE</span>
                </div>
              </div>

              <div class="flex-grow w-full">
                <div class="mb-4 sm:mb-5 text-center md:text-left border-b border-slate-100 pb-3 sm:pb-4">
                  <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Nama
                    Lengkap</p>
                  <h3 class="text-lg sm:text-2xl font-extrabold text-slate-900 leading-tight">{{ $employee->fullname }}
                  </h3>
                  <p class="text-[11px] sm:text-xs text-blue-600 font-medium mt-0.5"><span>@</span>{{ $employee->slug }}
                  </p>
                </div>

                <div
                  class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 sm:gap-y-4 gap-x-4 sm:gap-x-6 text-center md:text-left">

                  <div class="bg-slate-50/70 p-2.5 sm:p-3.5 rounded-lg sm:rounded-xl border border-slate-100">
                    <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nomor</p>
                    <p class="mt-0.5 sm:mt-1 text-sm sm:text-base font-bold text-slate-800 font-mono">
                      {{ $employee->employee_id }}</p>
                  </div>

                  <div class="bg-slate-50/70 p-2.5 sm:p-3.5 rounded-lg sm:rounded-xl border border-slate-100">
                    <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 uppercase tracking-widest">Posisi</p>
                    <p class="mt-0.5 sm:mt-1 text-sm sm:text-base font-bold text-slate-800">{{ $employee->position }}</p>
                  </div>	

                </div>

                <div class="mt-4 sm:mt-6 pt-3 sm:pt-4 border-t border-slate-100">
                  <div
                    class="flex items-center justify-center md:justify-start gap-1.5 sm:gap-2 bg-emerald-50/50 text-emerald-700 px-3 py-2 rounded-lg border border-emerald-100/50 w-full sm:w-fit mx-auto md:mx-0">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-[10px] sm:text-xs font-medium">
                      Terverifikasi bergabung sejak:
                      <span
                        class="font-bold">{{ $employee->join_date ? \Carbon\Carbon::parse($employee->join_date)->translatedFormat('d F Y') : '-' }}</span>
                    </span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
@endsection
