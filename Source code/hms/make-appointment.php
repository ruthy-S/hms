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
                                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Appointment</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        
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
										<h3>Booking</h3>
									</div>
									<!-- Register Form -->
									<form action="make-appointment-code.php" method="post">
                                        <div class="form-group">
                                            <label>Patient ID</label>
											<input type="text" name="patient_id" class="form-control floating" value="<?php echo $_SESSION['patient']['patient_id'] ?>" readonly>
										</div>
										<div class="form-group">
                                            <label>Patient Name</label>
											<input type="text" name="name" class="form-control floating" value="<?php echo $_SESSION['patient']['name'] ?>" readonly>
										</div>
                                        <div class="form-group">
                                            <label>Patient Phone</label>
											<input type="text" name="phone" class="form-control floating" value="<?php echo $_SESSION['patient']['phone'] ?>" readonly>
										</div>
                                        <div class="form-group">
                                            <label>Patient Address</label>
											<textarea name="address" class="form-control" readonly><?php echo $_SESSION['patient']['address'] ?></textarea>
										</div>
                                        <div class="form-group">
                                            <label>Department</label>
											<select name="department" id="department" class="form-control">
                                                <option value="">--SELECT--</option>
                                                <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_doctor ORDER BY id DESC");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                                foreach ($result as $row) {
                                                ?>
                                                <option value="<?php echo $row['department'] ?>"><?php echo $row['department'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
										</div>
                                        <div class="form-group">
                                            <label>Doctor</label>
											<select name="doctor" id="doctor" class="form-control" required>
                                                <option value="">--SELECT--</option>
                                            </select>
										</div>
										<div class="form-group">
                                            <label>Available Date</label>
											<select name="date" id="date" class="form-control" required>
                                                <option value="">--SELECT--</option>
                                            </select>
										</div>
										<div class="form-group">
                                            <label>Available Time</label>
											<select name="time" id="time" class="form-control" required>
                                                <option value="">--SELECT--</option>
                                            </select>
										</div>
                                        <div class="form-group">
                                            <label>Description</label>
											<textarea name="description" class="form-control" required></textarea>
										</div>
										<button type="submit" name="form1" class="btn btn-primary btn-block btn-lg login-btn">SUBMIT</button>
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
    
    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

    <script>  
    $(document).ready(function(){  
        $('#department').change(function(){  
            var department = $(this).val();  
            $.ajax({  
                url:"doctor-fetch.php",  
                method:"POST",  
                data:{department:department},  
                success:function(data){  
                    $('#doctor').html(data);
                }  
            });  
        });  
    });  
    </script>  

    <script>  
    $(document).ready(function(){  
        $('#doctor').change(function(){  
            var doctor = $(this).val();  
            $.ajax({  
                url:"date-fetch.php",  
                method:"POST",  
                data:{doctor:doctor},  
                success:function(data){  
                    $('#date').html(data);
                }  
            });  
        });  
    });  
    </script>  

    <script>  
    $(document).ready(function(){  
        $('#date').change(function(){  
            var doctor = $('#doctor').val();  
            var date = $('#date').val();  
            $.ajax({  
                url:"time-fetch.php",  
                method:"POST",  
                data:{
                    doctor:doctor,
                    date:date
                },  
                success:function(data){  
                    $('#time').html(data);
                }  
            });  
        });  
    });  
    </script>  
    
</body>

</html>