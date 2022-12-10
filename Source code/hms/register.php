<?php require_once('security.php'); ?> 
<!DOCTYPE html> 
<html lang="en">
	
<head>
	<meta charset="utf-8">
	<title>Doccure</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	
	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->

</head>
<body class="account-page">

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
						<li class="login-link">
							<a href="login.php">Login / Signup</a>
						</li>
					</ul>
				</div>		 
				<ul class="nav header-navbar-rht">
					<li class="nav-item contact-item">
						<div class="header-contact-img">
							<i class="far fa-hospital"></i>							
						</div>
						<div class="header-contact-detail">
							<p class="contact-header">Contact</p>
							<p class="contact-info-header"> +1 315 369 5943</p>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link header-login" href="login.php">login / Signup </a>
					</li>
				</ul>
			</nav>
		</header>
		<!-- /Header -->
		
		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-8 offset-md-2">
							
						<!-- Register Content -->
						<div class="account-content">
							<div class="row align-items-center justify-content-center">
								<div class="col-md-7 col-lg-6 login-left">
									<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
								</div>
								<div class="col-md-12 col-lg-6 login-right">
									<div class="login-header">
										<h3>Register</h3>
									</div>
									
									<!-- Register Form -->
									<form action="register-code.php" method="post">
										<div class="form-group form-focus">
											<input type="text" name="name" class="form-control floating textOnly" required>
											<label class="focus-label">Name</label>
										</div>
										<div class="form-group form-focus">
											<input type="text" maxlength="10" name="phone" class="form-control floating numbersOnly" required>
											<label class="focus-label">Phone Number</label>
										</div>
										<div class="form-group form-focus">
											<input type="text" name="address" class="form-control floating" required>
											<label class="focus-label">Address</label>
										</div>
										<div class="form-group form-focus">
											<input type="password" name="password" class="form-control floating" required>
											<label class="focus-label">Enter Password</label>
										</div>
										<div class="form-group form-focus">
											<input type="password" name="re_password" class="form-control floating" required>
											<label class="focus-label">Re-Enter Password</label>
										</div>
										<div class="text-right">
											<a class="forgot-link" href="login.php">Already have an account?</a>
										</div>
										<button type="submit" name="form1" class="btn btn-primary btn-block btn-lg login-btn">Signup</button>
									</form>
									<!-- /Register Form -->
									
								</div>
							</div>
						</div>
						<!-- /Register Content -->
							
					</div>
				</div>

			</div>
		</div>		
		<!-- /Page Content -->

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

	<script type="text/javascript">
			jQuery('.numbersOnly').keyup(function () {
		this.value = this.value.replace(/[^0-9\.]/g, '');
		});
	</script>

	<script type="text/javascript">
			jQuery('.textOnly').keyup(function () {
		this.value = this.value.replace(/[^a-z,A-Z, \.]/g, '');
		});
	</script>
	
</body>

<!-- doccure/register.html  30 Nov 2019 04:12:20 GMT -->
</html>