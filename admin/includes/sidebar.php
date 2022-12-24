 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="dashboard.php" class="brand-link">
     <!-- <img src="company/logo.png" alt="Beauty salon" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
     <span class="brand-text font-weight-light">HairCare Saloon</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <?php
        $eid = $_SESSION['adminid'];
        $sql = "SELECT * from tbladmin where id='$eid' ";
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_array($query);
        $cnt = 1;
        if (mysqli_num_rows($query) > 0) {
          $adimage =  $results['adminimage'];


        ?>
         <div class="image">

           <img class="img-circle" src="admin_images/<?php echo $results['adminimage']; ?>" width="50%" height="100" alt="User profile picture">

         </div>
         <div class="info">
           <a href="profile.php" class="d-block"><?php echo $results['AdminName']; ?> <?php //echo ($row->lastname); 
                                                                                      ?></a>
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
             <i class="nav-icon fas fa-chart-pie"></i>
             <p>
               Services
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="add_service.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Services</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="manage_service.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Services</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-chart-pie"></i>
             <p>
               Manage Customers
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="add_customer.php" class="nav-link">
                 <i class="nav-icon far fa-calendar-alt"></i>
                 <p>
                   Add Customer
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="add_staff.php" class="nav-link">
                 <i class="nav-icon far fa-calendar-alt"></i>
                 <p>
                   Add Satff
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="customer_list.php" class="nav-link">
                 <i class="nav-icon far fa-image"></i>
                 <p>
                   Customer list
                 </p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-chart-pie"></i>
             <p>
               Staff Details
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>

           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="report.php" class="nav-link">
                 <i class="nav-icon far fa-calendar-alt"></i>
                 <p>
                   Report Message
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="staff_list.php" class="nav-link">
                 <i class="nav-icon far fa-calendar-alt"></i>
                 <p>
                   Staff List
                 </p>
               </a>
             </li>

             <li class="nav-item">
               <a href="set-appointment.php" class="nav-link">
                 <i class="nav-icon far fa-image"></i>
                 <p>
                   Set Appointments
                 </p>
               </a>
             </li>
           </ul>
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
             <i class="nav-icon fas fa-edit"></i>
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
         <!-- <li class="nav-item has-treeview">
           <a href="set-appointment.php" class="nav-link">
             <i class="nav-icon fas fa-edit"></i>
             <p>
               Set Appointments
             </p>
           </a>
         </li> -->

         <li class="nav-item has-treeview">
           <a href="holiday.php" class="nav-link">
             <i class="nav-icon fas fa-edit"></i>
             <p>
               Set Holiday
             </p>
           </a>
         </li>

         <!-- <li class="nav-item has-treeview">
           <a href="report.php" class="nav-link">
             <i class="nav-icon fas fa-edit"></i>
             <p>
               Report Message
             </p>
           </a>
         </li> -->

         <!-- Testing -->


       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>