<form action="<?= $url; ?>" method="post">
    <?= $method; ?>
    <?= csrf_field() ?>
    <input type="hidden" name="id_ujian" value="<?= $ujian['id']; ?>">
    <h4>Soal</h4>
    <div class="form-group">
        <textarea id="soal" class="form-control <?= $validation->hasError('soal') ? 'is-invalid' : ''; ?>" name="soal" rows="30"><?= $soal->soal ?? old('soal'); ?></textarea>
        <div class="text-danger ml-1" style="font-size: 12px;">
            <?= $validation->getError('soal') ?>
        </div>
    </div>
    <hr>
    <h4>Jawaban</h4>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Jawaban
        </a>
        Klik untuk jawaban (a,b,c,d,e)
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="form-group">
                <label for="a">A</label>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jawaban_benar" value="a"> Centang jika jawaban benar </label>
                </div>
                <textarea id="a" class="form-control" name="a"><?= $soal->a ?? old('a'); ?></textarea>

            </div>
            <div class="form-group">
                <label for="b">B</label>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jawaban_benar" value="b"> Centang jika jawaban benar </label>
                </div>
                <textarea id="b" class="form-control" name="b"><?= $soal->b ?? old('b'); ?></textarea>

            </div>
            <div class="form-group">
                <label for="c">C</label>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jawaban_benar" value="c"> Centang jika jawaban benar </label>
                </div>
                <textarea id="c" class="form-control" name="c"><?= $soal->c ?? old('c'); ?></textarea>

            </div>
            <div class="form-group">
                <label for="d">D</label>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jawaban_benar" value="d"> Centang jika jawaban benar </label>
                </div>
                <textarea id="d" class="form-control" name="d"><?= $soal->d ?? old('d'); ?></textarea>

            </div>
            <div class="form-group">
                <label for="e">E</label>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jawaban_benar" value="e"> Centang jika jawaban benar </label>
                </div>
                <textarea id="e" class="form-control" name="e"><?= $soal->e ?? old('e'); ?></textarea>

            </div>
        </div>
    </div>
    <div class="float-left mt-3">
        <a href="<?= base_url('ujian/detail/' . $ujian['id']); ?>" class="btn btn-outline-warning">Kembali</a>
    </div>
    <div class="float-right mt-3">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>