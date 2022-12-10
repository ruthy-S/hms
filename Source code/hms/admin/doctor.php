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
  <div class="modal fade" id="add-doctor">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Doctor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="doctor_code.php" method="post" class="was-validated" enctype="multipart/form-data">
            <?php $csrf->echoInputField(); ?>
            <div class="card-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control textOnly" required>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="text" maxlength="10" name="phone" class="form-control numbersOnly" required>                                  
              </div>
              <div class="form-group">
                <label>Qualification</label>
                <input type="text" name="qualification" class="form-control" required>                                  
              </div>
              <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" class="form-control" required>                                  
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
            <h1>Doctors
            <a class="btn btn-success float-right" href="#" data-toggle="modal" data-target="#add-doctor">Add Doctor</a></h1>
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
                          <th>Doctor ID</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Qualification</th>
                          <th>Department</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=0;
                        $statement = $pdo->prepare("SELECT * FROM tbl_doctor ORDER BY id DESC");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
                        foreach ($result as $row) {
                          $i++;
                          ?>
                          <tr class="bg-g">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['doctor_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['qualification']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td>
                              <a href="doctor_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                              <a href="doctor_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure');">Delete</a>
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