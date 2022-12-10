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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12">
            <h1>Today Appointments</h1>
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
                          <th>Patient ID</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Description</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=0;
                        $statement = $pdo->prepare("SELECT * FROM tbl_appointment WHERE date=? ORDER BY status =? AND time DESC");
                        $statement->execute(array(date('Y-m-d'),'Confirmed'));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                        foreach ($result as $row) {
                          $i++;
                          ?>
                          <tr class="bg-g">
                            <td><?php echo $i; ?></td>
                            <td>
                              <?php echo $row['patient_id']; ?> <br>
                              <a href="report.php?patient_id=<?php echo $row['patient_id']; ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> View Report</a>
                            </td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <?php echo $row['status']; ?> <br>
                                <?php 
                                if($row['status'] == 'Confirmed'){
                                ?>
                                <a href="#" data-toggle="modal" data-target="#report" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Create report</a>
                                <?php
                                }
                                ?>
                            </td>
                            <!-- modal -->
                            <div class="modal fade" id="report">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Medical Record</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="report_code.php" method="post" enctype="multipart/form-data">
                                          <?php $csrf->echoInputField(); ?>
                                          <div class="card-body">
                                            <div class="form-group">
                                              <label>Description</label>
                                              <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <input type="hidden" name="patient_id" value="<?php echo $row['patient_id'] ?>">
                                            <input type="hidden" name="date" value="<?php echo date('Y-m-d') ?>">
                                            <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['doctor']['doctor_id'] ?>">
                                            <?php
                                            $statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE doctor_id=?");
                                            $statement->execute(array($_SESSION['doctor']['doctor_id']));
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                                            foreach ($result as $row) {
                                              $doctor_name = $row['name'];
                                              $doctor_department = $row['department'];
                                            }
                                            ?>
                                            <input type="hidden" name="doctor_name" value="<?php echo $doctor_name ?>">
                                            <input type="hidden" name="doctor_department" value="<?php echo $doctor_department ?>">
                                          </div>
                                          <!-- /.card-body -->
                                          <div class="card-footer">
                                          <button type="submit" class="btn btn-primary float-right" name="form1">Submit</button>
                                          </div>
                                      </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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
include('includes/footer.php');
?>