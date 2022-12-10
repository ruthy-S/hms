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

    $statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE doctor_id=?");
    $statement->execute(array($_POST['doctor_id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
    foreach ($result as $row) {
        $doctor_name = $row['name'];
    }
    
    // updating into the database
    $statement = $pdo->prepare("UPDATE tbl_schedule SET doctor_id=?, doctor_name=?, date=?, start_time=?, end_time=? WHERE id=?");
    $statement->execute(array($_POST['doctor_id'],$doctor_name,$_POST['date'],$_POST['start_time'],$_POST['end_time'],$_REQUEST['id']));
    
    $_SESSION['status'] ="Data updated successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: schedule.php');

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
            <h1>Doctor Schedule Edit</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_schedule WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $doctor_id = $row['doctor_id'];
        $doctor_name = $row['doctor_name'];
        $date = $row['date'];
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
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
                        <label>Doctor Id</label>
                        <input type="text" name="doctor_id" class="form-control" value="<?php echo $_SESSION['doctor']['doctor_id'] ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <label>Schedule Date</label>
                        <input type="date" name="date" class="form-control" value="<?php echo $date ?>" required>                                  
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" name="start_time" class="form-control" value="<?php echo $start_time ?>" required>                                  
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" name="end_time" class="form-control" value="<?php echo $end_time ?>" required>                                  
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