@extends('layouts.admin')
@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('users.index') }}" add-route="{{ route('users.create') }}" add-label="Tambah User" />

  <div class="bg-white p-3 sm:p-4 rounded-md shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y-2 divide-gray-200 text-xs sm:text-sm">

        <thead class="ltr:text-left rtl:text-right uppercase tracking-wide">
          <tr class="*:font-bold *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Name</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Email</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Create At</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Action</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          @forelse ($users as $user)
            <tr class="*:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white *:first:font-medium">
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $user->name }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $user->email }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">
                <div class="flex flex-col leading-tight">
                  <span>{{ $user->created_at->translatedFormat('d F Y') }}</span>
                  <span class="text-xs text-gray-500">
                    {{ $user->created_at->diffForHumans() }}
                  </span>
                </div>
              </td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">
                <button onclick="window.location.href='{{ route('users.edit', $user) }}'"
                  class="cursor-pointer flex-1 inline-flex items-center justify-center text-white hover:bg-yellow-500 bg-yellow-600 px-3 py-2 rounded-md">Edit</button>
                <x-confirm-delete :action="route('users.destroy', $user)" label="Hapus" />
              </td>
            </tr>
          @empty
            <td colspan="4">Data user tidak tersedia, silahkan tambah user.</td>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="p-2 border-t border-gray-200 w-full">
      {{ $users->links() }}
    </div>

  </div>
@endsection
