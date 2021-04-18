@if ($selected ?? false == "true")
    <button
        class="block px-6 py-4 font-medium text-blue-500 border-b-2 border-blue-500 hover:text-blue-500 focus:outline-none">
        {{ $title }}
    </button>
@else
    <button class="block px-6 py-4 text-gray-600 hover:text-blue-500 focus:outline-none">
        {{ $title }}
    </button>
@endif
