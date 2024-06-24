@extends('layout.admin')
@section('title', 'Pengajuan - EduPortal')

@section('content')
    <div class="w-full xl:w-full px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Data Pengajuan</h3>
                    </div>
                </div>
                <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                    <div class="flex justify-between items-center">
                        <button id="open-modal" class="block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            TAMBAH
                        </button>
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="search pengajuan..." class="bg-white border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 w-56 shadow-xl">
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
                            Pengajuan ID
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Jenis Beasiswa ID
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Periode ID
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Tanggal Pengajuan
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Status Pengajuan
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            IPK
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengajuan as $p)
                        <tr>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->pengajuan_id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->jenis_beasiswa_id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->periode_id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->tanggal_pengajuan }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->status_pengajuan }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $p->IPK }}
                            </td>
                            <td>
                                <a href="#"
                                   class="edit-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                   data-pengajuan-id="{{ $p->pengajuan_id }}"
                                   data-pengajuan-status="{{ $p->status_pengajuan }}"
                                   data-action="{{ route('admin.pengajuan.update', $p->pengajuan_id) }}">
                                    Edit
                                </a>
                                <button class="delete-button bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        data-pengajuan-id="{{ $p->pengajuan_id }}"
                                        data-pengajuan-status="{{ $p->status_pengajuan }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $pengajuan->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Pengajuan -->
    <div id="crud-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Tambah Data Pengajuan</h3>
                <button id="close-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="crud-form" class="grid gap-4 mb-4 grid-cols-2" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="form-method">
                <div class="col-span-2">
                    <label for="jenis_beasiswa_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Jenis Beasiswa ID</label>
                    <input type="text" id="jenis_beasiswa_id" name="jenis_beasiswa_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Jenis Beasiswa ID">
                </div>
                <div class="col-span-2">
                    <label for="periode_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Periode ID</label>
                    <input type="text" id="periode_id" name="periode_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Periode ID">
                </div>
                <div class="col-span-2">
                    <label for="tanggal_pengajuan" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Tanggal Pengajuan</label>
                    <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="IPK" class="block mb-2 mt-4 text-sm font-medium text-gray-900">IPK</label>
                    <input type="text" id="IPK" name="IPK" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter IPK">
                </div>
                <div class="col-span-2">
                    <label for="portofolio" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Portofolio</label>
                    <input type="file" id="portofolio" name="portofolio" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="dokumenPKM" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen PKM</label>
                    <input type="file" id="dokumenPKM" name="dokumenPKM" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="dokumenTidakMenerimaBeasiswaLain" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Tidak Menerima Beasiswa Lain</label>
                    <input type="file" id="dokumenTidakMenerimaBeasiswaLain" name="dokumenTidakMenerimaBeasiswaLain" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="dokumenSertifikat" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Sertifikat</label>
                    <input type="file" id="dokumenSertifikat" name="dokumenSertifikat" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="dokumenSKTM" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen SKTM</label>
                    <input type="file" id="dokumenSKTM" name="dokumenSKTM" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="dokumenTagihanListrik" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Tagihan Listrik</label>
                    <input type="file" id="dokumenTagihanListrik" name="dokumenTagihanListrik" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <!-- Modal footer -->
                <div class="flex col-span-2 justify-end pt-4">
                    <button type="button" id="cancel-button" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                        Batal
                    </button>
                    <button type="submit" id="crud-submit-button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus Pengajuan -->
    <div id="confirm-delete-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Hapus Data Pengajuan</h3>
                <button id="close-delete-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="my-4">
                <p>Apakah Anda yakin ingin menghapus pengajuan <span id="delete-pengajuan-status" class="font-bold"></span>?</p>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end pt-4">
                <button type="button" id="cancel-delete" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                    Batal
                </button>
                <form id="delete-form" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Hapus
                    </button>
                </form>
            </div>
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
            const jenisBeasiswaId = document.getElementById('jenis_beasiswa_id');
            const periodeId = document.getElementById('periode_id');
            const tanggalPengajuan = document.getElementById('tanggal_pengajuan');
            const IPK = document.getElementById('IPK');
            const portofolio = document.getElementById('portofolio');
            const dokumenPKM = document.getElementById('dokumenPKM');
            const dokumenTidakMenerimaBeasiswaLain = document.getElementById('dokumenTidakMenerimaBeasiswaLain');
            const dokumenSertifikat = document.getElementById('dokumenSertifikat');
            const dokumenSKTM = document.getElementById('dokumenSKTM');
            const dokumenTagihanListrik = document.getElementById('dokumenTagihanListrik');


            const deleteModal = document.getElementById('confirm-delete-modal');
            const closeDeleteModalButton = document.getElementById('close-delete-modal');
            const cancelDeleteButton = document.getElementById('cancel-delete');
            const deleteForm = document.getElementById('delete-form');
            const deletePengajuanStatus = document.getElementById('delete-pengajuan-status');

            openModalButton.addEventListener('click', () => {
                crudForm.action = "{{ route('admin.pengajuan.store') }}";
                crudForm.method = 'POST';
                modalTitle.textContent = 'Tambah Data Pengajuan';
                crudSubmitButton.textContent = 'Tambah';
                jenisBeasiswaId.readOnly = false;
                jenisBeasiswaId.value = '';
                periodeId.value = '';
                tanggalPengajuan.value = '';
                IPK.value = '';
                portofolio.value = '';
                dokumenPKM.value = '';
                dokumenTidakMenerimaBeasiswaLain.value = '';
                dokumenSertifikat.value = '';
                dokumenSKTM.value = '';
                dokumenTagihanListrik.value = '';
                modal.classList.remove('hidden');
            });

            editButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const id = button.getAttribute('data-pengajuan-id');
                    const status = button.getAttribute('data-pengajuan-status');
                    const action = button.getAttribute('data-action');

                    // Hapus metode PUT yang telah dimasukkan sebelumnya
                    const oldMethodInput = crudForm.querySelector('input[name="_method"]');
                    if (oldMethodInput) {
                        oldMethodInput.remove();
                    }

                    crudForm.action = action;
                    crudForm.method = 'POST';
                    crudForm.insertAdjacentHTML('beforeend', '@method("PUT")');
                    modalTitle.textContent = 'Edit Data Pengajuan';
                    crudSubmitButton.textContent = 'Simpan';
                    jenisBeasiswaId.readOnly = true;
                    jenisBeasiswaId.value = id;
                    statusPengajuan.value = status;
                    modal.classList.remove('hidden');
                });
            });

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const id = button.getAttribute('data-pengajuan-id');
                    const status = button.getAttribute('data-pengajuan-status');
                    const action = "{{ route('admin.pengajuan.destroy', '') }}/" + id;

                    // Hapus metode DELETE yang telah dimasukkan sebelumnya
                    const oldMethodInput = deleteForm.querySelector('input[name="_method"]');
                    if (oldMethodInput) {
                        oldMethodInput.remove();
                    }

                    deleteForm.action = action;
                    deleteForm.insertAdjacentHTML('beforeend', '@method("DELETE")');
                    deletePengajuanStatus.textContent = status;
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
