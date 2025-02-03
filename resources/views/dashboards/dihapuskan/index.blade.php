@extends('layouts.app')

@section('title', 'Aset Dihapuskan')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Aset Dihapuskan  <button type="button" data-bs-toggle="modal" data-bs-target="#addItem" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Aset Dihapuskan</button></h3>
          <div class="modal fade" id="addAset Dihapuskan" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Aset Dihapuskan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaAset Dihapuskan" class="col-sm-4 col-form-label">Nama Aset Dihapuskan</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaAset Dihapuskan" placeholder="Andara">
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
          </div><!-- End Add Aset Dihapuskan Modal-->
          <div class="modal fade" id="editAset Dihapuskan" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Aset Dihapuskan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaAset Dihapuskan" class="col-sm-4 col-form-label">Nama Aset Dihapuskan</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaAset Dihapuskan" placeholder="Andara">
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
          </div><!-- End Add Aset Dihapuskan Modal-->
          <p>Semua aset dihapuskan akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 66.5625px;">No.</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kode Aset: activate to sort column ascending" style="width: 179.062px;">Kode Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 124.234px;">Nama</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Volume: activate to sort column ascending" style="width: 120.109px;">Volume</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nilai Aset: activate to sort column ascending" style="width: 144.656px;">Nilai Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status Aset: activate to sort column ascending" style="width: 167.25px;">Status Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 75.5469px;">Aksi</th></tr>
              </thead>
              <tbody>
                <tr role="row" class="odd">
                <td class="sorting_1">1</td>
                <td>ACW-19000.14.05.2010</td>
                <td>Kursi Kayu</td>
                <td>1</td>
                <td>Rp 200.000</td>
                <td>Dihapuskan</td>
                <td>
                  <a href="http://192.168.2.115/simaset/aset_dihapuskan/detail/2ce7c84b803f497189ce3b2601350c7b" class="btn btn-success btn-sm">
                    <i class="bi bi-eye"></i>
                  </a>
                </td>
              </tr>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

