@extends('layouts.admin')
@section('content')
  <x-search-bar search-route="{{ route('leads.index') }}" />

  <div class="bg-white p-3 sm:p-4 rounded-md shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y-2 divide-gray-200 text-xs sm:text-sm">

        <thead class="ltr:text-left rtl:text-right uppercase tracking-wide">
          <tr class="*:font-bold *:text-gray-900">
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Nama</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">No. HP</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">Tanggal</th>
            <th class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap text-center">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          @forelse ($leads as $lead)
            <tr class="*:text-gray-900">
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap font-medium">{{ $lead->fullname }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">{{ $lead->phone }}</td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap">
                <div class="flex flex-col leading-tight">
                  <span>{{ $lead->created_at->translatedFormat('d F Y') }}</span>
                  <span class="text-xs text-gray-500">
                    {{ $lead->created_at->diffForHumans() }}
                  </span>
                </div>
              </td>
              <td class="px-2 py-1 sm:px-3 sm:py-2 whitespace-nowrap text-center">
                <button type="button"
                  class="inline-flex items-center gap-1 px-3 py-1.5 bg-impost-primary hover:bg-impost-primary/90 text-black text-xs font-semibold rounded-md transition-colors"
                  data-lead-id="{{ $lead->id }}" data-fullname="{{ $lead->fullname }}"
                  data-email="{{ $lead->email }}" data-phone="{{ $lead->phone }}"
                  data-business="{{ $lead->business_name }}" data-income="{{ $lead->income }}"
                  data-objective="{{ $lead->objective }}" data-note="{{ $lead->note }}"
                  data-created="{{ $lead->created_at }}" onclick="openDetailModal(this)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                    <circle cx="12" cy="12" r="3" />
                  </svg>
                  Lihat Detail
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center px-4 py-4 text-gray-500">Data lead tidak tersedia.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="p-2 border-t border-gray-200 w-full">
      {{ $leads->links() }}
    </div>
  </div>

  <div id="detailModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto no-scrollbar relative">

      <div class="sticky top-0 bg-gray-900 text-white px-6 py-4 rounded-t-xl flex items-center justify-between">
        <h3 class="text-lg font-semibold">Detail Lead</h3>
        <button onclick="closeDetailModal()" class="text-gray-300 hover:text-white transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </button>
      </div>

      <div class="p-6">
        <div class="space-y-4">

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Lengkap</label>
            <p id="detail_fullname" class="mt-1 text-gray-900 font-medium"></p>
          </div>

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</label>
            <p id="detail_email" class="mt-1 text-gray-900"></p>
          </div>

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">No. Telepon</label>
            <p id="detail_phone" class="mt-1 text-gray-900"></p>
          </div>

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Bisnis</label>
            <p id="detail_business_name" class="mt-1 text-gray-900"></p>
          </div>

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Pendapatan</label>
            <p id="detail_income" class="mt-1 text-gray-900"></p>
          </div>

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tujuan</label>
            <div id="detail_objective" class="mt-2 flex flex-wrap gap-2"></div>
          </div>

          <div class="border-b border-gray-200 pb-3">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Catatan</label>
            <div id="detail_note" class="mt-1 text-gray-900 whitespace-pre-line"></div>
          </div>

          <div>
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tanggal</label>
            <p id="detail_created_at" class="mt-1 text-gray-900"></p>
          </div>

        </div>
      </div>

      <div class="sticky bottom-0 bg-gray-50 px-6 py-4 rounded-b-xl border-t border-gray-200 flex justify-end gap-2">
        <button onclick="closeDetailModal()"
          class="px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-lg font-semibold transition-colors">
          Tutup
        </button>
      </div>

    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function openDetailModal(button) {
      const modal = document.getElementById('detailModal');

      const fullname = button.getAttribute('data-fullname');
      const email = button.getAttribute('data-email');
      const phone = button.getAttribute('data-phone');
      const business = button.getAttribute('data-business');
      const income = button.getAttribute('data-income');
      const objective = button.getAttribute('data-objective');
      const note = button.getAttribute('data-note');
      const created = button.getAttribute('data-created');

      document.getElementById('detail_fullname').textContent = fullname || '-';
      document.getElementById('detail_email').textContent = email || '-';
      document.getElementById('detail_phone').textContent = phone || '-';
      document.getElementById('detail_business_name').textContent = business || '-';
      document.getElementById('detail_income').textContent = income || '-';

      const objectiveEl = document.getElementById('detail_objective');
      objectiveEl.innerHTML = '';

      console.log('Raw objective:', objective);
      console.log('Objective type:', typeof objective);
      console.log('Objective length:', objective ? objective.length : 0);

      if (objective && objective !== 'null' && objective !== '') {
        const objectives = objective.split(',');
        console.log('Split result:', objectives);

        objectives.forEach(obj => {
          const cleanObj = obj.trim();
          if (cleanObj) {
            const badge = document.createElement('span');
            badge.className =
              'inline-block px-3 py-1 bg-impost-primary text-black text-xs font-semibold rounded-full';
            badge.textContent = cleanObj;
            objectiveEl.appendChild(badge);
          }
        });

        if (objectiveEl.children.length === 0) {
          objectiveEl.innerHTML = '<span class="text-gray-500">Tidak ada tujuan</span>';
        }
      } else {
        objectiveEl.innerHTML = '<span class="text-gray-500">Tidak ada tujuan</span>';
      }

      document.getElementById('detail_note').textContent = note && note !== 'null' ? note : 'Tidak ada catatan';

      if (created) {
        const date = new Date(created);
        const options = {
          day: 'numeric',
          month: 'long',
          year: 'numeric',
          hour: '2-digit',
          minute: '2-digit'
        };
        document.getElementById('detail_created_at').textContent = date.toLocaleDateString('id-ID', options);
      }

      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeDetailModal() {
      document.getElementById('detailModal').classList.add('hidden');
      document.body.style.overflow = 'auto';
    }

    document.getElementById('detailModal').addEventListener('click', function(e) {
      if (e.target === this) closeDetailModal();
    });

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeDetailModal();
    });
  </script>
@endpush
