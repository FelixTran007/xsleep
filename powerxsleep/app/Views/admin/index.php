<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $page_title ?></title>
		<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>admin_assets/images/logos/favicon.png" />
		<link rel="stylesheet" href="<?= base_url() ?>admin_assets/css/styles.min.css" />
	</head>

	<body>
		<!--  Body Wrapper -->
		<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
		data-sidebar-position="fixed" data-header-position="fixed">

			<!--  App Topstrip -->
			<div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
				<div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
					<a class="d-flex justify-content-center" href="#">
						<img src="<?= base_url() ?>admin_assets/images/logos/logo-wrappixel.svg" alt="" width="150">
					</a>
				</div>
			</div>
			<?php echo $left_sidebar; ?>
			
			<div class="body-wrapper">

				<?php echo $right_top_menu; ?>

				<div class="body-wrapper-inner">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<?php echo $main_contain; ?>
									</div>
								</div>
							</div>
						</div>          
					</div>
				</div>
			</div>
		</div>

		<script src="<?= base_url() ?>admin_assets/libs/jquery/dist/jquery.min.js"></script>
		<script src="<?= base_url() ?>admin_assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url() ?>admin_assets/js/sidebarmenu.js"></script>
		<script src="<?= base_url() ?>admin_assets/js/app.min.js"></script>
		<script src="<?= base_url() ?>admin_assets/libs/apexcharts/dist/apexcharts.min.js"></script>
		<script src="<?= base_url() ?>admin_assets/libs/simplebar/dist/simplebar.js"></script>
		<script src="<?= base_url() ?>admin_assets/js/dashboard.js"></script>
	</body>
</html>