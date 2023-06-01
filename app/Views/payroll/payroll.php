<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payroll</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="/payroll/add_payroll" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle text-white-50"style="font-size: 15px;"></i> 
                    Tambah payroll
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
                      <th>Kode payroll</th>
                      <th>Judul payroll</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal berakhir</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($payroll as $allPayroll) : ?>
                    <tr>  
                      <td><?= $i++; ?></td>
                      <td><?= $allPayroll->kode_payroll; ?></td>
                      <td><?= $allPayroll->judul_payroll; ?></td>
                      <td><?= $allPayroll->tanggal_mulai; ?></td>
                      <td><?= $allPayroll->tanggal_berakhir; ?></td>
                      <td class="d-flex justify-content-center">
                        <a href="/payroll/edit_payroll/<?= $allPayroll->id_payroll ?>" class="btn btn-warning ml-2">
                            <i class="fas fa-edit text-light" style="font-size: 15px;"></i>
                        </a>
                        <a href="" class="btn btn-danger ml-2" id="delete-payroll-button" type="button" data-toggle="modal" data-target="#deletePayroll" data-id="<?= $allPayroll->id_payroll ?>">
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
              <div class="modal fade" id="deletePayroll" tabindex="-1" role="dialog" aria-labelledby="deletePayroll" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete Payroll</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Apakah anda yakin ingin menghapus payroll ini?</h5>
                              <small class="text-danger">Note: payroll dapat dihapus jika semua payslip yang terdapat dipayroll tersebut telah dihapus</small>
                          </div>
                          <form action="/payroll/delete_payroll" method="post">
                              <input type="hidden" id="delete-payroll" name="delete-payroll">
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

  
  