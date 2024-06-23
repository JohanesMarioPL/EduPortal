@extends('layout.prodi')
@section('title', 'Pengajuan Program Studi - EduPortal')

@section('content')
    <div class="w-full xl:w-full px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Daftar Pengajuan Beasiswa</h3>
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto p-10">
                <table class="items-center bg-transparent w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            NRP
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Nama
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            IPK
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Program Studi
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Jenis Beasiswa
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengajuans as $pengajuan)
                        <tr>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $pengajuan->user->nrp }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $pengajuan->user->nama }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $pengajuan->IPK }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $pengajuan->user->prodi->nama_program_studi }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $pengajuan->beasiswa->nama_jenis_beasiswa }}
                            </td>
                            <td>
                                <a href="#" class="detail-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                   data-pengajuan-id="{{ $pengajuan->pengajuan_id }}"
                                   data-jenis-beasiswa-id="{{ $pengajuan->jenis_beasiswa_id }}"
                                   data-nrp="{{ $pengajuan->nrp }}"
                                   data-periode-id="{{ $pengajuan->periode_id }}"
                                   data-tanggal-pengajuan="{{ $pengajuan->tanggal_pengajuan }}"
                                   data-status-pengajuan="{{ $pengajuan->status_pengajuan }}"
                                   data-ipk="{{ $pengajuan->IPK }}"
                                   data-portofolio="{{ $pengajuan->portofolio }}"
                                   data-dokumenpkm="{{ $pengajuan->dokumenPKM }}"
                                   data-dokumenlain="{{ $pengajuan->dokumenTidakMenerimaBeasiswaLain }}"
                                   data-sertifikat="{{ $pengajuan->dokumenSertifikat }}"
                                   data-sktm="{{ $pengajuan->dokumenSKTM }}"
                                   data-listrik="{{ $pengajuan->dokumenTagihanListrik }}">
                                    Detail
                                </a>
                                <button class="approve-button bg-green-500 text-white active:bg-green-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        data-pengajuan-id="{{ $pengajuan->pengajuan_id }}">
                                    Approve
                                </button>
                                <button class="decline-button bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        data-pengajuan-id="{{ $pengajuan->pengajuan_id }}">
                                    Decline
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4"></div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Pengajuan -->
    <div id="detail-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Detail Pengajuan</h3>
                <button id="close-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="grid gap-4 mb-4 grid-cols-1 mt-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">NRP:</label>
                    <span id="nrp-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama:</label>
                    <span id="nama-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">IPK:</label>
                    <span id="ipk-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi:</label>
                    <span id="prodi-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text
                    text-gray-900">Jenis Beasiswa:</label>
                    <span id="jenis-beasiswa-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Portofolio:</label>
                    <span id="portofolio-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Dokumen PKM:</label>
                    <span id="dokumenpkm-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Dokumen Tidak Menerima Beasiswa Lain:</label>
                    <span id="dokumenlain-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Sertifikat:</label>
                    <span id="sertifikat-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">SKTM:</label>
                    <span id="sktm-detail" class="block text-sm text-gray-700"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tagihan Listrik:</label>
                    <span id="listrik-detail" class="block text-sm text-gray-700"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailButtons = document.querySelectorAll('.detail-button');
            const approveButtons = document.querySelectorAll('.approve-button');
            const declineButtons = document.querySelectorAll('.decline-button');
            const closeModalButton = document.getElementById('close-modal');
            const modal = document.getElementById('detail-modal');

            detailButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    const nrp = button.getAttribute('data-nrp');
                    const nama = button.getAttribute('data-nama');
                    const ipk = button.getAttribute('data-ipk');
                    const prodi = button.getAttribute('data-prodi');
                    const jenisBeasiswa = button.getAttribute('data-jenis-beasiswa');
                    const portofolio = button.getAttribute('data-portofolio');
                    const dokumenPKM = button.getAttribute('data-dokumenpkm');
                    const dokumenLain = button.getAttribute('data-dokumenlain');
                    const sertifikat = button.getAttribute('data-sertifikat');
                    const sktm = button.getAttribute('data-sktm');
                    const listrik = button.getAttribute('data-listrik');

                    document.getElementById('nrp-detail').textContent = nrp;
                    document.getElementById('nama-detail').textContent = nama;
                    document.getElementById('ipk-detail').textContent = ipk;
                    document.getElementById('prodi-detail').textContent = prodi;
                    document.getElementById('jenis-beasiswa-detail').textContent = jenisBeasiswa;
                    document.getElementById('portofolio-detail').textContent = portofolio;
                    document.getElementById('dokumenpkm-detail').textContent = dokumenPKM;
                    document.getElementById('dokumenlain-detail').textContent = dokumenLain;
                    document.getElementById('sertifikat-detail').textContent = sertifikat;
                    document.getElementById('sktm-detail').textContent = sktm;
                    document.getElementById('listrik-detail').textContent = listrik;

                    modal.classList.remove('hidden');
                });
            });

            approveButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const pengajuanId = button.getAttribute('data-pengajuan-id');
                    const actionUrl = "{{ route('program-studi.pengajuan.approve', '') }}/" + pengajuanId;

                    fetch(actionUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ status_pengajuan: 'disetujui_program_studi' })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Failed to approve');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                });
            });

            declineButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const pengajuanId = button.getAttribute('data-pengajuan-id');
                    const actionUrl = "{{ route('program-studi.pengajuan.approve', '') }}/" + pengajuanId;

                    fetch(actionUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ status_pengajuan: 'ditolak_program_studi' })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Failed to decline');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                });
            });

            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
