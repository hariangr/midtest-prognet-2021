<div x-cloak {{ $attributes->merge(['class' => 'fixed inset-0 z-50 overflow-y-auto']) }}>
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-md sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="flex items-center justify-center p-16">
                <x-controls.loading-indicator />
            </div>
        </div>
    </div>
</div>
