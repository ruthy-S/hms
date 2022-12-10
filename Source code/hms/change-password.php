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
        
        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Change Password</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <!-- Profile Sidebar -->
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                        <div class="profile-sidebar">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="#" class="booking-doc-img">
                                        <img src="admin/dist/img/user.png" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><?php echo $_SESSION['patient']['name'] ?></h3>
                                        <div class="patient-details">
                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?php echo $_SESSION['patient']['address'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li>
                                            <a href="dashboard.php">
                                                <i class="fas fa-columns"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="profile.php">
                                                <i class="fas fa-user-cog"></i>
                                                <span>Profile Settings</span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="change-password.php">
                                                <i class="fas fa-lock"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="logout.php" onclick="return confirm('Do you want to Logout');">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <!-- / Profile Sidebar -->
                    
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                    
                                        <!-- Change Password Form -->
                                        <form action="change-password-code.php" method="post">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="re_password" class="form-control" required>
                                            </div>
                                            <div class="submit-section">
                                                <button type="submit" name="form1" class="btn btn-primary submit-btn">Save Changes</button>
                                            </div>
                                        </form>
                                        <!-- /Change Password Form -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
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
    
    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    
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