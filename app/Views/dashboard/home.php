<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="d-flex justify-content-center align-items-center">
        <div class="row">

          <div class="card-body col-md-10">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $departemen; ?></h3>

                <p class="font-weight-bold">Departemen</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <a href="/departemen" class="small-box-footer">Lihat departemen <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="card-body col-md-10">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $tingkatan; ?></h3>

                <p class="font-weight-bold">Tingkatan</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <a href="/tingkatan" class="small-box-footer">Lihat tingkatan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
        </div>
        <!-- /.row -->
        <div class="row">

          <!-- ./col -->
          <div class="card-body col-md-11">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $karyawan; ?></h3>

                <p class="font-weight-bold">Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="/karyawan" class="small-box-footer">Lihat karyawan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="card-body col-md-11">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $payslip; ?></h3>

                <p class="font-weight-bold">Payslip</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope-open-text"></i>
              </div>
              <a href="/payslip" class="small-box-footer">Lihat payslip <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    

  </div>
  <!-- /.content-wrapper -->