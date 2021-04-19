@extends('dashboard.layout')

@section('titleheader')
    Dashboard Kelas
@endsection

@section('content')

    <div>
        <form id="createForm" action="{{ route('dashboard.kelas.store') }}" class="hidden" name="createForm"
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
                        <label for="title" class="text-sm leading-7 text-gray-600">Mata Kuliah</label>
                        <select name="matkuls_id" id=""
                            class=" w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option disabled selected>-</option>

                            @foreach ($matkuls as $it)
                                <option value="{{$it->id}}">{{$it->title}}</option>
                            @endforeach
                        </select>

                        @error('matkuls_id')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="key" class="text-sm leading-7 text-gray-600">Nama Kelas</label>
                        <input type="text" name="class_name"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('class_name')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="title" class="text-sm leading-7 text-gray-600">Pembimbing</label>
                        <select name="dosens_id" id=""
                            class=" w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option disabled selected>-</option>

                            @foreach ($dosens as $it)
                                <option value="{{$it->id}}">{{$it->nama}}</option>
                            @endforeach
                        </select>

                        @error('dosens_id')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="aktif" class="inline-flex items-center">
                            <input id="aktif" type="checkbox" checked
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="is_ongoing">
                            <span class="ml-2 text-sm text-gray-600">Berlangsung</span>
                        </label>

                        @error('is_ongoing')
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
            <x-dialogs.simple-gray-footer title="Hapus Dosen">
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
                        Hapus dosen dengan nama <b id="deleteNamaPrev"></b>?
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
            <x-dialogs.simple-gray-footer title="Edit Dosen">
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
                        <label for="title" class="text-sm leading-7 text-gray-600">Nama</label>
                        <input id="editNama" type="text" name="nama"
                            class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">

                        @error('nama')
                            <span class="block pt-2 text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-4 ">
                        <label for="key" class="text-sm leading-7 text-gray-600">NIDN</label>
                        <input id="editNidn" type="number" name="nidn"
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
                        <input id="editEmail" type="email" name="email"
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
                            <input id="editAktif" type="checkbox"
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

        <div id="kelas-table">
            <livewire:kelas-dt />
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

        document.getElementById("kelas-table").addEventListener("click", function(e) {
            if (e.target.classList.contains('action-delete')) {
                // DELETE
                deleteForm.classList.remove("hidden");

                const _nama = e.target.getAttribute("data-dosen-nama");
                document.getElementById("deleteNamaPrev").innerText = _nama;

                const _id = e.target.getAttribute("data-dosen-id");
                deleteForm.action = '/dashboard/dosen/' + _id;
            } else if (e.target.classList.contains('action-show')) {
                // SHOW
                const _id = e.target.getAttribute("data-kelas-id");
                window.location.assign('/dashboard/kelas/' + _id)
            } else if (e.target.classList.contains('action-edit')) {
                // UPDATE
                const _id = e.target.getAttribute("data-dosen-id");
                const _nama = e.target.getAttribute("data-dosen-nama");
                const _nidn = e.target.getAttribute("data-dosen-nidn");
                const _email = e.target.getAttribute("data-dosen-email");
                const _active = e.target.getAttribute("data-dosen-active");

                document.getElementById("editNama").value = _nama;
                document.getElementById("editNidn").value = _nidn;
                document.getElementById("editEmail").value = _email;
                document.getElementById("editAktif").checked = _active == '1';

                editForm.action = '/dashboard/dosen/' + _id;
                editForm.classList.remove('hidden');
            }
        })

        @if ($errors->any())
            createForm.classList.remove('hidden');
        @endif

    </script>
@endsection
