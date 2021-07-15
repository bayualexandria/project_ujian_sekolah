<?= $this->extend('layout/app', ['title' => 'Halaman Login Admin']); ?>

<?= $this->section('content'); ?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
    <div class="row w-100">
      <div class="col-lg-4 mx-auto">

        <div class="auto-form-wrapper">
          <div class="text-center mb-5">
            <h5 class="w-100 font-weight-bold mb-3">Ujian Sekolah Siswa</h5>
            <img src="/assets/img/logo/monitor1.png" alt="" class="img-fluid w-25" />
            <h6 class="text-muted">Administrator</h6>
          </div>
          <!-- data flash message with sweetalert 2 -->
          <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
          <div class="flash-error" data-flasherror="<?= session()->getFlashdata('error'); ?>">
          </div>
          <form action="<?= base_url('auth/admin');?>" method="POST">
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
            <div class="form-group d-flex justify-content-between">
              <div class="form-check form-check-flat mt-0">

              </div>
              <a href="<?= base_url('forgot'); ?>" class="text-small forgot-password text-black">Forgot Password</a>
            </div>
            <div class="text-block text-center my-3">
              <span class="text-small font-weight-semibold">Not a member ?</span>
              <a href="<?= base_url('register'); ?>" class="text-black text-small">Create new account</a>
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