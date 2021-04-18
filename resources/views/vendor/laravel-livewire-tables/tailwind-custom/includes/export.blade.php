@if (count($exports))
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-data="{isOpen: false}" class="relative inline-block text-left">
        <div>
            <button type="button" @click="isOpen = !isOpen"
                class="flex justify-center border border-gray-500 p-2 px-4 rounded-lg focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                {{-- class="w-full pr-10 py-2 rounded-lg focus:outline-none focus:shadow-outline text-gray-600 font-medium" --}} id="options-menu" aria-haspopup="true" aria-expanded="true">
                Export
                <!-- Heroicon name: chevron-down -->
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!--
      Dropdown panel, show/hide based on dropdown state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
        <div x-show="isOpen"
            class="z-10 origin-top-right absolute left-0 mt-2 w-56 rounded-md bg-white border ring-1 ring-black ring-opacity-5">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                @foreach ($exports as $it)
                    <a href="#" class="bg-white block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                        wire:click.prevent="export('{{ $it }}')" role="menuitem">{{ $it }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endif
