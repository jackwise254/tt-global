<?php include('template/header.php');?>
<?php

// session_start();



$con = mysqli_connect("localhost","root","","users");

?>

<!-- if(!isset($_SESSION['email'])){ -->
<!-- 
echo "<script>window.open('signin.php','_self')</script>";

}

else {




?> -->

<?php

// $admin_session = $_SESSION['email'];

// $get_admin = "select * from users  where email='$admin_session'";

// $run_admin = mysqli_query($con,$get_admin);

// $row_admin = mysqli_fetch_array($run_admin);

// $admin_id = $row_admin['id'];

// $admin_name = $row_admin['name'];

// $admin_email = $row_admin['email'];


$get_products = "SELECT * FROM masterlist";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_users = "SELECT * FROM users";
$run_users = mysqli_query($con,$get_users);
$count_users = mysqli_num_rows($run_users);

$get_invoices = "SELECT * FROM invoicecreate";
$run_invoices = mysqli_query($con,$get_invoices);
$count_invoices = mysqli_num_rows($run_invoices);

// $get_total_earnings = "SELECT SUM( due_amount) as Total FROM customer_orders WHERE order_status = 'Complete'";
// $run_total_earnings = mysqli_query($con, $get_total_earnings);
// $row = mysqli_fetch_assoc($run_total_earnings);                       
// $count_total_earnings = $row['Total'];
?>
    <?php
    $session = session();
    // echo "Hello, ".$session->get('user_name');
    $names = $session->get('user_name');
    ?>
    <section class="content mt-5">
    <div class="container">
      <h4> Welcome <?= $names ?> </h4>
    <div class="row">
      
          <div class="col-md-4">
            <a href="<?php echo site_url('/stock-view') ?>">
            <div class="small-box bg-secondary p-2">
              <div class="inner">
                <h3><?php echo $count_products; ?></h3>

                <p>TOTAL STOCK</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo site_url('/stock-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Stock in</a>
            </div>
          </div>
          </a>
       <div class="col-md-4">
            <a href="<?php echo site_url('/stockt-view') ?>">
            <div class="small-box bg-secondary p-2">
              <div class="inner">
                <h3>150</h3>

                <p>SALES/week</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/stockt-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Stock out</a>
            </div>
          </div>
          </a>
        
          <div class="col-md-4">
            <a href="<?php echo site_url('/invoice-view') ?>">
            <div class="small-box bg-secondary p-2">
              <div class="inner">
                <h3><?php echo $count_invoices; ?></h3>

                <p>TOTAL INVOICES</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/invoice-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Invoices</a>
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
            <div class="small-box bg-secondary p-2">
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
            <div class="small-box bg-secondary p-2">
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
            <div class="small-box bg-secondary p-2">
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