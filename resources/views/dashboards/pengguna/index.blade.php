@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Pengguna Barang <button type="button" data-bs-toggle="modal" data-bs-target="#addPengguna" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Pengguna</button></h3>
          <div class="modal fade" id="addPengguna" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="kodePengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="kodePengguna" placeholder="nama pengguna">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaPengguna" class="col-sm-4 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namaPengguna" placeholder="jabatan...">
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
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row mb-3">
                      <label for="kodePengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="kodePengguna" placeholder="nama pengguna..">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="namaPengguna" class="col-sm-4 col-form-label">Jabatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="namaPengguna" placeholder="jabatan..">
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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Izzeldin Addarda</td>
                <td>Officer Arsip & Asset</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editPengguna" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
              <tr>
                <td>Romario Mardiansyah</td>
                <td>Officer Rumah Tangga Kantor</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editPengguna" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
              <tr>
                <td>Rizki Purnama</td>
                <td>Senior Officer USDM</td>
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editPengguna" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

