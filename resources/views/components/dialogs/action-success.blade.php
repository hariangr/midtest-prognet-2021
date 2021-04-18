<div x-cloak {{ $attributes->merge(['class' => 'fixed inset-0 z-50 overflow-y-auto']) }}>
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-md sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <div @click="$dispatch('close-clicked')"
                    class="absolute top-0 right-0 p-3 mt-2 mr-3 text-gray-400 rounded-full cursor-pointer hover:text-black hover:bg-gray-200">
                    <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

                <div
                    class="flex flex-col items-center justify-center gap-2 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto my-4 bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        {{ $icon ?? '' }}
                    </div>

                    <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-headline">
                        {{ $title ?? '' }}
                    </h3>

                    <div class="mt-2">
                        {{ $description ?? '' }}
                    </div>

                </div>
            </div>

            <div class="flex flex-col px-4 py-2 mb-4 w-100 sm:px-6">
                {{ $button ?? '' }}
            </div>
        </div>
    </div>
</div>
