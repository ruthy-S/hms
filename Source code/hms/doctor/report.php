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
$patient_id = $_REQUEST['patient_id'];
$statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE doctor=? AND patient_id=?");
$statement->execute(array($_SESSION['doctor']['doctor_id'],$patient_id));
$total = $statement->rowCount();    
$result = $statement->fetchAll(PDO::FETCH_ASSOC);    
if($total==0) {
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-md-12 text-center">
          <h1>Patient Id not found</h1><br>
          <a class="btn btn-success" href="index.php">Go Back</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>

<?php
} else { 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12">
            <h1>Medical Records</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">   
                <div class="box box-info">
                    <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>SL</th>
                            <th>Patient Id</th>
                            <th>Date</th>
                            <th>Descripton</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=0;
                        $doctor_id = $_SESSION['doctor']['doctor_id'];
                        $statement = $pdo->prepare("SELECT * FROM tbl_report WHERE doctor_id=? AND patient_id=? ORDER BY date DESC");
                        $statement->execute(array($doctor_id,$_REQUEST['patient_id']));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                        foreach ($result as $row) {
                        $i++;
                        ?>
                        <tr class="bg-g">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['patient_id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>							
                      </tbody>
                    </table>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
}
?>

<?php
include('includes/footer.php');
?>