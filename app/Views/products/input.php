<?php include('template/header.php'); ?>
<br/><br/>
   <section class="content mt-5">
      <div class="container">
        <h5 class="mb-3"><u>PURCHASES</u></h5>
        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo site_url('ProductsCrud/load') ?>">
            <div class="small-box bg-secondary p-2">
              <div class="inner">
                <h3></h3>

                <p>BY UPLOAD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('ProductsCrud/load') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>enter</a>
            </div>
          </div>
          </a>
          <div class="col-md-4">
            <a href="<?php echo site_url('/multiple') ?>">
            <div class="small-box bg-secondary p-2">
              <div class="inner">
                <h3></h3>

                <p>MULTIPLE ITEMS</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/multiple') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>enter</a>
            </div>
          </div>
          </a>
         </div>
        <div>
        </div>
      </div>
    </div>
  </div>
  
</section>


<?php include('template/footer.php'); ?>