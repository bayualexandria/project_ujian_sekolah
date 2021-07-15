<?= $this->extend('layout/app'); ?>

<?= $this->section('styles'); ?>
<?= $this->include('app/layout/style'); ?>

<link rel="stylesheet" href="<?= base_url('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->include('layout/sidebar'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title"><?= $title; ?></h4>
                    <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                        <ul class="quick-links ml-auto">
                            <li><a class="text-muted">Master</a></li>
                            <li><a href="ujian">Siswa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-lg-between">
                                <div class="col-md-4">
                                    <h4>Daftar Table Siswa</h4>

                                </div>
                                <div class="col-md-4 text-right">
                                    <form action="<?= base_url('ujian') ?>" method="get">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search . . ." name="keyword" autocomplete="off" autofocus>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#insert">
                                <i class="mdi mdi-plus"></i> Tambah data ujian
                            </button>
                            <?php

                            use CodeIgniter\I18n\Time; ?>
                            <div class="row mt-5">
                                <?php foreach ($ujian as $u) : ?>
                                    <?php if ($u->id_guru == auth()->id) : ?>
                                        <div class="col-md-4 grid-margin stretch-card average-price-card">
                                            <div class="card text-secondary">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between pb-2 mb-3">
                                                        <h6 class="font-weight-semibold mb-0"><?= $u->ujian; ?></h6>

                                                        <a href="<?= base_url('ujian/detail/' . $u->id); ?>" class="btn btn-icons btn-rounded btn-outline-info border-0">
                                                            <i class="mdi mdi-eye" style="color: aqua;"></i>
                                                        </a>

                                                    </div>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="icon-holder">
                                                            <i class="mdi mdi-timetable"></i>
                                                        </div>
                                                        <div class="icon-holder">
                                                            <i class="mdi mdi-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-around">
                                                        <p class="text-white mb-0 ml-4"><?php
                                                                                        $akhir = strtotime($u->time);
                                                                                        $awal = strtotime($u->date);
                                                                                        $selisih = $akhir - $awal;
                                                                                        $menit   = $selisih / 60;
                                                                                        echo $menit;  ?></p>
                                                        <p class="text-white mb-0 ml-4"><?php $time = Time::parse($u->date)->toLocalizedString('dd-MM-Y');
                                                                                        echo $time;  ?></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="<?= base_url('ujian/edit/' . $u->id); ?>" class="btn btn-icons btn-rounded btn-outline-primary border-0">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>


                                                    <a href="<?= base_url('ujian/delete/' . $u->id); ?>" class="btn btn-icons btn-rounded btn-outline-danger delete border-0" data="<?= $u->ujian; ?>">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="row float-right">
                                <div class="col-md-12 text-right">
                                    <?= $pager->links('ujian', 'pagination'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php

use App\Models\{MapelModel};

$mapel = new MapelModel(); ?>
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= view('app/ujian/form/form-layout', [
                'link' => base_url('ujian'),
                'method' => '',
                'button' => 'Simpan data',
                'validation' => $validation,
                'mapel' => $mapel->where('id_guru', auth()->id)->get()->getResultArray()
            ]); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->include('app/layout/script'); ?>
<script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datetimepicker/js/demo.js'); ?>"></script>
<script>
    $(".delete").on("click", function(e) {
        e.preventDefault();

        const action = $(this).attr("href");
        const name = $(this).attr("data");
        console.log(name);
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus data ujian dengan ujian " + name,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.value) {
                document.location.href = action;
            }
        });
    });
</script>

<?= $this->endSection(); ?>