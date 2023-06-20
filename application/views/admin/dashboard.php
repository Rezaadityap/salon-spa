
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<!-- Content Row -->
<div class="container-fluid" style="margin-bottom: 100px">
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-3 text-center">
                          Data Karyawan
                        </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo $karyawan ?></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-3 text-center">
                    Data Therapist
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo $therapist ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-3 text-center">
                Data Treatment
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo $treatment ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-3 text-center">
                Data Pesanan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo $pesan ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
    

  

</main><!-- End #main -->