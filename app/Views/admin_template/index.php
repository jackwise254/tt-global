<?php include('template/header.php');?>
<?php

// session_start();



$con = mysqli_connect("localhost","root","","users");


if(!isset($_SESSION['designation'])){ 
echo "<script>window.open('signin.php','_self')</script>";

}

else {

}




// $admin_session = $_SESSION['email'];

// $get_admin = "select * from users  where email='$admin_session'";

// $run_admin = mysqli_query($con,$get_admin);

// $row_admin = mysqli_fetch_array($run_admin);

// $admin_id = $row_admin['id'];

// $admin_name = $row_admin['name'];

// $admin_email = $row_admin['email'];
// $hdd = "SELECT* masterlist where type = laptop";
// $db1= "SELECT count(*) as No_of_Column FROM information_schema.columns WHERE table_name ='geeksforgeeks'";

// $get_hdd = "SELECT count(*) as result FROM masterlist.type where type = laptop";
// $run_hdd = mysqli_query($con, $get_hdd);
// $count_hdd = mysql_num_rows($run_hdd);

$get_products = "SELECT * FROM masterlist";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_productss = "SELECT * FROM stockout";
$run_productss = mysqli_query($con,$get_productss);
$count_productss = mysqli_num_rows($run_productss);

$get_users = "SELECT * FROM users";
$run_users = mysqli_query($con,$get_users);
$count_users = mysqli_num_rows($run_users);

$get_users = "SELECT * FROM vendors";
$run_users = mysqli_query($con,$get_users);
$count_vendors = mysqli_num_rows($run_users);

$get_users = "SELECT * FROM customer";
$run_users = mysqli_query($con,$get_users);
$count_customer = mysqli_num_rows($run_users);

$get_invoices = "SELECT * FROM invoicecreate";
$run_invoices = mysqli_query($con,$get_invoices);
$count_invoices = mysqli_num_rows($run_invoices);
?>
    <?php
    $session = session();
    $names = $session->get('user_name');
    ?>
    <section class="content mt-5 pt-4   col-mx-auto col-lg-12 px-4">
    <div class="container ">
      <h4> <u>Welcome <?= $names ?></u>  </h4>
    <div class="row">
          <div class="col-md-3">
            <a href="<?php echo site_url('/stock-view') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_products; ?></h3>
                <p>Total Stock</p>
              </div>
              <div class="icon">
              <ion-icon name="bar-chart-outline"></ion-icon>
                <i class="fa fa-bar-chart"></i>
              </div>
              <a href="<?php echo site_url('/stock-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Stock  in hand</a>
            </div>
          </div>
          </a>

          <!-- second card -->
       <div class="col-md-3">
            <a href="<?php echo site_url('/stockt-view') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
              <h3><?php echo $count_productss; ?></h3>
                
                <p>Sales</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar"></i>
              </div>
              <a href="<?php echo site_url('/stockt-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Stock out</a>
            </div>
          </div>
          </a>
        
          <div class="col-md-3">
            <a href="<?php echo site_url('/invoice-page') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 style='visibility:hidden'>150</h3>

                <p>Invoices</p>
              </div>
              <div class="icon">
              <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/invoice-page') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Invoices</a>
            </div>
          </div>

          </a>

 <!-- trial -->
 <div class="col-md-3">
            <a href="<?php echo site_url('/users-list') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_users; ?></h3>
                <p>Saff</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo site_url('/users-list') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>staff</a>
            </div>
          </div>
          </a>
        </div>
       <!-- end -->

         </div>
         <div>
         </div>
       </div>
     </section>


     <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <a href="<?php echo base_url('ProductsCrud/Setting') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 style='visibility:hidden'>Technician</h3>

                <p>Dropdown</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-cog"></i>
              </div>
              <a href="<?php echo base_url('ProductsCrud/Setting') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Dropdown</a>
            </div>
          </div>
          </a>
          <!-- third card -->
         <div class="col-md-3">
            <a href="<?php echo base_url('fualty-stock') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 style='visibility:hidden'>Technician</h3>

                <p >Technician</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo base_url('fualty-stock') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Technician</a>
            </div>
          </div>
          </a>

          
          <!--  -->
          <div class="col-md-3">
            <a href="<?php echo site_url('customer-list') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
              <h3><?php echo $count_customer; ?></h3>
                <p >Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo site_url('customer-list') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Users</a>
            </div>
          </div>
          </a>
       <!--  -->

       <!--  -->
       <div class="col-md-3">
            <a href="<?php echo site_url('actions') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
              <h3 style='visibility:hidden'><?php echo $count_customer; ?></h3>
                <p >Actions</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cog"></i>
              </div>
              <a href="<?php echo site_url('actions') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Users</a>
            </div>
          </div>
          </a>
      <!--  -->
    </section>


    <section class="content">
      <div class="container">
        <div class="row">
        <div class="col-md-4">
            <a href="<?php echo site_url('/vendors-list') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_vendors; ?></h3>
                <p>Vendors</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo site_url('/vendors-list') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Vendors</a>
            </div>
          </div>
          </a>
      <!-- </div> -->


        <div class="col-md-4">
            <a href="<?php echo base_url('login/recyclebin') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
              <h3 style='visibility:hidden'><?php echo $count_customer; ?></h3>
                <p >Recycle Bin</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cog"></i>
              </div>
              <a href="<?php echo base_url('login/recyclebin') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </a>
         
        </div>
        </div>
      

    </section>