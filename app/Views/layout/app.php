<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?? ''; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css'); ?>"> -->
    <link rel="stylesheet" href="<?= base_url('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css'); ?>">
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/shared/style.css'); ?>">
    <?= $this->renderSection('styles') ?? ''; ?>
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('/assets/img/logo/logo.png'); ?>" />
    <script src="<?= base_url('/assets/js/jquery-3.4.1.min.js'); ?>"></script>
</head>

<body>
    <div class="container-scroller">

        <?= $this->renderSection('content'); ?>
        <!-- content-wrapper ends -->
        <!-- page-body-wrapper ends -->
    </div>

    <!-- J-Query -->

    <?= $this->renderSection('scripts'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script>

    <script>
        $(document).ready(function() {

            const flashData = $(".flash-data").data("flashdata");
            const login = $(".login").data("flashlogin");
            const error = $(".flash-error").data("flasherror");

            if (flashData) {
                Swal.fire({
                    title: 'Status Pesan',
                    text: flashData,
                    icon: 'success',
                    showConfirmButton: false,
                })
            } else if (error) {
                Swal.fire({
                    title: 'Status Pesan',
                    text: error,
                    icon: 'error',
                    showConfirmButton: false,
                })
            }

            if (login) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: login
                })

            }

            $("#logout").on("click", function(e) {
                e.preventDefault();

                const href = $(this).attr("href");
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Ingin keluar dari sistem ini",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Tidak",
                    confirmButtonText: "Ya, Keluar!",
                }).then((result) => {
                    if (result.value) {
                        document.location.href = href;
                    }
                });
            });



            $("#logoutsidebar").on("click", function(e) {
                e.preventDefault();

                const href = $(this).attr("href");
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Ingin keluar dari sistem ini",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Tidak",
                    confirmButtonText: "Ya, Keluar!",
                }).then((result) => {
                    if (result.value) {
                        document.location.href = href;
                    }
                });
            });


        });
    </script>
</body>

</html>