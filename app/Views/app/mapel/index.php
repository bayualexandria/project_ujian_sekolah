<?= $this->extend('layout/app'); ?>

<?= $this->section('styles'); ?>
<?= $this->include('app/layout/style'); ?>
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
                            <li><a href="mapel">Mata Pelajaran</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-lg-between">
                                <div class="col-md-4">
                                    <h4>Daftar Table Mata Pelajaran</h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <form action="<?= base_url('mapel') ?>" method="get">
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
                            <table class="table table-striped mt-3 table-responsive-md">
                                <thead>
                                    <tr>
                                        <th> Pengajar </th>
                                        <th> Nama </th>
                                        <th> Mata Pelajaran </th>
                                        <th> Kelas | Jurusan </th>
                                        <th> Active </th>
                                        <th class="text-center">
                                            <a class="btn btn-icons btn-rounded btn-outline-success" data-toggle="modal" data-target="#insert">
                                                <i class="mdi mdi-plus "></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use App\Models\{GuruModel, KelasModel, MapelModel};

                                    $data = new MapelModel();
                                    $kelas = new KelasModel();
                                    $guru = new GuruModel();

                                    foreach ($mapel as $m) : ?>
                                        <tr>
                                            <td class="py-1">
                                                <img src="assets/img/guru/<?= $m->image; ?>" alt="image" />
                                            </td>
                                            <td> <?= $m->name; ?> </td>
                                            <td>
                                                <?= $m->mapel; ?>
                                            </td>
                                            <td>
                                                <?= $m->kelas; ?> <?= $m->jurusan; ?>
                                            </td>
                                            <td>
                                                <?php if ($m->active == 1) : ?>
                                                    <span class="badge badge-success text-white">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger text-white">Tidak aktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-icons btn-rounded btn-outline-primary" data-toggle="modal" data-target="#update<?= $m->id ?>">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form id="form-delete" action="<?= base_url('mapel/' . $m->id); ?>" method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="id" value="<?= $m->id; ?>" />
                                                    <button type="submit" class="btn btn-icons btn-rounded btn-outline-danger delete" data="<?= $m->mapel; ?>">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <div class="col-md-12 text-right">
                                    <?= $pager->links('mapel', 'pagination'); ?>
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

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= view('app/mapel/form/form-layout', [
                'link' => base_url('mapel'),
                'method' => '',
                'button' => 'Simpan data',
                'validation' => $validation,
                'guru' => $guru->findAll(),
                'kelas' => $kelas->findAll()
            ]); ?>
        </div>
    </div>
</div>

<?php
foreach ($mapel as $m) :
?>
    <div class="modal fade" id="update<?= $m->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= view('app/mapel/form/form-layout', [
                    'link' => base_url('mapel/' . $m->id),
                    'method' => '<input type="hidden" name="_method" value="PUT" />',
                    'button' => 'Update data',
                    'validation' => $validation,
                    'id' => $data->where('id', $m->id)->first(),
                    'guru' => $guru->findAll(),
                    'kelas' => $kelas->findAll()
                ]); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->include('app/layout/script'); ?>
<script>
    $(".delete").on("click", function(e) {
        $(this).removeClass("delete");
        $(this).addClass("delete");
        e.preventDefault();

        const action = $("#form-delete").attr("action");
        const mapel = $(this).attr("data");
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus data mapel dengan mata pelajaran " + mapel,
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