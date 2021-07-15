<form class="forms-sample" method="POST" action="<?= $link; ?>">
    <?= csrf_field() ?>
    <?= $method; ?>
    <div class="modal-body">

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" class="form-control <?= $validation->hasError('kelas') ? 'is-invalid' : ''; ?>" id="kelas" placeholder="Kelas" value="<?= $id['kelas'] ?? old('kelas'); ?>">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('kelas') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control <?= $validation->hasError('jurusan') ? 'is-invalid' : ''; ?>" id="jurusan" placeholder="Jurusan" value="<?= $id['jurusan'] ?? old('jurusan'); ?>">
                    <div class="text-danger ml-1" style="font-size: 12px;">
                        <?= $validation->getError('jurusan') ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" name="tahun" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : ''; ?>" id="tahun" placeholder="Tahun" value="<?= $id['tahun'] ?? old('tahun'); ?>">
                    <div class="text-danger ml-1" style="font-size: 12px;">
                        <?= $validation->getError('tahun') ?>
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