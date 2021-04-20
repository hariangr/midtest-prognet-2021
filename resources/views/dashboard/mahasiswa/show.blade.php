@extends('dashboard.layout')

@section('titleheader')
    Detail Mahasiswa
@endsection

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row pb-4">
            <a href="{{ route('dashboard.mahasiswa.index') }}">
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
                <label for="nim" class="text-sm leading-7 text-gray-600">NIM</label>
                <input disabled value="{{ $mahasiswa->nim }}" type="number" min="0" step="1" name="nim" pattern="\d{10}"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

            </div>
            <div class="relative mb-4 ">
                <label for="nama" class="text-sm leading-7 text-gray-600">Nama</label>
                <input disabled type="text" value="{{ $mahasiswa->nama }}" name="nama"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

            </div>
            <div class="relative mb-4 ">
                <label for="angkatan" class="text-sm leading-7 text-gray-600">Tahun Angkatan</label>
                <input disabled value="{{ $mahasiswa->angkatan }}" type="number" min="2000" step="1" name="angkatan"
                    pattern="\d{4}"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
            </div>
            <div class="relative mb-4 ">
                <label for="aktif" class="inline-flex items-center">
                    <input id="aktif" type="checkbox" {{ $mahasiswa->active ? 'checked' : '' }}
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="active">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Aktif') }}</span>
                </label>
            </div>

            <div class="relative mb-4 ">
                <label for="angkatan" class="text-sm leading-7 text-gray-600">Kelas yang diikuti</label>

                <ol class="list-disc pl-8">
                    @foreach ($mahasiswa->kartu_studis() as $it)
                        <li>
                            <a href="{{route('dashboard.kelas.show', $it->id)}}">
                                {{ $it->kelas()->matkul()->title }} {{ $it->kelas()->class_name }}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </div>

        </main>
    </div>
@endsection
