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
// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
  header('location: login.php');
  exit;
}

if(isset($_POST['form1'])) {
  $valid = 1;
      
    if($valid == 1) {
        
      // updating into the database
      $statement = $pdo->prepare("UPDATE tbl_doctor SET name=?, phone=?, qualification=?, department=? WHERE id=?");
      $statement->execute(array($_POST['name'],$_POST['phone'],$_POST['qualification'],$_POST['department'],$_REQUEST['id']));
      
      $_SESSION['status'] ="Data updated successfully!";
      $_SESSION['status_code'] ="success";
      header('Location: doctor.php');

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
            <h1>Doctor Details Edit</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $name = $row['name'];
        $phone = $row['phone'];
        $qualification = $row['qualification'];
        $department = $row['department'];
    }
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <?php $csrf->echoInputField(); ?>
                <div class="card-body">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                  </div>
                  <div class="form-group">
                      <label>Phone Number</label>
                      <input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>">
                  </div>
                  <div class="form-group">
                      <label>Qualification</label>
                      <input type="text" name="qualification" class="form-control" value="<?php echo $qualification; ?>">
                  </div>
                  <div class="form-group">
                      <label>Department</label>
                      <input type="text" name="department" class="form-control" value="<?php echo $department; ?>">                                
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" name="form1">Submit</button>
                </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
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