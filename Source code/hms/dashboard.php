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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Dashboard</h2>
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
                                        <li class="active">
                                            <a href="patient-dashboard.html">
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
                                        <li>
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
                            <div class="card-body pt-0">
                            
                                <!-- Tab Menu -->
                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical Records</span></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /Tab Menu -->
                                
                                <!-- Tab Content -->
                                <div class="tab-content pt-0">
                                    
                                    <!-- Appointment Tab -->
                                    <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Appointment Date</th>
                                                                <th>Time</th>
                                                                <th>Status</th>
                                                                <th>Consulting Doctor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE patient_id=? ORDER BY id DESC");
                                                            $statement->execute(array($_SESSION['patient']['patient_id']));
                                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                                            foreach ($result as $row) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php 
                                                                    $date= strtotime($row['date']);
                                                                    echo date("F d, Y", $date); 
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $row['time'] ?></td>
                                                                <td><span class="badge badge-pill bg-success-light"><?php echo $row['status'] ?></span></td>
                                                                <?php
                                                                $statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE doctor_id=?");
                                                                $statement->execute(array($row['doctor']));
                                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                                                foreach ($result as $row) {
                                                                    $doctor_name = $row['name'];
                                                                    $department = $row['department'];
                                                                }
                                                                ?>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="admin/dist/img/user.png" alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Dr. <?php echo $doctor_name ?><span><?php echo $department ?></span></a>
                                                                    </h2>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Appointment Tab -->
                                        
                                    <!-- Medical Records Tab -->
                                    <div id="pat_medical_records" class="tab-pane fade">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date </th>
                                                                <th>Description</th>
                                                                <th>Created</th>
                                                                <th></th>
                                                            </tr>     
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i=0;
                                                            $statement = $pdo->prepare("SELECT * FROM tbl_report WHERE patient_id=? ORDER BY date DESC");
                                                            $statement->execute(array($_SESSION['patient']['patient_id']));
                                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                                            foreach ($result as $row) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td><a href="javascript:void(0);"><?php echo $i ?></a></td>
                                                                <td>
                                                                    <?php 
                                                                    $date= strtotime($row['date']);
                                                                    echo date("F d, Y", $date); 
                                                                    ?>
                                                                </td>
                                                                <td style="white-space: break-spaces;"><?php echo $row['description'] ?></td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="admin/dist/img/user.png" alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Dr. <?php echo $row['doctor_name'] ?> <span><?php echo $row['doctor_department'] ?></span></a>
                                                                    </h2>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>  	
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Medical Records Tab -->
                                    
                                </div>
                                <!-- Tab Content -->
                                
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
    
</body>

</html>