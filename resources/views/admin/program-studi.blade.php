@extends('layout.admin')
@section('title', 'Program Studi - EduPortal')

@section('content')
    <div class="w-full xl:w-full px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Data Program Studi</h3>
                    </div>
                </div>
                <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                    <div class="flex justify-between items-center">
                        <button id="open-modal" class="block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            TAMBAH
                        </button>
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="search program studi..." class="bg-white border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 w-56 shadow-xl">
                            <button id="searchButton" class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-md px-4 py-2 ml-2">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto p-10">
                <table class="items-center bg-transparent w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Program Studi ID
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Nama Program Studi
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Fakultas
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prodi as $p)
                        <tr>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->program_studi_id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->nama_program_studi}}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $p->fakultas->nama_fakultas }}
                            </td>
                            <td>
                                <a href="#" class="edit-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                   data-prodi-id="{{ $p->program_studi_id }}"
                                   data-prodi-nama="{{ $p->nama_program_studi }}"
                                   data-prodi-fakultas="{{ $p->fakultas_id }}"
                                   data-action="{{ route('admin.program-studi.update', $p->program_studi_id) }}">Edit</a>
                                <button class="delete-button bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        data-prodi-id="{{ $p->program_studi_id }}"
                                        data-prodi-nama="{{ $p->nama_program_studi }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $prodi->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Tambah Data Program Studi</h3>
                <button id="close-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="crud-form" class="grid gap-4 mb-4 grid-cols-2" method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="program_studi_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Program Studi ID</label>
                    <input type="text" id="program_studi_id" name="program_studi_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Program Studi ID">
                </div>
                <div class="col-span-2">
                    <label for="nama_program_studi" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Nama Program Studi</label>
                    <input type="text" id="nama_program_studi" name="nama_program_studi" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Nama Program Studi">
                </div>
                <div class="col-span-2">
                    <label for="fakultas" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Fakultas</label>
                    <select id="fakultas" name="fakultas_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Fakultas</option>
                        @foreach($fakultas as $f)
                            <option value="{{ $f->fakultas_id }}">{{ $f->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Modal footer -->
                <div class="flex col-span-2 justify-end pt-4">
                    <button type="button" id="cancel-button" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                        Batal
                    </button>
                    <button type="submit" id="crud-submit-button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="confirm-delete-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h3>
                <button id="close-delete-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <p class="mb-4">Apakah Anda yakin ingin menghapus program studi <b><span id="delete-prodi-nama"></span></b> ?</p>
            <form id="delete-form" method="POST">
                @csrf
                @method('DELETE')
                <!-- Modal footer -->
                <div class="flex justify-end pt-4">
                    <button type="button" id="cancel-delete" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                        Batal
                    </button>
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Alert Notification -->
    @if(session('success'))
        <div id="success-alert" class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="close-alert float-right text-2xl leading-none font-semibold text-green-700" onclick="document.getElementById('success-alert').style.display='none'">&times;</button>
        </div>
    @endif

    @if(session('error'))
        <div id="error-alert" class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <button type="button" class="close-alert float-right text-2xl leading-none font-semibold text-red-700" onclick="document.getElementById('error-alert').style.display='none'">&times;</button>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-button');
            const deleteButtons = document.querySelectorAll('.delete-button');
            const openModalButton = document.getElementById('open-modal');
            const closeModalButton = document.getElementById('close-modal');
            const modal = document.getElementById('crud-modal');
            const modalTitle = document.getElementById('modal-title');
            const crudForm = document.getElementById('crud-form');
            const crudSubmitButton = document.getElementById('crud-submit-button');
            const cancelButton = document.getElementById('cancel-button');
            const programStudiId = document.getElementById('program_studi_id');
            const namaProgramStudi = document.getElementById('nama_program_studi');
            const fakultasSelect = document.getElementById('fakultas');

            const deleteModal = document.getElementById('confirm-delete-modal');
            const closeDeleteModalButton = document.getElementById('close-delete-modal');
            const cancelDeleteButton = document.getElementById('cancel-delete');
            const deleteForm = document.getElementById('delete-form');
            const deleteProdiNama = document.getElementById('delete-prodi-nama');

            openModalButton.addEventListener('click', () => {
                crudForm.action = "{{ route('admin.program-studi.store') }}";
                crudForm.method = 'POST';
                modalTitle.textContent = 'Tambah Data Program Studi';
                crudSubmitButton.textContent = 'Tambah';
                programStudiId.readOnly = false;
                programStudiId.value = '';
                namaProgramStudi.value = '';
                fakultasSelect.value = '';
                modal.classList.remove('hidden');
            });

            editButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const id = button.getAttribute('data-prodi-id');
                    const nama = button.getAttribute('data-prodi-nama');
                    const fakultasId = button.getAttribute('data-prodi-fakultas');
                    const action = button.getAttribute('data-action');

                    crudForm.action = action;
                    crudForm.method = 'POST';
                    crudForm.insertAdjacentHTML('beforeend', '@method("PUT")');
                    modalTitle.textContent = 'Edit Data Program Studi';
                    crudSubmitButton.textContent = 'Simpan';
                    programStudiId.readOnly = true;
                    programStudiId.value = id;
                    namaProgramStudi.value = nama;
                    fakultasSelect.value = fakultasId;
                    modal.classList.remove('hidden');
                });
            });

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const id = button.getAttribute('data-prodi-id');
                    const nama = button.getAttribute('data-prodi-nama');
                    const action = "{{ route('admin.program-studi.destroy', '') }}/" + id;

                    deleteForm.action = action;
                    deleteProdiNama.textContent = nama;
                    deleteModal.classList.remove('hidden');
                });
            });

            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            cancelButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            closeDeleteModalButton.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
            });

            cancelDeleteButton.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
            });

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });

            deleteModal.addEventListener('click', (event) => {
                if (event.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });

            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');
            const rows = document.querySelectorAll('tbody tr');

            function filterRows() {
                const searchTerm = searchInput.value.toLowerCase().trim();

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let found = false;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchButton.addEventListener('click', filterRows);
            searchInput.addEventListener('input', filterRows);

            setTimeout(function () {
                const successAlert = document.getElementById('success-alert');
                const errorAlert = document.getElementById('error-alert');
                if (successAlert) {
                    successAlert.style.display = 'none';
                }
                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
            }, 4000);
        });
    </script>
@endsection
