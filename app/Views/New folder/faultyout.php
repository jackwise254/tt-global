<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

   <?php
   include('inc/db_connectf.php');
    $session = session();
    $names = $session->get('user_name');
    ?> 
<section class="content mt-4 col-mx-auto col-lg-12 px-4">

<div class=" px-5 float end">

<div class='container' style="margin-top: 5rem; border-radius: 1rem">
<h4 class="text-center"> <u>Faulty out</u> </h4>

<a href="<?php echo site_url('fualty-stock') ?>" class="btn btn-outline-dark btn-sm ">back</a>

<a href="<?php echo site_url('faulty-create') ?>" class="btn btn-outline-warning btn-sm ">Faulty note</a>
    
    <div class="container">
    <div class="row">
        <?php if($count_products > 0): ?> 
        <?php if($count_products > 0): ?> 


          <div class="col-md-3">
                <a href="<?php echo site_url('/totalfo') ?>">
                  <?php if($count_products <= 10): ?> 
                    <div class="small-box bg-danger p-2">
                  <?php elseif($count_products  < 20): ?>
                    <div class="small-box bg-warning p-2">
                      <?php else: ?>
                        <div class="small-box bg-light p-2">
                  <?php endif ?>
                  <div class="inner">
                      <h3 class="text-center"><?php echo $count_products; ?></h3>

                      <p class="text-center">Total faulty out</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/totalfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>
                      <?php endif ?>

    <?php if($count_Ndesktop > 0): ?> 
      <!-- another card -->
          <div class="col-md-3">
          <a href="<?php echo site_url('/Ndesktopfo') ?>">
            <?php if($count_Ndesktop <= 10): ?> 
              <div class="small-box bg-danger p-2">
             <?php elseif($count_Ndesktop  < 20): ?>
              <div class="small-box bg-warning p-2">
                <?php else: ?>
                  <div class="small-box bg-light p-2">
             <?php endif ?>
             <div class="inner">
                <h3 class="text-center"><?php echo $count_Ndesktop; ?></h3>

                <p class="text-center">New Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Ndesktopfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
                <!-- second card -->
      
      

                <?php if($count_Rdesktop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Rdesktopfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rdesktop; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Rdesktopfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Odesktop > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Odesktopfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Odesktop; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Odesktopfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Nlaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlaptopfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlaptop; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Nlaptopfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          

         </div>
         <div>
                </a>
                <?php endif ?>

         </div>

         <div class="row">
         <?php if($count_Rlaptop > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rlaptopfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rlaptop; ?></h3>

                <p class="text-center">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Rlaptopfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Olaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Olaptopfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Olaptop; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Olaptopfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Nallinone > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Nallinonefo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nallinone; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nallinonefo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <?php if($count_Oallinone > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Oallinonefo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Oallinone; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Oallinonefo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          
         </div>
                </a>
                <?php endif ?>


    </div>
    <div class="row">
    <?php if($count_Rallinone> 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rallinonefo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rallinone; ?></h3>

                <p class="text-center">Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinonefo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          <?php if($count_hdd > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/hddfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_hdd; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hddfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_ssd > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ssdfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ssd; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssdfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_ram > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/ramfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ram; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ramfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
         </div>
                </a>
                <?php endif ?>

         </div>

         <div class="row px-3">
         <?php if($count_printer > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/printerfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_printer; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            <a href="<?php echo site_url('/printerfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  <!-- </div> -->
                </a>
                <?php endif ?>


         <!-- <?php if($count_debit > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/debitfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_debit; ?></h3>

                <p>Debit Returns</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-card"></i>
              </div>
            <a href="<?php echo site_url('/debitfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  </div>
                </a>
                <?php endif ?> -->
                
</div>
  
<div class="row">
         <?php if($count_smartphones > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/smartphonefo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_smartphones; ?></h3>

                <p class="text-center">Smartphones</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/smartphonefo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Tablet > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/tabletfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Tablet; ?></h3>

                <p>Tablets</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/tabletfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Others > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/othersfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Others; ?></h3>
                <p>Others</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/othersfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>


                <!-- lcds -->
                
                <div class="row">
                  <?php if($count_nlcdfo > 0): ?> 
                
                    <div class="col-md-3">
                    <a href="<?php echo site_url('/nlcdfo') ?>">

                      <div class="small-box bg-light p-2">
                        <div class="inner">
                          <h3 class="text-center"><?php echo $count_nlcdfo; ?></h3>
                          <p class="text-center">New Lcd</p>
                        </div>
                        <div class="icon">
                          <i class="ionicons ion-laptop"></i>
                        </div>
                        <a href="<?php echo site_url('/nlcdfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
               </div>
                </a>
                <?php endif ?>

                <?php if($count_rlcdfo > 0): ?> 
                  
          <div class="col-md-3">
          <a href="<?php echo site_url('/rlcdfo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_rlcdfo; ?></h3>

                <p>Tablets</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/rlcdfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_ulcdfo > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ulcdfo') ?>">
                  <div class="small-box bg-light p-2">
                    <div class="inner">
                      <h3><?php echo $count_ulcdfo; ?></h3>
                      <p>Used Lcd</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-phone-landscape"></i>
                    </div>
                  <a href="<?php echo site_url('/ulcdfo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                </a>
                <?php endif ?>
                <!-- end -->
                <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards will appear when you create a faulty note</h5>

                  <?php
                endif ?>

    </div>