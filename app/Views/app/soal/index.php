<?= $this->extend('layout/app'); ?>

<?= $this->section('styles'); ?>
<?= $this->include('app/layout/style'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->include('layout/sidebar'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-lg-between">
                                <div class="col-md-4">
                                    <h4>Tambahkan data soal</h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <form action="<?= base_url('kelas') ?>" method="get">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search . . ." name="keyword" autocomplete="off" autofocus>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?= view('app/soal/form', [
                                'method' => '',
                                'url'=> base_url('soal')
                            ]); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->include('app/layout/script'); ?>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->
<script src="<?= base_url('assets/vendors/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= base_url('assets/vendors/ckfinder/ckfinder.js') ?>"></script>
<script>
    // ClassicEditor
    //     .create(document.querySelector('#soal'), 'ckfinder')
    //     .catch(error => {
    //         console.log(error);
    //     });

    // CKEDITOR.replace('soal', {
    //     filebrowserBrowseUrl: 'assets/vendors/ckfinder/ckfinder.html',
    //     filebrowserUploadUrl: 'assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    // });

    $(document).ready(function() {

        CKEDITOR.replace(document.getElementById('soal'), {
            filebrowserBrowseUrl: '<?= base_url('assets/vendors/ckfinder/ckfinder.html'); ?>',
            filebrowserUploadUrl: '<?= base_url('assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
            height: '400px'
        });
    })

    CKEDITOR.replace(document.querySelector('#a'), {
        filebrowserBrowseUrl: '<?= base_url('assets/vendors/ckfinder/ckfinder.html'); ?>',
        filebrowserUploadUrl: '<?= base_url('assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
        height: '200px'
    });
    CKEDITOR.replace(document.querySelector('#b'), {
        filebrowserBrowseUrl: '<?= base_url('assets/vendors/ckfinder/ckfinder.html'); ?>',
        filebrowserUploadUrl: '<?= base_url('assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
        height: '200px'
    });
    CKEDITOR.replace(document.querySelector('#c'), {
        filebrowserBrowseUrl: '<?= base_url('assets/vendors/ckfinder/ckfinder.html'); ?>',
        filebrowserUploadUrl: '<?= base_url('assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
        height: '200px'
    });
    CKEDITOR.replace(document.querySelector('#d'), {
        filebrowserBrowseUrl: '<?= base_url('assets/vendors/ckfinder/ckfinder.html'); ?>',
        filebrowserUploadUrl: '<?= base_url('assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
        height: '200px'
    });
    CKEDITOR.replace(document.querySelector('#e'), {
        filebrowserBrowseUrl: '<?= base_url('assets/vendors/ckfinder/ckfinder.html'); ?>',
        filebrowserUploadUrl: '<?= base_url('assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
        height: '200px'
    });

    $('#myCollapsible').collapse({
        toggle: false
    })
</script>
<?= $this->endSection(); ?>