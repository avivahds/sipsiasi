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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataJurusanModal">Tambah Data Jurusan</a>

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Jurusan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jurusan as $j) : ?>
                                    <tr style="text-align: center;">
                                        <th scope="row"> <?= $i; ?> </th>
                                        <td> <?= $j['nama_jurusan']; ?> </td>
                                        <td>
                                            <a href="<?= base_url('admin/detaildatajurusan/') . $j['id']; ?>" class="badge badge-warning">detail</a>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editJurusanModal<?php echo $j['id']; ?>">edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusJurusanModal<?php echo $j['id']; ?>">delete</a>
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

<!-- Create Modal -->
<div class="modal fade" id="newDataJurusanModal" tabindex="-1" aria-labelledby="newDataJurusanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataJurusanModalLabel">Tambah Data Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=" <?= base_url('admin/datajurusan'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama Jurusan" value="<?= set_value('jurusan'); ?>">
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
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
<?php foreach ($jurusan as $j1) : ?>
    <div class="modal fade" id="editJurusanModal<?php echo $j1['id']; ?>" tabindex="-1" aria-labelledby="editJurusanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJurusanModalLabel">Edit Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('admin/editdatajurusan/' . $j1['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama Jurusan" value="<?= $j1['nama_jurusan']; ?>">
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
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

<!-- Delete Modal -->
<?php $i = 1; ?>
<?php foreach ($jurusan as $j1) : ?>
    <div class="modal fade" id="hapusJurusanModal<?php echo $j1['id']; ?>" tabindex="-1" aria-labelledby="hapusJurusanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusJurusanModalLabel">Hapus Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/hapusdatajurusan/' . $j1['id']); ?>" method="post">
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