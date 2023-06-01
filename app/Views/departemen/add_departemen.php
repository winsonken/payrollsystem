<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Departemen</h1>
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
                <h3 class="card-title">Form tambah departemen</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="/departemen/save_departemen" method="post">
                <?= csrf_field(); ?>
                <?php helper('form'); ?>
                <?php $errors = validation_errors(); ?>
        
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode-departemen">Kode departemen</label>
                    <input type="text" class="form-control <?= array_key_exists("kode-departemen", $errors) ? 'is-invalid' : '' ?>" id="kode-departemen" name="kode-departemen" placeholder="Kode departemen" value="<?= old('kode-departemen') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('kode-departemen'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama-departemen">Nama departemen</label>
                    <input type="text" class="form-control <?= array_key_exists("nama-departemen", $errors) ? 'is-invalid' : '' ?>" id="nama-departemen" name="nama-departemen" placeholder="Nama departemen" value="<?= old('nama-departemen') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama-departemen'); ?>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Tambah departemen</button>
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
  