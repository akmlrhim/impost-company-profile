@props([
    'action' => '',
    'label' => 'Delete',
    'modalId' => 'confirm-delete-modal',
])

<button type="button" data-modal-target="{{ $modalId }}" data-modal-toggle="{{ $modalId }}"
  data-action="{{ $action }}"
  class="cursor-pointer flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-sm hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
  {{ $label }}
</button>

@once
  <div id="{{ $modalId }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">

    <div class="relative w-full max-w-md bg-neutral-primary-soft border border-default rounded-base shadow-sm p-6">

      <svg class="mx-auto mb-4 w-12 h-12 text-fg-disabled" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>

      <h3 class="mb-2 text-lg font-semibold text-heading text-center">
        Konfirmasi Hapus
      </h3>

      <p class="mb-6 text-body text-center">
        Apakah anda yakin ingin menghapus data ini?
      </p>

      <div class="flex justify-center gap-4">
        <button type="button" data-modal-hide="{{ $modalId }}"
          class="px-4 py-2.5 text-sm rounded-sm bg-neutral-secondary-medium hover:bg-neutral-tertiary-medium cursor-pointer">
          Batal
        </button>

        <form method="POST" id="confirmDeleteForm">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="px-4 py-2.5 text-sm rounded-sm bg-danger text-white hover:bg-danger-strong cursor-pointer">
            Ya, Hapus
          </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('[data-modal-toggle="{{ $modalId }}"]').forEach(button => {
        button.addEventListener('click', () => {
          const action = button.getAttribute('data-action');
          document.getElementById('confirmDeleteForm').action = action;
        });
      });
    });
  </script>
@endonce
