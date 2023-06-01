<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payslip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="/payslip/add_payslip" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle text-white-50"style="font-size: 15px;"></i> 
                    Tambah payslip
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
                      <th>Judul payroll</th>
                      <th>Nama karyawan</th>
                      <th>Gaji/bulan</th>
                      <th>Tunjangan</th>
                      <th>Gaji bersih</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($payslip as $allPayslip) : ?>
                    <tr>  
                      <td><?= $i++; ?></td>
                      <td><?= $allPayslip->judul_payroll; ?></td>
                      <td><?= $allPayslip->nama_pertama ?> <?= $allPayslip->nama_tengah ?> <?= $allPayslip->nama_belakang ?></td>
                      <td><?= "Rp. " . number_format($allPayslip->gaji_perbulan,  2, ".", ",") ?></td>
                      <td><?= "Rp. " . number_format($allPayslip->tunjangan,  2, ".", ",") ?></td>
                      <td><?= "Rp. " . number_format($allPayslip->gaji_bersih_karyawan,  2, ".", ",") ?></td>
                      <td class="d-flex justify-content-center">
                        <a href="/payslip/view_payslip/<?= $allPayslip->id_gaji ?>" class="btn btn-info ml-2">
                            <i class="fas fa-eye" style="font-size: 15px;"></i>
                        </a>
                        <a href="/payslip/edit_payslip/<?= $allPayslip->id_gaji ?>" class="btn btn-warning ml-2">
                            <i class="fas fa-edit text-light" style="font-size: 15px;"></i>
                        </a>
                        <a href="" class="btn btn-danger ml-2" id="delete-payslip-button" type="button" data-toggle="modal" data-target="#deletePayslip" data-id="<?= $allPayslip->id_gaji ?>">
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
              <div class="modal fade" id="deletePayslip" tabindex="-1" role="dialog" aria-labelledby="deletePayslip" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete Payslip</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Apakah anda yakin ingin menghapus payslip ini?</h5>
                          </div>
                          <form action="/payslip/delete_payslip" method="post">
                              <input type="hidden" id="delete-payslip" name="delete-payslip">
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

  
  