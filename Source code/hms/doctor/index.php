  <?php
  include('includes/header.php');
  ?>

  <?php
  include('includes/navbar.php');
  ?>

  <?php
  include('includes/sidebar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php
            $today_appointment = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE doctor=? AND status=? AND date=?");
            $statement->execute(array($_SESSION['doctor']['doctor_id'],'Confirmed',date('Y-m-d')));
            $today_appointment = $statement->rowCount();
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $today_appointment ?></h3>
                <p>Today Appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
            $total_consulted = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE doctor=? AND status=? AND date=?");
            $statement->execute(array($_SESSION['doctor']['doctor_id'],'Doctor consulted',date('Y-m-d')));
            $total_consulted = $statement->rowCount();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_consulted ?></h3>
                <p>Today Doctor consulted</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
            $total_appointment = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE doctor=? AND date >= ?");
            $statement->execute(array($_SESSION['doctor']['doctor_id'],date('Y-m-d')));
            $total_appointment = $statement->rowCount();
            ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total_appointment ?></h3>
                <p>Total Appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="#"><b>Patient Id</a>
      </div>
      <!-- User name -->

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="../admin/dist/img/user.png" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form action="report.php" class="lockscreen-credentials" method="post">
          <?php $csrf->echoInputField(); ?>
          <div class="input-group">
            <input type="text" name="patient_id" class="form-control" placeholder="Patient Id" required>
            <div class="input-group-append">
              <button type="submit" name="form1" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form>
        <!-- /.lockscreen credentials -->

      </div>
      <!-- /.lockscreen-item -->
    </div>
    
  </div>

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
