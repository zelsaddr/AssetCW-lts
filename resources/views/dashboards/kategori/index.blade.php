@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="col-lg-12">
      {{-- if session success display message sukses update data --}}
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
          <h3 class="card-title">Kategori Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addKategori" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Kategori</button></h3>
          <div class="modal fade" id="addKategori" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('kategori.store') }}" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                      <label for="kodeKategori" class="col-sm-4 col-form-label">Kode Kategori</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kode_kategori" placeholder="CW-13000.">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Meja">
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
          </div><!-- End Add Kategori Modal-->
          <div class="modal fade" id="editKategori" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('kategori.update') }}" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="row mb-3">
                      <label for="kodeKategori" class="col-sm-4 col-form-label">Kode Kategori</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kode_kategori" id="kodeKategori" placeholder="CW-13000.">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_kategori" id="namaKategori" placeholder="Meja">
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
          </div><!-- End Add Kategori Modal-->
          <p>Semua kategori barang akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th data-type="string"><b>Kode</b> Kategori</th>
                <th>Nama Kategori</th>
                <th data-type="date">Tanggal Perubahan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kategoris as $kategori)
              <tr>
                <td>{{ $kategori['kode_kategori'] }}</td>
                <td>{{ $kategori['nama_kategori'] }}</td>
                <td>{{ $kategori['updated_at'] }}</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-id="{{ $kategori['id'] }}" data-bs-target="#editKategori" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  {{-- delete using a href with confirmation button --}}

                  <a href="{{ route('kategori.delete', $kategori['id']) }}" class="btn btn-danger btn-sm delete" onclick="return confirm('Apakah yakin ingin di hapus')"><i class="bi bi-trash"></i></a>
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
    // edit kategori
    $('#editKategori').on('show.bs.modal', function (event) {
      // get data-id attribute of the clicked element
      var button = $(event.relatedTarget);
      var ids = button.data('id');
      var kodeKategori = button.closest('tr').find('td:eq(0)').text();
      var namaKategori = button.closest('tr').find('td:eq(1)').text();
      var modal = $(this);
      modal.find('.modal-body input[name="id"]').val(ids);
      modal.find('.modal-body #kodeKategori').val(kodeKategori);
      modal.find('.modal-body #namaKategori').val(namaKategori);
    });
  });
</script>
@endsection