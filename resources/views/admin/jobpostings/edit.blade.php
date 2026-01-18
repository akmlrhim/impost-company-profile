@extends('layouts.admin')

@section('content')
  <x-flash />

  <div class="mx-auto py-4">
    <form action="{{ route('jobpostings.update', $jobPosting->slug) }}" method="POST"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf
      @method('PUT')

      <div class="p-6 space-y-3">
        {{-- posisi --}}
        <div>
          <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
            Masukkan posisi <span class="text-danger">*</span>
          </label>
          <input type="text" id="title" name="title"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('title', $jobPosting->title) }}" placeholder="Masukkan nama posisi" autocomplete="off" />
          @error('title')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div>
          <label for="description" class="block text-sm font-medium text-gray-900 mb-2">
            Deskripsi
          </label>
          <textarea id="description" name="description"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            placeholder="Masukkan deskripsi portfolio" rows="4">{{ old('description', $jobPosting->description) }}</textarea>
          @error('description')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- persyaratan --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2" for="requirements">
            Persyaratan <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="requirements" style="height:150px;">
            {!! old('requirements', $jobPosting->requirements) !!}
          </div>

          <input type="hidden" name="requirements" value="{{ old('requirements', $jobPosting->requirements) }}">

          @error('requirements')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- tanggung jawab --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2" for="responsibilities">
            Tanggung Jawab <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="responsibilities" style="height:150px;">
            {!! old('responsibilities', $jobPosting->responsibilities) !!}
          </div>
          <input type="hidden" name="responsibilities"
            value="{{ old('responsibilities', $jobPosting->responsibilities) }}">

          @error('responsibilities')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

          {{-- tipe --}}
          <div>
            <label for="type" class="block text-sm font-medium text-gray-900 mb-2">
              Tipe <span class="text-danger">*</span>
            </label>
            <select id="type" name="type"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow">
              <option value="" disabled {{ old('type', $jobPosting->type) ? '' : 'selected' }}>Pilih tipe</option>
              <option value="Full-time" {{ old('type', $jobPosting->type) == 'Full-time' ? 'selected' : '' }}>Full-time
              </option>
              <option value="Part-time" {{ old('type', $jobPosting->type) == 'Part-time' ? 'selected' : '' }}>Part-time
              </option>
              <option value="Contract" {{ old('type', $jobPosting->type) == 'Contract' ? 'selected' : '' }}>Contract
              </option>
            </select>
            @error('type')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          {{-- status --}}
          <div>
            <label for="status" class="block text-sm font-medium text-gray-900 mb-2">
              Status <span class="text-danger">*</span>
            </label>
            <select id="status" name="status"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow">
              <option value="" disabled {{ old('status', $jobPosting->status) ? '' : 'selected' }}>Pilih status
              </option>
              <option value="Open" {{ old('status', $jobPosting->status) == 'Open' ? 'selected' : '' }}>Open</option>
              <option value="Closed" {{ old('status', $jobPosting->status) == 'Closed' ? 'selected' : '' }}>Closed
              </option>
            </select>
            @error('status')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          {{-- batas akhir --}}
          <div class="mb-6">
            <label for="closing_date" class="block text-sm font-medium text-gray-900 mb-2">
              Batas Akhir <span class="text-danger">*</span>
            </label>
            <div class="relative">
              <input id="closing_date" name="closing_date" type="date"
                class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
                value="{{ old('closing_date', $jobPosting->closing_date ? date('Y-m-d', strtotime($jobPosting->closing_date)) : '') }}"
                onclick="this.showPicker()">
            </div>
            @error('closing_date')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          {{-- link lamar --}}
          <div>
            <label for="apply_link" class="block text-sm font-medium text-gray-900 mb-2">
              Link untuk melamar <span class="text-danger">*</span> <span class="text-gray-600 text-2xs italic">masukkan
                salah
                satu (JobStreet/KitaLulus/Glints/TapLoker,dll)</span>
            </label>
            <input type="url" id="apply_link" name="apply_link"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('apply_link', $jobPosting->apply_link) }}" placeholder="Masukkan link untuk melamar"
              autocomplete="off" />

            @error('apply_link')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
        </div>
      </div>

      {{-- Action  --}}
      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('jobpostings.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Memperbarui...' : 'Update Lowongan'"></span>
        </button>
      </div>

    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('quill/quill.js') }}" defer></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      document.querySelectorAll('.quill-editor').forEach(function(editor) {

        const field = editor.dataset.field;
        const hiddenInput = document.querySelector(`input[name="${field}"]`);

        const quill = new Quill(editor, {
          theme: 'snow',
          placeholder: 'Tulis konten anda di sini...',
          modules: {
            toolbar: [
              [{
                header: [1, 2, 3, 4, 5, 6, false]
              }],
              ['bold', 'italic', 'underline', 'strike'],
              ['blockquote', 'code-block'],
              [{
                list: 'ordered'
              }, {
                list: 'bullet'
              }],
            ]
          }
        });

        // set old value
        if (hiddenInput.value) {
          quill.root.innerHTML = hiddenInput.value;
        }

        // sync ke input hidden
        quill.on('text-change', function() {
          hiddenInput.value = quill.root.innerHTML;
        });

      });
    });
  </script>
@endpush
