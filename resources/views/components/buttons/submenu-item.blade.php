<a href="{{ $attributes['url'] ?? '' }}"
    class="text-black whitespace-nowrap	 {{ $attributes['active'] == 'true' ? 'bg-gray-900 text-white' : 'hover:bg-gray-700 hover:text-white ' }} px-3 py-2 rounded-md text-sm font-medium">
    {{ $attributes['text'] ?? '' }}
</a>
