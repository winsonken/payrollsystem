<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tingkatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="/tingkatan/add_tingkatan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle text-white-50"style="font-size: 15px;"></i> 
                    Tambah Tingkatan
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
              <div class="card-header">
                <div class="form-group col-md-3">
                  <label for="tingkatan-departemen">Pilih departemen</label>
                  <select name="tingkatan-departemen" id="tingkatan-departemen" class="form-control">
                    <!-- <option selected hidden>Pilih departemen</option> -->
                    <?php foreach($departemen as $allDepartemen) : ?>
                    <option value="<?=$allDepartemen->id_departemen ?>"><?=$allDepartemen->nama_departemen ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="card-body" id="form-table">
               
              </div>
              <!-- /.card-body -->

             <!-- Delete Modal -->
            <div class="modal fade" id="deleteTingkatan" tabindex="-1" role="dialog" aria-labelledby="deleteTingkatan" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete Tingkatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <h5>Apakah anda yakin ingin menghapus tingkatan ini?</h5>
                              <small class="text-danger">Note: tingkatan dapat dihapus jika tidak terdapat karyawan didalamnya</small>
                          </div>
                          <form action="/tingkatan/delete_tingkatan" method="post">
                              <input type="hidden" id="delete-tingkatan" name="delete-tingkatan">
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

  
  <script>
    const select = document.querySelector("#tingkatan-departemen");
    const container = document.querySelector("#form-table");
    const getData = (url) => {
      return fetch(`${url}/${select.value}`)
        .then(resp => resp.text())
        .then(data => {
            container.innerHTML = data;
      })
    }
    getData("<?= base_url()?>tingkatan")
    select.addEventListener("input", e => getData("<?= base_url()?>tingkatan"))
  </script>

