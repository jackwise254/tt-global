<?php if($user_data == 'admin'): 

<<<<<<< HEAD
include('template/header.php');

else:
    include('template/head.php');

endif;

?>

   <?php
   include('inc/db_connect.php');
    $session = session();
    $names = $session->get('user_name');
    $desg = $session->get('designation');
    ?> 
<section class="content mt-4">

<div class=" px-5 float end">

<div class='container' style="margin-top: 5rem; border-radius: 1rem">
<!-- wcreate -->

<h4 class="text-center"> <u>Warranty In </u> </h4>
    <div class="container">
    <a href="<?php echo base_url('Warranty/wload') ?>" class="btn btn-outline-success btn-sm bi bi-upload">Add Item</a>
<a href="<?php echo base_url('ProductsCrud/previousRCVDw') ?>" class="btn btn-outline-info btn-sm flex m-2">Previous Recieved</a>
<a href="<?php echo site_url('warrantyout') ?>" class="btn btn-outline-secondary btn-sm ">Warranty out</a>

<?php if($desg == 'warranty'): ?>
<a href="<?php echo site_url('/fualty-stock') ?>" class="btn btn-outline-secondary d-none btn-sm flex m-2">Faulty stock</a>
<?php else: ?>
<a href="<?php echo site_url('/fualty-stock') ?>" class="btn btn-outline-secondary btn-sm flex m-2">Faulty stock</a>

 <?php endif; ?>
    <div class="row">
    <?php if($count_warrantys > 0): ?> 
    <?php if($count_warrantys > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Warrantys') ?>">
            <?php if($count_warrantys <= 10): ?> 
              <div class="small-box bg-danger p-2">
             <?php elseif($count_warrantys  < 20): ?>
              <div class="small-box bg-secondary p-2">
                <?php else: ?>
                  <div class="small-box bg-light p-2">
             <?php endif ?>
             <div class="inner">
                <h3 class=""><?php echo $count_warrantys; ?></h3>

                <p class="">Total warranty</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Warrantys') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
             <?php endif ?>

             
             <?php if($count_wNdesktop > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/Ndesktops') ?>">
            <?php if($count_wNdesktop <= 10): ?> 
              <div class="small-box bg-danger p-2">
             <?php elseif($count_wNdesktop  < 20): ?>
              <div class="small-box bg-secondary p-2">
                <?php else: ?>
                  <div class="small-box bg-light p-2">
             <?php endif ?>
             <div class="inner">
                <h3 class=""><?php echo $count_wNdesktop; ?></h3>

                <p class="">New Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Ndesktops') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
             <?php endif ?>



             <?php if($count_wRdesktop > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rdesktops') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wRdesktop; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Rdesktops') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
             <?php endif ?>

          
             <?php if($count_wOdesktop > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Odesktops') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wOdesktop; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
              <a href="<?php echo site_url('/Odesktops') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
             <?php endif ?>

             <?php if($count_wNlaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Nlaptops') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wNlaptop; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Nlaptops') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
          

         </div>
         <div>
                </a>
                <?php endif ?>


         </div>

         <div class="row">
         <?php if($count_wRlaptop > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rlaptops') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_wRlaptop; ?></h3>

                <p class="">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/Rlaptops') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_wOlaptop > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Olaptops') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wOlaptop; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Olaptops') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>

          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_wNallinone > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/Nallinones') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wNallinone; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nallinones') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <?php if($count_wOallinone > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/Oallinones') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wOallinone; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Oallinones') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
         </div>
                </a>
                <?php endif ?>

    </div>
    <div class="row">
    <?php if($count_wRallinone > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/Rallinones') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_wRallinone; ?></h3>

                <p class="">Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rallinones') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_whdd > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/hdds') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_whdd; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/hdds') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

          
                <?php if($count_wssd > 0): ?> 
        
          <div class="col-md-3">
          <a href="<?php echo site_url('/ssds') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wssd; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/ssds') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_wram > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/rams') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wram; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/rams') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
         </div>
                </a>
                <?php endif ?>

         </div>

         <div class="row px-3">
         

    
          

</div>


<div class="row">
<?php if($count_wprinter > 0): ?> 
         
         <div class="col-md-3">
          <a href="<?php echo site_url('/printers') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_wprinter; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            <a href="<?php echo site_url('/printers') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

       <!-- <?php if($count_credit > 0): ?> 
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
                <?php endif ?> -->

          
                <?php if($count_ok > 0): ?> 
         <div class="col-md-3">
          <a href="<?php echo site_url('/ok') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ok; ?></h3>

                <p>Status: irrepairable</p>
              </div>
              <div class="icon">
                <i class="ion-ios-cog"></i>
                
                <!-- <i class="icon ion-ios-contract-outline"></i> -->
              </div>
            <a href="<?php echo site_url('/ok') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>


                <?php if($count_fixed > 0): ?> 

                <div class="col-md-3">
          <a href="<?php echo site_url('/fixed') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_fixed; ?></h3>

                <p>Status: Fixed</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-checkmark-circle"></i> -->
                <!-- <i class="fa fa-octagon-check"></i> -->
                <i class="bi bi-check-circle"></i>
                <!-- <i class="icon ion-ios-bulb"></i> -->
              </div>
            <a href="<?php echo site_url('/fixed') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
           <!-- </div> -->
                </a>
                <?php endif ?>


                <?php if($count_wip > 0): ?> 

<div class="col-md-3">
<a href="<?php echo site_url('/wip') ?>">

<div class="small-box bg-light p-2">
<div class="inner">
<h3><?php echo $count_wip; ?></h3>

<p>Status: Wip</p>
</div>
<div class="icon">
<!-- <i class="ion ion-checkmark-circle"></i> -->
<!-- <i class="fa fa-octagon-check"></i> -->
<i class="bi bi-circle"></i>
<!-- <i class="icon ion-ios-bulb"></i> -->
</div>
<a href="<?php echo site_url('/wip') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

</div>
</div>
</div>
</a>
<?php endif ?>

                
</div>

<!-- extra cards -->
<div class="row">
         <?php if($count_smartphones > 0): ?> 
      
          <div class="col-md-3">
          <a href="<?php echo site_url('/smartphones') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_smartphones; ?></h3>
                <p class="">Smartphones </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/smartphones') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_tablet > 0): ?> 

          <div class="col-md-3">
          <a href="<?php echo site_url('/tablets') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_tablet; ?></h3>

                <p>Tablets</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/tablets') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
          
                <?php if($count_Others > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/otherss') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Others; ?></h3>

                <p>Others</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/otherss') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>

          </div>
                </a>
                <?php endif ?>

                <!-- lcds -->

                
<div class="row">
         <?php if($count_nlcdw > 0): ?> 
          
          <div class="col-md-3">
          <a href="<?php echo site_url('/nlcdw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class=""><?php echo $count_nlcdw; ?></h3>
                <p class="">New Lcd </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
              <a href="<?php echo site_url('/nlcdw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>

            </div>
          </div>
                </a>
                <?php endif ?>

                <?php if($count_rlcdw > 0): ?> 
                 
          <div class="col-md-3">
          <a href="<?php echo site_url('/rlcdw') ?>">

            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_rlcdw; ?></h3>

                <p>Refurb Lcd</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/rlcdw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
          
                <?php if($count_ulcdw > 0): ?> 
          <div class="col-md-3">
          <a href="<?php echo site_url('/ulcdw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ulcdw; ?></h3>
                <p>Used Lcd</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
              <a href="<?php echo site_url('/ulcdw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
                </a>
                <?php endif ?>
                <!-- end -->
                
                <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards will appear when you upload items</h5>

                  <?php
                endif ?>
    </div>
  
     
=======
       </tbody>
	</table>
     <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/products-form') ?>" class="btn btn-success bi-plus mb-4">Add Item</a>
            </tr>
  </div>
</div> 
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
