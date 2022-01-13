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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataUserModal">Tambah Data User</a>

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataUser as $du) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"> <?= $i; ?> </th>
                                        <td> <?= $du['name']; ?> </td>
                                        <td style="text-align: center;"> <?= $du['email']; ?> </td>
                                        <td style="text-align: center;"> <?= $du['role']; ?> </td>
                                        <td style="text-align: center;">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editModal<?php echo $du['id']; ?>">edit</a>
                                            <?php if ($du['role'] != 'Administrator') : ?>
                                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal<?php echo $du['id']; ?>">delete</a>
                                            <?php endif; ?>
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
<div class="modal fade" id="newDataUserModal" tabindex="-1" aria-labelledby="newDataUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataUserModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=" <?= base_url('admin/datauser'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="User name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password1" placeholder="Password" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select Level</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
<?php foreach ($dataUser as $du1) : ?>
    <div class="modal fade" id="editModal<?php echo $du1['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('admin/editdatauser/' . $du1['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="User name" value="<?php echo $du1['name']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $du1['email']; ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="form-group">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password1" placeholder="Password" name="password1" value="<?php echo $du1['password']; ?>">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class=" form-group">
                            <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2" value="<?php echo $du1['password']; ?>">
                        </div>
                    </div> -->

                    <div class="form-group">
                        <select class="form-control" name="role_id" id="role_id">
                            <option value=""><?php echo $du1['role']; ?></option>
                            <?php foreach ($role as $r) : ?>
                                <?php if ($r['role'] == $du1['role_id']) : ?>
                                    <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
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

    <?php $i++; ?>
<?php endforeach; ?>
<!-- End of Edit Modal -->

<!-- Delete Modal -->
<?php $i = 1; ?>
<?php foreach ($dataUser as $du1) : ?>
    <div class="modal fade" id="hapusModal<?php echo $du1['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Hapus Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/hapusdatauser/' . $du1['id']); ?>" method="post">
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