@extends('layouts.app')

@section('title', 'Dokumen Pengadaan')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Dokumen Pengadaan <button type="button" data-bs-toggle="modal" data-bs-target="#addItem" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Dokumen Pengadaan</button></h3>
          <div class="modal fade" id="addItem" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Dokumen Pengadaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Nama Aset</label>
                        <div class="col-sm-9">
                          <select name="id_kategori" id="id_kategori" class="form-control select2-add" required="" data-select2-id="id_kategori" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2">- Pilih --</option>
                            <option value="2" data-select2-id="11">ELK - ELEKTRONIK</option>
                            <option value="3" data-select2-id="12">FNT - FURNITURE</option>
                            <option value="4" data-select2-id="13">OA - Office Accessories</option>
                          </select>
                        </div>
                      </div>
                      <!-- Input type file foto tampak depan -->
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Dokumen Pengadaan</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="namaKategori">
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
          </div><!-- End Add Dokumen Pengadaan Modal-->
          <div class="modal fade" id="editItem" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Dokumen Pengadaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row mb-3">
                      <label for="kodeKategori" class="col-sm-3 col-form-label">Nama Aset</label>
                      <div class="col-sm-9">
                        <select name="id_kategori" id="id_kategori" class="form-control select2-add" required="" data-select2-id="id_kategori" tabindex="-1" aria-hidden="true">
                          <option value="" data-select2-id="2">- Pilih --</option>
                          <option value="2" data-select2-id="11">ELK - ELEKTRONIK</option>
                          <option value="3" data-select2-id="12">FNT - FURNITURE</option>
                          <option value="4" data-select2-id="13">OA - Office Accessories</option>
                        </select>
                      </div>
                    </div>
                    <!-- Input type file foto tampak depan -->
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Dokumen Pengadaan</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="namaKategori">
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
          <p>Semua dokumen pengadaan akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th data-type="number">No.</th>
                <th>Nama Aset</th>
                <th>Dokumen Pengadaan</th>
                <th>Nomor Aset</th>
                <th>Tahun Perolehan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Lemari Buffet</td>
                <td>Pembelian Lemari Buffet.pdf</td>
                <td>ACW-13000.13.04.2024</td>
                <td>2019</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

