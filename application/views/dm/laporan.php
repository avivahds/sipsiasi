<?php

//Bobot
function bobotsatu()
{
    $db = (array)get_instance()->db;
    // $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
    $selectdb = new mysqli('zeth-db.cf6dtysfd4y8.us-east-1.rds.amazonaws.com', $db['username'], $db['password'], $db['database']);

    $bobot1 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 1");
    while ($databobot = mysqli_fetch_array($bobot1)) {
        $hasilbobot1 = $databobot['bobot'] / 100;
    }
    return $hasilbobot1;
}

function bobotdua()
{
    $db = (array)get_instance()->db;
    // $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
    $selectdb = new mysqli('zeth-db.cf6dtysfd4y8.us-east-1.rds.amazonaws.com', $db['username'], $db['password'], $db['database']);

    $bobot2 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 2");
    while ($databobot = mysqli_fetch_array($bobot2)) {
        $hasilbobot2 = $databobot['bobot'] / 100;
    }
    return $hasilbobot2;
}

function bobottiga()
{
    $db = (array)get_instance()->db;
    // $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
    $selectdb = new mysqli('zeth-db.cf6dtysfd4y8.us-east-1.rds.amazonaws.com', $db['username'], $db['password'], $db['database']);

    $bobot3 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 3");
    while ($databobot = mysqli_fetch_array($bobot3)) {
        $hasilbobot3 = $databobot['bobot'] / 100;
    }
    return $hasilbobot3;
}

function bobotempat()
{
    $db = (array)get_instance()->db;
    // $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
    $selectdb = new mysqli('zeth-db.cf6dtysfd4y8.us-east-1.rds.amazonaws.com', $db['username'], $db['password'], $db['database']);

    $bobot4 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 4");
    while ($databobot = mysqli_fetch_array($bobot4)) {
        $hasilbobot4 = $databobot['bobot'] / 100;
    }
    return $hasilbobot4;
}

//Pembagi Normalisasi
function pembagiNM($matrik)
{
    for ($i = 0; $i < 4; $i++) {
        $pangkatdua[$i] = 0;
        for ($j = 0; $j < sizeof($matrik); $j++) {
            $pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i], 2);
        }
        $pembagi[$i] = sqrt($pangkatdua[$i]);
    }
    return $pembagi;
}

