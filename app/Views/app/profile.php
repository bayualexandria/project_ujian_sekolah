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
                    <h4 class="page-title">Halaman Profile</h4>
                    <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                        <ul class="quick-links ml-auto">
                            <li><a href="<?= base_url('profile'); ?>">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6 m-auto text-center">
                                    <img src="<?= base_url('assets/img/' . (session()->get('id_akses') == 2 ? "guru/" : (session()->get('id_akses') == 1 ? "admin/" : "siswa/")) . auth()->image); ?>" alt="profile" class="rounded-circle border border-strong" style="width: 10rem;height:10rem;">
                                    <h4><?= auth()->name; ?></h4>
                                    <p class="text-muted"><?= (session()->get('email') ? auth()->email : (session()->get('nip') ? auth()->nip : auth()->nus)); ?></p>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-warning btn-fw" data-toggle="modal" data-target="#password"><i class="mdi mdi-key"></i> Ubah Password</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <form action="<?= base_url((session()->get('id_akses') == 2 ? "profile/guru" : (session()->get('id_akses') == 1 ? "profile/admin" : "profile/siswa"))); ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <label for="<?= (session()->get('id_akses') == 2 ? "nip" : (session()->get('id_akses') == 1 ? "email" : "nus")); ?>"><?= (session()->get('id_akses') == 2 ? "NIP" : (session()->get('id_akses') == 1 ? "Email" : "No. Ujian")); ?></label>
                                                <input type="text" id="<?= (session()->get('id_akses') == 2 ? "nip" : (session()->get('id_akses') == 1 ? "email" : "nus")); ?>" name="<?= (session()->get('id_akses') == 2 ? "nip" : (session()->get('id_akses') == 1 ? "email" : "nus")); ?>" class="form-control" value="<?= (session()->get('id_akses') == 2 ? auth()->nip : (session()->get('id_akses') == 1 ? auth()->email : auth()->nus)); ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" id="name" name="name" class="form-control" value="<?= auth()->name; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Poto Profile</label>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <img src="<?= base_url('assets/img/' . (session()->get('id_akses') == 2 ? "guru/" : (session()->get('id_akses') == 1 ? "admin/" : "siswa/")) . auth()->image); ?>" alt="" class="border border-strong" style="border-radius: 5px;width:70%;">
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="float-right mb-5">
                                                <button type="submit" class="btn btn-primary btn-fw"><i class="mdi mdi-sync"></i> Update</button>
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
</div>
</div>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="<?= base_url((session()->get('nip') ? "passwordGuru" : (session()->get('email') ? "passwordAdmin" : "passwordSiswa"))); ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">Password baru</label>
                        <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password">
                        <div class="text-danger ml-1" style="font-size: 12px;">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Konfirmasi Password baru</label>
                        <input type="password" name="confPassword" class="form-control <?= $validation->hasError('confPassword') ? 'is-invalid' : ''; ?>" id="cpassword" placeholder="Konfirmasi Password">
                        <div class="text-danger ml-1" style="font-size: 12px;">
                            <?= $validation->getError('confPassword') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-arrow-left"></i> Batal</button>
                    <button type="submit" class="btn btn-warning btn-fw"><i class="mdi mdi-key"></i> Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->include('app/layout/script'); ?>
<?= $this->endSection(); ?>