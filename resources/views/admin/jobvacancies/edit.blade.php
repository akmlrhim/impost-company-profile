@extends('layouts.admin')

@section('content')
  <x-flash />

  <form action="{{ route('jobvacancies.update', $jobvacancy) }}" method="POST" enctype="multipart/form-data"
    x-data="{
        isSubmitting: false,
        imagePreview: '{{ $jobvacancy->poster ? asset('storage/' . $jobvacancy->poster) : null }}'
    }" @submit="isSubmitting = true" class="flex flex-col gap-6 mx-auto">
    @csrf
    @method('PUT')

    <div class="w-full space-y-4 bg-white p-6 rounded border border-gray-200 shadow-sm">
      <h2 class="font-semibold text-gray-800 pb-2 mb-3 text-sm sm:text-base">Edit Info Utama</h2>

      <div>
        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Judul Posisi</label>
        <input type="text" name="title" value="{{ old('title', $jobvacancy->title) }}"
          class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
          placeholder="Contoh: Customer Service">
        @error('title')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div class="flex flex-col sm:flex-row gap-4">
        <div class="w-full sm:w-1/2">
          <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Tipe Kerja</label>
          <select name="employment_type"
            class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('employment_type') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror">
            <option value="Full-time"
              {{ old('employment_type', $jobvacancy->employment_type) == 'Full-time' ? 'selected' : '' }}>Full-time
            </option>
            <option value="Internship"
              {{ old('employment_type', $jobvacancy->employment_type) == 'Internship' ? 'selected' : '' }}>Internship
            </option>
            <option value="Part-time"
              {{ old('employment_type', $jobvacancy->employment_type) == 'Part-time' ? 'selected' : '' }}>Part-time
            </option>
          </select>
          @error('employment_type')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
        <div class="w-full sm:w-1/2">
          <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Durasi (Opsional)</label>
          <input type="text" name="duration" value="{{ old('duration', $jobvacancy->duration) }}"
            class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('duration') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
            placeholder="Min. 3 bulan">
          @error('duration')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
      </div>

      <div>
        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Sistem Kerja (Bisa >1)</label>
        <div class="flex gap-4 mt-1 text-xs sm:text-sm text-gray-700">
          <label class="flex items-center gap-1.5">
            <input type="checkbox" name="work_arrangements[]" value="Onsite"
              class="w-4 h-4 border border-blue-700 rounded-base"
              {{ in_array('Onsite', old('work_arrangements', $jobvacancy->work_arrangements ?? [])) ? 'checked' : '' }}>
            Onsite
          </label>
          <label class="flex items-center gap-1.5">
            <input type="checkbox" name="work_arrangements[]" value="WFA"
              class="w-4 h-4 border border-blue-700 rounded-base"
              {{ in_array('WFA', old('work_arrangements', $jobvacancy->work_arrangements ?? [])) ? 'checked' : '' }}> WFA
          </label>
          <label class="flex items-center gap-1.5">
            <input type="checkbox" name="work_arrangements[]" value="Remote"
              class="w-4 h-4 border border-blue-700 rounded-base"
              {{ in_array('Remote', old('work_arrangements', $jobvacancy->work_arrangements ?? [])) ? 'checked' : '' }}>
            Remote
          </label>
        </div>
        @error('work_arrangements')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div class="flex flex-col sm:flex-row gap-4">
        <div class="w-full sm:w-1/2">
          <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Email Tujuan</label>
          <input type="email" name="apply_email" value="{{ old('apply_email', $jobvacancy->apply_email) }}"
            class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('apply_email') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror">
          @error('apply_email')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div class="w-full sm:w-1/2">
          <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Subjek Email</label>
          <input type="text" name="apply_subject" value="{{ old('apply_subject', $jobvacancy->apply_subject) }}"
            class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('apply_subject') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
            placeholder="CS - Nama">
          @error('apply_subject')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
      </div>

      <div class="flex flex-col sm:flex-row gap-4">
        <div class="w-full sm:w-1/2">
          <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Upload Poster (Opsional)</label>
          <input type="file" name="poster" accept="image/*"
            @change="imagePreview = URL.createObjectURL($event.target.files[0])"
            class="w-full border rounded px-3 py-2 text-xs sm:text-sm bg-white focus:outline-none focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('poster') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror">

          <template x-if="imagePreview">
            <div class="mt-3">
              <img :src="imagePreview" class="h-32 object-cover rounded border border-gray-200 shadow-sm">
            </div>
          </template>

          <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WEBP. Maks: 2MB.</p>
          @error('poster')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div class="w-full sm:w-1/2">
          <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Status Publikasi</label>
          <select name="status"
            class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('status') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror">
            <option value="Active" {{ old('status', $jobvacancy->status) == 'Active' ? 'selected' : '' }}>Active
              (Tampilkan)</option>
            <option value="Draft" {{ old('status', $jobvacancy->status) == 'Draft' ? 'selected' : '' }}>Draft
              (Sembunyikan)</option>
          </select>
          @error('status')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
      </div>
    </div>

    <div class="w-full space-y-4 bg-white p-6 rounded border border-gray-200 shadow-sm">
      <div class="flex justify-between items-center pb-2 mb-3">
        <div>
          <h2 class="font-semibold text-gray-800 text-sm sm:text-base">Detail Poin</h2>
          @error('details')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
        <button type="button" onclick="addDetailRow()"
          class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs sm:text-sm font-semibold py-1.5 px-3 rounded border border-gray-300 transition">
          + Tambah Baris
        </button>
      </div>

      <div id="details-container" class="space-y-4">
        @php
          $oldDetails = old('details', $jobvacancy->details->toArray());
          if (empty($oldDetails)) {
              $oldDetails = [['section' => 'Tanggung Jawab', 'content' => '']];
          }
        @endphp

        @foreach ($oldDetails as $index => $detail)
          <div class="detail-row flex flex-col gap-2 bg-gray-50 p-4 rounded border border-gray-100 mb-4">

            <div class="w-full">
              <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Bagian</label>
              <select name="details[{{ $index }}][section]"
                class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 @error('details.' . $index . '.section') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror">
                <option value="Tanggung Jawab" {{ $detail['section'] == 'Tanggung Jawab' ? 'selected' : '' }}>Tanggung
                  Jawab</option>
                <option value="Kualifikasi" {{ $detail['section'] == 'Kualifikasi' ? 'selected' : '' }}>Kualifikasi
                </option>
                <option value="Benefit" {{ $detail['section'] == 'Benefit' ? 'selected' : '' }}>Benefit</option>
              </select>
            </div>

            <div class="w-full flex flex-col gap-1">
              <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Isi Poin</label>
              <div class="bg-white">
                <div id="quill-editor-{{ $index }}" style="height: 120px; background-color: white;"></div>
                <input type="hidden" name="details[{{ $index }}][content]"
                  id="quill-input-{{ $index }}" value="{{ $detail['content'] }}">
              </div>

              <div class="flex justify-between items-start mt-1">
                <div class="flex-1 pr-2">
                  @error('details.' . $index . '.content')
                    <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                  @enderror
                </div>

                <button type="button" onclick="this.closest('.detail-row').remove()"
                  class="text-red-500 hover:text-red-700 px-3 py-1 text-xs sm:text-sm font-bold flex-shrink-0 ml-auto">
                  Hapus
                </button>
              </div>
            </div>

          </div>
        @endforeach
      </div>

      <div class="pt-6 mt-6 flex justify-end gap-3">
        <a href="{{ route('jobvacancies.index') }}"
          class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded text-xs sm:text-sm transition font-medium">Batal</a>

        <button type="submit" :disabled="isSubmitting"
          class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded text-xs sm:text-sm transition shadow-sm font-semibold flex items-center gap-2 disabled:opacity-75 disabled:cursor-not-allowed">
          <span x-text="isSubmitting ? 'Menyimpan...' : 'Simpan Perubahan'"></span>
        </button>
      </div>
    </div>
  </form>
