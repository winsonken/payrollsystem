<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah payroll</h1>
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
                <h3 class="card-title">Form tambah payroll</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/payroll/save_payroll" method="post">
                <?= csrf_field(); ?>
                <?php helper('form'); ?>
                <?php $errors = validation_errors(); ?>

                <div class="card-body">
                  <div class="form-group">
                    <label for="kode-payroll">Kode payroll</label>
                    <input type="text" class="form-control <?= array_key_exists("kode-payroll", $errors) ? 'is-invalid' : '' ?>" id="kode-payroll" name="kode-payroll" placeholder="Kode payroll" value="<?= old('kode-payroll') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('kode-payroll'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="judul-payroll">Judul payroll</label>
                    <input type="text" class="form-control <?= array_key_exists("judul-payroll", $errors) ? 'is-invalid' : '' ?>" id="judul-payroll" name="judul-payroll" placeholder="Judul payroll" value="<?= old('judul-payroll') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('judul-payroll'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tanggal-mulai">Tanggal mulai</label>
                    <input type="date" class="form-control <?= array_key_exists("tanggal-mulai", $errors) ? 'is-invalid' : '' ?>" id="tanggal-mulai" name="tanggal-mulai" value="<?= old('tanggal-mulai') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('tanggal-mulai'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_berakhir">Tanggal berakhir</label>
                    <input type="date" class="form-control <?= array_key_exists("tanggal-berakhir", $errors) ? 'is-invalid' : '' ?>" id="tanggal-berakhir" name="tanggal-berakhir" value="<?= old('tanggal-berakhir') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('tanggal-berakhir'); ?>
                    </div>
                  </div>

                </div>
               
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Tambah payroll</button>
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
  