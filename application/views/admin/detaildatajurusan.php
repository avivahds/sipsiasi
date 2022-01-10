<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg">

            <div class="card shadow md-4">
                <div class="card-header py-3"></div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="text-align: center;">
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Kelas</th>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataSiswa as $ds) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"> <?= $i; ?> </th>
                                        <td> <?= $ds['nama_siswa']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['nama_jurusan']; ?> </td>
                                        <td style="text-align: center;"> <?= $ds['kelas']; ?> </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>