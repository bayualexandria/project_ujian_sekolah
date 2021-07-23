<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            padding: 0;
            margin: 0;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php

    use App\Models\KelasModel;

    $kelas = new KelasModel();
    $k = $kelas->asObject()->where('id', auth()->id_kelas)->first(); ?>
    <div class="row justify-content-center" style="font-size: 12px;">
        <div class="col-md-4">
            <img src="http://localhost/project_ujian_sekolah/public/assets/img/logo/logo.png" class="rounded-circle" style="width: 50px;">
        </div>
        <div class="col-md-4 text-center">
            <h4>HASIL UJIAN TENGAH SEMESTER</h4>
            <H6>KELAS <?= $k->kelas; ?> | <?= $k->jurusan; ?></H6>
        </div>
        <div class="col-md-4 text-right" style="font-size: 8px;">
            <p>No. Ujian : <?= auth()->nus; ?></p>
        </div>
    </div>
    <div class="position-relative" style="margin-top: -5rem;">
        <hr>
    </div>
    <div class="row text-right mt-5" style="margin-left: 25rem;">


        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title"><?= auth()->name; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $k->jurusan; ?></h6>
                <p class="card-text">Dari hasil yang diperoleh dari ujian yang dikerjakan maka dengan ini siswa/siswi tersebut dinyatakan.</p>
                <h5 class="text-success">LULUS</h5>
            </div>
        </div>

    </div>
    <div class="row mb-3">
        <div class="col-md-12" style="border-bottom: 1px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Ujian</th>
                        <th scope="col" class="text-success">Benar</th>
                        <th scope="col" class="text-danger">Salah</th>
                        <th scope="col">Skor Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">UTS Sistem Operasi</th>
                        <td>5 Soal</td>
                        <td>5 Soal</td>
                        <td>
                            <h6 class="font-weight-bold">55</h6>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row text-right" style="margin-left: 20rem;">
        <div class="card" style="width: 16rem;">
            <div class="card-body">

                <p class="card-text">Biak, <?php
                                            function tgl_indo($tanggal)
                                            {
                                                $bulan = array(
                                                    1 =>   'Januari',
                                                    'Februari',
                                                    'Maret',
                                                    'April',
                                                    'Mei',
                                                    'Juni',
                                                    'Juli',
                                                    'Agustus',
                                                    'September',
                                                    'Oktober',
                                                    'November',
                                                    'Desember'
                                                );
                                                $pecahkan = explode('-', $tanggal);

                                                // variabel pecahkan 0 = tanggal
                                                // variabel pecahkan 1 = bulan
                                                // variabel pecahkan 2 = tahun

                                                return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                                            }
                                            echo tgl_indo(date('Y-m-d')); ?></p>

            </div>
        </div>

    </div>
    <div class="row text-center">
        <div style="float: left;width: 33.33%;padding: 15px;">
            <p style="padding-top: 7.3rem;font-weight: bold;">
                <?= auth()->name; ?>
            </p>
        </div>
        <div style="float: left;width: 20%;padding: 15px;"></div>
        <div style="float: left;width: 33.33%;padding: 15px;">
            <p>
                Pengampu
            </p>
            <p style="padding-top: 5rem;font-weight: bold;">
                Bayu Wardana S.Kom
            </p>
        </div>
    </div>

    <footer style="position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;">
        <div class="card">
            <div class="card-body">

                <i>Catatan: Lembar hasil ujian ini harus di tanda tangani oleh siswa/siswi maupun guru pengampu mata pelajaran. Print 2 lembar 1 untuk siswa/siswi dan yang satunya untuk guru pengampu sebagai arsip</i>
            </div>
        </div>
    </footer>



</body>

</html>