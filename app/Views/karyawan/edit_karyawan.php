<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Karyawan</h1>
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
                <h3 class="card-title">Form edit karyawan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/karyawan/update_karyawan/<?= $karyawan["id_karyawan"] ?>" method="post">
                <?= csrf_field(); ?>
                <?php helper('form'); ?>
                <?php $errors = validation_errors(); ?>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nama-pertama">Nama pertama</label>
                            <input type="text" class="form-control <?= array_key_exists("nama-pertama", $errors) ? 'is-invalid' : '' ?>" id="nama-pertama" name="nama-pertama" placeholder="Nama pertama" value="<?= old('nama-pertama') ? old('nama-pertama') : $karyawan["nama_pertama"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama-pertama'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nama-tengah">Nama tengah</label>
                            <input type="text" class="form-control <?= array_key_exists("nama-tengah", $errors) ? 'is-invalid' : '' ?>" id="nama-tengah" name="nama-tengah" placeholder="Nama tengah" value="<?= old('nama-tengah') ? old('nama-tengah') : $karyawan["nama_tengah"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama-tengah'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nama-belakang">Nama belakang</label>
                            <input type="text" class="form-control <?= array_key_exists("nama-belakang", $errors) ? 'is-invalid' : '' ?>" id="nama-belakang" name="nama-belakang" placeholder="Nama belakang" value="<?= old('nama-belakang') ? old('nama-belakang') : $karyawan["nama_belakang"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama-belakang'); ?>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nik-karyawan">NIK</label>
                            <input type="text" class="form-control" id="nik-karyawan <?= array_key_exists("nik-karyawan", $errors) ? 'is-invalid' : '' ?>" name="nik-karyawan" placeholder="Nomor NIK" value="<?= old('nik-karyawan') ? old('nik-karyawan') : $karyawan["nik_karyawan"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama-pertama'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="tanggal-lahir">Tanggal lahir</label>
                            <input type="date" class="form-control <?= array_key_exists("tanggal-lahir", $errors) ? 'is-invalid' : '' ?>" id="tanggal-lahir" name="tanggal-lahir" placeholder="Tanggal lahir" value="<?= old('tanggal-lahir') ? old('tanggal-lahir') : $karyawan["tanggal_lahir"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('tanggal-lahir'); ?>
                            </div>
                        </div>

                        <!-- <div class="form-group col-md-2">
                            <label for="jenis-kelamin">Jenis kelamin</label>
                            <input type="text" class="form-control" id="jenis-kelamin" placeholder="Jenis kelamin">
                        </div> -->

                        <div class="form-group col-md-3">
                            <?php 
                            $jenisKelamin = ['Laki-laki', 'Perempuan'];
                            ?>
                            <label for="jenis-kelamin">Jenis kelamin</label>
                            <select id="jenis-kelamin" name="jenis-kelamin" class="form-control <?= array_key_exists("jenis-kelamin", $errors) ? 'is-invalid' : '' ?>">
                                <?php foreach($jenisKelamin as $jenisKelaminKaryawan) : ?>
                                <option value="<?= $jenisKelaminKaryawan; ?>" <?=  (set_value('jenis-kelamin') ? set_value('jenis-kelamin') : $karyawan['jenis_kelamin']) == $jenisKelaminKaryawan ? 'Selected' : '' ?>><?= $jenisKelaminKaryawan; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('jenis-kelamin'); ?>
                            </div>
                        </div>

                        <!-- <div class="form-group col-md-2">
                            <label for="status-karyawan">Status</label>
                            <input type="text" class="form-control" id="status-karyawan" placeholder="Status">
                        </div> -->

                        <div class="form-group col-md-3">
                            <label for="status-karyawan">Status</label>
                            <select id="status-karyawan" name="status-karyawan" class="form-control <?= array_key_exists("jenis-kelamin", $errors) ? 'is-invalid' : '' ?>">
                                <?php foreach($status as $allStatus) : ?>
                                <option value="<?= $allStatus->id_status; ?>" <?= (set_value('status-karyawan') ? set_value('status-karyawan') : $karyawan['status']) == $allStatus->id_status ? 'Selected' : ''?>><?= $allStatus->nama_status; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </select>
                        </div>
                    </div>
            
                    <div class="form-row">
                        <!-- <div class="form-group col-md-3">
                            <label for="departemen-karyawan">Departemen</label>
                            <input type="text" class="form-control" id="departemen-karyawan" placeholder="Departemen">
                        </div> -->

                        <div class="form-group col-md-3">
                            <label for="departemen-karyawan">Departemen</label>
                            <select id="departemen-karyawan" name="departemen-karyawan" class="form-control <?= array_key_exists("departemen-karyawan", $errors) ? 'is-invalid' : '' ?>">
                                <option selected hidden>Pilih departemen</option>
                                <?php foreach($departemen as $allDepartemen) : ?>
                                <option value="<?= $allDepartemen->id_departemen; ?>" <?= (set_value('departemen-karyawan') ? set_value('departemen-karyawan') : $karyawan['departemen_karyawan']) == $allDepartemen->id_departemen ? 'Selected' : '' ?>><?= $allDepartemen->nama_departemen; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('departemen-karyawan'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tingkatan-karyawan">Tingkatan</label>
                            <select id="tingkatan-karyawan" name="tingkatan-karyawan" class="form-control <?= array_key_exists("tingkatan-karyawan", $errors) ? 'is-invalid' : '' ?>">
                                <option selected hidden value="">Pilih tingkatan</option>
                                <?php foreach($tingkatan as $allTingkatan) : ?>
                                <option value="<?= $allTingkatan->id_tingkat; ?>" data-id=<?= $allTingkatan->tingkatan_departemen ?> <?= (set_value('tingkatan-karyawan') ? set_value('tingkatan-karyawan') : $karyawan['tingkatan']) == $allTingkatan->id_tingkat ? 'Selected' : '' ?>><?= $allTingkatan->tingkatan_jabatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('tingkatan-karyawan'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="shift-karyawan">Shift</label>
                            <select id="shift-karyawan" name="shift-karyawan" class="form-control <?= array_key_exists("shift-karyawan", $errors) ? 'is-invalid' : '' ?>">
                                <option selected hidden>Pilih shift</option>
                                <?php foreach($shift as $allShift) : ?>
                                <option value="<?= $allShift->id_shift; ?>" <?= (set_value('shift-karyawan') ? set_value('shift-karyawan') : $karyawan["shift"]) == $allShift->id_shift ? 'Selected' : '' ?>><?= $allShift->kode_shift; ?> (<?= $allShift->shift_mulai; ?> - <?= $allShift->shift_selesai; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('shift-karyawan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="email-karyawan">Email</label>
                            <input type="email" class="form-control <?= array_key_exists("email-karyawan", $errors) ? 'is-invalid' : '' ?>" id="email-karyawan" name="email-karyawan" placeholder="Email" value="<?= old('email-karyawan') ? old('email-karyawan') : $karyawan["email"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('email-karyawan'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="kontak-karyawan">Kontak</label>
                            <input type="text" class="form-control <?= array_key_exists("kontak-karyawan", $errors) ? 'is-invalid' : '' ?>" id="kontak-karyawan" name="kontak-karyawan" placeholder="Nomor telepon" value="<?= old('kontak-karyawan') ? old('kontak-karyawan') : $karyawan["kontak"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('kontak-karyawan'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="alamat-karyawan">Alamat</label>
                            <input type="text" class="form-control <?= array_key_exists("alamat-karyawan", $errors) ? 'is-invalid' : '' ?>" id="alamat-karyawan" name="alamat-karyawan" placeholder="Alamat" value="<?= old('alamat-karyawan') ? old('alamat-karyawan') : $karyawan["alamat"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('alamat-karyawan'); ?>
                            </div>
                        </div>  
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="username-karyawan">Username</label>
                            <input type="hidden" class="form-control" id="karyawan" name="karyawan" value="<?= $karyawan["karyawan"] ?>">
                            <input type="text" class="form-control <?= array_key_exists("username-karyawan", $errors) ? 'is-invalid' : '' ?>" id="username-karyawan" name="username-karyawan" placeholder="Username" value="<?= old('username-karyawan') ? old('username-karyawan') : $karyawan["username"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('username-karyawan'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password-karyawan">Password</label>
                            <input type="password" class="form-control <?= array_key_exists("password-karyawan", $errors) ? 'is-invalid' : '' ?>" id="password-karyawan" name="password-karyawan" placeholder="Password" value="<?= old('password-karyawan') ? old('password-karyawan') : $karyawan["password"] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('password-karyawan'); ?>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="level-karyawan">Level</label>
                            <input type="hidden" name="id-user" value="<?= $karyawan["id_user"] ?>">
                            <select id="level-karyawan" name="level-karyawan" class="form-control <?= array_key_exists("level-karyawan", $errors) ? 'is-invalid' : '' ?>">
                                <?php foreach($level as $allLevel) : ?>
                                <option value="<?= $allLevel->id_level; ?>" <?= (set_value('level-karyawan') ? set_value('level-karyawan') : $karyawan["level"]) == $allLevel->id_level ? 'Selected' : '' ?>><?= ucfirst($allLevel->nama_level) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= validation_show_error('level-karyawan'); ?>
                            </div>
                        </div>
                    
                    </div>
                </div>
                 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Edit Karyawan</button>
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
  
  <script>
    const selectDepartemen = document.querySelector("#departemen-karyawan");
  
    const selectTingkatan = document.querySelector("#tingkatan-karyawan");
    const tingkatanOption = Array.from(selectTingkatan.children);

    tingkatanOption.forEach(e => {
            if (e.dataset.id != selectDepartemen.value) {
                e.style.display = "none";
            } else {
                e.style.display = "block";
            }
        })

    selectDepartemen.addEventListener("input", e => {
        selectTingkatan.value = '';
        tingkatanOption.forEach(e => {
            if (e.dataset.id != selectDepartemen.value) {
                e.style.display = "none";
            } else {
                e.style.display = "block";
            }
        })
    })

   
  </script>