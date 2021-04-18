@php
$thClasses = 'rounded-xl sticky top-0 border-b border-gray-200 px-6 py-4 text-gray-600 font-bold';
@endphp

<tr class="text-left">
    @foreach ($columns as $column)
        @if ($column->isVisible())
            @if ($column->isSortable())
                <th class="{{ $thClasses }} {{ $this->setTableHeadClass($column->getAttribute()) }}"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}" @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value) {{ $key }}="{{ $value }}" @endforeach
                    wire:click="sort('{{ $column->getAttribute() }}')" style="cursor:pointer;">
                    <div class="flex flex-row items-center">
                        <div class="mr-2">

                        {{ $column->getText() }}
                        </div>

                        @if ($sortField !== $column->getAttribute())
                            {{ new \Illuminate\Support\HtmlString($sortDefaultIcon) }}
                        @elseif ($sortDirection === 'asc')
                            {{ new \Illuminate\Support\HtmlString($ascSortIcon) }}
                        @else
                            {{ new \Illuminate\Support\HtmlString($descSortIcon) }}
                        @endif
                    </div>

                </th>
            @else
                <th class="{{ $thClasses }} {{ $this->setTableHeadClass($column->getAttribute()) }}"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}" @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value) {{ $key }}="{{ $value }}" @endforeach>
                    {{ $column->getText() }}
                </th>
            @endif
        @endif
    @endforeach
</tr>
