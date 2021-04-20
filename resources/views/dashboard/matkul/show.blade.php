@extends('dashboard.layout')

@section('titleheader')
    Detail Mata Kuliah
@endsection

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row pb-4">
            <a href="{{ route('dashboard.matkul.index') }}">
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
                <label for="title" class="text-sm leading-7 text-gray-600">Nama Matkul</label>
                <input disabled value="{{ $matkul->title }}" id="editTitle" type="text" name="title"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
            </div>
            <div class="relative mb-4 ">
                <label for="key" class="text-sm leading-7 text-gray-600">Kode Matkul</label>
                <input disabled value="{{ $matkul->key }}" id="editKey" type="text" name="key"
                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                <small><i>Misal: TIC18</i></small>
            </div>
            <div class="relative mb-4 ">
                <div class="relative mb-4 flex flex-col">
                    <label class="text-sm leading-7 text-gray-600">Konsentrasi</label>
                    <select disabled value="{{ $matkul->concentration }}" id="editConcentration" name="concentration"
                        id=""
                        class=" w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="tib">Manajemen Basis Data</option>
                        <option value="tic">Teknologi Cerdas</option>
                        <option value="mkj">Jaringan</option>
                        <option value="mb">Manajemen</option>

                    </select>
                </div>
            </div>

            <div class="relative mb-4 ">
                <label for="aktif" class="inline-flex items-center">
                    <input id="editAktif" type="checkbox" disabled {{ $matkul->active ? 'checked' : '' }}
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="active">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Aktif') }}</span>
                </label>
            </div>

            <div class="relative mb-4 ">
                <label for="angkatan" class="text-sm leading-7 text-gray-600">Kelas yang tersedia</label>

                <ol class="list-disc pl-8">
                    @foreach ($matkul->pembimbings() as $it)
                        <a href="{{ route('dashboard.kelas.show', $it->id) }}">
                            <li>Kelas {{ $it->class_name }}, dibimbing oleh {{ $it->dosen()->nama }}</li>
                        </a>
                    @endforeach
                </ol>
            </div>
        </main>
    </div>
@endsection
