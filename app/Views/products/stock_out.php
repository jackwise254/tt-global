<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
 <?php
   include('incs/db_connect.php');
    $session = session();
    $names = $session->get('user_name');
    ?> 

<!-- <section class="content mt-4"> -->

<!-- <div class=" px-5 float end"> -->

<!-- <div class='container' style="margin-top: 5rem; border-radius: 1rem"> -->

    <div class="container col-lg-12 px-5">
  <h5 class="text-center mt-5 pt-4"><u>Stock out</u></h5>

    <a href="<?php echo site_url('stock-view') ?>" class="btn btn-outline-success btn-sm bi bi-chevron-left">back</a>
  <a href="<?php echo site_url('delivery-create') ?>" class="btn btn-outline-secondary btn-sm ">Delivery note</a>
  <a href="<?php echo site_url('debit-create') ?>" class="btn btn-outline-success btn-sm ">Debit note</a>

    <div class="row pt-3">
        <?php if($count_products > 0): ?> 
        <?php if($count_products > 0): ?> 

          <div class="col-md-3">
                <a href="<?php echo site_url('/stocktt-view') ?>">
                  
                        <div class="small-box bg-light p-2">
                  
                  <div class="inner">
                      <h3 class="text-center"><?php echo $count_products; ?></h3>

                      <p class="text-center">Total stock out</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/stocktt-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>
                      <?php endif ?>

    <?php if($count_Ndesktop > 0): ?> 
      <!-- another card -->
          <div class="col-md-3">
          <a href="<?php echo site_url('/Ndesktopss') ?>">
           
                  <div class="small-box bg-light p-2">
             
             <div class="inner">
                <h3 class="text-center"><?php echo $count_Ndesktop; ?></h3>

                <p class="text-center">New Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Ndesktopss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
            
                <?php if($count_Rdesktop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Rdesktopss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rdesktop; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Rdesktopss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Odesktop > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Odesktopss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Odesktop; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Odesktopss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Nlaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlaptopss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlaptop; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Nlaptopss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

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
          <a href="<?php echo site_url('/Rlaptopss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rlaptop; ?></h3>

                <p class="text-center">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Rlaptopss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Olaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Olaptopss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Olaptop; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Olaptopss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Nallinone > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Nallinoness') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nallinone; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nallinoness') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <?php if($count_Oallinone > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Oallinoness') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Oallinone; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Oallinoness') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          
         </div>
                </a>
                <?php endif ?>


    </div>
    <div class="row ">
    <?php if($count_Rallinone> 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rallinoness') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rallinone; ?></h3>

                <p class="text-center">Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinoness') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          <?php if($count_hdd > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/hddss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_hdd; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hddss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_ssd > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ssdss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ssd; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssdss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_ram > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/ramss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ram; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ramss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
         </div>
                </a>
                <?php endif ?>

         </div>
         <?php if($count_printer > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/printerss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_printer; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            <a href="<?php echo site_url('/printerss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  <!-- </div> -->
                </a>
                <?php endif ?>

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



<!-- extra crads -->
<div class="row col-lg-12 px-5">
         <?php if($count_smartphone > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/smartphoness') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_smartphone; ?></h3>

                <p class="text-center">Smartphones </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/smartphoness') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_tablets > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/tabletss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_tablets; ?></h3>

                <p>Tablets</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/tabletss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
        <?php if($count_others > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/othersss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_others; ?></h3>

                <p>Others</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/othersss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <!-- lcds -->

                <!-- extra crads -->
<div class="row">
         <?php if($count_nlcds > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/nlcds') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_nlcds; ?></h3>

                <p class="text-center">New Lcd </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/nlcds') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>
                
                <?php if($count_rlcds > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/rlcds') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_rlcds; ?></h3>
                <p>Refurb Lcd</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/rlcds') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

                
        <?php if($count_ulcds > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/ulcds') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ulcds; ?></h3>
                <p>Used Lcd</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/ulcds') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>

                <!-- end of lcds -->
                <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards will appear when you create a delivery note</h5>

                  <?php
                endif ?>
             

    </div>
  
     

