<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah payslip</h1>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary">
              <div style="background-color: #28a745;" class="card-header">
                <h3 class="card-title">Form tambah payslip</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/payslip/save_payslip" method="post">
                <?= csrf_field(); ?>
                <?php helper('form'); ?>
                <?php $errors = validation_errors(); ?>

                <div class="card-body">
                  <div class="row">

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="payroll">Payroll</label>
                          <select id="payroll" name="payroll" class="form-control <?= array_key_exists("payroll", $errors) ? 'is-invalid' : '' ?>">
                              <option selected hidden value="">Pilih payroll</option>
                              <?php foreach($payroll as $allPayroll) : ?>
                              <option value="<?= $allPayroll->id_payroll; ?>" <?= set_value('payroll') == $allPayroll->id_payroll ? 'Selected' : '' ?>><?= $allPayroll->judul_payroll; ?></option>
                              <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">
                              <?= validation_show_error('payroll'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama-karyawan">Nama karyawan</label>
                            <select id="nama-karyawan" name="nama-karyawan" class="form-control <?= array_key_exists("nama-karyawan", $errors) ? 'is-invalid' : '' ?>">
                                <option selected hidden value="">Pilih karyawan</option>
                                <?php foreach($karyawan as $allKaryawan) : ?>
                                <option value="<?= $allKaryawan->id_karyawan; ?>" <?= set_value('nama-karyawan') == $allKaryawan->id_karyawan ? 'Selected' : '' ?>><?= $allKaryawan->nama_pertama; ?> <?= $allKaryawan->nama_tengah; ?> <?= $allKaryawan->nama_belakang; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama-karyawan'); ?>
                            </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="gaji-karyawan">Gaji per-bulan</label>  
                          <input type="number" class="form-control <?= array_key_exists("gaji-karyawan", $errors) ? 'is-invalid' : '' ?> allInput" id="gaji-karyawan" name="gaji-karyawan" placeholder="Gaji karyawan" min=0 value="<?= old('gaji-karyawan') ?>">
                          <div class="invalid-feedback">
                              <?= validation_show_error('gaji-karyawan'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="jumlah-cuti">Jumlah cuti (hari/bulan)</label>
                          <input type="number" class="form-control <?= array_key_exists("jumlah-cuti", $errors) ? 'is-invalid' : '' ?>" id="jumlah-cuti" name="jumlah-cuti" placeholder="Jumlah cuti" value="<?= old('jumlah-cuti') ?>">
                          <div class="invalid-feedback">
                              <?= validation_show_error('jumlah-cuti'); ?>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                  <div class="row">

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="tunjangan-karyawan">Tunjangan</label>
                          <input type="number" class="form-control <?= array_key_exists("tunjangan-karyawan", $errors) ? 'is-invalid' : '' ?> allInput" id="tunjangan-karyawan" name="tunjangan-karyawan" placeholder="Tunjangan" value="<?= old('tunjangan-karyawan') ?>">
                          <div class="invalid-feedback">
                              <?= validation_show_error('tunjangan-karyawan'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="kehadiran-karyawan">Kehadiran (hari/bulan)</label>
                          <input type="number" class="form-control <?= array_key_exists("kehadiran-karyawan", $errors) ? 'is-invalid' : '' ?> allInput gaji-bersih hadir" id="kehadiran-karyawan" name="kehadiran-karyawan" placeholder="Jumlah kehadiran" min=0 value="<?= old('kehadiran-karyawan') ?>">
                          <div class="invalid-feedback">
                              <?= validation_show_error('kehadiran-karyawan'); ?>
                          </div>
                        </div>
                      </div>
                      
                  </div>

                  <div class="row">

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="ot">OT (Overtime) (Per-jam)</label>
                          <input type="number" class="form-control <?= array_key_exists("ot", $errors) ? 'is-invalid' : '' ?> allInput gaji-bersih ot" id="ot" name="ot" placeholder="OT" value="<?= old('ot') ?>">
                          <div class="invalid-feedback">
                              <?= validation_show_error('ot'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="pph21">PPH21 (Persen)</label>
                          <input type="number" class="form-control <?= array_key_exists("pph21", $errors) ? 'is-invalid' : '' ?> allInput gaji-bersih pph21" id="pph21" name="pph21" placeholder="Pph21" value="<?= old('pph21') ?>">
                          <div class="invalid-feedback">
                              <?= validation_show_error('pph21'); ?>
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="gaji-kotor">Gaji kotor</label>
                          <input type="number" class="form-control" id="gaji-kotor" name="gaji-kotor" placeholder="Gaji kotor" min=0 readonly>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="gaji-bersih">Gaji bersih</label>
                          <input type="number" class="form-control" id="gaji-bersih" name="gaji-bersih" placeholder="Gaji bersih" readonly>
                        </div>
                      </div>
                      
                  </div>

                </div>

                <!-- /.card-footer -->
                <div class="card-footer">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Tambah payslip</button>
                </div>
              </form>
             
            </div>

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
  <script>
    const karyawan = document.querySelector("#nama-karyawan");
    const gajiKaryawan = document.querySelector("#gaji-karyawan");
    const gajiBersih = document.querySelector("#gaji-bersih");
    const gajiKotor = document.querySelector("#gaji-kotor");
    const tunjanganKaryawan = document.querySelector("#tunjangan-karyawan");
    const kehadiranKaryawan = document.querySelector("#kehadiran-karyawan")
    const cuti = document.querySelector("#jumlah-cuti");
    const pajak = document.querySelector("#pph21");
    const ot = document.querySelector("#ot");
    const allInput = document.querySelectorAll(".allInput");
    const payroll = document.querySelector("#payroll");
    
    
    window.addEventListener("load", ev => {
      <?php foreach($karyawan as $allKaryawan) : ?>
        if (parseInt(karyawan.value) == <?= $allKaryawan->id_karyawan ?>) {
           if (<?= $allKaryawan->hitung_ot ?> == 0) {
            // Tidak hitung OT
            ot.value = 0;
            ot.readOnly = true;
          }
        }
      <?php endforeach; ?>
    })

    payroll.addEventListener("change", e => {
      karyawan.value = "";
      gajiKaryawan.value = "";
      tunjanganKaryawan.value = "";
      cuti.value = "";
      kehadiranKaryawan.value = "";
      pajak.value = "";
      gajiKotor.value = 0;
      gajiBersih.value = 0;

    })
    karyawan.addEventListener("input", e => {
      gajiKaryawan.value = "";
      tunjanganKaryawan.value = "";
      cuti.value = "";
      kehadiranKaryawan.value = "";
      pajak.value = "";
      gajiKotor.value = 0;
      gajiBersih.value = 0;

      <?php foreach($karyawan as $allKaryawan) : ?>
        if (parseInt(e.target.value) == <?= $allKaryawan->id_karyawan ?>) {
          if (<?= $allKaryawan->hitung_ot ?> == 1) {
            // Hitung OT
            ot.value = "";
            ot.readOnly = false;
          } else if (<?= $allKaryawan->hitung_ot ?> == 0) {
            // Tidak hitung OT
            ot.value = 0;
            ot.readOnly = true;
          }
        }
      <?php endforeach; ?>
    })  
    
    allInput.forEach(e => {
      e.addEventListener("input", e1 => {
        var sum = 0;
        allInput.forEach(e2 => {
          // // Gaji kotor
          if (!e2.classList.contains("gaji-bersih")) {
            var hasil = parseInt(e2.value);
            if (isNaN(hasil)) {
              hasil = 0;
            }
            sum += hasil;
            gajiKotor.value = sum;
            
            hitungOT();
          }
        
          hitungKehadiran();
          hitungPajak();
        
        })

      })
    })

    function hitungOT () {
      // Hitung OT
      if (ot.value) {
        const gajiPerOT = parseInt(gajiKaryawan.value) / 173;
        const pembulatanGaji = gajiPerOT.toFixed(0);
        const totalGajiOT = (parseInt(ot.value) * pembulatanGaji) + parseInt(gajiKotor.value);
        return gajiKotor.value = totalGajiOT;
      }
    }
    
    function hitungKehadiran() {
      // Hitung kehadiran
      if (kehadiranKaryawan.value) {
        if (kehadiranKaryawan.value <= 29) {
          const tunjangan = parseInt(tunjanganKaryawan.value);
          const gajiPerOT = parseInt(gajiKaryawan.value) / 173;
          const pembulatanGaji = gajiPerOT.toFixed(0);
          const hitungKehadiranKaryawan = ((parseInt(kehadiranKaryawan.value) / 30) * (parseInt(gajiKaryawan.value) + parseInt(tunjanganKaryawan.value))) + (parseInt(ot.value) * pembulatanGaji) ;
 
          return gajiBersih.value = hitungKehadiranKaryawan; 
        } else {
          return gajiBersih.value = gajiKotor.value; 
        }
      }
      
    }

    function hitungPajak() {
      // Hitung pajak 
      if (pajak.value) {
        const totalPajak = parseInt(pajak.value) / 100;
        const totalGajiBersih = parseInt(gajiBersih.value)
        const gajiPajak = totalGajiBersih - (totalGajiBersih * totalPajak);
        return gajiBersih.value = gajiPajak;
      }
    }

  </script>