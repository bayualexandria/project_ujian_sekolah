<form class="forms-sample" method="POST" action="<?= $link; ?>">
    <?= csrf_field() ?>
    <?= $method; ?>
    <div class="modal-body">

        <div class="form-group">
            <label for="nus">NUS</label>
            <input type="text" name="nus" class="form-control <?= $validation->hasError('nus') ? 'is-invalid' : ''; ?>" id="nus" placeholder="NIP" value="<?= $id['nus'] ?? set_value('nus'); ?>">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('nus') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" id="name" placeholder="Nama Lengkap" value="<?= $id['name'] ?? set_value('name'); ?>">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('name') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" name="gender" id="gender.*">
                        <option value="">
                            <-- Pilih -->
                        </option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Kelas</label>
                    <select class="form-control" name="id_kelas" id="id_kelas">
                        <option value="">
                            <-- Pilih -->
                        </option>
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k['id']; ?>"><?= $k['kelas']; ?> | <?= $k['jurusan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="cpassword">Password</label>
            <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('password') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="cpassword">Konfirmasi Password</label>
            <input type="password" name="confPassword" class="form-control <?= $validation->hasError('confPassword') ? 'is-invalid' : ''; ?>" id="cpassword" placeholder="Konfirmasi Password">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('confPassword') ?>
            </div>
        </div>
        <div class="form-group">
            <label for="is_active">Apakah akun ini di aktifkan?</label>
            <div class="row">

                <div class="col-sm-2">
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="is_active" value="1"> Ya</label>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="is_active" value="0"> Tidak</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success"><?= $button; ?></button>
    </div>
</form>