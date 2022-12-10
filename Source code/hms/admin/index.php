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
            $pending_appointments = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE status=?");
            $statement->execute(array('Pending'));
            $pending_appointments = $statement->rowCount();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $pending_appointments ?></h3>
                <p>Pending Appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <?php
            $total_doctors = 0;
            $statement = $pdo->prepare("SELECT * FROM tbl_doctor");
            $statement->execute();
            $total_doctors = $statement->rowCount();
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_doctors ?></h3>
                <p>Doctors</p>
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
