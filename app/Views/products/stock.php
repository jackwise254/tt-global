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
<div class="container ">
<h4 class="text-center mt-5 pt-4"> <u>Remaining Stock </u> </h4>
<a href="<?php echo base_url('ProductsCrud/load') ?>" class="btn btn-outline-success btn-sm bi bi-upload">Recieve Goods</a>
<a href="<?php echo base_url('ProductsCrud/previousRCVD') ?>" class="btn btn-outline-info btn--sm flex m-2">Previous Recieved</a>
<a href="<?php echo site_url('/stockt-view') ?>" class="btn btn-outline-secondary btn-sm flex m-2">Stock Out</a>
<a href="<?php echo site_url('/warranty') ?>" class="btn btn-outline-success btn-sm flex m-2">Warranty</a>
<div class="row ">
    <?php if($count_products > 0): ?> 
        <?php if($count_products > 0): ?> 
           <div class="col-md-3">
              <a href="<?php echo site_url('/inventory-view') ?>">
                <?php if($count_products <= 10): ?> 
                  <div class="small-box bg-primary p-2">
                    <?php elseif($count_products  < 20): ?>
                       <div class="small-box bg-primary p-2">
                         <?php else: ?>
                           <div class="small-box bg-light p-2">
                               <?php endif ?>
                                  <div class="inner">
                                    <h3 ><?php echo $count_products; ?></h3>
                                       <p >Total stock</p>
                                  </div>
                            <div class="icon">
                            <i class="ionicons ion-android-desktop"></i>
                       </div>
                       <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
               </a>
            </div>
           
    <?php endif ?>
    <?php if($count_Ndesktop > 0): ?> 
      <div class="col-md-3">
        <a href="<?php echo site_url('/Ndesktop') ?>">
          <?php if($count_Ndesktop <= 10): ?> 
            <div class="small-box bg-danger p-2">
               <?php elseif($count_Ndesktop  < 20): ?>
                  <div class="small-box bg-secondary p-2">
                     <?php else: ?>
                    <div class="small-box bg-light p-2">
                     <?php endif ?>
                    <div class="inner">
                    <h3 ><?php echo $count_Ndesktop; ?></h3>
                    <p >New Desktops</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/Ndesktop') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </a>
                </div>
                <?php endif ?>
                <!-- second card -->
          <?php if($count_Rdesktop > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rdesktop') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rdesktop; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Rdesktop') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>

                <!-- draft -->
                
                <!-- end -->

                <?php elseif($count_Rdesktop < 1): ?>
                        <div class="col-md-3 d-none">
                <a href="<?php echo site_url('/inventory-view') ?>">
                      <div class="d-none">
                  <div class="inner">

                      <p >Total stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>

                <?php endif ?>

          
                <?php if($count_Odesktop > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Odesktop') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Odesktop; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Odesktop') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>

                <?php elseif($count_Odesktop < 1): ?>
                        <div class="col-md-3 d-none">
                <a href="<?php echo site_url('/inventory-view') ?>">
                      <div class="d-none">
                  <div class="inner">

                      <p >Total stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>

                <?php endif ?>

                <?php if($count_Nlaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlaptop') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlaptop; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Nlaptop') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          

         </div>
         <div>
                </a>

                <?php elseif($count_Nlaptop < 1): ?>
                        <div class="col-md-3 d-none">
                <a href="<?php echo site_url('/inventory-view') ?>">
                      <div class="d-none">
                  <div class="inner">

                      <p >Total stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>

                <?php endif ?>

         </div>

         <div class="row ">
         <?php if($count_Rlaptop > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rlaptop') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rlaptop; ?></h3>

                <p class="text-center">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Rlaptop') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>

                <?php elseif($count_Rlaptop < 1): ?>
                        <div class="col-md-3 d-none">
                <a href="<?php echo site_url('/inventory-view') ?>">
                      <div class="d-none">
                  <div class="inner">

                      <p >Total stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>

                <?php endif ?>

                <?php if($count_Olaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Olaptop') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Olaptop; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Olaptop') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>

                <?php elseif($count_Olaptop < 1): ?>
                        <div class="col-md-3 d-none">
                <a href="<?php echo site_url('/inventory-view') ?>">
                      <div class="d-none">
                  <div class="inner">

                      <p >Total stock</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>

                <?php endif ?>

          
                <?php if($count_Nallinone > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Nallinone') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nallinone; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nallinone') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <?php if($count_Oallinone > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Oallinone') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Oallinone; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Oallinone') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          
         </div>
                </a>
                <?php endif ?>


    <!-- </div> -->
    <div class="row ">
    <?php if($count_Rallinone> 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rallinone') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 ><?php echo $count_Rallinone; ?></h3>

                <p >Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinone') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          <?php if($count_hdd > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/hdd') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_hdd; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hdd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_ssd > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ssd') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ssd; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_ram > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/ram') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ram; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ram') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

         <!-- </div> -->

         <div class="row px-3">
         <?php if($count_printer > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/printer') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_printer; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            <a href="<?php echo site_url('/printer') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  <!-- </div> -->
                </a>
                <?php endif ?>

               



  

</div>

<!-- extra cards -->
<div class="row">
         <?php if($count_smartphonesm > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/smartphone') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_smartphonesm; ?></h3>
                <p class="text-center">Smartphones</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/smartphone') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>
                <?php if($count_Tablem > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/tablet') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Tablem; ?></h3>
                <p>Tablets</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/tablet') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Othersm > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/others') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Othersm; ?></h3>
                <p>Others</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/others') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>
                


       <?php if($count_Nlcd > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlcd') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlcd; ?></h3>

                <p>New Lcds</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Nlcd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
       <?php endif; ?>
      <!-- draft -->
      
      <!-- old lcd -->
      <?php if($count_Ulcd > 0): ?> 

        <div class="col-md-3">
        <a href="<?php echo site_url('/Ulcd') ?>">

          <div class="small-box bg-light p-2">
            <div class="inner">
              <h3><?php echo $count_Ulcd; ?></h3>

              <p>Old Lcds</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-desktop"></i>
            </div>
            <a href="<?php echo site_url('/Ulcd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

          </div>
        </div>
      </a>
    <?php endif; ?>
  <!-- eld -->

  <!-- Refurb lcds -->
  <?php if($count_Rlcd > 0): ?> 

    <div class="col-md-3">
    <a href="<?php echo site_url('/Rlcd') ?>">
        <div class="small-box bg-light p-2">
          <div class="inner">
            <h3><?php echo $count_Rlcd; ?></h3>
            <p>Refurb Lcds</p>
          </div>
          <div class="icon">
            <i class="ionicons ion-android-desktop"></i>
          </div>
          <a href="<?php echo site_url('/Rlcd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

        </div>
      </div>
    </a>
<?php endif; ?>

<!-- imacs -->
  <!-- </div> -->
  <div class="row ">
    <?php if($count_NImacs> 0): ?> 
          <div class="col-md-3">
           <a href="<?php echo site_url('/Rallinone') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 ><?php echo $count_NImacs; ?></h3>
                <p >New Imacs</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinone') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>

     <?php if($count_UImacs > 0): ?> 
       <div class="col-md-3">
          <a href="<?php echo site_url('/hdd') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_UImacs; ?></h3>
                <p>Used Imacs</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hdd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>

      <?php if($count_RImacs > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/ssd') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_RImacs; ?></h3>
                <p>Refurb Imacs</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssd') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
<?php endif ?>
      </div>
<!-- //imacs -->

  <!-- end -->
  <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards Will appear when you stock in</h5>

                  <?php
                endif ?>

    </div>


  
     