//Normalisasi
function Transpose($squareArray)
{

    if ($squareArray == null) {
        return null;
    }
    $rotatedArray = array();
    $r = 0;

    foreach ($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach ($row as $cell) {
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        } else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus, $bob)
{
    for ($i = 0; $i < sizeof($bob); $i++) {
        $dplus[$i] = 0;
        for ($j = 0; $j < sizeof($aplus); $j++) {
            $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]), 2);
        }
        $dplus[$i] = round(sqrt($dplus[$i]), 4);
    }
    return $dplus;
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg">

            <div class="col-md-4 mx-auto">

                <form action="" method="GET">
                    <div class="col-md-12 ml-auto">
                        <?php echo form_open('dm/perhitungan') ?>
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
                        </div>

                        <div class="input-group mb-2">
                            <select name="tahun_id" id="tahun_id" class="form-control">
                                <option value="">Tahun Akademik</option>

                                <?php foreach ($tahun as $t) : ?>
                                    <?php if ($t['id'] == $this->input->get('tahun_id')) : ?>
                                        <option value="<?= $t['id']; ?>" selected><?= $t['tahun']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $t['id']; ?>"><?= $t['tahun']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Pilih</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </form>

            </div>
            <br>

            <!-- Menampilkan Laporan -->

            <?php
            if ($this->input->get('tahun_id')) :
            ?>

                <div class="card shadow md-4">
                    <div class="card-header py-3"></div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <!-- <h4>Alternatif Berdasarkan Kriteria</h4> -->
                            <?php
                            $no = 1;

                            foreach ($alternatif as $alt) :
                                $Matrik[$no - 1] = array($alt['alt_rapot'], $alt['alt_absensi'], $alt['alt_ekskul'], $alt['alt_kepribadian']);
                            ?>

                            <?php
                                $no++;
                            endforeach; ?>

                            <!-- <h4>Matriks Ternormalisasi</h4> -->
                            <?php
                            $no = 1;
                            $pembagiNM = pembagiNM($Matrik);

                            foreach ($alternatif as $alt) :

                                $MatrikNormalisasi[$no - 1] = array(
                                    $alt['alt_rapot'] / $pembagiNM[0],
                                    $alt['alt_absensi'] / $pembagiNM[1],
                                    $alt['alt_ekskul'] / $pembagiNM[2],
                                    $alt['alt_kepribadian'] / $pembagiNM[3]
                                );
                            ?>

                            <?php
                                $no++;
                            endforeach; ?>

                            <!-- <h4>Matriks Ternormalisasi Terbobot</h4> -->
                            <?php
                            $no = 1;
                            $pembagiNM = pembagiNM($Matrik);
                            $bobotsatu = bobotsatu();
                            $bobotdua = bobotdua();
                            $bobottiga = bobottiga();
                            $bobotempat = bobotempat();

                            foreach ($alternatif as $alt) :

                                $NormalisasiBobot[$no - 1] = array(
                                    $MatrikNormalisasi[$no - 1][0] * $bobotsatu,
                                    $MatrikNormalisasi[$no - 1][1] * $bobotdua,
                                    $MatrikNormalisasi[$no - 1][2] * $bobottiga,
                                    $MatrikNormalisasi[$no - 1][3] * $bobotempat
                                );
                            ?>

                            <?php
                                $no++;
                            endforeach; ?>

                            <!-- <h4>Matriks Solusi Ideal Positif dan Solusi Ideal Negatif</h4> -->
                            <?php
                            $NormalisasiBobotTrans = Transpose($NormalisasiBobot);
                            ?>

                            <?php
                            $idealpositif = array(max($NormalisasiBobotTrans[0]), min($NormalisasiBobotTrans[1]), max($NormalisasiBobotTrans[2]), max($NormalisasiBobotTrans[3]));
                            ?>

                            <?php
                            $idealnegatif = array(min($NormalisasiBobotTrans[0]), max($NormalisasiBobotTrans[1]), min($NormalisasiBobotTrans[2]), min($NormalisasiBobotTrans[3]));
                            ?>

                            <!-- <h4>Matriks Jarak Solusi Ideal Positif dan Jarak Solusi Ideal Negatif</h4> -->
                            <?php
                            $no = 1;
                            $Dplus = JarakIplus($idealpositif, $NormalisasiBobot);
                            $Dmin = JarakIplus($idealnegatif, $NormalisasiBobot);

                            foreach ($alternatif as $alt) : ?>

                            <?php
                                $no++;
                            endforeach; ?>

                            <!-- <h4>Nilai Preferensi</h4> -->
                            <table class="table table-bordered" id="pdf" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">No.</th>
                                        <th scope="col">Tahun Akademik</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;

                                    $nilaiV = array();
                                    rsort($nilaiV);
                                    foreach ($alternatif as $ds) :
                                        $nilaiV[$no - 1] = $Dmin[$no - 1] / ($Dmin[$no - 1] + $Dplus[$no - 1]);
                                    ?>

                                        <tr>
                                            <th scope="row" style="text-align: center;"> <?= $no; ?> </th>
                                            <td style="text-align: center;"> <?= $ds['tahun']; ?> </td>
                                            <td> <?= $ds['nama_siswa']; ?> </td>
                                            <td style="text-align: center;"> <?= $ds['nama_jurusan']; ?> </td>
                                            <td style="text-align: center;"> <?= $ds['kelas']; ?> </td>
                                            <td style="text-align: center;"> <?= $nilaiV[$no - 1]; ?> </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>
</div>