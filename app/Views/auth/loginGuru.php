<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">

                <div class="auto-form-wrapper">
                    <div class="text-center mb-5">
                        <h5 class="w-100 font-weight-bold mb-3">Ujian Sekolah Siswa</h5>
                        <img src="/assets/img/logo/guru.jpg" alt="" class="img-fluid w-25" />
                        <h6 class="text-muted">Guru</h6>
                    </div>
                    <!-- data flash message with sweetalert 2 -->
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                    <div class="flash-error" data-flasherror="<?= session()->getFlashdata('error'); ?>">
                    </div>
                    <form action="<?= base_url('auth/guru'); ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label class="label">NIP</label>
                            <div class="input-group">
                                <input type="text" class="form-control <?= $validation->hasError('nip') ? 'border-danger' : ''; ?>" placeholder="NIP" name="nip" value="<?= old('nip'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text <?= $validation->hasError('nip') ? 'border-danger' : ''; ?>">
                                        <?php if ($validation->hasError('nip')) : ?>
                                            <i class="mdi mdi-close-circle-outline text-danger"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="text-danger ml-1" style="font-size: 12px;">
                                <?= $validation->getError('nip') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?= $validation->hasError('password') ? 'border-danger' : ''; ?>" placeholder="*********" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text <?= $validation->hasError('password') ? 'border-danger' : ''; ?>">
                                        <?php if ($validation->hasError('password')) : ?>
                                            <i class="mdi mdi-close-circle-outline text-danger"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="text-danger ml-1" style="font-size: 12px;">
                                <?= $validation->getError('password') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary submit-btn btn-block">Login</button>
                        </div>
                    </form>
                </div>
                <div class="">
                    <p class="footer-text text-center">copyright © <?= date('Y'); ?> b@yu 4lex@ndr!4. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>