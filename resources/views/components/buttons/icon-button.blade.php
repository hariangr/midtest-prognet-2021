<div onclick="{{ $onclick ?? '' }}"
    {{ $attributes->merge(['class' => 'flex cursor-pointer bg-gray-200 hover:bg-gray-400 rounded-full w-8 h-8 justify-center items-center ']) }}>
    {{ $slot }}
</div>
