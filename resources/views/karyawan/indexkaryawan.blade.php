@extends('layout.header')

@section('title', 'User')

@section('main')

<style>
    .dataTables_filter {
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Karyawan</h5>
         {{-- Gadget --}}
         <div class="col-sm-12 mt-2 d-flex justify-content-between">
            <div class="d-flex gap-3">
                {{-- Search --}}
                <input id="txSearch" type="text" style="width: 250px;" class="form-control rounded-3" placeholder="Search">
            </div>
            <div class="float-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKaryawanModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
                    Tambah Karyawan
                </button>
            </div>
        </div>

        <div id="containerListEmployee" class="col-sm-12 mt-3">
            <table id="tablelistuser" class="table table-responsive table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Akun</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($listKaryawan as $karyawan )
                    <tr class="align-middle">
                        <td>{{ $count++ }}</td>
                        <td>{{$karyawan->nama}}</td>
                        <td>{{$karyawan->jabatan}}</td>
                        <td>{{$karyawan->departemen}}</td>
                        <td>{{$karyawan->username}}</td>
                        <td>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
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

{{-- Modal Add Karyawan --}}
<div class="modal fade" id="tambahKaryawanModal"  aria-labelledby="tambahKaryawanModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahKaryawanModalTitle">Tambah Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form id="tambahKaryawanForm">
                        <div class="mb-3">
                            <label for="namaKaryawan" class="form-label">Nama Karyawan:</label>
                            <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="departemen" class="form-label">Departemen:</label>
                            <input type="text" class="form-control" id="departemen" name="departemen" required>
                        </div>
                        <div class="mb-3">
                            <label for="usernya" class="form-label">User:</label>
                            <select class="form-select" id="usernya" name="usernya" required>
                                <option value="" selected disabled>Pilih User</option>
                                @foreach ($listUsers as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" id="tambahkaryawan" class="btn btn-primary">Tambah Karyawan</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal End Add Karyawan --}}

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
@include('karyawan.tambakaryawanJs')


@endsection
