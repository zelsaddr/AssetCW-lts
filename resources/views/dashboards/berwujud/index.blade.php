@extends('layouts.app')

@section('title', 'Aset Berwujud')

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
          <h3 class="card-title">Aset Berwujud  <button type="button" data-bs-toggle="modal" data-bs-target="#addItem" class="btn btn-block btn-success btn-sm float-end"><i class="bi bi-plus-square"></i> Aset Berwujud</button></h3>
          <div class="modal fade" id="addItem" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('aset-berwujud.store') }}" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Aset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                    <div class="row mb-3">
                      <label for="no_invoice" class="col-sm-3 col-form-label">Nomor Invoice</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Nomor Invoice">
                      </div>
                    </div>
                      <div class="row mb-3">
                        <label for="nama_aset" class="col-sm-3 col-form-label">Nama Barang (*)</label>
                        <div class="col-sm-9">
                          <select name="nama_aset" id="nama_aset" class="form-control select2-add" required="" data-select2-id="nama_aset" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($barangs as $barang)
                            <option value="{{ $barang['id'] }}">{{ $barang['nama_barang'] }} | {{ $barang['kategori']['nama_kategori'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tanggal_barang_datang" class="col-sm-3 col-form-label">Tanggal Barang Datang (*)</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="tanggal_barang_datang" name="tanggal_barang_datang">
                        </div>
                      </div>
                      <!-- kode aset -->
                      <div class="row mb-3">
                        <label for="kode_aset" class="col-sm-3 col-form-label">Kode Aset (*)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="kode_aset" name="kode_aset" placeholder="Kode Aset">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="identitas_barang" class="col-sm-3 col-form-label">ID Barang</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="identitas_barang" name="identitas_barang" placeholder="Kode identitas yang melekat pada barang">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="nilai_perolehan" class="col-sm-3 col-form-label">Nilai Perolehan</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="nilai_perolehan" name="nilai_perolehan" placeholder="1.000.000">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="foto_barang_path" class="col-sm-3 col-form-label">Foto Barang (*)</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="foto_barang_path" name="foto_barang_path">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="volume_barang" class="col-sm-3 col-form-label">Volume (*)</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="volume_barang" name="volume_barang" placeholder="1">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Satuan (*)</label>
                        <div class="col-sm-9">
                          <select name="satuan" id="satuan" class="form-control select2-add" required="" data-select2-id="satuan" tabindex="-1" aria-hidden="true">
                            <option value="" >- Pilih --</option>
                            @foreach ($satuans as $satuan)
                              <option value="{{ $satuan['id'] }}">{{ $satuan['nama_satuan'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Kondisi (*)</label>
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
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Nama Pengguna (*)</label>
                        <div class="col-sm-9">
                          <select name="nama_pengguna" id="nama_pengguna" class="form-control select2-add" required="" data-select2-id="nama_pengguna" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($penggunas as $pengguna)
                            <option value="{{ $pengguna['id'] }}">{{ $pengguna['nama_pengguna'] }} - {{ $pengguna['jabatan'] }} | {{ $pengguna['posisi_pengguna'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- Input type file foto tampak depan -->
                      <div class="row mb-3">
                        <label for="lokasi_aset" class="col-sm-3 col-form-label">Lokasi Aset (*)</label>
                        <div class="col-sm-9">
                          <select name="lokasi_aset" id="lokasi_aset" class="form-control select2-add" required="" data-select2-id="lokasi_aset" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($lokasis as $lokasi)
                            <option value="{{ $lokasi['id'] }}">{{ $lokasi['nama_lokasi'] }}</option> 
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan (*)</label>
                        <div class="col-sm-9">
                          <textarea name="keterangan" id="keterangan" class="form-control" required=""></textarea>
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
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <form method="POST" action="{{ route('aset-berwujud.store') }}" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Aset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                    <div class="row mb-3">
                      <label for="no_invoice" class="col-sm-3 col-form-label">Nomor Invoice</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="Nomor Invoice">
                      </div>
                    </div>
                      <div class="row mb-3">
                        <label for="nama_aset" class="col-sm-3 col-form-label">Nama Barang (*)</label>
                        <div class="col-sm-9">
                          <select name="nama_aset" id="edit_nama_aset" class="form-control select2-add" required="" data-select2-id="edit_nama_aset" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($barangs as $barang)
                            <option value="{{ $barang['id'] }}">{{ $barang['nama_barang'] }} | {{ $barang['kategori']['nama_kategori'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tanggal_barang_datang" class="col-sm-3 col-form-label">Tanggal Barang Datang (*)</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="tanggal_barang_datang" name="tanggal_barang_datang">
                        </div>
                      </div>
                      <!-- kode aset -->
                      <div class="row mb-3">
                        <label for="kode_aset" class="col-sm-3 col-form-label">Kode Aset (*)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="kode_aset" name="kode_aset" placeholder="Kode Aset">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="identitas_barang" class="col-sm-3 col-form-label">ID Barang</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="identitas_barang" name="identitas_barang" placeholder="Kode identitas yang melekat pada barang">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="nilai_perolehan" class="col-sm-3 col-form-label">Nilai Perolehan</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="nilai_perolehan" name="nilai_perolehan" placeholder="1.000.000">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="foto_barang_path" class="col-sm-3 col-form-label">Foto Barang (*)</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="foto_barang_path" name="foto_barang_path">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="volume_barang" class="col-sm-3 col-form-label">Volume (*)</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="volume_barang" name="volume_barang" placeholder="1">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Satuan (*)</label>
                        <div class="col-sm-9">
                          <select name="satuan" id="edit_satuan" class="form-control select2-add" required="" data-select2-id="edit_satuan" tabindex="-1" aria-hidden="true">
                            <option value="" >- Pilih --</option>
                            @foreach ($satuans as $satuan)
                              <option value="{{ $satuan['id'] }}">{{ $satuan['nama_satuan'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="namaKategori" class="col-sm-3 col-form-label">Kondisi (*)</label>
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
                        <label for="kodeKategori" class="col-sm-3 col-form-label">Nama Pengguna (*)</label>
                        <div class="col-sm-9">
                          <select name="nama_pengguna" id="edit_nama_pengguna" class="form-control select2-add" required="" data-select2-id="edit_nama_pengguna" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($penggunas as $pengguna)
                            <option value="{{ $pengguna['id'] }}">{{ $pengguna['nama_pengguna'] }} - {{ $pengguna['jabatan'] }} | {{ $pengguna['posisi_pengguna'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- Input type file foto tampak depan -->
                      <div class="row mb-3">
                        <label for="lokasi_aset" class="col-sm-3 col-form-label">Lokasi Aset (*)</label>
                        <div class="col-sm-9">
                          <select name="lokasi_aset" id="edit_lokasi_aset" class="form-control select2-add" required="" data-select2-id="edit_lokasi_aset" tabindex="-1" aria-hidden="true">
                            <option value="">- Pilih --</option>
                            @foreach ($lokasis as $lokasi)
                            <option value="{{ $lokasi['id'] }}">{{ $lokasi['nama_lokasi'] }}</option> 
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan (*)</label>
                        <div class="col-sm-9">
                          <textarea name="keterangan" id="keterangan" class="form-control" required=""></textarea>
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
          <p>Semua aset berwujud akan ditampilkan di sini.</p>
          <hr>
          <!-- Table with stripped rows -->
          <table class="table table-bordered table-striped datatable table-responsive responsive">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Aset</th>
                <th>Kategori</th>
                <th>Nama Aset</th>
                <th>Tanggal Datang</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
                <th>Dokumen Aset</th>
                <th>Pengguna</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($asets as $aset)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $aset['kode_aset'] }} </td>
                <td>{{ $aset['kategori']['nama_kategori'] }}</td>
                <td>{{ $aset['barang']['nama_barang'] }}</td>
                <td>{{ $aset['tanggal_barang_datang'] }}</td>
                <td>{{ $aset['nama_lokasi'] }}</td>
                <td>{{ $aset['kondisi'] }}</td>
                <td>{{ $aset['dokumen_status'] }}</td>
                <td>{{ $aset['pengguna']['nama_pengguna'] }}</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editItem"><i class="bi bi-pencil-square"></i> Edit</button>
                  @if($aset['dokumen_status'] == 'N/A')
                  <a href="{{ route('aset-berwujud.delete', $aset['id']) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini secara permanen?')"><i class="bi bi-trash"></i> Hapus</a>
                  @endif
                </td>
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
      var modal = $(this);
      modal.find('.modal-body #id').val(id);
    });
    let prefix_kode_aset = '';
    // get select value on change in modal add
    $('#nama_aset').on('change', function() {
      var nama_aset = $(this).val();
      if (nama_aset) {
        $.ajax({
          url: "{{ url('main/aset/berwujud/api/get-kode-aset-by-barang/') }}/" + nama_aset,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('#kode_aset').empty();
            prefix_kode_aset = data.kode_aset;
            $('#kode_aset').val(data.kode_aset);
          }
        });
      } else {
        $('#kode_aset').empty();
      }
    });

    $('#tanggal_barang_datang').on('change', function() {
      var date = new Date($(this).val());
      var day = ("0" + date.getDate()).slice(-2);
      var month = ("0" + (date.getMonth() + 1)).slice(-2);
      var year = date.getFullYear();
      var kode_aset = prefix_kode_aset;
      $('#kode_aset').val(kode_aset + [day, month, year].join('.'));
    });

    $('#kode_aset').on('change', function(){
      prefix_kode_aset = ($(this).val()).split('.');
    })
  });
</script>
@endsection
