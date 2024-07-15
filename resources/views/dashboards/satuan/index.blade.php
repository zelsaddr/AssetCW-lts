@extends('layouts.app')

@section('title', 'Satuan')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Satuan Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addSatuan" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Satuan</button></h3>
          <div class="modal fade" id="addSatuan" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaSatuan" class="col-sm-4 col-form-label">Nama Satuan</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaSatuan" placeholder="Unit">
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
          </div><!-- End Add Satuan Modal-->
          <div class="modal fade" id="editSatuan" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaSatuan" class="col-sm-4 col-form-label">Nama Satuan</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaSatuan" placeholder="Unit">
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
          </div><!-- End Add Satuan Modal-->
          <p>Semua satuan barang akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th>Nama Satuan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Unit</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSatuan" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
              <tr>
                <td>Buah</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSatuan" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
              <tr>
                <td>Lembar</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSatuan" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

