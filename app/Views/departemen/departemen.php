<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departemen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="/departemen/add_departemen" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle text-white-50"style="font-size: 15px;"></i> 
                    Tambah departemen
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
                    <table id="datatable" class="table table-bordered table-striped">
                      <thead>
                      <tr> 
                        <th>No</th>
                        <th>Kode departemen</th>
                        <th>Nama departemen</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1 ?>
                      <?php foreach($departemen as $allDepartemen) : ?>
                      <tr>  
                        <td><?= $i++; ?></td>
                        <td><?= $allDepartemen->kode_departemen; ?></td>
                        <td><?= $allDepartemen->nama_departemen; ?></td>
                        <td class="d-flex justify-content-center">
                          <a href="/departemen/edit_departemen/<?= $allDepartemen->id_departemen ?>" class="btn btn-warning ml-2">
                              <i class="fas fa-edit text-light" style="font-size: 15px;"></i>
                          </a>
                          <a href="" class="btn btn-danger ml-2" id="delete-departemen-button" type="button" data-toggle="modal" data-target="#deleteDepartemen" data-id="<?= $allDepartemen->id_departemen?>">
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
              <div class="modal fade" id="deleteDepartemen" tabindex="-1" role="dialog" aria-labelledby="deleteDepartemen" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete Departemen</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Apakah anda yakin ingin menghapus departemen ini?</h5>
                              <small class="text-danger">Note: Departemen dapat dihapus jika semua tingkatan yang terdapat didepartemen ini telah dihapus</small>
                          </div>
                          <form action="/departemen/delete_departemen" method="post">
                              <input type="hidden" id="delete-departemen" name="delete-departemen">
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

  
  