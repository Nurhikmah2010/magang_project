@extends('layout.header')

@section('title', 'User')

@section('main')

<style>
    .dataTables_filter {
        display: none;
    }
</style>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px; font-weight: bold;">Username</td>
                    <td id="detailusername" style="padding: 8px;"></td>
                </tr>
                <tr>
                    <td style="padding: 8px; font-weight: bold;">Email</td>
                    <td id="detailemail" style="padding: 8px;"></td>
                </tr>
                <tr>
                    <td style="padding: 8px;  font-weight: bold;">Password</td>
                    <td id="detailpassword" style="padding: 8px;"></td>
                </tr>
            </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>


{{-- Modal Tambah Start --}}
<div class="modal fade" id="tambahUserModal"  aria-labelledby="tambahUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahUserModalTitle">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="">
                    @csrf
                    <!-- Username Input -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                    </div>
                    <!-- Alamat Input -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                    </div>
                    <!-- Role Select Dropdown -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role:</label>
                        <select class="form-select" id="role" name="role">
                            @foreach ( $listrole as $role )
                            <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="tambahuser" class="btn btn-primary">Tambah User</button>
                </div>
        </div>
    </div>
</div>
{{-- Modal Tambah End --}}



<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">User</h5>
         {{-- Gadget --}}
         <div class="col-sm-12 mt-2 d-flex justify-content-between">
            <div class="d-flex gap-3">
                {{-- Search --}}
                <input id="txSearch" type="text" style="width: 250px;" class="form-control rounded-3" placeholder="Search">
            </div>
            <div class="float-end">
                <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
                   Tambah User
                </button>
            </div>
        </div>

        <div id="containerListEmployee" class="col-sm-12 mt-3">
            <table id="tablelistuser" class="table table-responsive table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($listuser as $user)
                        <tr class="align-middle">
                            <td>{{ $count++ }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->role_name }}</td>
                            <td>
                                <a class="btn btndetail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-username="{{$user->username}}" data-email="{{$user->email}}" data-password="{{$user->password}}" style="color: blue;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </a> |

                                <a data-id="{{ $user->id }}" class="btn btnhapususer" style="color: blue;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(45, 100, 237);transform: ;msFilter:;">
                                        <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path>
                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                    </svg>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>



<script>
    $(document).ready(function () {
            // Initialize DataTable
            var dataTable = $('#tablelistuser').DataTable({
                searching: true,
                ordering: true,  // Tambahkan opsi ordering
                pageLength: 10,
                lengthChange: false
            });

            // Trigger pencarian setiap kali keyup pada input
            $('#txSearch').on('keyup', function () {
                dataTable.search(this.value).draw();
            });
        });
  </script>
@include('user.tambahuserJs')
@include('user.hapususerJs')
@include('user.detailuserJs')
@endsection





