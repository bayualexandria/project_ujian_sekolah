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
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" method="POST" action="<?= base_url('ujian/' . $ujian->id); ?>">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT" />
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="ujian">Nama Ujiian</label>
                                            <input type="text" name="ujian" class="form-control <?= $validation->hasError('ujian') ? 'is-invalid' : ''; ?>" id="ujian" placeholder="Nama Lengkap" value="<?= $ujian->ujian ?? set_value('ujian'); ?>">
                                            <div class="text-danger ml-1" style="font-size: 12px;">
                                                <?= $validation->getError('ujian') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Mata Pelajaran</label>
                                            <select class="form-control" name="id_mapel" id="id_mapel">
                                                <option value="">
                                                    <-- Pilih -->
                                                </option>

                                                <?php

                                                use App\Models\MapelModel;

                                                $mapel = new MapelModel();
                                                $data = $mapel->where('id_guru', auth()->id)->get()->getResultArray();
                                                foreach ($data as $m) : ?>
                                                    <option value="<?= $m['id']; ?>"><?= $m['mapel']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Waktu Mulai</label>
                                                    <div class="input-group mb-3 date" id="id_0">
                                                        <input type="text" name="date" class="form-control" placeholder="Batas Pengerjaan" value="<?= $ujian->date ?? set_value('date'); ?>">
                                                        <div class="input-group-addon input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="time">Waktu Selesai</label>
                                                    <div class="input-group mb-3 date" id="id_1">
                                                        <input type="text" name="time" class="form-control" placeholder="Waktu Soal" value="<?= $ujian->time ?? set_value('time'); ?>" autocomplete="off">
                                                        <div class="input-group-addon input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url('ujian'); ?>" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>

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
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->include('app/layout/script'); ?>
<script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datetimepicker/js/demo.js'); ?>"></script>
<script>
    $(".delete").on("click", function(e) {
        $(this).removeClass("delete");
        $(this).addClass("delete");
        e.preventDefault();

        const action = $("#form-delete").attr("action");
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