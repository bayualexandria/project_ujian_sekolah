<?= $this->extend('layout/app'); ?>

<?= $this->section('styles'); ?>
<?= $this->include('app/layout/style'); ?>
<style>
    .content {
        display: inline;
        text-align: center;
    }

    .box-content {
        color: white;
        width: 20px;
        height: 20px;
        border: 1px;
        background: black;
        display: flex;
        font-size: 11px;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .content-label {
        font-size: 11px;
        color: black;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
    }
</style>
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
                    <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                        <ul class="quick-links ml-auto">
                            <li><a class="text-muted">Ujian</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-lg-between">
                                <div class="col-md-4">
                                    <h4>Daftar Jadwal Ujian</h4>
                                </div>

                                <div class="col-md-4 text-right">
                                    <form action="<?= base_url('jadwal') ?>" method="get">
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
                            <table class="table table-stretched mt-3 table-responsive-md">
                                <tbody>
                                    <?php

                                    use App\Models\GuruModel;
                                    use App\Models\SoalModel;
                                    use CodeIgniter\I18n\Time;

                                    foreach ($ujian as $u) : ?>
                                        <?php if ($u->id_kelas == auth()->id_kelas) : ?>
                                            <?php $id = $u->id_guru;
                                            $guru = new GuruModel();
                                            $guru = $guru->table('guru')->where('id', $id)->first();
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <p class="mb-1 text-dark font-weight-medium"><img src="<?= base_url('assets/img/guru/' . $guru['image']); ?>" alt="image" /></p><small class="font-weight-medium"> <?= $guru['name']; ?></small>
                                                </td>
                                                <td>
                                                    <?= $u->ujian; ?>
                                                </td>
                                                <td>
                                                    <?php $soal = new SoalModel();
                                                    $s = $soal->asObject()->where('id_ujian', $u->id)->findAll(); ?>
                                                    <?= count($s); ?> Soal
                                                </td>
                                                <td class="text-center">
                                                    <p class="mb-1 text-dark font-weight-medium">
                                                        <?php $time = Time::parse($u->date)->toLocalizedString('dd-MM-Y');
                                                        echo $time; ?>
                                                    </p>
                                                    <small class="font-weight-medium">
                                                        <?php
                                                        $akhir = strtotime($u->time);
                                                        $awal = strtotime($u->date);
                                                        $selisih = $akhir - $awal;
                                                        $menit   = $selisih / 60;
                                                        echo $menit;  ?> Menit
                                                    </small>

                                                </td>
                                                <td id="button">
                                                    <?php
                                                    if (time() + 60 * 60 * 14 > strtotime($u->time)) : ?>
                                                        <span class="badge badge-success">selesai</span>
                                                    <?php else : ?>
                                                        <div class="align-content-center time" data="<?= $u->date; ?>" data-waktu="<?= $u->id; ?>">
                                                        <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <div class="col-md-12 text-right">
                                    <?= $pager->links('ujian', 'pagination'); ?>
                                </div>
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
<script src="<?= base_url('assets/vendors/timer/src/countdown.js'); ?>"></script>
<script>
    /* Event Object: 
{
  type:           '{String} The namespaced event type {update,finish,stop}.countdown',
  strftime:       '{Function} The formatter function',
  finalDate:      '{Date} The parsed final date native object',
  elapsed:        '{bool} Passed away the final date?',
  offset: {
    seconds     : '{int} Seconds left for the next minute',
    minutes     : '{int} Minutes left for the next hour',
    hours       : '{int} Hours left until next day',
    days        : '{int} Days left until next week',
    daysToWeek  : '{int} Days left until next week',
    daysToMonth : '{int} Days left until next month',
    weeks       : '{int} Weeks left until the final date',
    weeksToMonth: '{int} Weeks left until the next month',
    months      : '{int} Months left until final date',
    years       : '{int} Years left until final date',
    totalDays   : '{int} Total amount of days left until final date',
    totalHours  : '{int} Total amount of hours left until final date',
    totalMinutes: '{int} Total amount of minutes left until final date',
    totalSeconds: '{int} Total amount of seconds left until final date'
  }
}
*/
    const time = $('.time').attr('data');
    $('.time').countdown(time, function(event) {
            $(this).html(event.strftime(`
                    <div style="display:flex;" id="waktu">
                            <div class="content">
                                <div class="box-content">%D</div>
                                    <span class="content-label">Hari</span>
                            </div>&nbsp;
                            <div class="content">
                                <div class="box-content">%H</div>
                                    <span class="content-label">Jam</span>
                            </div>&nbsp;
                            <div class="content">
                                <div class="box-content">%M</div>
                                    <span class="content-label">Menit</span>
                            </div>&nbsp;
                            <div class="content">
                                <div class="box-content">%S</div>
                                    <span class="content-label">Detik</span>
                            </div>

                        </div>
                    `));
        })
        .on('update.countdown', function(event) {
            if (event.elapsed) {
                // Counting up...
            } else {
                // Countdown...
            }
        })
        .on('finish.countdown', function(event) {
            const id = $('.time').attr('data-waktu');
            const button = ` <a href="http://localhost:8080/jadwal/start/${id}" class="start btn btn-outline-danger btn-icons btn-rounded"><i class="mdi mdi-play"></i></a>`;
            $('#waktu').remove();
            $('#button').append(button);
            $('#button').removeAttr('id');
            $(".start").on("click", function(e) {
                e.preventDefault();
                link = $(this).attr('href');
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Ingin memulai ujian ini",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Tidak",
                    confirmButtonText: "Ya, Mulai!",
                }).then((result) => {
                    if (result.value) {
                        document.location.href = link;
                    }
                });
            });

        })
        .on('stop.countdown', function(event) {})
</script>

<?= $this->endSection(); ?>