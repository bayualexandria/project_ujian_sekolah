<form class="forms-sample" method="POST" action="<?= $link; ?>">
    <?= csrf_field() ?>
    <?= $method; ?>
    <div class="modal-body">

        <div class="form-group">
            <label for="ujian">Nama Ujiian</label>
            <input type="text" name="ujian" class="form-control <?= $validation->hasError('ujian') ? 'is-invalid' : ''; ?>" id="ujian" placeholder="Nama Lengkap" value="<?= $id['ujian'] ?? set_value('ujian'); ?>">
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
                <?php foreach ($mapel as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['mapel']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="date">Waktu Mulai</label>
                    <div class="input-group mb-3 date" id="id_0">
                        <input type="text" name="date" class="form-control" placeholder="Batas Pengerjaan" value="<?= $id['date'] ?? set_value('date'); ?>">
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
                        <input type="text" name="time" class="form-control" placeholder="Waktu Soal" value="<?= $id['time'] ?? set_value('time'); ?>" autocomplete="off">
                        <div class="input-group-addon input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
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
