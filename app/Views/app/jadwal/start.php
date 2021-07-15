<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="shortcut icon" href="<?= base_url('/assets/img/logo/logo.png'); ?>" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.addons.css'); ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/shared/style.css'); ?>">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets/css/demo_1/style.css'); ?>">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/flipdown/css/flipdown/flipdown.css'); ?>">
    <script type="text/javascript" src="<?= base_url('assets/vendors/flipdown/js/flipdown/flipdown.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendors/flipdown/js/main.js'); ?>"></script>
    <style>
        .content {
            display: inline;
            text-align: center;
        }

        .box-content {
            color: white;
            width: 30px;
            height: 30px;
            border: 1px;
            background: black;
            display: flex;
            font-size: 18px;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .content-label {
            font-size: 12px;
            color: black;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo">
                    <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="logo" style="width: 50px;" /> </a>
                <a class="navbar-brand brand-logo-mini">
                    <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block">
                        <div class="row">
                            <h4><?= $ujian->ujian; ?></h4>
                        </div>

                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown ">
                        Tanggal Ujian<br><?php

                                            use App\Models\JawabanModel;
                                            use CodeIgniter\I18n\Time;

                                            $time = Time::parse($ujian->date)->toLocalizedString('dd-MM-Y');
                                            echo $time;  ?>
                    </li>
                    <li class="nav-item dropdown ">
                        <div id="clock" class="align-content-center" data="<?= $ujian->time; ?>">
                        </div>
                    </li>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown d-xl-inline-block user-dropdown">
                            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="<?= base_url('assets/img/siswa/' . auth()->image); ?>" alt="Profile image"> </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="<?= base_url('assets/img/siswa/' . auth()->image); ?>" alt="Profile image">
                                    <p class="mb-1 mt-3 font-weight-semibold"><?= auth()->name; ?></p>
                                    <p class="font-weight-light text-muted mb-0"><?= auth()->nus; ?></p>
                                </div>
                                <a href="<?= base_url('jadwal/finish'); ?>" class="dropdown-item text-danger finish">Selesai <i class="mdi mdi-power"></i></a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <div class="sidebar sidebar-offcanvas ui-panel-fixed-toolbar" id="myTable">
                <ul class="nav nav-pills nav-pills-icons " role="tablist">
                    <li class="nav-item m-3 ml-3">
                        <?= $pager->links('soal', 'number'); ?>
                    </li>

                </ul>
            </div>
            <!-- partial -->
            <div class="main-panel mb-5">
                <div class="content-wrapper mb-5">

                    <div class="text-justify mt-auto mb-auto">
                        <?php $i = 1 + (1 * ($currentPage - 1));
                        $p = 1 + (1 * ($currentPage - 1));

                        foreach ($soal as $s) : ?>

                            <div class="card">
                                <div class="card-body">
                                    <h6>Soal Nomor <?= $i++; ?></h6>
                                    <?php
                                    $jawaban = new JawabanModel();
                                    $jawab = $jawaban->asObject()->where(['id_soal' => $s->id, 'id_siswa' => auth()->id])->first();
                                    ?>
                                    <form action="<?= base_url('jadwal/soal/update/' . $s->id); ?>" method="POST" id="soal">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="PUT" />
                                        <input type="hidden" name="page_soal" value="<?= $p++; ?>">
                                        <div class="row justify-content-lg-center">
                                            <div class="col-md-6">
                                                <p>
                                                    <?= $s->soal; ?>
                                                </p>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <div class="form-radio form-radio-flat">
                                                        <input type="radio" class="form-check-input" name="jawaban" value="a" <?php if ($jawab->jawaban == 'a') : ?>checked<?php endif; ?>>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <p class="d-flex">A.&nbsp;</p>
                                                    <span><?= $s->a; ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-radio form-radio-flat">
                                                        <input type="radio" class="form-check-input" name="jawaban" value="b" <?php if ($jawab->jawaban == 'b') : ?>checked<?php endif; ?>>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="d-flex">B.&nbsp;</p>
                                                    <span><?= $s->b; ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-radio form-radio-flat">
                                                        <input type="radio" class="form-check-input" name="jawaban" value="c" <?php if ($jawab->jawaban == 'c') : ?>checked<?php endif; ?>>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="d-flex">C.&nbsp;</p>
                                                    <span><?= $s->c; ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-radio form-radio-flat">
                                                        <input type="radio" class="form-check-input" name="jawaban" value="d" <?php if ($jawab->jawaban == 'd') : ?>checked<?php endif; ?>>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="d-flex">D.&nbsp;</p>
                                                    <span><?= $s->d; ?></span>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-radio form-radio-flat">
                                                        <input type="radio" class="form-check-input" name="jawaban" value="e" <?php if ($jawab->jawaban == 'e') : ?>checked<?php endif; ?>>

                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <p class="d-flex">E.&nbsp;</p>
                                                    <span><?= $s->e; ?></span>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    </form>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>

                    <?= $pager->links('soal', 'navigation'); ?>
                </div>
            </div>
            <form action="">
                <input type="hidden" name="id_mapel" value="<?= $ujian->id_mapel; ?>">
                <input type="hidden" name="id_ujian" value="<?= $ujian->id; ?>">
            </form>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('/assets/js/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/js/vendor.bundle.addons.js'); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url('assets/js/shared/off-canvas.js'); ?>"></script>
    <script src="<?= base_url('assets/js/shared/misc.js'); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/vendors/timer/dist/jquery.countdown.min.js'); ?>"></script>

    <script>
        // const soal = document.getElementById('soal');
        // const a = soal.insertAdjacentText;
        // console.log(a);
        $('.number').on('click', function() {
            $('.number').removeClass('bg-success');
            $(this).addClass('bg-success');
        })



        $(".finish").on("click", function(e) {

            e.preventDefault();

            const href = $(this).attr("href");
            console.log(name);
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Ingin selesai dari ujian ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya, Selesai!",
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            });
        });
    </script>
    <script>
        /* Event Object: 
{
  type:           '{String} The namespaced event type {update,finish,stop}.countdown',
  strftime:       '{Function} The formatter function',
  finalDate:      '{Date} The parsed final date native object',
  elapsed:        '{bool} Passed away the final date?',
  offset: {
    seconds     : '{int} Seconds left for the next minute',
    minutes     : '{int} Minutes left for the next hour',
    hours       : '{int} Hours left until next day',
    days        : '{int} Days left until next week',
    daysToWeek  : '{int} Days left until next week',
    daysToMonth : '{int} Days left until next month',
    weeks       : '{int} Weeks left until the final date',
    weeksToMonth: '{int} Weeks left until the next month',
    months      : '{int} Months left until final date',
    years       : '{int} Years left until final date',
    totalDays   : '{int} Total amount of days left until final date',
    totalHours  : '{int} Total amount of hours left until final date',
    totalMinutes: '{int} Total amount of minutes left until final date',
    totalSeconds: '{int} Total amount of seconds left until final date'
  }
}
*/
        const time = $('#clock').attr('data');
        $('#clock').countdown(time, function(event) {
                $(this).html(event.strftime(`
                    <div style="display:flex;">
                            <div class="content">
                                <div class="box-content">%D</div>
                                    <span class="content-label">Hari</span>
                            </div>&nbsp;
                            <div class="content">
                                <div class="box-content">%H</div>
                                    <span class="content-label">Jam</span>
                            </div>&nbsp;
                            <div class="content">
                                <div class="box-content">%M</div>
                                    <span class="content-label">Menit</span>
                            </div>&nbsp;
                            <div class="content">
                                <div class="box-content">%S</div>
                                    <span class="content-label">Detik</span>
                            </div>

                        </div>
                    `));
            })
            .on('update.countdown', function(event) {
                if (event.elapsed) {
                    // Counting up...
                } else {
                    // Countdown...
                }
            })
            .on('finish.countdown', function(event) {
                // return document.location.replace('http://localhost:8080/jadwal/finish');
                Swal.fire({
                    title: "Maaf waktu telah habis?",
                    text: "Klik selesai untuk mengakhirinya",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Selesai!",
                }).then((result) => {
                    if (result.value) {
                        return document.location.replace('http://localhost:8080/jadwal/finish');

                    }
                });
            })
            .on('stop.countdown', function(event) {})
        // document.addEventListener('DOMContentLoaded', () => {
        //     data = document.getElementById('data').getAttribute('data');
        //     console.log(data);
        //     // Unix timestamp (in seconds) to count down to
        //     var twoDaysFromNow = (new Date().getTime() / 1000) + (60 * data) + 1;

        //     // Set up FlipDown
        //     var flipdown = new FlipDown(twoDaysFromNow)

        //         // Start the countdown
        //         .start()

        //         // Do something when the countdown ends
        //         .ifEnded(() => {
        //             // console.log('The countdown has ended!');
        //             Swal.fire({
        //                 title: "Maaf waktu telah habis?",
        //                 text: "Klik selesai untuk mengakhirinya",
        //                 icon: "warning",
        //                 confirmButtonColor: "#3085d6",
        //                 confirmButtonText: "Selesai!",
        //             }).then((result) => {
        //                 if (result.value) {
        //                     return document.location.replace('http://localhost:8080/jadwal/finish');

        //                 }
        //             });
        //         });

        //     // // Toggle theme
        //     // var interval = setInterval(() => {
        //     //   let body = document.body;
        //     //   body.classList.toggle('light-theme');
        //     //   body.querySelector('#flipdown').classList.toggle('flipdown__theme-dark');
        //     //   body.querySelector('#flipdown').classList.toggle('flipdown__theme-light');
        //     // }, 5000);

        //     // Show version number
        //     var ver = document.getElementById('ver');
        //     ver.innerHTML = flipdown.version;
        // });
    </script>
    <!-- End custom js for this page-->
</body>

</html>