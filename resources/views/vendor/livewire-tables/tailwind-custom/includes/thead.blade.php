{{-- https://tailwindcomponents.com/component/table-ui-with-tailwindcss-and-alpinejs --}}

@if ($tableHeaderEnabled)
    <thead class="border-b-4 {{ $this->getOption('bootstrap.classes.thead') }}">
        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.columns')
    </thead>
@endif
