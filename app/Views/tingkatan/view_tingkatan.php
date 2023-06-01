<div class="table-responsive">
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tingkatan jabatan</th>
                <th>Hitung OT</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $i = 1 ?>
        <?php foreach($tingkatan as $allTingkatan) : ?>
            <tr>  
                <td><?= $i++; ?></td>
                <td><?= $allTingkatan->tingkatan_jabatan; ?></td>
                <?php 
                if ($allTingkatan->hitung_ot == 1) {
                    $ot = "Hitung   OT";
                } else if ($allTingkatan->hitung_ot == 0) {
                    $ot = "Tidak hitung OT";
                }
                ?>
                <td><?= $ot ?></td>
                <td class="d-flex justify-content-center">
                    <a href="/tingkatan/edit_tingkatan/<?= $allTingkatan->id_tingkat ?>" class="btn btn-warning ml-2">
                        <i class="fas fa-edit text-light" style="font-size: 15px;"></i>
                    </a>
                    <a href="" class="btn btn-danger ml-2" id="delete-tingkatan-button" type="button" data-toggle="modal" data-target="#deleteTingkatan" data-id="<?= $allTingkatan->id_tingkat?>">
                        <i class="fas fa-trash" style="font-size: 15px;"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>  
    </table>
</div>