@endsection

@push('scripts')
  <script src="{{ asset('quill/quill.js') }}" defer></script>
  <script>
    let detailIndex = {{ count($oldDetails) }};

    document.addEventListener('DOMContentLoaded', function() {
      for (let i = 0; i < detailIndex; i++) {
        initQuill(i);
      }
    });

    function initQuill(index) {
      const uniqueId = `quill-editor-${index}`;
      const inputId = `quill-input-${index}`;

      if (!document.getElementById(uniqueId)) return;

      const quill = new Quill(`#${uniqueId}`, {
        theme: 'snow',
        placeholder: 'Tulis konten anda di sini...',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline'],
            [{
              'list': 'ordered'
            }, {
              'list': 'bullet'
            }],
            ['clean']
          ]
        }
      });

      const inputHidden = document.getElementById(inputId);

      if (inputHidden.value) {
        quill.root.innerHTML = inputHidden.value;
      }

      quill.on('text-change', function() {
        inputHidden.value = quill.root.innerHTML;
      });
    }

    function addDetailRow() {
      const container = document.getElementById('details-container');
      const uniqueId = `quill-editor-${detailIndex}`;
      const inputId = `quill-input-${detailIndex}`;

      const rowHtml = `
      <div class="detail-row flex flex-col gap-2 bg-gray-50 p-4 rounded border border-gray-100 mb-4">
          <div class="w-full">
              <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Bagian</label>
              <select name="details[${detailIndex}][section]"
                  class="w-full border rounded px-3 py-2 text-xs sm:text-sm focus:outline-none focus:ring-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                  <option value="Tanggung Jawab">Tanggung Jawab</option>
                  <option value="Kualifikasi">Kualifikasi</option>
                  <option value="Benefit">Benefit</option>
              </select>
          </div>
          <div class="w-full flex flex-col gap-1">
              <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Isi Poin</label>
              <div class="bg-white">
                  <div id="${uniqueId}" style="height: 120px; background-color: white;"></div>
                  <input type="hidden" name="details[${detailIndex}][content]" id="${inputId}">
              </div>
              <div class="flex justify-between items-start mt-1">
                  <div class="flex-1 pr-2"></div>
                  <button type="button" onclick="this.closest('.detail-row').remove()"
                      class="text-red-500 hover:text-red-700 px-3 py-1 text-xs sm:text-sm font-bold flex-shrink-0 ml-auto">
                      Hapus
                  </button>
              </div>
          </div>
      </div>
    `;

      container.insertAdjacentHTML('beforeend', rowHtml);
      initQuill(detailIndex);
      detailIndex++;
    }
  </script>
@endpush
