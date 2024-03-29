<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>404 Not Found</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
	<link rel="stylesheet" href="/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
	<!-- inject:css -->
	<link rel="stylesheet" href="/assets/css/shared/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="/assets/img/logo/logo.png" />
</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
				<div class="row flex-grow">
					<div class="col-lg-7 mx-auto text-white">
						<div class="row align-items-center d-flex flex-row">
							<div class="col-lg-6 text-lg-right pr-lg-4">
								<h1 class="display-1 mb-0">404</h1>
							</div>
							<div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
								<?php if (!empty($message) && $message !== '(null)') : ?>
									<?= nl2br(esc($message)) ?>
								<?php else : ?>
									<h2>MAAF!</h2>
									<h3 class="font-weight-light">Halaman yang anda cari tidak diketahui.</h3>
								<?php endif; ?>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 text-center mt-xl-2">
								<a class="text-white font-weight-medium" href="<?= previous_url(); ?>">Back to page</a>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 mt-xl-2">
								<p class="text-white font-weight-medium text-center">Copyright &copy; <?= date('Y'); ?> b@yu4lex@ndr!4 All rights reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
</body>