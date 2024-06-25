@extends('layout.user')
<<<<<<< Updated upstream
@section('title', 'Pengajuan - EduPortal')
=======
<<<<<<< HEAD
@section('title', 'Beasiswa - EduPortal')
=======
@section('title', 'Pengajuan - EduPortal')
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes

@section('content')
    <div class="w-full xl:w-full px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Data Per Periode</h3>
                    </div>
                </div>
                <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                    <div class="flex justify-between items-center">
                        <input type="text" id="searchInput" placeholder="search Periode..." class="bg-white border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 w-56 shadow-xl">
=======
>>>>>>> Stashed changes
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold text-base text-blueGray-700">Data Pengajuan</h3>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center">
                        <button id="open-modal" class="block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            TAMBAH
                        </button>
                    </div>
                    <div class="relative flex items-center">
                        <input type="text" id="searchInput" placeholder="search pengajuan..." class="bg-white border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 w-56 shadow-xl">
                        <button id="searchButton" class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-md px-4 py-2 ml-2">Cari</button>
<<<<<<< Updated upstream
=======
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto p-10">
                <table class="items-center bg-transparent w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
                            Periode
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Tanggal Awal
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Tanggal Berakhir
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
                    @foreach($getPeriode as $p)
                        @if($p->fakultas_id == Auth::user()->fakultas_id)
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                    {{ $p->nama_periode }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                    {{ $p->tanggal_awal }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                    {{ $p->tanggal_berakhir }}
                                </td>
                                <td>
                                    @if($p->is_submitted)
                                        <a href="#" data-periode-id="{{ $p->periode_id }}" class="detail-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                            Detail
                                        </a>
                                    @else
                                        <button data-periode-id="{{ $p->periode_id }}" class="ajukan-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                            Ajukan
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endif
=======
>>>>>>> Stashed changes
                    @foreach($pengajuan as $p)
                        <tr>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                <a href="{{ route('user.pengajuan.show', $p->pengajuan_id) }}">{{ $p->pengajuan_id }}</a>
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
                                <a href="#" class="text-blue-500 hover:text-blue-700">Detail</a>
                            </td>
                        </tr>
<<<<<<< Updated upstream
=======
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
<<<<<<< Updated upstream
                    {{ $pengajuan->links() }}
=======
<<<<<<< HEAD
=======
                    {{ $pengajuan->links() }}
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    <!-- Modal -->
    <div id="applicationModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <form id="crud-form" class="grid gap-4 mb-4 grid-cols-2 p-6" method="POST" action="{{ route('user.pengajuan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-2">
                        <label for="nrp" class="block mb-2 mt-4 text-sm font-medium text-gray-900">NRP</label>
                        <input type="text" id="nrp" name="nrp" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter NRP">
                    </div>
                    <div class="col-span-1">
                        <label for="jenis_beasiswa_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Jenis Beasiswa</label>
                        <select id="jenis_beasiswa_id" name="jenis_beasiswa_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                            <option value="">Select Jenis Beasiswa</option>
                            @foreach($jenisBeasiswa as $jenis)
                                <option value="{{ $jenis->jenis_beasiswa_id }}">{{ $jenis->nama_jenis_beasiswa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="periode_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Periode</label>
                        <select id="periode_id" name="periode_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" readonly>
                            <option value="">Select Periode</option>
                            @foreach($periodes as $periode)
                                <option value="{{ $periode->periode_id }}">{{ $periode->nama_periode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="tanggal_pengajuan" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Tanggal Pengajuan</label>
                        <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <div class="col-span-1">
                        <label for="IPK" class="block mb-2 mt-4 text-sm font-medium text-gray-900">IPK</label>
                        <input type="text" id="IPK" name="IPK" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter IPK">
                    </div>
                    <div class="col-span-1">
                        <label for="portofolio" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Portofolio</label>
                        <input type="text" id="portofolio" name="portofolio" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Portofolio">
                    </div>
                    <div class="col-span-1">
                        <label for="dokumenPKM" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen PKM</label>
                        <input type="file" id="dokumenPKM" name="dokumenPKM" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <div class="col-span-1">
                        <label for="dokumenTidakMenerimaBeasiswaLain" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Tidak Menerima Beasiswa Lain</label>
                        <input type="file" id="dokumenTidakMenerimaBeasiswaLain" name="dokumenTidakMenerimaBeasiswaLain" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <div class="col-span-1">
                        <label for="dokumenSertifikat" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Sertifikat<span class="text-red-400">*</span></label>
                        <input type="file" id="dokumenSertifikat" name="dokumenSertifikat" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <div class="col-span-1">
                        <label for="dokumenSKTM" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen SKTM<span class="text-red-400">*</span></label>
                        <input type="file" id="dokumenSKTM" name="dokumenSKTM" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <div class="col-span-1">
                        <label for="dokumenTagihanListrik" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Tagihan Listrik<span class="text-red-400">*</span></label>
                        <input type="file" id="dokumenTagihanListrik" name="dokumenTagihanListrik" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                    </div>
                    <p class="col-span-2 text-red-400">* Hanya untuk beasiswa tertentu</p>
                    <!-- Modal footer -->
                    <div class="flex col-span-2 justify-end pt-4">
                        <button type="button" id="cancel-button" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                            Batal
                        </button>
                        <button type="submit" id="crud-submit-button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Ajukan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ajukanButtons = document.querySelectorAll('.ajukan-button');
            const detailButtons = document.querySelectorAll('.detail-button');
            const modalForm = document.getElementById('applicationModal');
            const periodeIdInput = document.getElementById('periode_id');
            const crudForm = document.getElementById('crud-form');

            ajukanButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const periodeId = this.getAttribute('data-periode-id');
                    periodeIdInput.value = periodeId;
                    modalForm.classList.remove('hidden');
                });
            });

            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const periodeId = this.getAttribute('data-periode-id');
                    // Fetch and display detail data in the modal
                    fetch(`/user/pengajuan/${periodeId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate modal with data
                            // Show modal
                            modalForm.classList.remove('hidden');
                        });
                });
            });

            // Hide modal when clicking outside of it or on cancel button
            document.getElementById('cancel-button').addEventListener('click', function () {
                modalForm.classList.add('hidden');
            });

            modalForm.addEventListener('click', function (event) {
                if (event.target === modalForm) {
                    modalForm.classList.add('hidden');
                }
            });
=======
>>>>>>> Stashed changes
    <!-- Modal Tambah Pengajuan -->
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
                <div class="col-span-1">
                    <label for="jenis_beasiswa_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Jenis Beasiswa ID</label>
                    <input type="text" id="jenis_beasiswa_id" name="jenis_beasiswa_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Jenis Beasiswa ID">
                </div>
                <div class="col-span-1">
                    <label for="periode_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Periode ID</label>
                    <input type="text" id="periode_id" name="periode_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Periode ID">
                </div>
                <div class="col-span-1">
                    <label for="tanggal_pengajuan" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Tanggal Pengajuan</label>
                    <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="IPK" class="block mb-2 mt-4 text-sm font-medium text-gray-900">IPK</label>
                    <input type="text" id="IPK" name="IPK" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter IPK">
                </div>
                <div class="col-span-1">
                    <label for="portofolio" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Portofolio</label>
                    <input type="text" id="portofolio" name="portofolio" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Portofolio">
                </div>
                <div class="col-span-1">
                    <label for="dokumenPKM" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen PKM</label>
                    <input type="file" id="dokumenPKM" name="dokumenPKM" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="dokumenTidakMenerimaBeasiswaLain" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Tidak Menerima Beasiswa Lain</label>
                    <input type="file" id="dokumenTidakMenerimaBeasiswaLain" name="dokumenTidakMenerimaBeasiswaLain" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="dokumenSertifikat" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Sertifikat<span class="text-red-400">*</span></label>
                    <input type="file" id="dokumenSertifikat" name="dokumenSertifikat" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="dokumenSKTM" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen SKTM<span class="text-red-400">*</span></label>
                    <input type="file" id="dokumenSKTM" name="dokumenSKTM" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="dokumenTagihanListrik" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Dokumen Tagihan Listrik<span class="text-red-400">*</span></label>
                    <input type="file" id="dokumenTagihanListrik" name="dokumenTagihanListrik" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <p class="col-span-2 text-red-400">* Hanya untuk beasiswa tertentu</p>
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

            openModalButton.addEventListener('click', () => {
                crudForm.action = "{{ route('user.pengajuan.store') }}";
                crudForm.method = 'POST';
                modalTitle.textContent = 'Tambah Data Pengajuan';
                crudSubmitButton.textContent = 'Tambah';
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

            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            cancelButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
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
<<<<<<< Updated upstream
=======
>>>>>>> b6d254c1496bb6668fab03c0f76b46de9858a988
>>>>>>> Stashed changes
        });
    </script>
@endsection
