@extends('layouts.admin')
<x-flash></x-flash>
@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf
      @method('PUT')

      <div class="p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="fullname" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Lengkap
            </label>
            <input type="text" id="fullname" name="fullname"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('fullname', $employee->fullname) }}" placeholder="Masukkan nama lengkap" autocomplete="off" />
            @error('fullname')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="employee_id" class="block text-sm font-medium text-gray-900 mb-2">
              ID Karyawan
            </label>
            <input type="text" id="employee_id" name="employee_id"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('employee_id', $employee->employee_id) }}" placeholder="Contoh: IM-001" autocomplete="off" />
            @error('employee_id')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="position" class="block text-sm font-medium text-gray-900 mb-2">
              Posisi / Jabatan
            </label>
            <input type="text" id="position" name="position"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('position', $employee->position) }}" placeholder="Masukkan posisi" autocomplete="off" />
            @error('position')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="join_date" class="block text-sm font-medium text-gray-900 mb-2">
              Tanggal Bergabung
            </label>
            <input type="date" id="join_date" name="join_date" onclick="this.showPicker()"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('join_date', $employee->join_date) }}" />
            @error('join_date')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
        </div>

        <div x-data="{ preview: '{{ $employee->photo ? asset('storage/' . $employee->photo) : '' }}' }">
          <label class="block text-sm font-medium mb-2" for="photo">
            Foto Profil
          </label>

          <input type="file" name="photo" id="photo" accept="image/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
              const file = $event.target.files[0];
              if (file) {
                preview = URL.createObjectURL(file);
              }
            ">

          @error('photo')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">Preview photo</p>
              <img :src="preview" class="w-40 h-auto rounded-md border border-gray-200 shadow-sm object-cover"
                alt="Preview photo">
            </div>
          </template>
        </div>

      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('employees.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
          <span x-text="loading ? 'Menyimpan...' : 'Perbarui Karyawan'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
