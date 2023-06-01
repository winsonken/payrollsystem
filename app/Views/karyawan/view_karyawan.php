<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Karyawan - <?= $karyawan["nama_pertama"] ?> <?= $karyawan["nama_tengah"] ?> <?= $karyawan["nama_belakang"] ?></h1>
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
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nama-pertama">Nama pertama</label>
                            <input type="text" class="form-control" id="nama-pertama" name="nama-pertama" placeholder="Nama pertama" value="<?= $karyawan["nama_pertama"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nama-tengah">Nama tengah</label>
                            <input type="text" class="form-control" id="nama-tengah" name="nama-tengah" placeholder="Nama tengah" value="<?= $karyawan["nama_tengah"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nama-belakang">Nama belakang</label>
                            <input type="text" class="form-control" id="nama-belakang" name="nama-belakang" placeholder="Nama belakang" value="<?= $karyawan["nama_belakang"] ?>" disabled>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nik-karyawan">NIK</label>
                            <input type="text" class="form-control" id="nik-karyawan" name="nik-karyawan" placeholder="Nomor NIK" value="<?= $karyawan["nik_karyawan"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="tanggal-lahir">Tanggal lahir</label>
                            <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" placeholder="Tanggal lahir" value="<?= $karyawan["tanggal_lahir"] ?>" disabled>
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
                            <select id="jenis-kelamin" name="jenis-kelamin" class="form-control" disabled>
                                <option><?= $karyawan["jenis_kelamin"] ?></option>
                            </select>
                        </div>

                        <!-- <div class="form-group col-md-2">
                            <label for="status-karyawan">Status</label>
                            <input type="text" class="form-control" id="status-karyawan" placeholder="Status">
                        </div> -->

                        <div class="form-group col-md-3">
                            <label for="status-karyawan">Status</label>
                            <select id="status-karyawan" name="status-karyawan" class="form-control" disabled>
                                <option><?= $karyawan["nama_status"] ?></option>
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
                            <select id="departemen-karyawan" name="departemen-karyawan" class="form-control" disabled>
                                <option><?= $karyawan["nama_departemen"] ?></option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tingkatan-karyawan">Tingkatan</label>
                            <select id="tingkatan-karyawan" name="tingkatan-karyawan" class="form-control" disabled>
                                <option><?= $karyawan["tingkatan_jabatan"] ?></option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="shift-karyawan">Shift</label>
                            <select id="shift-karyawan" name="shift-karyawan" class="form-control" disabled>
                                <option><?= $karyawan["kode_shift"] ?> (<?= $karyawan["shift_mulai"] ?> - <?= $karyawan["shift_selesai"] ?>)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="email-karyawan">Email</label>
                            <input type="email" class="form-control" id="email-karyawan" name="email-karyawan" placeholder="Email" value="<?= $karyawan["email"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="kontak-karyawan">Kontak</label>
                            <input type="text" class="form-control" id="kontak-karyawan" name="kontak-karyawan" placeholder="Nomor telepon" value="<?= $karyawan["kontak"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="alamat-karyawan">Alamat</label>
                            <input type="text" class="form-control" id="alamat-karyawan" name="alamat-karyawan" placeholder="Alamat" value="<?= $karyawan["alamat"] ?>" disabled>
                        </div>  
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="username-karyawan">Username</label>
                            <input type="text" class="form-control" id="username-karyawan" name="username-karyawan" placeholder="Username" value="<?= $karyawan["username"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password-karyawan">Password</label>
                            <input type="password" class="form-control" id="password-karyawan" name="password-karyawan" placeholder="Password" value="<?= $karyawan["password"] ?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="level-karyawan">Level</label>
                            <select id="level-karyawan" name="level-karyawan" class="form-control" disabled>
                                <option><?= ucfirst($karyawan["nama_level"]) ?></option>
                            </select>
                        </div>
                    
                    </div>
             
                 
               

                </div>
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
