<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <h2 class="text-center mb-4">Ubah Password</h2>
                <div class="auto-form-wrapper">
                    <div class="flash-error" data-flasherror="<?= session()->getFlashdata('error'); ?>">
                    </div>
                    <form action="change" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label class="label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?= $validation->hasError('password') ? 'border-danger' : ''; ?>" placeholder="Password Baru" name="password" value="<?= old('password'); ?>">
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
                            <label class="label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?= $validation->hasError('conf_password') ? 'border-danger' : ''; ?>" placeholder="Konfirmasi Password Baru" name="conf_password" value="<?= old('conf_password'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text <?= $validation->hasError('conf_password') ? 'border-danger' : ''; ?>">
                                        <?php if ($validation->hasError('conf_password')) : ?>
                                            <i class="mdi mdi-close-circle-outline text-danger"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="text-danger ml-1" style="font-size: 12px;">
                                <?= $validation->getError('conf_password') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary submit-btn btn-block">Reset Password</button>
                        </div>
                        <div class="text-block text-center my-3">
                            <span class="text-small font-weight-semibold">Back to </span>
                            <a href="<?= base_url('auth/admin'); ?>" class="text-black text-small">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<?= $this->endSection(); ?>