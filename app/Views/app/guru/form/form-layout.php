<form class="forms-sample" method="POST" action="<?= $link; ?>">
    <?= csrf_field() ?>
    <?= $method; ?>
    <div class="modal-body">

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control <?= $validation->hasError('nip') ? 'is-invalid' : ''; ?>" id="nip" placeholder="NIP" value="<?= $id['nip'] ?? set_value('nip'); ?>">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('nip') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" id="name" placeholder="Nama Lengkap" value="<?= $id['name'] ?? set_value('name'); ?>">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('name') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender" id="gender">
                <option value="">
                    <-- Pilih -->
                </option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
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
            <label for="active">Apakah akun ini di aktifkan?</label>
            <div class="row">

                <div class="col-sm-2">
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="active" value="1"> Ya</label>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="active" value="0"> Tidak</label>
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