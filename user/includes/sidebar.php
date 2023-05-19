
<style>
  .button:hover {
    background-color: #007bff;
  /* background-color: #4CAF50; Green  */
  color: white;
}
</style>
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

        $eid = $_SESSION['userid'];
        $sql = "SELECT * from tblusers where id='$eid' ";
        $query = mysqli_query($con, $sql);
        $results = mysqli_fetch_array($query);
        $cnt = 1;
        if (mysqli_num_rows($query) > 0) {
          $stimage =  $results['userimage'];


        ?>
         <div class="image">

           <img class="img-circle" src="user_images/<?php echo $results['userimage']; ?>" width="100" height="200" alt="User profile picture">

         </div>
         <div class="info">
           <a href="profile.php" class="d-block"><?php echo $results['UserName']; ?> <?php //echo ($row->lastname); 
                                                                                      ?></a>
         </div>
       <?php
        }
        ?>

     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item has-treeview button">
           <a href="dashboard.php" class="nav-link ">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>


         <li class="nav-item has-treeview button">
           <a href="User-history.php" class="nav-link">
             <i class="nav-icon fas fa-user"></i>
             <p>
               User History
             </p>
           </a>
         </li>
         <li class="nav-item has-treeview button">
           <a href="report-staff.php" class="nav-link">
             <i class="nav-icon fas fa-bell"></i>
             <p>
               Report
             </p>
           </a>
         </li>

         <li class="nav-item has-treeview button">
           <a href="appointment.php" class="nav-link">
             <i class="nav-icon fas fa-book"></i>
             <p>
               Book Apppointment
             </p>
           </a>
         </li>
     
         <!-- /.user menu -->
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>