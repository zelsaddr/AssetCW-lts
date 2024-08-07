@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
<div class="col-lg-12">
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  {{-- if session error display message gagal update data --}}
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Pengguna Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addPengguna" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Pengguna</button></h3>
          <div class="modal fade" id="addPengguna" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('pengguna.store') }}">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                      <div class="row mb-3">
                        <label for="namaPengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namaPengguna" name="nama_pengguna" placeholder="nama pengguna">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan...">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="posisi" class="col-sm-4 col-form-label">Posisi Pengguna</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="posisi" name="posisi_pengguna" placeholder="lokasi pengguna...">
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
              </form>
              </div>
            </div>
          </div><!-- End Add Pengguna Modal-->
          <div class="modal fade" id="editPengguna" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('pengguna.update') }}">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="row mb-3">
                      <label for="namaPengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="namaPengguna" name="nama_pengguna" placeholder="nama pengguna">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan...">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="posisi" class="col-sm-4 col-form-label">Posisi Pengguna</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="posisi" name="posisi_pengguna" placeholder="lokasi pengguna...">
                      </div>
                    </div>
                </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                  </div>
              </form>
              </div>
            </div>
          </div><!-- End Add Pengguna Modal-->
          <p>Semua pengguna barang akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th data-type="string"><b>Nama</b> Pengguna</th>
                <th>Jabatan</th>
                <th>Posisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penggunas as $pengguna)
              <tr>
                <td>{{ $pengguna['nama_pengguna'] }}</td>
                <td>{{ $pengguna['jabatan'] }}</td>
                <td>{{ $pengguna['posisi_pengguna'] }}</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-id="{{ $pengguna['id'] }}" data-bs-target="#editPengguna" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <a href="{{ route('pengguna.delete', $pengguna['id']) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

@section('scripts')
<script>
  $('#editPengguna').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    var namaPengguna = button.closest('tr').find('td:eq(0)').text()
    var jabatan = button.closest('tr').find('td:eq(1)').text()
    var posisi = button.closest('tr').find('td:eq(2)').text()
    modal.find('.modal-body input[name="id"]').val(id)
    modal.find('.modal-body input[name="nama_pengguna"]').val(namaPengguna)
    modal.find('.modal-body input[name="jabatan"]').val(jabatan)
    modal.find('.modal-body input[name="posisi_pengguna"]').val(posisi)
  });
</script>
@endsection
