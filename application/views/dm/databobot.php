<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg">

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <?= $this->session->flashdata('message'); ?>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No.</th>
                                    <th scope="col">Kriteria</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataBobot as $db) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"> <?= $i; ?> </th>
                                        <td> <?= $db['kriteria']; ?> </td>
                                        <td style="text-align: center;"> <?= $db['bobot']; ?> </td>
                                        <td style="text-align: center;">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editBobotModal<?php echo $db['id']; ?>">edit</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Edit Modal -->
<?php $i = 1; ?>
<?php foreach ($dataBobot as $db1) : ?>
    <div class="modal fade" id="editBobotModal<?php echo $db1['id']; ?>" tabindex="-1" aria-labelledby="editBobotModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBobotModalLabel">Edit Bobot Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('DM/editbobot/' . $db1['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama Kriteria" value="<?php echo $db1['kriteria']; ?>">
                        <?= form_error('kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot Kriteria" value="<?php echo $db1['bobot']; ?>">
                        <?= form_error('bobot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End of Edit Modal -->