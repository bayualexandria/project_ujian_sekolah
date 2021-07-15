<?= $this->extend('layout/app'); ?>

<?= $this->section('styles'); ?>
<?= $this->include('app/layout/style'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->include('layout/sidebar'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="<?= base_url('assets/img/guru/' . auth()->image); ?>" alt="profile" class="rounded-circle border border-strong" style="height: 10rem; width: 10rem;" />
                        <h5><?= auth()->name; ?></h5>
                        <p><?= auth()->nip; ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="table-responsive">
                            <table class="table table-stretched">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="mdi <?php if (auth()->gender == 'Laki-laki') : ?>mdi-gender-male text-primary<?php else : ?>mdi-gender-female text-danger<?php endif; ?>"></i>
                                        </th>
                                        <th><?= auth()->gender; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i class="mdi mdi-card-text text-info"></i>
                                        </td>
                                        <td>
                                            <?php

                                            use App\Models\MapelModel;

                                            $mapel = new MapelModel();
                                            $data = $mapel->where('id_guru', auth()->id)->get()->getResultArray();
                                            foreach ($data as $d) :
                                            ?>
                                                <p class="mb-2"><?= $d['mapel']; ?></p>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-3">
                            <h4 class="card-title mb-0">Aktifitas</h4>
                        </div>
                        <ul class="timeline">
                            <li class="timeline-item text-dark">
                                <p class="timeline-content"><a href="#">Ben Tossell</a> assign you a task</p>
                                <p class="event-time">Just now</p>
                            </li>
                            <li class="timeline-item">
                                <p class="timeline-content"><a href="#">Ben Tossell</a> assign you a task</p>
                                <p class="event-time">Just now</p>
                            </li>
                            <li class="timeline-item">
                                <p class="timeline-content"><a href="#">Ben Tossell</a> assign you a task</p>
                                <p class="event-time">Just now</p>
                            </li>
                            <li class="timeline-item">
                                <p class="timeline-content"><a href="#">Ben Tossell</a> assign you a task</p>
                                <p class="event-time">Just now</p>
                            </li>
                            <li class="timeline-item">
                                <p class="timeline-content"><a href="#">Ben Tossell</a> assign you a task</p>
                                <p class="event-time">Just now</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $ujian->ujian; ?></h5>
                        <div class="mt-5 text-center">
                            <!-- Button message alert top right -->
                            <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->
                            <h4>Daftar Data Soal Mata Pelajaran <?= $ujian->ujian; ?></h4>
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <div class="icon-holder">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                    <p>
                                        <?= $ujian->date; ?>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <div class="icon-holder">
                                        <i class="mdi mdi-timetable"></i>
                                    </div>
                                    <p>
                                        <?= $ujian->time; ?> Menit
                                    </p>
                                </div>
                            </div>
                            <a href="<?= base_url('soal/get/' . $ujian->id); ?>" class="btn btn-outline-success">
                                <i class="mdi mdi-plus"></i> Tambah data soal
                            </a>
                            <br>
                            <br>
                            <?php $i = 1;
                            foreach ($soal as $s) : ?>

                                <div class="d-inline">
                                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#detail<?= $s->id ?>">
                                        <?= $i++; ?>
                                    </a>
                                </div>

                            <?php endforeach; ?>
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
foreach ($soal as $s) :
?>
    <div class="modal fade" id="detail<?= $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail soal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row text-justify">
                        <div class="col-md-10">Soal <span><?= $s->soal; ?></span></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex">A.&nbsp;&nbsp;&nbsp;<span><?= $s->a; ?></span></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex">B.&nbsp;&nbsp;&nbsp;<span><?= $s->b; ?></span></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex">C.&nbsp;&nbsp;&nbsp;<span><?= $s->c; ?></span></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex">D.&nbsp;&nbsp;&nbsp;<span><?= $s->d; ?></span></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex">E.&nbsp;&nbsp;&nbsp;<span><?= $s->e; ?></span></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('soal/edit/' . $s->id); ?>" class="btn btn-icons btn-rounded btn-outline-primary">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <a href="<?= base_url('soal/delete/' . $s->id); ?>" class="btn btn-icons btn-rounded btn-outline-danger delete">
                        <i class="mdi mdi-trash-can"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->include('app/layout/script'); ?>

<script>
    $(".delete").on("click", function(e) {
        e.preventDefault();

        const href = $(this).attr("href");
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus data soal",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });
    $('#liveToastBtn').on('click', function() {
        $('.toast').removeClass('hide')
        $('.toast').toast('show')
    })
</script>

<?= $this->endSection(); ?>