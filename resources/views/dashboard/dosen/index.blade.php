@extends('dashboard.layout')

@section('titleheader')
    Dashboard Dosen
@endsection

@section('content')

    <div>
        <form id="createForm" action="{{ route('dashboard.dosen.store') }}" class="hidden" name="createForm"
            method="POST">
            <x-dialogs.simple-gray-footer title="Tambah Dosen">
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
                        <label for="title" class="text-sm leading-7 text-gray-600">Nama</label>
                        <input type="text" name="nama"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('nama')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="key" class="text-sm leading-7 text-gray-600">NIDN</label>
                        <input type="number" name="nidn"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        <small><i>Misal: 0027027509</i></small>

                        @error('nidn')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="key" class="text-sm leading-7 text-gray-600">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        <small><i>Misal: nama@example.com</i></small>

                        @error('email')
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
            <x-dialogs.simple-gray-footer title="Hapus Mata Kuliah">
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
                        Hapus mata kuliah dengan judul <b id="deleteTitlePrev"></b>?
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
            <x-dialogs.simple-gray-footer title="Edit Mata Kuliah">
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
                    <div class="relative mb-4 ">
                        <label for="title" class="text-sm leading-7 text-gray-600">Nama Matkul</label>
                        <input id="editTitle" type="text" name="title"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('title')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="key" class="text-sm leading-7 text-gray-600">Kode Matkul</label>
                        <input id="editKey" type="text" name="key"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        <small><i>Misal: TIC18</i></small>

                        @error('key')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <div class="relative mb-4 flex flex-col">
                            <label class="text-sm leading-7 text-gray-600">Konsentrasi</label>
                            <select id="editConcentration" name="concentration" id=""
                                class=" w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                                <option value="tib">Manajemen Basis Data</option>
                                <option value="tic">Teknologi Cerdas</option>
                                <option value="mkj">Jaringan</option>
                                <option value="mb">Manajemen</option>

                            </select>
                        </div>

                        @error('concentration')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="relative mb-4 ">
                        <label for="aktif" class="inline-flex items-center">
                            <input id="editAktif" type="checkbox" checked
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

        <div id="dosen-table">
            <livewire:dosen-dt />
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

        document.getElementById("matkul-table").addEventListener("click", function(e) {
            if (e.target.classList.contains('action-delete')) {
                // DELETE
                deleteForm.classList.remove("hidden");

                const namaMatkul = e.target.getAttribute("data-matkul-title");
                document.getElementById("deleteTitlePrev").innerText = namaMatkul;

                const _id = e.target.getAttribute("data-matkul-id");
                deleteForm.action = '/dashboard/matkul/' + _id;
            } else if (e.target.classList.contains('action-show')) {
                // SHOW
                const _id = e.target.getAttribute("data-matkul-id");
                window.location.assign('/dashboard/matkul/' + _id)
            } else if (e.target.classList.contains('action-edit')) {
                // UPDATE
                const _id = e.target.getAttribute("data-matkul-id");
                const _title = e.target.getAttribute("data-matkul-title");
                const _key = e.target.getAttribute("data-matkul-key");
                const _concentration = e.target.getAttribute("data-matkul-concentration");
                const _active = e.target.getAttribute("data-matkul-active");

                document.getElementById("editTitle").value = _title;
                document.getElementById("editKey").value = _key;
                document.getElementById("editConcentration").value = _concentration;
                document.getElementById("editAktif").checked = _active == '1';

                editForm.action = '/dashboard/matkul/' + _id;
                editForm.classList.remove('hidden');
            }
        })

        @if ($errors->any())
            createForm.classList.remove('hidden');
        @endif

    </script>
@endsection
