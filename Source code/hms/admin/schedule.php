<?php
  include('includes/header.php');
  ?>

  <?php
  include('includes/navbar.php');
  ?>

  <?php
  include('includes/sidebar.php');
  ?>

  <!-- modal -->
  <div class="modal fade" id="schedule">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Schedule</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="schedule_code.php" method="post" enctype="multipart/form-data">
            <?php $csrf->echoInputField(); ?>
            <div class="card-body">
              <div class="form-group">
                <label>Doctor Name</label>
                <select name="doctor_id" class="form-control" required>
                    <option value="">--SELECT--</option>
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_doctor ORDER BY id DESC");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                    foreach ($result as $row) {
                    ?>
                    <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Schedule Date</label>
                <input type="date" name="date" class="form-control" required>                                  
              </div>
              <div class="form-group">
                <label>Start Time</label>
                <input type="time" name="start_time" class="form-control" required>                                  
              </div>
              <div class="form-group">
                <label>End Time</label>
                <input type="time" name="end_time" class="form-control" required>                                  
              </div>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12">
            <h1>Doctor Schedule
            <a class="btn btn-success float-right" href="#" data-toggle="modal" data-target="#schedule">Schedule</a></h1>
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
                            <th>Doctor Id</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=0;
                        $statement = $pdo->prepare("SELECT * FROM tbl_schedule WHERE date >=? ORDER BY id DESC");
                        $statement->execute(array(date('Y-m-d')));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                        foreach ($result as $row) {
                        $i++;
                        ?>
                        <tr class="bg-g">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['doctor_id']; ?></td>
                            <td>Dr. <?php echo $row['doctor_name']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['end_time']; ?></td>
                            <td>
                                <a href="schedule_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="schedule_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure');">Delete</a>
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