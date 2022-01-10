<?php

//Bobot
function bobotsatu()
{
    $db = (array)get_instance()->db;
    $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);

    $bobot1 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 1");
    while ($databobot = mysqli_fetch_array($bobot1)) {
        $hasilbobot1 = $databobot['bobot'] / 100;
    }
    return $hasilbobot1;
}

function bobotdua()
{
    $db = (array)get_instance()->db;
    $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);

    $bobot2 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 2");
    while ($databobot = mysqli_fetch_array($bobot2)) {
        $hasilbobot2 = $databobot['bobot'] / 100;
    }
    return $hasilbobot2;
}

function bobottiga()
{
    $db = (array)get_instance()->db;
    $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);

    $bobot3 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 3");
    while ($databobot = mysqli_fetch_array($bobot3)) {
        $hasilbobot3 = $databobot['bobot'] / 100;
    }
    return $hasilbobot3;
}

function bobotempat()
{
    $db = (array)get_instance()->db;
    $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);

    $bobot4 = mysqli_query($selectdb, "SELECT * FROM data_kriteria where id = 4");
    while ($databobot = mysqli_fetch_array($bobot4)) {
        $hasilbobot4 = $databobot['bobot'] / 100;
    }
    return $hasilbobot4;
}


//Bobot
// function bobot()
// {
//     $db = (array)get_instance()->db;
//     $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);

