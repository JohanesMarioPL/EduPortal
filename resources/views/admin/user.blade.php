@extends('layout.admin')
@section('title', 'User - EduPortal')

@section('content')
    <div class="w-full xl:w-full px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Data User</h3>
                    </div>
                </div>
            </div>
            <div class="rounded-t mb-0 px-4 py-3 bg-blueGray-50">
                <div class="flex justify-between items-center">
                    <button id="open-modal" class="block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        TAMBAH
                    </button>
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="search user..." class="bg-white border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 w-56 shadow-xl">
                        <button id="searchButton" class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-md px-4 py-2 ml-2">Cari</button>
                    </div>
                </div>
            </div>

            <div class="block w-full overflow-x-auto p-10">
                <table class="items-center bg-transparent w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            NIK/NRP
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Username
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Nama
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Email
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Program Studi
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Fakultas
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Role
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $user->nrp }}
                            </th>
                            <th
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                {{ $user->username}}
                            </th>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{ $user->nama }}
                            </td>
                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $user->email }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @foreach($getProdi as $prodi)
                                    @if($prodi->program_studi_id == $user->program_studi_id)
                                        {{ $prodi->nama_program_studi }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @foreach($getFakultas as $fakultas)
                                    @if($fakultas->fakultas_id == $user->fakultas_id)
                                        {{ $fakultas->nama_fakultas }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @foreach($getRole as $role)
                                    @if($role->role_id == $user->role_id)
                                        {{ $role->nama_role }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                            <td>
                                <a href="#"
                                   class="edit-button bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                   data-user-id="{{ $user->nrp }}"
                                   data-user-username="{{ $user->username }}"
                                   data-user-nama="{{ $user->nama }}"
                                   data-user-email="{{ $user->email }}"
                                   data-user-program-studi="{{ $user->program_studi_id }}"
                                   data-user-fakultas="{{ $user->fakultas_id }}"
                                   data-user-role="{{ $user->role_id }}"
                                   data-action="{{ route('admin.users.update', $user->nrp) }}">
                                    Edit
                                </a>
                            <button class="delete-button bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        data-user-id="{{ $user->nrp }}"
                                        data-user-name="{{ $user->nama }}"
                                        data-action="{{ route('admin.users.destroy', $user->nrp) }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

{{--Modal Tambah User--}}
    <!-- Main modal -->
    <div id="crud-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Tambah Data User</h3>
                <button id="close-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="grid gap-4 mb-4 grid-cols-2" action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="col-span-1">
                    <label for="nrp" class="block mb-2 mt-4 text-sm font-medium text-gray-900">NRP</label>
                    <input type="text" id="nrp" name="nrp" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter NRP">
                </div>
                <div class="col-span-1">
                    <label for="username" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Username</label>
                    <input type="text" id="username" name="username" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter username">
                </div>
                <div class="col-span-2">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" id="nama" name="nama" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter nama">
                </div>
                <div class="col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 rounded-lg px-3 py-2 w-full" placeholder="Enter email">
                </div>
                <div class="col-span-1">
                    <label for="program-studi" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Program Studi</label>
                    <select id="program-studi" name="program_studi" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Program Studi</option>
                        @foreach($getProdi as $prodi)
                            <option value="{{ $prodi->program_studi_id }}">{{ $prodi->nama_program_studi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="fakultas" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Fakultas</label>
                    <select id="fakultas" name="fakultas" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Fakultas</option>
                        @foreach($getFakultas as $fakultas)
                            <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select id="role" name="role" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Role</option>
                        @foreach($getRole as $role)
                            <option value="{{ $role->role_id }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                </div>

            <!-- Modal footer -->
            <div class="flex pt-4">
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah
                </button>
            </div>
            </form>
        </div>
    </div>
{{--End Modal Tambah User--}}

{{-- Modal Delete --}}
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
            <p class="mb-4">Apakah Anda yakin ingin menghapus pengguna <b><span id="user-name"></span></b> ?</p>
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
{{--End Modal Delete--}}

{{--Modal Edit User--}}
    <!-- Modal Edit User -->
    <div id="edit-modal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal content -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Edit Data User</h3>
                <button id="close-edit-modal" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center cursor-pointer">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-form" method="POST" class="grid gap-4 mb-4 grid-cols-2">
                @csrf
                @method('PUT')
                <div class="col-span-1">
                    <label for="edit-nrp" class="block mb-2 mt-4 text-sm font-medium text-gray-900">NRP</label>
                    <input type="text" id="edit-nrp" name="nrp" class="border border-gray-300 rounded-lg px-3 py-2 w-full" readonly>
                </div>
                <div class="col-span-1">
                    <label for="edit-username" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Username</label>
                    <input type="text" id="edit-username" name="username" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="edit-nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" id="edit-nama" name="nama" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-1">
                    <label for="edit-email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="edit-email" name="email" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                </div>
                <div class="col-span-2">
                    <label for="edit-program-studi" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Program Studi</label>
                    <select id="edit-program-studi" name="program_studi" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Program Studi</option>
                        @foreach($getProdi as $prodi)
                            <option value="{{ $prodi->program_studi_id }}">{{ $prodi->nama_program_studi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="edit-fakultas" class="block mb-2 mt-4 text-sm font-medium text-gray-900">Fakultas</label>
                    <select id="edit-fakultas" name="fakultas" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Fakultas</option>
                        @foreach($getFakultas as $fakultas)
                            <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="edit-role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select id="edit-role" name="role" class="border border-gray-300 rounded-lg px-3 py-2 w-full">
                        <option value="">Pilih Role</option>
                        @foreach($getRole as $role)
                            <option value="{{ $role->role_id }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Modal footer -->
                <div class="flex col-span-2 justify-end pt-4">
                    <button type="button" id="cancel-edit" class="text-gray-700 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                        Batal
                    </button>
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{--End Modal Edit User--}}

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
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const openModalButton = document.getElementById('open-modal');
            const closeModalButton = document.getElementById('close-modal');
            const modal = document.getElementById('crud-modal');

            openModalButton.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // To close the modal when clicking outside of it
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');
            const deleteModal = document.getElementById('confirm-delete-modal');
            const closeDeleteModalButton = document.getElementById('close-delete-modal');
            const cancelDeleteButton = document.getElementById('cancel-delete');
            const deleteForm = document.getElementById('delete-form');
            const userNameSpan = document.getElementById('user-name');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const userId = button.getAttribute('data-user-id');
                    const userName = button.getAttribute('data-user-name');
                    const action = button.getAttribute('data-action');
                    deleteForm.action = action;
                    userNameSpan.textContent = userName;
                    deleteModal.classList.remove('hidden');
                });
            });

            closeDeleteModalButton.addEventListener('click', function () {
                deleteModal.classList.add('hidden');
            });

            cancelDeleteButton.addEventListener('click', function () {
                deleteModal.classList.add('hidden');
            });

            deleteModal.addEventListener('click', function (event) {
                if (event.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-button');
            const editModal = document.getElementById('edit-modal');
            const closeEditModalButton = document.getElementById('close-edit-modal');
            const cancelEditButton = document.getElementById('cancel-edit');
            const editForm = document.getElementById('edit-form');
            const editNrp = document.getElementById('edit-nrp');
            const editUsername = document.getElementById('edit-username');
            const editNama = document.getElementById('edit-nama');
            const editEmail = document.getElementById('edit-email');
            const editProgramStudi = document.getElementById('edit-program-studi');
            const editFakultas = document.getElementById('edit-fakultas');
            const editRole = document.getElementById('edit-role');

            editButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const userId = button.getAttribute('data-user-id');
                    const userUsername = button.getAttribute('data-user-username');
                    const userName = button.getAttribute('data-user-nama');
                    const userEmail = button.getAttribute('data-user-email');
                    const userProgramStudi = button.getAttribute('data-user-program-studi');
                    const userFakultas = button.getAttribute('data-user-fakultas');
                    const userRole = button.getAttribute('data-user-role');
                    const action = button.getAttribute('data-action');

                    editForm.action = action;
                    editNrp.value = userId;
                    editUsername.value = userUsername;
                    editNama.value = userName;
                    editEmail.value = userEmail;
                    editProgramStudi.value = userProgramStudi;
                    editFakultas.value = userFakultas;
                    editRole.value = userRole;

                    editModal.classList.remove('hidden');
                });
            });

            closeEditModalButton.addEventListener('click', function () {
                editModal.classList.add('hidden');
            });

            cancelEditButton.addEventListener('click', function () {
                editModal.classList.add('hidden');
            });

            editModal.addEventListener('click', function (event) {
                if (event.target === editModal) {
                    editModal.classList.add('hidden');
                }
            });
        });

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

    </script>

@endsection
