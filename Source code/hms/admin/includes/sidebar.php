  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <a href="../" class="brand-link">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile.php" class="d-block">Profile</a>
        </div>
      </div>
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="appointment.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Appointments
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="doctor.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Doctors
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="patient.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Patients
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="schedule.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Doctor Schedule
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link" onclick="return confirm('Do you want to Logout');">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>