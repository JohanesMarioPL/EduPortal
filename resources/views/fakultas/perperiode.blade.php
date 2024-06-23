@extends('layout.fakultas')
@section('title', 'Beasiswa - EduPortal')

@section('content')
    <div class="w-full xl:w-full px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Data Beasiswa</h3>
                    </div>
                </div>
                <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                    <div class="flex justify-between items-center">
                        <input type="text" id="searchInput" placeholder="search beasiswa..." class="bg-white border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 w-56 shadow-xl">
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
                    @foreach($getPengajuan as $p)
                        @if($p->periode_id == $periode_id)
                            @if($p->status_pengajuan == 'disetujui_program_studi')
                                <tr>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                        {{ $p->user->nrp }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                        {{ $p->user->nama}}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                        {{ $p->IPK }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                        {{ $p->user->prodi->nama_program_studi }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                        {{ $p->beasiswa->nama_jenis_beasiswa }}
                                    </td>
                                    <td>
                                        <button class="detail-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                data-pengajuan-id="{{ $p->pengajuan_id }}"
                                                data-jenis-beasiswa-id="{{ $p->jenis_beasiswa_id }}"
                                                data-nrp="{{ $p->nrp }}"
                                                data-periode-id="{{ $p->periode_id }}"
                                                data-tanggal-pengajuan="{{ $p->tanggal_pengajuan }}"
                                                data-status-pengajuan="{{ $p->status_pengajuan }}"
                                                data-ipk="{{ $p->IPK }}"
                                                data-portofolio="{{ $p->portofolio }}"
                                                data-action="{{ route('fakultas.perperiode.approval', $p->pengajuan_id) }}">
                                            Detail
                                        </button>
                                        <button class="accept-button bg-green-500 text-white active:bg-green-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                data-pengajuan-id="{{ $p->pengajuan_id }}">
                                            Terima
                                        </button>
                                        <button class="reject-button bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                data-pengajuan-id="{{ $p->pengajuan_id }}">
                                            Tolak
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4"></div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Periode -->
    <div id="crud-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Detail Data Pengajuan</h3>
                <button id="close-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="crud-form" class="grid gap-4 mb-4 grid-cols-2" method="POST">
                @csrf
                <input type="hidden" name="_method" id="form-method">
                <input type="hidden" name="action" id="form-action">
                <div class="col-span-2">
                    <label for="pengajuan_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Pengajuan ID</label>
                    <input type="text" id="pengajuan_id" name="pengajuan_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter NRP" readonly>
                </div>
                <div class="col-span-2">
                    <label for="jenis_beasiswa_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Jenis Beasiswa</label>
                    <select id="jenis_beasiswa_id" name="jenis_beasiswa_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" disabled>
                        @foreach($getBeasiswa as $b)
                            <option value="{{ $b->jenis_beasiswa_id }}">{{ $b->nama_jenis_beasiswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="nrp" class="block mb-2 mt-4 text-sm font-medium text-gray-900">NRP</label>
                    <input type="text" id="nrp" name="nrp" class="border border-gray-300
                    rounded-lg px-3 py-2 w-full" placeholder="Enter NRP" readonly>
                </div>
                <div class="col-span-1">
                    <label for="periode_id" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Periode</label>
                    <select id="periode_id" name="periode_id" class="border border-gray-300 rounded-lg px-3 py-2 w-full" disabled>
                        @foreach($getPeriode as $per)
                            <option value="{{ $per->periode_id }}">{{ $per->nama_periode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="tanggal_pengajuan" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Tanggal Pengajuan</label>
                    <input type="text" id="tanggal_pengajuan" name="tanggal_pengajuan" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Tanggal Pengajuan" readonly>
                </div>
                <div class="col-span-2">
                    <label for="status_pengajuan" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Status Pengajuan</label>
                    <select id="status_pengajuan" name="status_pengajuan" class="border border-gray-300 rounded-lg px-3 py-2 w-full" disabled>
                        <option value="disetujui_fakultas">Disetujui Fakultas</option>
                        <option value="ditolak_fakultas">Ditolak Fakultas</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="IPK" class="block mb-2 mt-4 text-sm font-medium text-gray-900">IPK</label>
                    <input type="text" id="IPK" name="IPK" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter IPK" readonly>
                </div>
                <div class="col-span-1">
                    <label for="portofolio" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Portofolio</label>
                    <input type="text" id="portofolio" name="portofolio" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter Portofolio" readonly>
                </div>
            </form>
        </div>
    </div>

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
            const detailButtons = document.querySelectorAll('.detail-button');
            const acceptButtons = document.querySelectorAll('.accept-button');
            const rejectButtons = document.querySelectorAll('.reject-button');
            const closeModalButton = document.getElementById('close-modal');
            const modal = document.getElementById('crud-modal');
            const modalTitle = document.getElementById('modal-title');
            const crudForm = document.getElementById('crud-form');
            const pengajuanId = document.getElementById('pengajuan_id');
            const nrp = document.getElementById('nrp');
            const jenisBeasiswaId = document.getElementById('jenis_beasiswa_id');
            const periodeId = document.getElementById('periode_id');
            const tanggalPengajuan = document.getElementById('tanggal_pengajuan');
            const statusPengajuan = document.getElementById('status_pengajuan');
            const ipk = document.getElementById('IPK');
            const portofolio = document.getElementById('portofolio');

            detailButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const pengajuanIdValue = button.getAttribute('data-pengajuan-id');
                    const jenisBeasiswaIdValue = button.getAttribute('data-jenis-beasiswa-id');
                    const nrpValue = button.getAttribute('data-nrp');
                    const periodeIdValue = button.getAttribute('data-periode-id');
                    const tanggalPengajuanValue = button.getAttribute('data-tanggal-pengajuan');
                    const statusPengajuanValue = button.getAttribute('data-status-pengajuan');
                    const ipkValue = button.getAttribute('data-ipk');
                    const portofolioValue = button.getAttribute('data-portofolio');

                    // Set form action and method
                    crudForm.action = button.getAttribute('data-action');
                    crudForm.method = 'POST';
                    document.getElementById('form-method').value = 'PUT';

                    // Set modal title
                    modalTitle.textContent = 'Detail Data Pengajuan';

                    // Populate form fields with data from button attributes
                    pengajuanId.value = pengajuanIdValue;
                    nrp.value = nrpValue;
                    jenisBeasiswaId.value = jenisBeasiswaIdValue;
                    periodeId.value = periodeIdValue;
                    tanggalPengajuan.value = tanggalPengajuanValue;
                    statusPengajuan.value = statusPengajuanValue;
                    ipk.value = ipkValue;
                    portofolio.value = portofolioValue;

                    modal.classList.remove('hidden');
                });
            });

            acceptButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const pengajuanId = button.getAttribute('data-pengajuan-id');
                    const actionUrl = "{{ route('fakultas.periode.updateStatus', '') }}/" + pengajuanId;

                    fetch(actionUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ status_pengajuan: 'disetujui_fakultas' })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Failed to update status');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                });
            });

            rejectButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const pengajuanId = button.getAttribute('data-pengajuan-id');
                    const actionUrl = "{{ route('fakultas.periode.updateStatus', '') }}/" + pengajuanId;

                    fetch(actionUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ status_pengajuan: 'ditolak_fakultas' })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Failed to update status');
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

            const searchInput = document.getElementById('searchInput');
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
