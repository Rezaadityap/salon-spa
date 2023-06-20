<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?php echo base_url('admin/dashboard')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Master data</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo base_url('admin/DataKaryawan')?>">
          <i class="bi bi-circle"></i><span>Data Karyawan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/dataTreatment')?>">
          <i class="bi bi-circle"></i><span>Data Treatment</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/dataJabatan')?>">
          <i class="bi bi-circle"></i><span>Data Jabatan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/dataAbsensi')?>">
          <i class="bi bi-circle"></i><span>Data Absensi</span>
        </a>
      </li>
    </ul>
  </li>
  <!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo base_url('admin/dataMember')?>">
          <i class="bi bi-circle"></i><span>Member</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/formIzin') ?>">
          <i class="bi bi-circle"></i><span>Form Izin</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-cash"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo base_url('admin/dataGaji') ?>">
          <i class="bi bi-circle"></i><span>Data Gaji</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/settingGaji')?>">
          <i class="bi bi-circle"></i><span>Setting Penggajian</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/pesanan')?>">
          <i class="bi bi-circle"></i><span>Pesanan</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url('admin/jadwalKerja')?>">
      <i class="bi bi-calendar"></i>
      <span>Jadwal Kerja</span>
    </a>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" onclick = "return confirm('Yakin ingin keluar?')" href="<?php echo base_url('admin/login/logout')?>">
      <i class="bi bi-box-arrow-right"></i>
      <span>Logout</span>
    </a>
  </li>
  <!-- End Login Page Nav -->
</ul>

</aside>
<!-- End Sidebar-->
