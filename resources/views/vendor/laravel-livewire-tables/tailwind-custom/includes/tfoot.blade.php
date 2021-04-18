@if ($tableFooterEnabled)
    <tfoot class="border-t-4">
        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.columns')
    </tfoot>
@endif
