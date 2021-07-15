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
                            <li><a href="kelas">Kelas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-lg-between">
                                <div class="col-md-4">
                                    <h4>Daftar Table Kelas</h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <form action="<?= base_url('kelas') ?>" method="get">
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
                                        <th>#</th>
                                        <th> Kelas </th>
                                        <th> Jurusan </th>
                                        <th> Tahun </th>
                                        <th class="text-center">
                                            <a class="btn btn-icons btn-rounded btn-outline-success" data-toggle="modal" data-target="#insert">
                                                <i class="mdi mdi-plus "></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use App\Models\KelasModel;

                                    $i = 1 + (6 * ($currentPage - 1));
                                    foreach ($kelas as $k) : ?>
                                        <tr>
                                            <td> <?= $i++; ?> </td>
                                            <td> <?= $k->kelas; ?> </td>
                                            <td>
                                                <?= $k->jurusan; ?>
                                            </td>
                                            <td>
                                                <?= $k->tahun; ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-icons btn-rounded btn-outline-primary" data-toggle="modal" data-target="#update<?= $k->id ?>">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form id="form-delete" action="<?= base_url('kelas/' . $k->id); ?>" method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="id" value="<?= $k->id; ?>" />
                                                    <button type="submit" class="btn btn-icons btn-rounded btn-outline-danger delete" data="<?= $k->kelas . ' ' . $k->jurusan; ?>">
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
                                    <?= $pager->links('kelas', 'pagination'); ?>
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
            <?= view('app/kelas/form/form-layout', [
                'link' => base_url('kelas'),
                'method' => '',
                'button' => 'Simpan data',
                'validation' => $validation
            ]); ?>
        </div>
    </div>
</div>

<?php $data = new KelasModel();
foreach ($kelas as $k) :
?>
    <div class="modal fade" id="update<?= $k->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= view('app/kelas/form/form-layout', [
                    'link' => base_url('kelas/' . $k->id),
                    'method' => '<input type="hidden" name="_method" value="PUT" />',
                    'button' => 'Update data',
                    'validation' => $validation,
                    'id' => $data->where('id', $k->id)->first()
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
        const kelas = $(this).attr("data");
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Ingin menghapus data kelas dengan kelas " + kelas,
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