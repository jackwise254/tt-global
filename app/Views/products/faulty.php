<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_conne.php'); 
?>

<div class="pt-4 mt-5">
  
      <div class="my-3">
<div class="container mx-auto col-mx-auto col-lg-12 px-4" >
<h4 class="text-center"><u>Faulty stock</u></h4>
      <a href="<?php echo site_url('tload') ?>" class="btn btn-outline-success bi bi-upload btn-sm ">upload faulty</a>
      <a href="<?php echo base_url('ProductsCrud/previousRCVDf') ?>" class="btn btn-outline-info btn-sm flex m-2">Previous Recieved</a>
      <a href="<?php echo site_url('warranty') ?>" class="btn btn-outline-secondary  btn-sm ">Warranty</a>

    <div class="row">
<!-- another  -->
        <?php if($count_produ > 0): ?> 
        <?php if($count_produ > 0): ?> 

          
          <div class="col-md-3">
                <a href="<?php echo site_url('/faulty-view') ?>">
                  <?php if($count_produ <= 10): ?> 
                    <div class="small-box bg-info p-2">
                  <?php elseif($count_produ  < 20): ?>
                    <div class="small-box bg-info p-2">
                      <?php else: ?>
                        <div class="small-box bg-light p-2">
                  <?php endif ?>
                  <div class="inner">
                      <h3><?php echo $count_produ; ?></h3>

                      <p >Total faulty stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/faulty-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>
                      <?php endif ?>

    <?php if($count_Ndesktopf > 0): ?> 
      <!-- another card -->
          <div class="col-md-3">
          <a href="<?php echo site_url('/Ndesktopf') ?>">
            <?php if($count_Ndesktopf <= 10): ?> 
              <div class="small-box bg-info p-2">
             <?php elseif($count_Ndesktopf  < 20): ?>
              <div class="small-box bg-warning p-2">
                <?php else: ?>
                  <div class="small-box bg-light p-2">
             <?php endif ?>
             <div class="inner">
                <h3><?php echo $count_Ndesktopf; ?></h3>

                <p>New Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Ndesktopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
                <!-- second card -->
      
      

                <?php if($count_Rdesktopf > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Rdesktopf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rdesktopf; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Rdesktopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Odesktopf > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Odesktopf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Odesktopf; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Odesktopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Nlaptopf > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlaptopf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlaptopf; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Nlaptopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          

         </div>
         <div>
                </a>
                <?php endif ?>

         </div>

         <div class="row">
         <?php if($count_Rlaptopf > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rlaptopf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_Rlaptopf; ?></h3>

                <p class="">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Rlaptopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                
                <?php endif ?>

                <?php if($count_Olaptopf > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Olaptopf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Olaptopf; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Olaptopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Nallinonef > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Nallinonef') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nallinonef; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nallinonef') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <?php if($count_Oallinonef > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Oallinonef') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Oallinonef; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Oallinonef') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          
         </div>
                </a>
                <?php endif ?>


    </div>
    <div class="row">
    <?php if($count_Rallinonef> 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rallinonef') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_Rallinonef; ?></h3>

                <p class="">Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinonef') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          <?php if($count_hddf > 0): ?> 

            

          <div class="col-md-3">
          <a href="<?php echo site_url('/hddf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_hddf; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hddf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_ssdf > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ssdf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ssdf; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssdf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_ramf > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/ramf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ramf; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ramf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
         </div>
                </a>
                <?php endif ?>

        


         <div class="row">
         <?php if($count_printerf > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/printerf') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_printerf; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            <a href="<?php echo site_url('/printerf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  <!-- </div> -->
                </a>
                <?php endif ?>
                
                <!-- nlcd -->
                <?php if($count_nlcdf > 0): ?> 
                    <div class="col-md-3">
                      <a href="<?php echo site_url('/nlcdf') ?>">
                        <div class="small-box bg-light p-2">
                          <div class="inner">
                            <h3><?php echo $count_nlcdf; ?></h3>
                            <p>New lcd</p>
                          </div>
                          <div class="icon">
                            <i class="ionicons ion-ios-printer-outline"></i>
                          </div>
                        <a href="<?php echo site_url('/nlcdf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                        </div>
                      </div>
                      </a>
                <?php endif ?>
                <!-- end -->
                
                 <!-- Ulcd -->
                 <?php if($count_ulcdf > 0): ?> 
                    <div class="col-md-3">
                      <a href="<?php echo site_url('/ulcdf') ?>">
                        <div class="small-box bg-light p-2">
                          <div class="inner">
                            <h3><?php echo $count_ulcdf; ?></h3>
                            <p>Used Lcd</p>
                          </div>
                          <div class="icon">
                            <i class="ionicons ion-ios-printer-outline"></i>
                          </div>
                        <a href="<?php echo site_url('/ulcdf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                        </div>
                      </div>
                    </a>
              <?php endif ?>
     <!-- end -->

      <!-- Rlcd -->
              <?php if($count_rlcdf > 0): ?> 
                <div class="col-md-3">
                  <a href="<?php echo site_url('/rlcdf') ?>">
                    <div class="small-box bg-light p-2">
                      <div class="inner">
                        <h3><?php echo $count_rlcdf; ?></h3>
                        <p>Refurb Lcd</p>
                      </div>
                      <div class="icon">
                        <i class="ionicons ion-ios-printer-outline"></i>
                      </div>
                    <a href="<?php echo site_url('/rlcdf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                    </div>
                </div>
                </a>
            <?php endif ?>
     <!-- end -->

                <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards will appear when you upload faulty items</h5>

                  <?php
                endif ?>
</div>
  
     