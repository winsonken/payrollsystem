<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tingkatan</h1>
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
                <h3 class="card-title">Form edit tingkatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/tingkatan/update_tingkatan/<?= $tingkatan["id_tingkat"] ?>" method="post">
                <?= csrf_field(); ?>
                <?php helper('form'); ?>
                <?php $errors = validation_errors(); ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="tingkatan-departemen">Nama departemen</label>
                    <select class="form-control" disabled>
                          <option value="<?= $tingkatan["tingkatan_departemen"]; ?>"><?= $tingkatan["nama_departemen"]; ?></option>
                    </select>
                   <input type="hidden" id="tingkatan-departemen" name="tingkatan-departemen"  value="<?= $tingkatan["tingkatan_departemen"] ?>">
                    <small class="text-danger">Nama departemen tidak bisa diubah</small>
                  </div>
                
                  <div class="form-group">
                    <label for="tingkatan-jabatan">Nama tingkatan</label>
                    <input type="text" class="form-control  <?= array_key_exists("tingkatan-jabatan", $errors) ? 'is-invalid' : '' ?>" id="tingkatan-jabatan" name="tingkatan-jabatan" placeholder="Tingkatan jabatan" value="<?= old('tingkatan-jabatan') ? old('tingkatan-jabatan') : $tingkatan["tingkatan_jabatan"] ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('tingkatan-jabatan'); ?>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <label for="gaji-pokok">Gaji pokok</label>
                    <input type="number" class="form-control" id="gaji-pokok" name="gaji-pokok" placeholder="Gaji pokok" value=">">
                  </div> -->
                  
                  <div class="form-group">
                    <label for="hitung-ot">Hitung OT</label>
                    <select name="hitung-ot" id="hitung-ot" class="form-control  <?= array_key_exists("hitung-ot", $errors) ? 'is-invalid' : '' ?>">
                      <?php
                        $hitungOT = [
                          1 => "Hitung OT", 
                          0 => "Tidak hitung OT"
                        ];
                      ?>
                      <?php foreach($hitungOT as $allhitungOT => $value) : ?>
                        <option value="<?= $allhitungOT ?>" <?= (set_value('hitung-ot') ? set_value('hitung-ot') : $tingkatan['hitung_ot']) == $allhitungOT ? 'Selected' : '' ?>><?= $value; ?></option>
                      <?php endforeach; ?> 

                    </select>
                    <div class="invalid-feedback">
                        <?= validation_show_error('hitung-ot'); ?>
                    </div>
                  </div>
                </div>
                   
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Ubah tingkatan</button>
                </div>
              </form>
            </div>
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
  