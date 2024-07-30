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
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
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
                      <!-- Input type file foto tampak depan -->
                      <div class="row mb-3">
                        <label for="fotoDepan" class="col-sm-3 col-form-label">Foto Tampak Depan</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="fotoDepan" name="foto_tampak_depan">
                        </div>
                      </div>
                      <!-- Input type file foto tampak samping -->
                      <div class="row mb-3">
                        <label for="fotoSamping" class="col-sm-3 col-form-label">Foto Tampak Samping</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="fotoSamping" name="foto_tampak_samping">
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
                <form>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row mb-3">
                      <label for="kodeKategori" class="col-sm-3 col-form-label">Kode Kategori</label>
                      <div class="col-sm-9">
                        <select name="edit_id_kategori" id="edit_id_kategori" class="form-control select2-edit" required="" data-select2-id="edit_id_kategori" tabindex="-1" aria-hidden="true">
                          <option value="" data-select2-id="2">- Pilih --</option>
                          <option value="2" data-select2-id="11">ELK - ELEKTRONIK</option>
                          <option value="3" data-select2-id="12">FNT - FURNITURE</option>
                          <option value="4" data-select2-id="13">OA - Office Accessories</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Nama Barang</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaKategori" placeholder="Nama Barang">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Merk</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaKategori" placeholder="LG">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Tahun Perolehan</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="namaKategori" placeholder="20XX">
                      </div>
                    </div>
                    <!-- Input type file foto tampak depan -->
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Foto Tampak Depan</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="namaKategori">
                      </div>
                    </div>
                    <!-- Input type file foto tampak samping -->
                    <div class="row mb-3">
                      <label for="namaKategori" class="col-sm-3 col-form-label">Foto Tampak Samping</label>
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
                <th>Tahun Perolehan</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              {{ $i = 1; }}
              @foreach ($barangs as $barang)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $barang['kategori']['kode_kategori'] }} - {{ $barang['kategori']['nama_kategori'] }}</td>
                  <td>{{ $barang['nama_barang'] }}</td>
                  <td>{{ $barang['merk_barang'] }}</td>
                  <td>{{ $barang['tahun_perolehan'] }}</td>
                  <td><img src="{{ url(str_replace('public/', 'storage/', $barang['foto_tampak_depan_path'])) }}" alt="{{ $barang['nama_barang'] }}" class="img-fluid" width="100"></td>
                  <td><button type="button" data-bs-toggle="modal" data-bs-target="#editItem" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button></td>
                </tr>
              {{ $i++; }}
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
@endsection

