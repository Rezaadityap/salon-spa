<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?php echo base_url('karyawan/dashboard')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed " href="<?php echo base_url('karyawan/DataGaji')?>">
      <i class="bi bi-cash-coin"></i>
      <span>Data Gaji</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed " href="<?php echo base_url('karyawan/jadwalKerja')?>">
      <i class="bi bi-calendar-event"></i>
      <span>Jadwal Kerja</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed " href="<?php echo base_url('karyawan/formIzin')?>">
      <i class="bi bi-person-bounding-box"></i>
      <span>Form Izin</span>
    </a>
  </li>
  <!-- End Dashboard Nav -->
  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Profil</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('karyawan/profil')?>">
              <i class="bi bi-circle"></i><span>Profil Saya</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" onclick = "return confirm('Yakin ingin keluar?')" href="<?php echo base_url('admin/login/logout')?>">
      <i class="bi bi-box-arrow-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->
</ul>

</aside>
<!-- End Sidebar-->
