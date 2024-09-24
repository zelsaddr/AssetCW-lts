@extends('layouts.app')

@section('title', 'Barang')

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
          <h3 class="card-title">Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addItem" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Barang</button></h3>
          <div class="modal fade" id="addItem" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('barang.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Kode Kategori</label>
                        <div class="col-sm-9">
                          <select name="kategori_id" id="kategori_id" class="form-control select2-add" required="" data-select2-id="kategori_id" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori['id'] }}" >{{ $kategori['kode_kategori'] }} - {{ $kategori['nama_kategori'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaBarang" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="namaBarang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="merkBarang" class="col-sm-3 col-form-label">Merk</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="merkBarang" name="merk_barang" placeholder="LG">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tahunPerolehan" class="col-sm-3 col-form-label">Tahun Perolehan</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="tahunPerolehan" name="tahun_perolehan" placeholder="20XX">
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
          </div><!-- End Add Barang Modal-->
          <div class="modal fade" id="editItem" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('barang.update') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" name="id" value="">
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Kode Kategori</label>
                        <div class="col-sm-9">
                          <select name="kategori_id_2" id="kategori_id_2" class="form-control select2-edit" required="" data-select2-id="kategori_id_2" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori['id'] }}" >{{ $kategori['kode_kategori'] }} - {{ $kategori['nama_kategori'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaBarang" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="namaBarang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="merkBarang" class="col-sm-3 col-form-label">Merk</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="merkBarang" name="merk_barang" placeholder="LG">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tahunPerolehan" class="col-sm-3 col-form-label">Tahun Perolehan</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="tahunPerolehan" name="tahun_perolehan" placeholder="20XX">
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
          </div>
          <p>Semua kategori barang akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th data-type="number">No.</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Thn Perolehan</th>
                <th>Tercatat Sbg Aset</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($barangs as $barang)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $barang['kategori']['kode_kategori'] }} - {{ $barang['kategori']['nama_kategori'] }}</td>
                  <td>{{ $barang['nama_barang'] }}</td>
                  <td>{{ $barang['merk_barang'] }}</td>
                  <td>{{ $barang['tahun_perolehan'] }}</td>
                  <td>{{ $barang['status'] == "tidak_tercatat" ? "Tidak" : "Ya" }}</td>
                  <td>
                    <button type="button" data-id="{{ $barang['id'] }}" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                    <a href="{{ route('barang.delete', $barang['id']) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
              @php
                $i++;
              @endphp
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
    $('#editItem').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var kategoriName = button.closest('tr').find('td:eq(1)').text();
      var namaBarang = button.closest('tr').find('td:eq(2)').text();
      var merkBarang = button.closest('tr').find('td:eq(3)').text();
      var tahunPerolehan = button.closest('tr').find('td:eq(4)').text();
      var modal = $(this);
      // default select with text between option
      modal.find('.modal-body select[name="kategori_id_2"] option').filter(function() {
        return ($(this).text() == kategoriName);
      }).prop('selected', true);
      $('select').trigger('change');
      modal.find('.modal-body input[name="id"]').val(id);
      modal.find('.modal-body input[name="nama_barang"]').val(namaBarang);
      modal.find('.modal-body input[name="merk_barang"]').val(merkBarang);
      modal.find('.modal-body input[name="tahun_perolehan"]').val(tahunPerolehan);
    });
  });
</script>
@endsection

