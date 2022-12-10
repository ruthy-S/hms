  <?php
  include('includes/header.php');
  ?>


  <?php
  include('includes/navbar.php');
  ?>

  <?php
  include('includes/sidebar.php');
  ?>

<?php
if(isset($_POST['form1'])) {

	if($_SESSION['user']['role'] == 'Super Admin') {

		$valid = 1;

	    if(empty($_POST['full_name'])) {
	        $valid = 0;
          $_SESSION['status'] ="Name can not be empty";
          $_SESSION['status_code'] ="warning";
	    }

	    if(empty($_POST['email'])) {
	        $valid = 0;
          $_SESSION['status'] ="Email address can not be empty";
          $_SESSION['status_code'] ="warning";
	    } else {
	    	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
		        $valid = 0;
            $_SESSION['status'] ="Email address must be valid";
            $_SESSION['status_code'] ="warning";
		    } else {
		    	// current email address that is in the database
		    	$statement = $pdo->prepare("SELECT * FROM tbl_user WHERE id=?");
				$statement->execute(array($_SESSION['user']['id']));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row) {
					$current_email = $row['email'];
				}

		    	$statement = $pdo->prepare("SELECT * FROM tbl_user WHERE email=? and email!=?");
		    	$statement->execute(array($_POST['email'],$current_email));
		    	$total = $statement->rowCount();							
		    	if($total) {
		    		$valid = 0;
            $_SESSION['status'] ="Email address already exists";
            $_SESSION['status_code'] ="warning";
		    	}
		    }
	    }

	    if($valid == 1) {
			
			$_SESSION['user']['full_name'] = $_POST['full_name'];
	    	$_SESSION['user']['email'] = $_POST['email'];

			// updating the database
			$statement = $pdo->prepare("UPDATE tbl_user SET full_name=?, email=? WHERE id=?");
			$statement->execute(array($_POST['full_name'],$_POST['email'],$_SESSION['user']['id']));

        $_SESSION['status'] ="User Information is updated successfully";
        $_SESSION['status_code'] ="success";
	    }
	}
}

if(isset($_POST['form3'])) {
	$valid = 1;

	if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $_SESSION['status'] ="Password can not be empty";
        $_SESSION['status_code'] ="warning";
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
    	if($_POST['password'] != $_POST['re_password']) {
	    	$valid = 0;
        $_SESSION['status'] ="Passwords do not match";
        $_SESSION['status_code'] ="warning";
    	}        
    }

    if($valid == 1) {

    	$_SESSION['user']['password'] = md5($_POST['password']);

    	// updating the database
		$statement = $pdo->prepare("UPDATE tbl_user SET password=? WHERE id=?");
		$statement->execute(array(md5($_POST['password']),$_SESSION['user']['id']));

      $_SESSION['status'] ="Password is updated successfully";
      $_SESSION['status_code'] ="success";
    }
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_user WHERE id=?");
    $statement->execute(array($_SESSION['user']['id']));
    $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
    foreach ($result as $row) {
      $full_name = $row['full_name'];
      $email     = $row['email'];
      $status    = $row['status'];
      $role      = $row['role'];
    }
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Edit profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Update Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                  <form class="form-horizontal" action="" method="post">
                    <div class="box box-info">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Name</label>
                          <?php
                          if($_SESSION['user']['role'] == 'Super Admin') {
                            ?>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
                              </div>
                            <?php
                          } else {
                            ?>
                              <div class="col-sm-4" style="padding-top:7px;">
                                <?php echo $full_name; ?>
                              </div>
                            <?php
                          }
                          ?>
                          
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Email Address</label>
                          <?php
                          if($_SESSION['user']['role'] == 'Super Admin') {
                            ?>
                              <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                              </div>
                            <?php
                          } else {
                            ?>
                            <div class="col-sm-4" style="padding-top:7px;">
                              <?php echo $email; ?>
                            </div>
                            <?php
                          }
                          ?>
                          
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Role</label>
                          <div class="col-sm-4" style="padding-top:7px;">
                            <?php echo $role; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label"></label>
                          <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form1">Update Information</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="password">
                  <form class="form-horizontal" action="" method="post">
                    <div class="box box-info">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Password </label>
                          <div class="col-sm-4">
                            <input type="password" class="form-control" name="password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Retype Password </label>
                          <div class="col-sm-4">
                            <input type="password" class="form-control" name="re_password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label"></label>
                          <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form3">Update Password</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
include('includes/footer.php');
?>
