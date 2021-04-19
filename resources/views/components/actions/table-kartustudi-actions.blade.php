<div class="flex flex-row space-x-2">
    <x-buttons.icon-button class="action-delete" data-kartustudi-id="{{ $model->id }}"
        data-kartustudi-nama="{{ $model->mahasiswa()->nama }}">
        <svg class="w-4 h-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </x-buttons.icon-button>
</div>
