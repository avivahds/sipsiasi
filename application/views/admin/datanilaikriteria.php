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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataNilaiKriteriaModal">Tambah Data Nilai Kriteria</a>

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No.</th>
                                    <th scope="col">Kriteria</th>
                                    <th scope="col">Rentang Nilai</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($nilaiKriteria as $nk) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"> <?= $i; ?> </th>
                                        <td> <?= $nk['kriteria']; ?> </td>
                                        <td style="text-align: center;"> <?= $nk['rentang_nilai']; ?> </td>
                                        <td style="text-align: center;"> <?= $nk['nilai']; ?> </td>
                                        <td style="text-align: center;">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editNilaiKriteriaModal<?php echo $nk['id']; ?>">edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusNilaiKriteriaModal<?php echo $nk['id']; ?>">delete</a>
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
<div class="modal fade" id="newDataNilaiKriteriaModal" tabindex="-1" aria-labelledby="newDataNilaiKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataNilaiKriteriaModalLabel">Tambah Data Nilai Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=" <?= base_url('admin/datanilaikriteria'); ?> " method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <select name="kriteria_id" id="kriteria_id" class="form-control">
                            <?php foreach ($kriteria as $k) : ?>

                                <option value="<?= $k['id']; ?>"><?= $k['kriteria']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <!-- <select name="rentang_nilai" id="rentang_nilai" class="form-control">
                        </select> -->

                        <input type="text" class="form-control" id="rentang_nilai" name="rentang_nilai" placeholder="Rentang Nilai" value="<?= set_value('rentang_nilai'); ?>">
                        <?= form_error('rentang_nilai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <!-- <select name="nilaikriteria" id="nilaikriteria" class="form-control">
                        </select> -->

                        <input type="text" class="form-control" id="nilai_kriteria" name="nilai_kriteria" placeholder="Nilai" value="<?= set_value('nilai'); ?>">
                        <?= form_error('nilai_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
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
<!-- End of Create Model -->

<!-- Edit Modal -->
<?php $i = 1; ?>
<?php foreach ($nilaiKriteria as $nk1) : ?>
    <div class="modal fade" id="editNilaiKriteriaModal<?php echo $nk1['id']; ?>" tabindex="-1" aria-labelledby="editNilaiKriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNilaiKriteriaModalLabel">Edit Data Nilai Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('admin/editdatanilaikriteria/' . $nk1['id']); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <select name="kriteria_id" id="kriteria_id" class="form-control">
                            <?php foreach ($kriteria as $k) : ?>
                                <?php if ($k['id'] == $nk1['kriteria_id']) : ?>
                                    <option value="<?= $k['id']; ?>" selected><?= $k['kriteria']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['kriteria']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="rentangnilai" name="rentangnilai" placeholder="Rentang Nilai" value="<?php echo $nk1['rentang_nilai']; ?>">
                        <?= form_error('rentangnilai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilaikriteria" name="nilaikriteria" placeholder="Nilai" value="<?php echo $nk1['nilai']; ?>">
                        <?= form_error('nilaikriteria', '<small class="text-danger pl-3">', '</small>'); ?>
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
<?php foreach ($nilaiKriteria as $nk1) : ?>
    <div class="modal fade" id="hapusNilaiKriteriaModal<?php echo $nk1['id']; ?>" tabindex="-1" aria-labelledby="hapusNilaiKriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusNilaiKriteriaModalLabel">Hapus Data Nilai Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/hapusdatanilaikriteria/' . $nk1['id']); ?>" method="post">
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
<?php endforeach; ?>
<!-- End of Delete Modal -->