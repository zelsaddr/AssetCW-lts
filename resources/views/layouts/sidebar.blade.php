<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{ Request::is('main') ? 'active' : '' }}" href="{{ url('main') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link {{ Request::is('main/datamaster/*') ? '' : 'collapsed' }}" data-bs-target="#datamaster-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-link"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="datamaster-nav" class="nav-content collapse {{ Request::is('main/datamaster/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('main/datamaster/kategori') }}" class="{{ Request::is('*/kategori') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Kategori Barang</span>
        </a>
      </li>
      <li>
        <a href="{{ url('main/datamaster/barang') }}" class="{{ Request::is('*/barang') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Barang</span>
        </a>
      </li>
      <li>
        <a href="{{ url('main/datamaster/satuan') }}" class="{{ Request::is('*/satuan') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Satuan</span>
        </a>
      </li>
      <li>
        <a href="{{ url('main/datamaster/lokasi') }}" class="{{ Request::is('*/lokasi') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Lokasi Aset</span>
        </a>
      </li>
      <li>
        <a href="{{ url('main/datamaster/pengguna') }}" class="{{ Request::is('*/pengguna') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Pengguna</span>
        </a>
      </li>
    </ul>
  </li><!-- End Data Master Nav -->

  <li class="nav-item">
    <a class="nav-link {{ Request::is('main/aset/*') ? '' : 'collapsed' }}" data-bs-target="#dataaset-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-task"></i><span>Data Aset</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="dataaset-nav" class="nav-content collapse {{ Request::is('main/aset/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('main/aset/berwujud') }}" class="{{ Request::is('*/berwujud') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Berwujud</span>
        </a>
      </li>
      <li>
        <a href="{{ url('main/aset/dihapuskan') }}" class="{{ Request::is('*/dihapuskan') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Dihapuskan</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ Request::is('main/dokumen/*') ? '' : 'collapsed' }}" data-bs-target="#dokumen-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-box-seam"></i><span>Dokumen</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="dokumen-nav" class="nav-content collapse {{ Request::is('main/dokumen/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('main/dokumen/pengadaan')}}" class="{{ Request::is('*/pengadaan') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Pengadaan</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-calendar2-week"></i>
      <span>Monitoring</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-arrow-left-right"></i>
      <span>Mutasi Aset</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-x-octagon-fill"></i>
      <span>Penghapusan</span>
    </a>
  </li>
</ul> 