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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataSiswaModal">Tambah Data Siswa</a>

            <div class="col-md-4 mx-auto">
                <form action="" method="GET">
                    <div class="col-md-12 ml-auto">
                        <div class="input-group mb-2">
                            <select name="jurusan_id" id="jurusan_id" class="form-control">
                                <option value="">Jurusan</option>

                                <?php foreach ($jurusan as $j) : ?>
                                    <?php if ($j['id'] == $this->input->get('jurusan_id')) : ?>
                                        <option value="<?= $j['id']; ?>" selected><?= $j['nama_jurusan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Pilih</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <br>

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col">No.</th>
                                    <th scope="col">Tahun Akademik</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Nilai Rapot</th>
                                    <th scope="col">Nilai Absensi</th>
                                    <th scope="col">Nilai Ekstrakurikuler</th>
                                    <th scope="col">Nilai Kepribadian</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataSiswa as $ds) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"> <?= $i; ?> </th>
                                        <td style="text-align: center;"> <?= $ds['tahun']; ?> </td>
                                        <td> <?= $ds['nama_siswa']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['nama_jurusan']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['kelas']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['nilai_rapot']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['nilai_absensi']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['nilai_ekskul']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['nilai_kepribadian']; ?> </td>
                                        <td style="text-align: center;">
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editSiswaModal<?php echo $ds['id']; ?>">edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusSiswaModal<?php echo $ds['id']; ?>">delete</a>
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

<!-- Tambah Modal -->
<div class="modal fade" id="newDataSiswaModal" tabindex="-1" aria-labelledby="newDataSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataSiswaModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=" <?= base_url('admin/datasiswa'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" value="<?= set_value('nama_siswa'); ?>">
                        <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select name="tahun_id" id="tahun_id" class="form-control">
                            <option value="">Pilih Tahun Akademik</option>
                            <?php foreach ($tahun as $t) : ?>
                                <option value="<?= $t['id']; ?>"><?= $t['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="jurusan_id" id="jurusan_id" class="form-control">
                            <option value="">Pilih Jurusan</option>
                            <?php foreach ($jurusan as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $kl) : ?>
                                <option value="<?= $kl['id']; ?>"><?= $kl['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_rapot" name="nilai_rapot" placeholder="Nilai rapot" value="<?= set_value('nilai_rapot'); ?>">
                        <?= form_error('nilai_rapot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_absensi" name="nilai_absensi" placeholder="Nilai Absensi" value="<?= set_value('nilai_absensi'); ?>">
                        <?= form_error('nilai_absensi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_ekskul" name="nilai_ekskul" placeholder="Nilai Ekstrakurikuler" value="<?= set_value('nilai_ekskul'); ?>">
                        <?= form_error('nilai_ekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_kepribadian" name="nilai_kepribadian" placeholder="Nilai Kepribadian" value="<?= set_value('nilai_kepribadian'); ?>">
                        <?= form_error('nilai_kepribadian', '<small class="text-danger pl-3">', '</small>'); ?>
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
<!-- End of Tambah Modal -->

<!-- Edit Modal -->
<?php $i = 1; ?>
<?php foreach ($dataSiswa as $ds1) : ?>
    <div class="modal fade" id="editSiswaModal<?php echo $ds1['id']; ?>" tabindex="-1" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('admin/editdatasiswa/' . $ds1['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" value="<?php echo $ds1['nama_siswa']; ?>">
                        <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select name="tahun_id" id="tahun_id" class="form-control">
                            <option value=""><?php echo $ds1['tahun']; ?></option>
                            <?php foreach ($tahun as $t) : ?>
                                <?php if ($t['id'] == $ds1['tahun_id']) : ?>
                                    <option value="<?= $t['id']; ?>" selected><?= $t['tahun']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $t['id']; ?>"><?= $t['tahun']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="jurusan_id" id="jurusan_id" class="form-control">
                            <option value=""><?php echo $ds1['nama_jurusan']; ?></option>
                            <?php foreach ($jurusan as $j) : ?>
                                <?php if ($j['id'] == $ds1['jurusan_id']) : ?>
                                    <option value="<?= $j['id']; ?>" selected><?= $j['nama_jurusan']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option value=""><?php echo $ds1['kelas']; ?></option>
                            <?php foreach ($kelas as $kl) : ?>
                                <?php if ($kl['id'] == $ds1['kelas_id']) : ?>
                                    <option value="<?= $kl['id']; ?>" selected><?= $kl['kelas']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $kl['id']; ?>"><?= $kl['kelas']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_rapot" name="nilai_rapot" placeholder="Nilai Rapot" value="<?php echo $ds1['nilai_rapot']; ?>">
                        <?= form_error('nilai_rapot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_absensi" name="nilai_absensi" placeholder="Nilai Absensi" value="<?php echo $ds1['nilai_absensi']; ?>">
                        <?= form_error('nilai_absensi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_ekskul" name="nilai_ekskul" placeholder="Nilai ekstrakurikuler" value="<?php echo $ds1['nilai_ekskul']; ?>">
                        <?= form_error('nilai_ekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nilai_kepribadian" name="nilai_kepribadian" placeholder="Nilai Kepribadian" value="<?php echo $ds1['nilai_kepribadian']; ?>">
                        <?= form_error('nilai_kepribadian', '<small class="text-danger pl-3">', '</small>'); ?>
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
<?php foreach ($dataSiswa as $ds1) : ?>
    <div class="modal fade" id="hapusSiswaModal<?php echo $ds1['id']; ?>" tabindex="-1" aria-labelledby="hapusSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSiswaModalLabel">Hapus Data Siswa Berprestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/hapusdatasiswa/' . $ds1['id']); ?>" method="post">
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