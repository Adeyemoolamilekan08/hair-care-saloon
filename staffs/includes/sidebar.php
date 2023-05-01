 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <!--img src="company/scissors.JPG" alt="Beauty salon" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">HairCare Saloon</span-->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <?php
          $eid=$_SESSION['staffid'];
        $sql="SELECT * from tblstaffs where id='$eid' ";                                    
        $query =mysqli_query($con, $sql);
        $results=mysqli_fetch_array($query);
        $cnt=1;
        if(mysqli_num_rows($query) > 0)
        {
          $stimage =  $results['staffimage']; 


          ?>
          <div class="image">

          <img class="img-circle"
           src="staff_images/<?php echo $results['staffimage'];?>" width="100px" height="500px"
           alt="Staff profile picture"> 
           
          </div>
          <div class="info">
            <a href="profile.php" class="d-block"><?php echo $results['UserName']; ?> <?php //echo ($row->lastname); ?></a>
          </div>
          <?php 
        }
       ?>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Appointments
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="all_appointments.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="new_appointment.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>New Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="accepted_appointment.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Accepted Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rejected_appointment.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Rejected Appointments</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="invoices.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Invoice
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="search_appointment.php" class="nav-link">
          <i class="far fa-circle"></i>
          <p>
            Search Appointments
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="search_invoice.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Search Invoice
          </p>

        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="today.php" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
             Today Customer
          </p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="message.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
             Set Appointment Message
          </p>
        </a>
      </li>
    
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
