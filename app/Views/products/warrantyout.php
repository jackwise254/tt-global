<?php 
    $session = session();
    $desg = $session->get('designation');

if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;
include('inc/db_con.php'); ?>

<meta charset="utf-8">
  
  <h5 class="text-center mt-5 pt-4"><u>Warranty Out</u></h5>
  
<div class="container ">
<a href="<?php echo site_url('warranty') ?>" class="btn btn-outline-success btn-sm">Back</a>
<?php if($desg == 'warranty'): ?>
<a href="<?php echo site_url('warranty-create') ?>" class="btn d-none btn-outline-secondary btn-sm">warranty note</a>
  <?php else: ?>
    <a href="<?php echo site_url('warranty-create') ?>" class="btn btn-outline-secondary btn-sm">warranty note</a>
  <a href="<?php echo site_url('credit-create') ?>" class="btn btn-outline-success btn-sm ">credit note</a>
  <?php endif; ?>
 
    <div class="row pt-3">
        <?php if($count_products > 0): ?> 
        <?php if($count_products > 0): ?> 


          <div class="col-md-3">
                <a href="<?php echo site_url('/warrantyoutv') ?>">
                  <?php if($count_products <= 10): ?> 
                    <div class="small-box bg-danger p-2">
                  <?php elseif($count_products  < 20): ?>
                    <div class="small-box bg-secondary p-2">
                      <?php else: ?>
                        <div class="small-box bg-light p-2">
                  <?php endif ?>
                  <div class="inner">
                      <h3 class=""><?php echo $count_products; ?></h3>

                      <p class="">Total Warranty out</p>
                    </div>
                    <div class="icon">
                      <i class="ionicons ion-android-desktop"></i>
                    </div>
                    <a href="<?php echo site_url('/warrantyoutv') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
                </div>
                      </a>
                      <?php endif ?>

    <?php if($count_Ndesktop > 0): ?> 
      <!-- another card -->
          <div class="col-md-3">
          <a href="<?php echo site_url('/Ndesktopwo') ?>">
            <?php if($count_Ndesktop <= 10): ?> 
              <div class="small-box bg-danger p-2">
             <?php elseif($count_Ndesktop  < 20): ?>
              <div class="small-box bg-secondary p-2">
                <?php else: ?>
                  <div class="small-box bg-light p-2">
             <?php endif ?>
             <div class="inner">
                <h3 class=""><?php echo $count_Ndesktop; ?></h3>

                <p class="">New Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Ndesktopwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
                <?php if($count_Rdesktop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Rdesktopwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rdesktop; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Rdesktopwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Odesktop > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Odesktopwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Odesktop; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Odesktopwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Nlaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlaptopwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlaptop; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Nlaptopwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

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
          <a href="<?php echo site_url('/Rlaptopwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_Rlaptop; ?></h3>

                <p class="">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Rlaptopwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Olaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Olaptopwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Olaptop; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Olaptopwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Nallinone > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Nallinonewo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nallinone; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nallinonewo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <?php if($count_Oallinone > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Oallinonewo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Oallinone; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Oallinonewo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          
         </div>
                </a>
                <?php endif ?>


    </div>
    <div class="row">
    <?php if($count_Rallinone> 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rallinonewo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_Rallinone; ?></h3>

                <p class="">Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinonewo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          <?php if($count_hdd > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/hddwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_hdd; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hddwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_ssd > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ssdwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ssd; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssdwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_ram > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/ramwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ram; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ramwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
         </div>
                </a>
                <?php endif ?>

         </div>

         <div class="row">

         <?php if($count_printer > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/printerwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_printer; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            <a href="<?php echo site_url('/printerwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
  <!-- </div> -->
                </a>
                <?php endif ?>

         
                <?php if($count_credit > 0): ?> 
         <div class="col-md-3">
          <a href="<?php echo site_url('/credits') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_credit; ?></h3>

                <p>Credit Note</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-card"></i>
              </div>
            <a href="<?php echo site_url('/credits') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          
                </a>
                <?php endif ?>
                
               


</div>


<!-- extra crads -->
<div class="row">
         <?php if($count_smartphones > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/smartphonewo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_smartphones; ?></h3>

                <p class="">Smartphone</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/smartphonewo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_Tablet > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/tabletwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Tablet; ?></h3>

                <p>Tablets</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/tabletwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_Others > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/otherswo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Others; ?></h3>

                <p>Others</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/otherswo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <!-- lcds -->
        <div class="row">
                <?php if($count_nlcdwo > 0): ?> 
                  
                  <div class="col-md-3">
                  <a href="<?php echo site_url('/nlcdwo') ?>">

                    <div class="small-box bg-light p-2">
                      <div class="inner">
                        <h3 class=""><?php echo $count_nlcdwo; ?></h3>
                        <p class="">New Lcd</p>
                      </div>
                      <div class="icon">
                        <i class="ionicons ion-laptop"></i>
                      </div>
                      <a href="<?php echo site_url('/nlcdwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

                    </div>
                  </div>
                        </a>
        <?php endif ?>

                <?php if($count_ulcdwo > 0): ?> 
                  
          <div class="col-md-3">
          <a href="<?php echo site_url('/ulcdwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ulcdwo; ?></h3>

                <p>Used Lcd </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/ulcdwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_rlcdwo > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/rlcdwo') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_rlcdwo; ?></h3>

                <p>Others</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/rlcdwo') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>


                <!-- end -->
                <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards will appear when you create a warranty note</h5>

                  <?php
                endif ?>
    </div>


















