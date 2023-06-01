<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail payslip</h1>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <?php if($message = session()->getFlashData('message')) : $message_class = session()->getFlashData('message_class'); ?>
        <div class="alert <?= $message_class ?>" role="alert">
          <?= $message ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               Payslip karyawan
              </div>

              <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                  <div class="column">
                    <p><span class="font-weight-bold">Nama karyawan:</span> <?= $payslip["nama_pertama"]; ?> <?= $payslip["nama_tengah"]; ?> <?= $payslip["nama_belakang"]; ?></p>
                    <p><span class="font-weight-bold">Departemen:</span> <?= $payslip["nama_departemen"]; ?></p>
                    <p><span class="font-weight-bold">Tingkatan:</span> <?= $payslip["tingkatan_jabatan"]; ?></p>
                  </div>
    

                  <div class="column">
                    <p><span class="font-weight-bold">Payroll:</span> <?= $payslip["judul_payroll"]; ?></p>
                  </div>
                </div>

                <hr class="hr">
                <div class="d-flex flex-row justify-content-around card p-3">

                  <div class="column">
                    
                    <p><span class="font-weight-bold">Gaji per bulan:</span> <?= "Rp. " . number_format($payslip["gaji_perbulan"],  2, ".", ",") ?></p>
                    <p><span class="font-weight-bold">Tunjangan:</span> <?= "Rp. " . number_format($payslip["tunjangan"],  2, ".", ",") ?></p>
                    <?php $ot = ($payslip["bruto_karyawan"] - ($payslip["gaji_perbulan"] + $payslip["tunjangan"])) / round($payslip["gaji_perbulan"] / 173, 0)  ?>
                    <p><span class="font-weight-bold">OT (Overtime):</span> <?= $ot; ?> jam (<?= "Rp. " . number_format($ot * round($payslip["gaji_perbulan"] / 173, 0),  2, ".", ",") ?>)</p>
                    <p><span class="font-weight-bold">Total gaji kotor:</span> <?= "Rp. " . number_format($payslip["bruto_karyawan"],  2, ".", ",") ?></p>
                  </div>
  
                  <div class="column">
                    <p><span class="font-weight-bold">Jumlah cuti:</span> <?= $payslip["jumlah_cuti"]; ?> hari</p>
                    <p><span class="font-weight-bold">Jumlah kehadiran:</span> <?= $payslip["jumlah_kehadiran"]; ?> hari</p>
                    <p><span class="font-weight-bold">PPH21:</span> <?= $payslip["pph21"]; ?> %</p>
                    <p><span class="font-weight-bold">Total gaji bersih:</span> <?= "Rp. " . number_format($payslip["gaji_bersih_karyawan"],  2, ".", ",") ?></p>
                  </div>

                </div>

                <div class="button text-center print">
                  <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                </div>

              </div>
              <!-- /.card-body -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  