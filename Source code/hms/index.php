<?php require_once('security.php'); ?> 
<!DOCTYPE html> 
<html lang="en">
	
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doccure</title>
	
	<!-- Favicons -->
	<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	
</head>
<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">
	
		<!-- Header -->
		<header class="header">
			<nav class="navbar navbar-expand-lg header-nav">
				<div class="navbar-header">
					<a id="mobile_btn" href="javascript:void(0);">
						<span class="bar-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</a>
					<a href="index.php" class="navbar-brand logo">
						<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
					</a>
				</div>
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="index.php" class="menu-logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
						<a id="menu_close" class="menu-close" href="javascript:void(0);">
							<i class="fas fa-times"></i>
						</a>
					</div>
					<ul class="main-nav">
						<?php
						if(isset($_SESSION['patient']['name'])) {
						?>
						<li>
							<a href="dashboard.php">Dashboard</a>
						</li>
						<li class="login-link">
							<a href="logout.php" onclick="return confirm('Do you want to Logout');">Logout</a>
						</li>
						<?php
						} else {
						?>
						<li class="login-link">
							<a href="login.php">Login / Signup</a>
						</li>
						<?php	
						}
						?>
					</ul>		 
				</div>		 
				<ul class="nav header-navbar-rht">
					<li class="nav-item contact-item">
						<?php
						if(isset($_SESSION['patient']['name'])) {
						?>
						<div class="header-contact-detail">
							<p class="contact-header">Patient ID</p>
							<p class="contact-info-header"> <?php echo $_SESSION['patient']['patient_id'] ?></p>
						</div>
						<?php	
						}
						?>
					</li>
					<?php
					if(isset($_SESSION['patient']['name'])) {
					?>
					<li class="nav-item">
						<a class="nav-link header-login" href="logout.php" onclick="return confirm('Do you want to Logout');">Logout </a>
					</li>
					<?php
					} else {
					?>
					<li class="nav-item">
						<a class="nav-link header-login" href="login.php">login / Signup </a>
					</li>
					<?php	
					}
					?>
				</ul>
			</nav>
		</header>
		<!-- /Header -->
		
		<!-- Home Banner -->
		<section class="section section-search">
			<div class="container-fluid">
				<div class="banner-wrapper">
					<?php
					if(isset($_SESSION['patient']['name'])) {
					?>

					<div class="banner-header text-center">
						<h1>Welcome <?php echo $_SESSION['patient']['name'] ?>, Make an Appointment</h1>
					</div>
						
					<!-- Search -->
					<div class="search-box text-center">
						<a class="btn btn-primary" href="make-appointment.php">Make Appointment</a>
					</div>
					<!-- /Search -->

					<?php
					} else {
					?>

					<div class="banner-header text-center">
						<h1>Make an Appointment</h1>
					</div>
						
					<!-- Search -->
					<div class="search-box text-center">
						<a class="btn btn-primary" href="login.php">login / Signup </a>
					</div>
					<!-- /Search -->

					<?php	
					}
					?>
					
				</div>
			</div>
		</section>
		<!-- /Home Banner -->
			
		<!-- Clinic and Specialities -->
		<section class="section section-specialities">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Hospital Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-9">
						<!-- Slider -->
						<div class="specialities-slider slider">
						
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
									<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Urology</p>
							</div>	
							<!-- /Slider Item -->
							
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
									<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Neurology</p>	
							</div>							
							<!-- /Slider Item -->
							
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
									<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>	
								<p>Orthopedic</p>	
							</div>							
							<!-- /Slider Item -->
							
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
									<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>	
								<p>Cardiologist</p>	
							</div>							
							<!-- /Slider Item -->
							
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
									<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>	
								<p>Dentist</p>
							</div>							
							<!-- /Slider Item -->
							
						</div>
						<!-- /Slider -->
						
					</div>
				</div>
			</div>   
		</section>	 
		<!-- Clinic and Specialities -->
		
		<!-- Footer -->
		<footer class="footer">
			
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container-fluid">
				
					<!-- Copyright -->
					<div class="copyright">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="copyright-text">
									<p class="mb-0"><a href="templateshub.net">Templates Hub</a></p>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
							
								<!-- Copyright Menu -->
								<div class="copyright-menu">
									<ul class="policy-menu">
										<li><a href="term-condition.html">Terms and Conditions</a></li>
										<li><a href="privacy-policy.html">Policy</a></li>
									</ul>
								</div>
								<!-- /Copyright Menu -->
								
							</div>
						</div>
					</div>
					<!-- /Copyright -->
					
				</div>
			</div>
			<!-- /Footer Bottom -->
			
		</footer>
		<!-- /Footer -->
		
	</div>
	<!-- /Main Wrapper -->
	
	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>
	
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
	<!-- Slick JS -->
	<script src="assets/js/slick.js"></script>
	
	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	
	<script src="admin/dist/js/sweetalert.min.js"></script>

	<?php
	if(isset($_SESSION['status']) && $_SESSION['status'] !='')
	{
	?>
	<script>
	swal({
	title: "<?php echo $_SESSION['status']; ?>",
	//text: "You clicked the button!",
	icon: "<?php echo $_SESSION['status_code']; ?>",
	button: "Ok Done!",
	});
	</script>
	<?php
	unset($_SESSION['status']);
	}
	?>
	
</body>

</html>