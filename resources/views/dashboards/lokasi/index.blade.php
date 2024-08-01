@extends('layouts.app')

@section('title', 'Lokasi')

@section('content')
<div class="col-lg-12">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- if session error display message gagal update data --}}
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ session('error') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Lokasi Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addLokasi" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Lokasi</button></h3>
          <div class="modal fade" id="addLokasi" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('lokasi.store') }}" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                      <div class="row mb-3">
                        <label for="namaLokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namaLokasi" name="nama_lokasi" placeholder="Andara">
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
          </div><!-- End Add Lokasi Modal-->
          <div class="modal fade" id="editLokasi" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('lokasi.update') }}">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="">
                      <div class="row mb-3">
                        <label for="namaLokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namaLokasi" name="nama_lokasi" placeholder="Andara">
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
          </div><!-- End Add Lokasi Modal-->
          <p>Semua lokasi barang akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th>Nama Lokasi</th>
                <th type-data="date">Terakhir Diubah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($lokasis as $lokasi)
              <tr>
                <td>{{ $lokasi['nama_lokasi'] }}</td>
                <td>{{ $lokasi['updated_at'] }}</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-id="{{ $lokasi['id'] }}" data-bs-target="#editLokasi" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <a href="{{ route('lokasi.delete', $lokasi['id']) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')"><i class="bi bi-trash"></i></a>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#editLokasi').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var lokasi = button.closest('tr').find('td:eq(0)').text();
      var modal = $(this);
      modal.find('.modal-body input[name="id"]').val(id);
      modal.find('.modal-body input[name="nama_lokasi"]').val(lokasi);
    });
  });
</script>
@endsection

