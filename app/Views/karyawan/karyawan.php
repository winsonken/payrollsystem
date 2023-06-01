<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="/karyawan/add_karyawan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-user-plus text-white-50"style="font-size: 15px;"></i> 
                    Tambah Karyawan
                </a>  
            </ol>
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
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datasearch" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Departemen</th>
                      <th>Tingkatan</th>
                      <th>Shift</th>
                      <th>Kontak</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($karyawan as $allKaryawan) : ?>
                    <tr>  
                      <td><?= $i++; ?></td>
                      <td><?= $allKaryawan->nama_pertama; ?> <?= $allKaryawan->nama_tengah; ?> <?= $allKaryawan->nama_belakang; ?></td>
                      <td><?= $allKaryawan->nama_departemen; ?></td>
                      <td><?= $allKaryawan->tingkatan_jabatan; ?></td>
                      <td><?= $allKaryawan->kode_shift; ?> (<?= $allKaryawan->shift_mulai; ?> - <?= $allKaryawan->shift_selesai; ?>)</td>
                      <td><?= $allKaryawan->kontak; ?></td>
                      <td class="d-flex justify-content-center">
                        <a href="/karyawan/view_karyawan/<?= $allKaryawan->id_karyawan ?>" class="btn btn-info ml-2">
                            <i class="fas fa-eye" style="font-size: 15px;"></i>
                        </a>
                        <a href="/karyawan/edit_karyawan/<?= $allKaryawan->id_karyawan ?>" class="btn btn-warning ml-2">
                            <i class="fas fa-edit text-light" style="font-size: 15px;"></i>
                        </a>
                        <a href="" class="btn btn-danger ml-2" id="delete-karyawan-button" type="button" data-toggle="modal" data-target="#deleteKaryawan" data-id="<?= $allKaryawan->id_karyawan ?>">
                            <i class="fas fa-trash" style="font-size: 15px;"></i>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>  
                  </table>
                </div>
              </div>
              <!-- /.card-body -->

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteKaryawan" tabindex="-1" role="dialog" aria-labelledby="deleteKaryawan" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete Karyawan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Apakah anda yakin ingin menghapus karyawan ini?</h5>
                              <small class="text-danger">Note: Menghapus karyawan juga akan menghapus akun mereka & seluruh payslip mereka</small>
                          </div>
                          <form action="/karyawan/delete_karyawan" method="post">
                              <input type="hidden" id="delete-karyawan" name="delete-karyawan">
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
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

  
  