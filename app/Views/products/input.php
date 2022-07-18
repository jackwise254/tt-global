<<<<<<< HEAD
<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
=======
<?php include('template/header.php'); ?>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0

      <div class="container mt-5">
        <h5 class="mb-3"><u>Purchases</u></h5>
        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo site_url('ProductsCrud/load') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3></h3>

                <p>Upload Using</p>
                <p>CSV</p>

              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('ProductsCrud/load') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>To CSV</a>
            </div>
          </div>
          </a>
          <div class="col-md-4">
            <a href="<?php echo site_url('/products-form') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3></h3>

                <p>Upload</p>
                <p>Multiple items</p>

              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/products-form') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Multiple items</a>
            </div>
          </div>
          </a>
         </div>
        <div>
        </div>
      </div>
    </div>
  </div>
