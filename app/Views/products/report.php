<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

   <?php
   include('inc/db_connect.php');
    $session = session();
    $names = $session->get('user_name');
    ?> 
<section class="content mt-4">

<div class=" px-5 float end">

<div class='container' style="margin-top: 5rem; border-radius: 1rem">
<!-- <a href="<?php echo base_url('ProductsCrud/load') ?>" class="btn btn-success btn-sm bi bi-upload">Recieve Goods</a>
<a href="<?php echo base_url('ProductsCrud/previousRCVD') ?>" class="btn btn-info btn-sm flex m-2">Previous Recieved</a>
<a href="<?php echo site_url('/stockt-view') ?>" class="btn btn-warning btn-sm flex m-2">Stock Out</a> -->



<h4 class="text-center"> <u>Reports panel </u> </h4>



    
    <div class="container">
    <div class="row">

        <?php if($count_products > 0): ?> 

          <div class="col-md-3">
                <a href="<?php echo site_url('/stock-view') ?>">
                  <?php if($count_products <= 10): ?> 
                    <div class="small-box bg-info p-2">
                  <?php elseif($count_products  < 20): ?>
                    <div class="small-box bg-warning p-2">
                      <?php else: ?>
                        <div class="small-box bg-light p-2">
                  <?php endif ?>
                  <div class="inner">
                      <h3 ><?php echo $count_products; ?></h3>

                      <p >Total stock in</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/stock-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>
                      <?php endif ?>

                      <?php if($count_productso > 0): ?> 

    <div class="col-md-3">
      <a href="<?php echo site_url('/stockt-view') ?>">
        
        <div class="small-box bg-light p-2">
        
        <div class="inner">
            <h3 class="text-center"><?php echo $count_productso; ?></h3>

            <p class="text-center">Total stock out</p>
          </div>
          <div class="icon">
            <i class="ionicons ion-android-desktop"></i>
          </div>
          <a href="<?php echo site_url('/stockt-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
        </div>
      </div>
            </a>
            <?php endif ?>
                <!-- second card -->
      
      

          <?php if($count_productsf > 0): ?> 
          
          <div class="col-md-3">
                <a href="<?php echo site_url('/fualty-stock') ?>">
                  <?php if($count_produ <= 10): ?> 
                    <div class="small-box bg-info p-2">
                  <?php elseif($count_produ  < 20): ?>
                    <div class="small-box bg-warning p-2">
                      <?php else: ?>
                        <div class="small-box bg-light p-2">
                  <?php endif ?>
                  <div class="inner">
                      <h3 class="text-center"><?php echo $count_productsf; ?></h3>

                      <p class="text-center">Total faulty stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/fualty-stock') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>
                      <?php endif ?>

          
  <?php if($count_productsfo > 0): ?> 
<div class="col-md-3">
      <a href="<?php echo site_url('/fualty-out') ?>">
        <?php if($count_productsfo <= 10): ?> 
          <div class="small-box bg-info p-2">
        <?php elseif($count_productsfo  < 20): ?>
          <div class="small-box bg-warning p-2">
            <?php else: ?>
              <div class="small-box bg-light p-2">
        <?php endif ?>
        <div class="inner">
            <h3 class="text-center"><?php echo $count_productsfo; ?></h3>

            <p class="text-center">Total faulty out</p>
          </div>
          <div class="icon">
            <i class="ionicons ion-android-desktop"></i>
          </div>
          <a href="<?php echo site_url('/fualty-out') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
        </div>
      </div>
            </a>
    <?php endif ?>

    <?php if($count_productswo > 0): ?> 

<div class="col-md-3">
      <a href="<?php echo site_url('/warrantyout') ?>">
        <?php if($count_productswo <= 10): ?> 
          <div class="small-box bg-info p-2">
        <?php elseif($count_productswo  < 20): ?>
          <div class="small-box bg-warning p-2">
            <?php else: ?>
              <div class="small-box bg-light p-2">
        <?php endif ?>
        <div class="inner">
            <h3 class="text-center"><?php echo $count_productswo; ?></h3>

            <p class="text-center">Total Warranty out</p>
          </div>
          <div class="icon">
            <i class="ionicons ion-android-desktop"></i>
          </div>
          <a href="<?php echo site_url('/warrantyout') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
        </div>
      </div>
            </a>
            <?php endif ?>

         <!-- </div> -->

         <!-- <div class="row"> -->
         <?php if($count_debit > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/debit') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_debit; ?></h3>

                <p>Debit Returns</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-card"></i>
              </div>
            <a href="<?php echo site_url('/debit') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  </div>
                </a>
                <?php endif ?>

</div>
  
     