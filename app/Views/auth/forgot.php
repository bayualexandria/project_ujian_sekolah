<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <h2 class="text-center mb-4">Lupa Password</h2>
                <div class="auto-form-wrapper">
                    <div class="flash-error" data-flasherror="<?= session()->getFlashdata('error'); ?>">
                    </div>
                    <form action="<?= base_url('forgot'); ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label class="label">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control <?= $validation->hasError('email') ? 'border-danger' : ''; ?>" placeholder="Email" name="email" value="<?= old('email'); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text <?= $validation->hasError('email') ? 'border-danger' : ''; ?>">
                                        <?php if ($validation->hasError('email')) : ?>
                                            <i class="mdi mdi-close-circle-outline text-danger"></i>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="text-danger ml-1" style="font-size: 12px;">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary submit-btn btn-block">Reset Password</button>
                        </div>
                        <div class="text-block text-center my-3">
                            <span class="text-small font-weight-semibold">Back to </span>
                            <a href="<?= base_url('auth/admin'); ?>" class=" text-black text-small">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<?= $this->endSection(); ?>