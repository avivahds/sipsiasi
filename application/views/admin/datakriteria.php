<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataKriteriaModal">Tambah Data Kriteria</a>

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No.</th>
                                    <th scope="col">Kriteria</th>
                                    <!-- <th scope="col">Bobot</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kriteria as $k) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"> <?= $i; ?> </th>
                                        <td> <?= $k['kriteria']; ?> </td>
                                        <!-- <td style="text-align: center;"> <?= $k['bobot']; ?> </td> -->
                                        <td style="text-align: center;">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editKriteriaModal<?php echo $k['id']; ?>">edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusKriteriaModal<?php echo $k['id']; ?>">delete</a>
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

<!-- Create Modal -->
<div class="modal fade" id="newDataKriteriaModal" tabindex="-1" aria-labelledby="newDataKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataKriteriaModalLabel">Tambah Data Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=" <?= base_url('admin/datakriteria'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama Kriteria" value="<?= set_value('kriteria'); ?>">
                        <?= form_error('kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot Kriteria" value="<?= set_value('bobot'); ?>">
                        <?= form_error('bobot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Create Modal -->

<!-- Edit Modal -->
<?php $i = 1; ?>
<?php foreach ($kriteria as $k1) : ?>
    <div class="modal fade" id="editKriteriaModal<?php echo $k1['id']; ?>" tabindex="-1" aria-labelledby="editKriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKriteriaModalLabel">Edit Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('admin/editdatakriteria/' . $k1['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama Kriteria" value="<?php echo $k1['kriteria']; ?>">
                        <?= form_error('kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot Kriteria" value="<?php echo $k1['bobot']; ?>">
                        <?= form_error('bobot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->

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

<!-- Delete Modal -->
<?php $i = 1; ?>
<?php foreach ($kriteria as $k1) : ?>
    <div class="modal fade" id="hapusKriteriaModal<?php echo $k1['id']; ?>" tabindex="-1" aria-labelledby="hapusKriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusKriteriaModalLabel">Hapus Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/hapusdatakriteria/' . $k1['id']); ?>" method="post">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $i++; ?>
<?php endforeach; ?>
<!-- End of Delete Modal -->