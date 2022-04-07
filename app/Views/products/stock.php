<?php include('template/header.php');?>

   <?php
    $session = session();
    $names = $session->get('user_name');
    ?> 
<section class="content mt-4">

<div class=" px-5 float end">

<div class='container' style="margin-top: 5rem; border-radius: 1rem">


<a href="<?php echo base_url('ProductsCrud/load') ?>" class="btn btn-success btn-sm">Recieve Goods</a>
<a href="<?php echo site_url('/warranty-in') ?>" class="btn btn-warning btn-sm flex m-2">Warranty</a>
<a href="<?php echo base_url('ProductsCrud/previousRCVD') ?>" class="btn btn-info btn-sm flex m-2">Previous Recieved</a>

<h4> <u>Remaining Stock </u> </h4>

<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php

$get_products = "SELECT * FROM templist WHERE('type ' = 'desktop')";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_laptop = "SELECT * FROM templist WHERE('type ' = 'laptop')";
$run_laptop = mysqli_query($con,$get_laptop);
$count_laptop = mysqli_num_rows($run_laptop);

$get_users = "SELECT * FROM users";
$run_users = mysqli_query($con,$get_users);
$count_users = mysqli_num_rows($run_users);

$get_invoices = "SELECT * FROM invoicecreate";
$run_invoices = mysqli_query($con,$get_invoices);
$count_invoices = mysqli_num_rows($run_invoices);

?>
    
    
    <div class="container">
    <div class="row">
      
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_products; ?></h3>

                <p class="text-center">Desktops</p>
              </div>
              <div class="icon">
                <i class="ion ion-desktop"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_laptop; ?></h3>

                <p>Laptops</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            </div>
          </div>
          
        
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_invoices; ?></h3>

                <p>HDDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_invoices; ?></h3>

                <p>HDDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>
          

         </div>
         <div>
         </div>

         <div class="row">
      
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_products; ?></h3>

                <p class="text-center">Desktops</p>
              </div>
              <div class="icon">
                <i class="ion ion-desktop"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-success p-2">
              <div class="inner">
                <h3><?php echo $count_laptop; ?></h3>

                <p>Laptops</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            </div>
          </div>
          
        
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_invoices; ?></h3>

                <p>HDDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_invoices; ?></h3>

                <p>HDDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>
         </div>
    </div>
  </div>
</div>
  
     