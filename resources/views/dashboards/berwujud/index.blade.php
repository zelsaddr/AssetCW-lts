@extends('layouts.app')

@section('title', 'Aset Berwujud')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Aset Berwujud  <button type="button" data-bs-toggle="modal" data-bs-target="#addItem" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Aset Berwujud</button></h3>
          <div class="modal fade" id="addItem" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Aset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Nomor Invoice</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaKategori" placeholder="Nomor Invoice">
                      </div>
                    </div>
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Nama Aset</label>
                        <div class="col-sm-9">
                          <select name="nama_aset" id="nama_aset" class="form-control select2-add" required="" data-select2-id="nama_aset" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2">- Pilih --</option>
                            <option value="2" data-select2-id="11">ELK - ELEKTRONIK</option>
                            <option value="3" data-select2-id="12">FNT - FURNITURE</option>
                            <option value="4" data-select2-id="13">OA - Office Accessories</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Serial Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="namaKategori" placeholder="Serial Number">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Tanggal Barang Datang</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="namaKategori" placeholder="Serial Number">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Foto Barang</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="namaKategori">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                          <select name="nama_pengguna" id="nama_pengguna" class="form-control select2-add" required="" data-select2-id="nama_pengguna" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2">- Pilih --</option>
                            <option value="2" data-select2-id="11">ELK - ELEKTRONIK</option>
                            <option value="3" data-select2-id="12">FNT - FURNITURE</option>
                            <option value="4" data-select2-id="13">OA - Office Accessories</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="namaKategori" placeholder="Jabatan akan terisi otomatis setelah pilih pengguna">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Volume</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="namaKategori" placeholder="1">
                        </div>
                      </div>
                      <!-- Input type file foto tampak depan -->
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                          <select name="satuan" id="satuan" class="form-control select2-add" required="" data-select2-id="satuan" tabindex="-1" aria-hidden="true">
                            <option value="" >- Pilih --</option>
                            <option value="2">ELK - ELEKTRONIK</option>
                            <option value="3">FNT - FURNITURE</option>
                            <option value="4">OA - Office Accessories</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Kondisi</label>
                        <div class="col-sm-9">
                          <select name="kondisi" class="form-control" required="">
                            <option value="">- Pilih --</option>
                            <option value="Baik">Baik</option>
                            <option value="Renovasi">Renovasi</option>
                            <option value="Rusak">Rusak</option>     
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Lokasi Aset</label>
                        <div class="col-sm-9">
                          <select name="id_kategori" id="id_kategori" class="form-control select2-add" required="" data-select2-id="id_kategori" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="2">- Pilih --</option>
                            <option value="2" data-select2-id="11">ELK - ELEKTRONIK</option>
                            <option value="3" data-select2-id="12">FNT - FURNITURE</option>
                            <option value="4" data-select2-id="13">OA - Office Accessories</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Nilai Aset</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="namaKategori" placeholder="1.000.000">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                          <textarea name="keterangan" class="form-control" required=""></textarea>
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
          </div><!-- End Add Aset Berwujud Modal-->
          <div class="modal fade" id="editItem" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Aset Berwujud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row mb-3">
                        <label for="namaAset Berwujud" class="col-sm-4 col-form-label">Nama Aset Berwujud</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="namaAset Berwujud" placeholder="Andara">
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
          </div><!-- End Add Aset Berwujud Modal-->
          <p>Semua aset berwujud akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 65.2969px;">No.</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kode Aset: activate to sort column ascending" style="width: 176.359px;">Kode Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 212.688px;">Nama</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Volume: activate to sort column ascending" style="width: 118.109px;">Volume</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nilai Aset: activate to sort column ascending" style="width: 148.156px;">Nilai Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 182.609px;">Aksi</th></tr>
              </thead>
              <tbody>
              <tr role="row" class="odd">
                <td class="sorting_1">1</td>
                <td>ACW-13000.13.04.2024</td>
                <td>Lemari Buffet</td>
                <td align="center">1</td>
                <td>Rp 1.500.000</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <a href="#" class="btn btn-danger btn-sm tombol-hapus">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
              <tr role="row" class="even">
                <td class="sorting_1">1</td>
                <td>ACW-13000.07.04.2024</td>
                <td>Gelas</td>
                <td align="center">1</td>
                <td>Rp 301.000</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <a href="http://192.168.2.115/simaset/aset_wujud/hapus/0a087a5a44bb40b0aaad13f3695d4f44" class="btn btn-danger btn-sm tombol-hapus">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
              <tr role="row" class="odd">
                <td class="sorting_1">1</td>
                <td>ACW-13000.13.04.2024</td>
                <td>Rak</td>
                <td align="center">1</td>
                <td>Rp 120.000</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <a href="http://192.168.2.115/simaset/aset_wujud/hapus/0a087a5a44bb40b0aaad13f3695d4f44" class="btn btn-danger btn-sm tombol-hapus">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
              <tr role="row" class="even">
                <td class="sorting_1">1</td>
                <td>ACW-16000.29.08.2024</td>
                <td>PC</td>
                <td align="center">1</td>
                <td>Rp 15.501.000</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <a href="http://192.168.2.115/simaset/aset_wujud/hapus/0a087a5a44bb40b0aaad13f3695d4f44" class="btn btn-danger btn-sm tombol-hapus">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

