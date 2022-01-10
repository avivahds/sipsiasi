<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg">

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