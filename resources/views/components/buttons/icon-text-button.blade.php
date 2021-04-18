<div onclick="{{ $onclick ?? '' }}"
    {{ $attributes->merge(['class' => 'flex cursor-pointer bg-gray-200 hover:bg-gray-400 rounded-md px-4 h-10 justify-center items-center ']) }}>
    {{ $icon }}
    <span class="ml-3">{{$text ?? ''}}</span>
</div>
