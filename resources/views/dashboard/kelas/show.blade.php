@extends('dashboard.layout')

@section('titleheader')
    Dashboard Mahasiswa
@endsection

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row pb-4">
            <a href="{{ route('dashboard.dosen.index') }}">
                <x-buttons.icon-text-button id="btn_create">
                    <x-slot name="text">
                        Kembali
                    </x-slot>
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </x-slot>
                </x-buttons.icon-text-button>
            </a>

            <div class="flex-grow"></div>
        </div>

        <main>

            <div class="relative mb-4 ">
                <label for="title" class="text-sm leading-7 text-gray-600">Nama</label>
                <input disabled value="{{$dosen->nama}}" type="text" name="nama"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
            </div>
            <div class="relative mb-4 ">
                <label for="key" class="text-sm leading-7 text-gray-600">NIDN</label>
                <input disabled value="{{$dosen->nidn}}" type="number" name="nidn"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                <small><i>Misal: 0027027509</i></small>

            </div>
            <div class="relative mb-4 ">
                <label for="key" class="text-sm leading-7 text-gray-600">Email</label>
                <input disabled value="{{$dosen->email}}" type="email" name="email"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                <small><i>Misal: nama@example.com</i></small>

            </div>
            <div class="relative mb-4 ">
                <label for="aktif" class="inline-flex items-center">
                    <input disabled id="aktif" type="checkbox" {{ $dosen->active ? 'checked' : ''}}
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="active">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Aktif') }}</span>
                </label>

            </div>

        </main>
    </div>
@endsection
