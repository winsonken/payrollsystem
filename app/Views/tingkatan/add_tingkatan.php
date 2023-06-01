<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Tingkatan</h1>
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
                <h3 class="card-title">Form tambah tingkatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/tingkatan/save_tingkatan" method="post">
                <?= csrf_field(); ?>
                <?php helper('form'); ?>
                <?php $errors = validation_errors(); ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="tingkatan-departemen">Nama departemen</label>
                    <select id="tingkatan-departemen" name="tingkatan-departemen" class="form-control <?= array_key_exists("tingkatan-departemen", $errors) ? 'is-invalid' : '' ?>">
                      <option selected hidden value="">Pilih departemen</option>
                        <?php foreach($departemen as $allDepartemen) : ?>
                           <option value="<?= $allDepartemen->id_departemen; ?>" <?= set_value('tingkatan-departemen') == $allDepartemen->id_departemen ? "selected" : '' ?>><?= $allDepartemen->nama_departemen; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= validation_show_error('tingkatan-departemen'); ?>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="tingkatan-jabatan">Nama tingkatan</label>
                    <input type="text" class="form-control <?= array_key_exists("tingkatan-jabatan", $errors) ? 'is-invalid' : '' ?>" id="tingkatan-jabatan" name="tingkatan-jabatan" placeholder="Tingkatan jabatan" value="<?= old('tingkatan-jabatan') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('tingkatan-jabatan'); ?>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <label for="gaji-pokok">Gaji pokok</label>
                    <input type="number" class="form-control" id="gaji-pokok" name="gaji-pokok" placeholder="Gaji pokok">
                  </div> -->

                  <div class="form-group">
                      <label for="hitung-ot">Hitung OT</label>
                      <select name="hitung-ot" id="hitung-ot" class="form-control <?= array_key_exists("hitung-ot", $errors) ? 'is-invalid' : '' ?>">
                        <option selected hidden value="">Pilih</option>
                        <?php
                          $hitungOT = [
                            1 => "Hitung OT", 
                            0 => "Tidak hitung OT"
                          ];
                        ?>

                        <?php foreach($hitungOT as $allHitungOT => $value) : ?>
                        <option value="<?= $allHitungOT; ?>" <?= set_value('hitung-ot') == $allHitungOT ? "selected" : '' ?>><?= $value; ?></option>
                        <?php endforeach;  ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('hitung-ot'); ?>
                    </div>
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Tambah tingkatan</button>
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
  