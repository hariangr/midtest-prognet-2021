@extends('dashboard.layout')

@section('titleheader')
    Dashboard Mahasiswa
@endsection

@section('content')
    <div>
        <form id="createForm" class="hidden" action="{{ route('dashboard.mahasiswa.store') }}" name="createForm"
            method="POST">
            <x-dialogs.simple-gray-footer title="Tambah Data Mahasiswa">
                <x-slot name="buttons">
                    @csrf

                    <button type="submit"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Tambah
                    </button>

                    <button id="cancelAdd" type="button"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </x-slot>

                <x-slot name="description">
                    <div class="relative mb-4 ">
                        <label for="nim" class="text-sm leading-7 text-gray-600">NIM</label>
                        <input type="number" min="0" step="1" name="nim" pattern="\d{10}"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('nim')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="nama" class="text-sm leading-7 text-gray-600">Nama</label>
                        <input type="text" name="nama"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('nama')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="angkatan" class="text-sm leading-7 text-gray-600">Tahun Angkatan</label>
                        <input type="number" min="2000" step="1" name="angkatan" pattern="\d{4}"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('angkatan')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="aktif" class="inline-flex items-center">
                            <input id="aktif" type="checkbox" checked
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="active">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Aktif') }}</span>
                        </label>

                        @error('active')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </x-slot>

                <x-slot name="icon">
                    <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </x-slot>
            </x-dialogs.simple-gray-footer>
        </form>
        <form id="deleteForm" class="hidden" name="deleteForm" method="POST">
            <x-dialogs.simple-gray-footer title="Hapus Mahasiswa">
                <x-slot name="buttons">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus
                    </button>

                    <button id="cancelDel" type="button"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </x-slot>

                <x-slot name="description">
                    <p class="text-sm text-gray-500">
                        Hapus mahasiswa dengan nama <b id="deleteNamePrev"></b>?
                    </p>

                </x-slot>

                <x-slot name="icon">
                    <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </x-slot>
            </x-dialogs.simple-gray-footer>
        </form>
        <form id="editForm" class="hidden" name="editForm" method="POST">
            <x-dialogs.simple-gray-footer title="Edit Mahasiswa">
                <x-slot name="buttons">
                    @csrf
                    @method('PATCH')

                    <button type="submit"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Ubah
                    </button>

                    <button id="cancelEdit" type="button"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </x-slot>

                <x-slot name="description">
                    <input id="editId" type="hidden" name="id_mahasiswa">

                    <div class="relative mb-4 ">
                        <label for="nim" class="text-sm leading-7 text-gray-600">NIM</label>
                        <input id="editNim" type="number" min="0" step="1" name="nim" pattern="\d{10}"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('nim')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="nama" class="text-sm leading-7 text-gray-600">Nama</label>
                        <input id="editNama" type="text" name="nama"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('nama')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="angkatan" class="text-sm leading-7 text-gray-600">Tahun Angkatan</label>
                        <input id="editAngkatan" type="number" min="2000" step="1" name="angkatan" pattern="\d{4}"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('angkatan')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="aktif" class="inline-flex items-center">
                            <input id="editAktif" type="checkbox" id="editActive"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="active">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Aktif') }}</span>
                        </label>

                        @error('active')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </x-slot>

                <x-slot name="icon">
                    <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </x-slot>
            </x-dialogs.simple-gray-footer>
        </form>
    </div>

    <div class="flex flex-col">
        <div class="flex flex-row pb-4">
            <div class="flex-grow"></div>

            <x-buttons.icon-text-button id="btn_create">
                <x-slot name="text">
                    Tambah Data
                </x-slot>
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </x-slot>
            </x-buttons.icon-text-button>
        </div>

        <div>
            @if (Session::has('success'))
                <div class="p-4 round-2xl bg-blue-300 mb-4">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('errMsg'))
                <div class="p-4 round-2xl bg-red-300 mb-4">{{ Session::get('errMsg') }}</div>
            @endif
        </div>

        <div id="mahasiswa-table">
            <livewire:mahasiswa-dt />
        </div>
    </div>

    <script>
        const createForm = document.getElementById("createForm");
        const deleteForm = document.getElementById("deleteForm");
        const editForm = document.getElementById("editForm");

        document.getElementById("cancelAdd").addEventListener("click", function(e) {
            createForm.classList.add("hidden");
        })
        document.getElementById("cancelDel").addEventListener("click", function(e) {
            deleteForm.classList.add("hidden");
        })
        document.getElementById("cancelEdit").addEventListener("click", function(e) {
            editForm.classList.add("hidden");
        })

        document.getElementById("btn_create").addEventListener("click", function(e) {
            createForm.classList.remove('hidden');
        })

        document.getElementById("mahasiswa-table").addEventListener("click", function(e) {
            if (e.target.classList.contains('action-delete')) {
                // DELETE
                deleteForm.classList.remove("hidden");

                const namaMahasiswa = e.target.getAttribute("data-mahasiswa-name");
                document.getElementById("deleteNamePrev").innerText = namaMahasiswa;

                const idMahasiswa = e.target.getAttribute("data-mahasiswa-id");
                deleteForm.action = '/dashboard/mahasiswa/' + idMahasiswa;
            } else if (e.target.classList.contains('action-show')) {
                // SHOW
                const idMahasiswa = e.target.getAttribute("data-mahasiswa-id");
                window.location.assign('/dashboard/mahasiswa/' + idMahasiswa)
            } else if (e.target.classList.contains('action-edit')) {
                // UPDATE
                const idMahasiswa = e.target.getAttribute("data-mahasiswa-id");
                const nimMahasiswa = e.target.getAttribute("data-mahasiswa-nim");
                const namaMahasiswa = e.target.getAttribute("data-mahasiswa-nama");
                const angkatanMahasiswa = e.target.getAttribute("data-mahasiswa-angkatan");
                const activeMahasiswa = e.target.getAttribute("data-mahasiswa-active");

                document.getElementById("editId").value = idMahasiswa;
                document.getElementById("editNim").value = nimMahasiswa;
                document.getElementById("editNama").value = namaMahasiswa;
                document.getElementById("editAngkatan").value = angkatanMahasiswa;
                document.getElementById("editAktif").checked = activeMahasiswa == '1';

                editForm.action = '/dashboard/mahasiswa/' + idMahasiswa;
                editForm.classList.remove('hidden');
            }
        })

        @if ($errors->any())
            createForm.classList.remove('hidden');
        @endif

    </script>
@endsection
