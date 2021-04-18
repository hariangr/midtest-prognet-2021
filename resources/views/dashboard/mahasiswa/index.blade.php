@extends('dashboard.layout')

@section('titleheader')
    Tampilan Mahasiswa
@endsection

@section('content')
    <div>
        <form id="createForm" class="hidden" name="deleteForm" method="POST">
            <x-dialogs.simple-gray-footer title="Hapus Anggota Himpunan">
                <x-slot name="buttons">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Tambah
                    </button>

                    <button id="cancelAdd" type="button"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </x-slot>

                <x-slot name="description">
                    <p class="text-sm text-gray-500">
                        Hapus anggota himpunan <b id="deleteUsernamePrev"></b> dengan jabatan
                        <b id="deleteJabatanPrev"></b>?. Menghapus akan dilakukan secara
                        <i>hard
                            delete</i>
                        sehingga
                        data tidak dapat dikembalikan lagi
                    </p>
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

    <div id="mahasiswa-table">
        <livewire:mahasiswa-dt />
    </div>

    <script>
        const createForm = document.getElementById("createForm");
        const mahasiswaTable = document.getElementById("mahasiswa-table");

        document.getElementById("cancelAdd").addEventListener("click", function(e) {
            createForm.classList.add("hidden");
        })

        mahasiswaTable.addEventListener("click", function(e) {
            if (e.target.classList.contains('action-delete')) {
                console.log("hasb");
                // dialogConfirm.classList.remove("hidden");

                // const paymentId = e.target.getAttribute("data-payment-id");
                // document.getElementById("payment_id_hidden_form").value = paymentId;
            } else if (e.target.classList.contains('action-show')) {
                createForm.classList.remove('hidden');
            }
        })

    </script>
@endsection
