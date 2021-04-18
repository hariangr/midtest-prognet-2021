@if ($paginationEnabled || $searchEnabled)
    <div class="flex flex-row spacing-x-4 mb-4 justify-between">
        <div class="flex flex-row space-x-4 items-center">
            @if ($paginationEnabled && count($perPageOptions))
                <select wire:model="perPage" class="w-full pr-10 py-2 rounded-lg focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                    @foreach ($perPageOptions as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
            @endif

            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.export')
        </div>

        @if ($searchEnabled)
            <div class="relative md:w-1/3">
                <input type="{{ $clearSearchButton ? 'text' : 'search'}}"
                    @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                    @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                    @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                    placeholder="{{ __('laravel-livewire-tables::strings.search') }}"
                    class="w-full pl-10 pr-4 py-2 rounded-lg focus:outline-none focus:shadow-outline text-gray-600 font-medium">

                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div>
            </div>
        @endif

    </div>
    <!--row-->
@endif
