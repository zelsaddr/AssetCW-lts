@extends('layouts.app')

@section('title', 'Lokasi')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Lokasi Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addLokasi" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Lokasi</button></h3>
          <div class="modal fade" id="addLokasi" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaLokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaLokasi" placeholder="Andara">
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
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaLokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaLokasi" placeholder="Andara">
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
              <tr>
                <td>Mandala</td>
                <td>2021-10-10 10:00:00</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editLokasi" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>PM Andara</td>
                <td>2021-10-15 10:00:00</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editLokasi" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

