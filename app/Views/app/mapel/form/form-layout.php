<form class="forms-sample" method="POST" action="<?= $link; ?>">
    <?= csrf_field() ?>
    <?= $method; ?>
    <div class="modal-body">

        <div class="form-group">
            <label for="mapel">Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control <?= $validation->hasError('mapel') ? 'is-invalid' : ''; ?>" id="mapel" placeholder="Mata Pelajaran" value="<?= $id['mapel'] ?? set_value('mapel'); ?>">
            <div class="text-danger ml-1" style="font-size: 12px;">
                <?= $validation->getError('mapel') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_guru">Pengajar</label>
                    <select class="form-control" name="id_guru" id="id_guru">
                        <option value="">
                            <-- Pilih -->
                        </option>
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
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