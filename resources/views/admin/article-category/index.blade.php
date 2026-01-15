@extends('layouts.admin')
@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('article-categories.index') }}" />

  <button type="button"
    class="px-3 py-2 rounded-md bg-blue-900 text-sm mb-4 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
    data-modal-target="add-category-modal" data-modal-toggle="add-category-modal">
    Tambah Kategori
  </button>

  <div class="bg-white p-3 sm:p-4 rounded-md shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y-2 divide-gray-200 text-xs sm:text-sm">

        <thead class="ltr:text-left rtl:text-right uppercase tracking-wide">
          <tr class="*:font-bold *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">No</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Name</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Action</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          @forelse ($articleCategories as $articleCategory)
            <tr class="*:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white *:first:font-medium">
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $articleCategory->name }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">
                <button type="button" data-modal-target="edit-category-modal-{{ $articleCategory->id }}"
                  data-modal-toggle="edit-category-modal-{{ $articleCategory->id }}"
                  class="cursor-pointer flex-1 inline-flex items-center justify-center text-white hover:bg-yellow-500 bg-yellow-600 px-3 py-2 rounded-md">
                  Edit
                </button>
                <x-confirm-delete :action="route('article-categories.destroy', $articleCategory)" label="Hapus" />
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center px-4 py-4">Data tidak tersedia, silahkan tambah </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="p-2 border-t border-gray-200 w-full">
      {{ $articleCategories->links() }}
    </div>
  </div>


  {{-- Create Modal  --}}
  <div id="add-category-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
          <h3 class="text-lg font-semibold text-gray-900">
            Tambah Kategori
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="add-category-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <form action="{{ route('article-categories.store') }}" method="POST" class="p-4 md:p-5">
          @csrf
          <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Kategori</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
              placeholder="Masukkan nama kategori">
            @error('name')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
          <div class="flex items-center justify-end gap-3 pt-3">
            <button type="button" data-modal-hide="add-category-modal"
              class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-700 focus:text-blue-700">
              Batal
            </button>
            <button type="submit"
              class="px-4 py-2 text-sm font-medium text-white bg-blue-900 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


  {{-- Edit Modal --}}
  @foreach ($articleCategories as $articleCategory)
    <div id="edit-category-modal-{{ $articleCategory->id }}" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
          <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
            <h3 class="text-lg font-semibold text-gray-900">
              Edit Kategori
            </h3>
            <button type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
              data-modal-hide="edit-category-modal-{{ $articleCategory->id }}">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <form action="{{ route('article-categories.update', $articleCategory) }}" method="POST" class="p-4 md:p-5">
            @csrf
            @method('PUT')

            <input type="hidden" name="category_id" value="{{ $articleCategory->id }}">

            <div class="mb-4">
              <label for="name-edit-{{ $articleCategory->id }}" class="block mb-2 text-sm font-medium text-gray-900">Nama
                Kategori</label>
              <input type="text" name="name" id="name-edit-{{ $articleCategory->id }}"
                value="{{ old('name', $articleCategory->name) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                placeholder="Masukkan nama kategori">
              @error('name')
                <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
              @enderror
            </div>
            <div class="flex items-center justify-end gap-3 pt-3">
              <button type="button" data-modal-hide="edit-category-modal-{{ $articleCategory->id }}"
                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-700 focus:text-blue-700">
                Batal
              </button>
              <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 rounded-md hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach


  {{-- error validation untuk form tambah --}}
  @if ($errors->any() && old('_method') != 'PUT')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const modalElement = document.getElementById('add-category-modal');
        const modal = new Modal(modalElement);
        modal.show();
      });
    </script>
  @endif

  {{-- error validation untuk form edit --}}
  @if ($errors->any() && old('_method') == 'PUT')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const categoryId = '{{ old('category_id') }}';
        const modalElement = document.getElementById('edit-category-modal-' + categoryId);
        if (modalElement) {
          const modal = new Modal(modalElement);
          modal.show();
        }
      });
    </script>
  @endif
@endsection
