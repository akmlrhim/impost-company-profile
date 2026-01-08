@extends('layouts.admin')
@section('content')
  <div class="bg-white p-3 sm:p-4 rounded-md shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y-2 divide-gray-200 text-xs sm:text-sm">

        <thead class="ltr:text-left rtl:text-right uppercase tracking-wide">
          <tr class="*:font-bold *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Name</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Email</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Phone</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Business Name</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Income</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Note</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Create At</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          @forelse ($leads as $lead)
            <tr class="*:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white *:first:font-medium">
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $lead->fullname }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $lead->email }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $lead->phone }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $lead->business_name }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $lead->income }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap text-center">
                @if ($lead->note)
                  <button type="button" class="text-impost-primary hover:underline text-sm font-semibold"
                    onclick="openNoteModal(@js($lead->note))">
                    Lihat Catatan
                  </button>
                @else
                  <span class="text-gray-400 text-sm">—</span>
                @endif
              </td>

              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">
                <div class="flex flex-col leading-tight">
                  <span>{{ $lead->created_at->translatedFormat('d F Y') }}</span>
                  <span class="text-xs text-gray-500">
                    {{ $lead->created_at->diffForHumans() }}
                  </span>
                </div>
              </td>
            </tr>
          @empty
            <td colspan="7" class="text-center px-4 py-4">Data lead tidak tersedia.</td>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="p-2 border-t border-gray-200 w-full">
      {{ $leads->links() }}
    </div>
  </div>

  <div id="noteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">

    <div class="bg-gray-900 rounded-xl max-w-lg w-full p-6 relative">

      <button onclick="closeNoteModal()" class="absolute top-3 right-3 text-gray-400 hover:text-white">
        ✕
      </button>

      <h3 class="text-lg font-semibold text-white mb-4">
        Catatan Lead
      </h3>

      <div id="noteModalContent" class="text-gray-300 text-sm whitespace-pre-line max-h-80 overflow-y-auto">
      </div>

      <div class="mt-6 text-right">
        <button onclick="closeNoteModal()" class="px-4 py-2 bg-impost-primary rounded-lg text-black font-semibold">
          Tutup
        </button>
      </div>

    </div>
  </div>
@endsection


@push('scripts')
  <script>
    function openNoteModal(note) {
      const modal = document.getElementById('noteModal');
      const content = document.getElementById('noteModalContent');

      content.textContent = note;
      modal.classList.remove('hidden');
    }

    function closeNoteModal() {
      document.getElementById('noteModal').classList.add('hidden');
    }

    document.getElementById('noteModal').addEventListener('click', function(e) {
      if (e.target === this) closeNoteModal();
    });
  </script>
@endpush
