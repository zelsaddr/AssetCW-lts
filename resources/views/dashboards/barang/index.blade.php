@extends('layouts.app')

@section('title', 'Barang')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addKategori" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Barang</button></h3>
          <div class="modal fade" id="addKategori" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-4 col-form-label">Kode Kategori</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="kodeKategori" placeholder="CW-13000.">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaKategori" placeholder="Meja">
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
          </div><!-- End Add Kategori Modal-->
          <div class="modal fade" id="editKategori" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-4 col-form-label">Kode Kategori</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="kodeKategori" placeholder="CW-13000.">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaKategori" placeholder="Meja">
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
          <table class="table datatable table-responsive responsive">
            <thead>
              <tr>
                <th data-type="number">No.</th>
                <th>Kategori</th>
                <th>Sub Kategori</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Tahun Perolehan</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Elektronik</td>
                <td>Televisi</td>
                <td>LG 32"</td>
                <td>LG</td>
                <td>2019</td>
                <td><img src="https://www.lg.com/content/dam/channel/wcms/id/images/tv/32lq570bpsa_ati_eain_id_c/gallery/DZ-01.jpg" alt="Televisi LG 32" class="img-fluid" width="100"></td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editKategori" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