//     $bobotnilai = mysqli_query($selectdb, "SELECT * FROM data_kriteria");
//     $i = 0;
//     while ($databobot = mysql_fetch_array($bobotnilai)) {
//         $bobot[$i] = $databobot['bobot'];
//         $i++;
//     }
//     return $bobot;
// }


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
                <?= $this->session->flashdata('message'); ?>
                <form action="" method="GET">
                    <div class="col-md-12 ml-auto">
                        <?php echo form_open('DM/perhitungan') ?>
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
                            <button class="btn btn-success" type="submit">Hitung</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </form>

            </div>

            <br>

            <!-- Menampilkan Hitungan -->

            <?php
            if ($this->input->get('tahun_id')) :
            ?>

                <div class="card shadow md-4">
                    <div class="card-header py-3">

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Alternatif Berdasarkan Kriteria</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">K1 (Benefit)</th>
                                            <th scope="col">K2 (Cost) </th>
                                            <th scope="col">K3 (Benefit) </th>
                                            <th scope="col">K4 (Benefit) </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;

                                        foreach ($alternatif as $alt) :
                                            $Matrik[$no - 1] = array($alt['alt_rapot'], $alt['alt_absensi'], $alt['alt_ekskul'], $alt['alt_kepribadian']);

                                        ?>
                                            <tr>
                                                <td style="text-align: center;"> <?= $no; ?> </td>
                                                <td style="text-align: center;"> <?= $alt['nama_siswa']; ?> </td>
                                                <td style="text-align: center;"> <?= $alt['alt_rapot']; ?> </td>
                                                <td style="text-align: center;"> <?= $alt['alt_absensi']; ?> </td>
                                                <td style="text-align: center;"> <?= $alt['alt_ekskul']; ?> </td>
                                                <td style="text-align: center;"> <?= $alt['alt_kepribadian']; ?> </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Matriks Ternormalisasi</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">K1 (Benefit) </th>
                                            <th scope="col">K2 (Cost) </th>
                                            <th scope="col">K3 (Benefit) </th>
                                            <th scope="col">K4 (Benefit) </th>
                                        </tr>
                                    </thead>

                                    <tbody>
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
                                            <tr>
                                                <td style="text-align: center;"> <?= $no; ?> </td>
                                                <td style="text-align: center;"> <?php echo $alt['nama_siswa']; ?> </td>
                                                <td style="text-align: center;"> <?php echo round($alt['alt_rapot'] / $pembagiNM[0], 4) ?> </td>
                                                <td style="text-align: center;"> <?php echo round($alt['alt_absensi'] / $pembagiNM[1], 4) ?> </td>
                                                <td style="text-align: center;"> <?php echo round($alt['alt_ekskul'] / $pembagiNM[2], 4) ?> </td>
                                                <td style="text-align: center;"> <?php echo round($alt['alt_kepribadian'] / $pembagiNM[3], 4) ?> </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Matriks Ternormalisasi Terbobot</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">K1 (Benefit) </th>
                                            <th scope="col">K2 (Cost) </th>
                                            <th scope="col">K3 (Benefit) </th>
                                            <th scope="col">K4 (Benefit) </th>
                                        </tr>
                                    </thead>

                                    <tbody>
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
                                            <tr>
                                                <td style="text-align: center;"> <?= $no; ?> </td>
                                                <td style="text-align: center;"> <?= $alt['nama_siswa']; ?> </td>
                                                <td style="text-align: center;"> <?php echo round($MatrikNormalisasi[$no - 1][0] * $bobotsatu, 4) ?> </td>
                                                <td style="text-align: center;"> <?php echo round($MatrikNormalisasi[$no - 1][1] * $bobotdua, 4) ?> </td>
                                                <td style="text-align: center;"> <?php echo round($MatrikNormalisasi[$no - 1][2] * $bobottiga, 4) ?> </td>
                                                <td style="text-align: center;"> <?php echo round($MatrikNormalisasi[$no - 1][3] * $bobotempat, 4) ?> </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Matriks Solusi Ideal Positif dan Solusi Ideal Negatif</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">Nama</th>
                                            <th scope="col">K1 (Benefit) </th>
                                            <th scope="col">K2 (Cost) </th>
                                            <th scope="col">K3 (Benefit) </th>
                                            <th scope="col">K4 (Benefit) </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $NormalisasiBobotTrans = Transpose($NormalisasiBobot);
                                        ?>

                                        <tr>
                                            <?php
                                            $idealpositif = array(max($NormalisasiBobotTrans[0]), min($NormalisasiBobotTrans[1]), max($NormalisasiBobotTrans[2]), max($NormalisasiBobotTrans[3]));
                                            ?>
                                            <td style="text-align: center;"> A+ </td>
                                            <td style="text-align: center;"> <?php echo (round(max($NormalisasiBobotTrans[0]), 4)); ?> </td>
                                            <td style="text-align: center;"> <?php echo (round(min($NormalisasiBobotTrans[1]), 4)); ?> </td>
                                            <td style="text-align: center;"> <?php echo (round(max($NormalisasiBobotTrans[2]), 4)); ?> </td>
                                            <td style="text-align: center;"> <?php echo (round(max($NormalisasiBobotTrans[3]), 4)); ?> </td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $idealnegatif = array(min($NormalisasiBobotTrans[0]), max($NormalisasiBobotTrans[1]), min($NormalisasiBobotTrans[2]), min($NormalisasiBobotTrans[3]));
                                            ?>
                                            <td style="text-align: center;"> A- </td>
                                            <td style="text-align: center;"> <?php echo (round(min($NormalisasiBobotTrans[0]), 4)); ?> </td>
                                            <td style="text-align: center;"> <?php echo (round(max($NormalisasiBobotTrans[1]), 4)); ?> </td>
                                            <td style="text-align: center;"> <?php echo (round(min($NormalisasiBobotTrans[2]), 4)); ?> </td>
                                            <td style="text-align: center;"> <?php echo (round(min($NormalisasiBobotTrans[3]), 4)); ?> </td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Matriks Jarak Solusi Ideal Positif dan Jarak Solusi Ideal Negatif</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">No</th>
                                            <th scope="col">D+</th>
                                            <th scope="col">Hasil</th>
                                            <th scope="col">D-</th>
                                            <th scope="col">Hasil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $Dplus = JarakIplus($idealpositif, $NormalisasiBobot);
                                        $Dmin = JarakIplus($idealnegatif, $NormalisasiBobot);

                                        foreach ($alternatif as $alt) : ?>

                                            <tr>
                                                <td style="text-align: center;"> <?= $no; ?> </td>
                                                <td style="text-align: center;"><?php echo "D", $no ?></td>
                                                <td style="text-align: center;"><?php echo round($Dplus[$no - 1], 4) ?></td>
                                                <td style="text-align: center;"><?php echo "D", $no ?></td>
                                                <td style="text-align: center;"><?php echo round($Dmin[$no - 1], 4) ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Nilai Preferensi</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Nilai</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;

                                        $nilaiV = array();
                                        rsort($nilaiV);
                                        foreach ($alternatif as $alt) :
                                            $nilaiV[$no - 1] = $Dmin[$no - 1] / ($Dmin[$no - 1] + $Dplus[$no - 1]);
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"> <?= $no; ?> </td>
                                                <td style="text-align: center;"><?= $alt['nama_siswa']; ?> </td>
                                                <td style="text-align: center;"><?= $nilaiV[$no - 1]; ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <h4>Ranking</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Nilai</th>
                                            <!-- <th scope="col">Nama Siswa</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- <?php
                                                $no = 1;
                                                $nilaiV = array();
                                                foreach ($alternatif as $alt) :
                                                    $nilaiV[$no - 1] = $Dmin[$no - 1] / ($Dmin[$no - 1] + $Dplus[$no - 1]);
                                                    $no++;
                                                endforeach;
                                                $nilai = $nilaiV;
                                                $alt = $alternatif;
                                                $combine = array_combine($nilai, $alt);
                                                $no = 0;
                                                rsort($combine);
                                                foreach ($combine as $com => $value) { ?>
                                            <tr>
                                                <td style="text-align: center;" <?= $no++; ?> </td>
                                                <td style="text-align: center;" <?= $value; ?> </td>
                                                <td style="text-align: center;" <?= $com; ?> </td>
                                            </tr>
                                        <?php }
                                        ?> -->


                                        <?php
                                        $db = (array)get_instance()->db;
                                        $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);

                                        $testmax = rsort($nilaiV);
                                        for ($i = 0; $i < count($nilaiV); $i++) {
                                            if ($nilaiV[$i] == $testmax) {
                                                $query = mysqli_query($selectdb, "SELECT * FROM data_siswa_berprestasi where id = $i+1");
                                        ?>
                                                <tr>
                                                    <td>
                                                        <center><?php echo ($i + 1); ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $nilaiV[$i]; ?></center>
                                                    </td>
                                                    <?php while ($alternatif = mysqli_fetch_array($query)) { ?>
                                                        <!-- <td> -->
                                                        <!-- <center><?php echo $alternatif['nama_siswa']; ?></center> -->
                                                        <!-- </td> -->
                                                </tr>
                                    <?php
                                                    }
                                                }
                                            } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>
</div>