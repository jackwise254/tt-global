<?php include('template/header.php');?>
   <?php
    $session = session();
    $names = $session->get('user_name');
    ?> 
  <section class="content mt-4 py-5">
<h4 class="text-center"><strong><u>STOCK/ITEM<ul></strong> </h4>
  <hr>
<h4 class="px-5"> Welcome <?= $names ?> </h4>
<div class=" px-5 float end"><a href="<?php echo site_url('/recieve-goods') ?>" class="btn btn-success btn-sm">Recieve Goods</a>
<a href="<?php echo site_url('/warranty-in') ?>" class="btn btn-success btn-sm flex m-2">Warranty</a></div>
<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php

$get_products = "SELECT * FROM masterlist WHERE('type ' = 'desktop')";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_laptop = "SELECT * FROM masterlist WHERE('type ' = 'laptop')";
$run_laptop = mysqli_query($con,$get_laptop);
$count_laptop = mysqli_num_rows($run_laptop);

$get_users = "SELECT * FROM users";
$run_users = mysqli_query($con,$get_users);
$count_users = mysqli_num_rows($run_users);

$get_invoices = "SELECT * FROM invoicecreate";
$run_invoices = mysqli_query($con,$get_invoices);
$count_invoices = mysqli_num_rows($run_invoices);

?>
    
    <section class="content mt-5">
    <div class="container">
    <div class="row">
      
          <div class="col-md-4">
            <div class="small-box bg-success p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_products; ?></h3>

                <p class="text-center">Desktops</p>
              </div>
              <div class="icon">
                <i class="ion ion-desktop"></i>
              </div>
            </div>
          </div>
       <div class="col-md-4">
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
          </a>
        
          <div class="col-md-4">
            <div class="small-box bg-success p-2">
              <div class="inner">
                <h3><?php echo $count_invoices; ?></h3>

                <p>HDDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>
          </a>
         </div>
         <div>
         </div>
       </div>
     </section>
     <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo site_url('/warranty') ?>">
            <div class="small-box bg-success p-2">
              <div class="inner">
                <h3>150</h3>

                <p>WARRANTY STATUS</p>
              </div>
              <div class="icon">
                <i class="ion ion-ionic"></i>
              </div>
              <a href="<?php echo site_url('/warranty') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Warranty status</a>
            </div>
          </div>
          </a>
         <div class="col-md-4">
            <a href="<?php echo site_url('/delivery-note') ?>">
            <div class="small-box bg-success p-2">
              <div class="inner">
                <h3>150</h3>

                <p>DELIVERY</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/delivery-note') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Delivery notes</a>
            </div>
          </div>
          </a>
          <div class="col-md-4">
            <a href="<?php echo site_url('/users-list') ?>">
            <div class="small-box bg-success p-2">
              <div class="inner">
                <h3><?php echo $count_users; ?></h3>
                <p>STAFF</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo site_url('/users-list') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>staff</a>
            </div>
          </div>
          </a>
        </div>
      </div>
    </section>
<?php include('template/footer.php');?>