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
<?php elseif($desg == 'manager'): ?>
<a href="<?php echo site_url('/stock-view') ?>" class="btn btn-outline-secondary btn-sm flex m-2">Back</a>
<?php else: ?>
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


               
     <!-- imacs -->

  <!-- </div> -->
  <div class="row ">
    <?php if($count_NImacsw> 0): ?> 
          <div class="col-md-3">
           <a href="<?php echo site_url('/Nimacw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 ><?php echo $count_NImacsw; ?></h3>
                <p >New Imacs</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Nimacw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>
      

     <?php if($count_UImacsw > 0): ?> 
       <div class="col-md-3">
          <a href="<?php echo site_url('/Uimacw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_UImacsw; ?></h3>
                <p>Used Imacs</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Uimacw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>

      

      <?php if($count_RImacsw > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/Rimacw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_RImacsw; ?></h3>
                <p>Refurb Imacs</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/Rimacw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
       <?php endif ?>
       

       <?php if($count_Nserverw > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/Nserverw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nserverw; ?></h3>
                <p>New Servers</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/Nserverw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
       <?php endif ?>


      </div>
<!-- //imacs -->

<!-- servers -->
<div class="row ">
    <?php if($count_Userverw> 0): ?> 
          <div class="col-md-3">
           <a href="<?php echo site_url('/Userverw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 ><?php echo $count_Userverw; ?></h3>
                <p >Used Servers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Userverw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>
      
     <?php if($count_Rserverw > 0): ?> 
       <div class="col-md-3">
          <a href="<?php echo site_url('/Rserverw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rserverw; ?></h3>
                <p>Refurb  Servers</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Rserverw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>
      
      <?php if($count_Nworkstationw > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/Nworkstationw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nworkstationw; ?></h3>
                <p>New  Workstations</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/Nworkstationw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
       <?php endif ?>
       

       <?php if($count_Nworkstationw > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/Uworkstationw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nworkstationw; ?></h3>
                <p>Used Workstations</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/Uworkstationw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
       <?php endif ?>


      </div>
<!-- //servers -->

<!-- Workstations -->
<div class="row ">
    <?php if($count_Rworkstationw> 0): ?> 
          <div class="col-md-3">
           <a href="<?php echo site_url('/Rworkstationw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 ><?php echo $count_Rworkstationw; ?></h3>
                <p >Refurb workstations</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            <a href="<?php echo site_url('/Rworkstationw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>
      
     <?php if($count_Nmacbookw > 0): ?> 
       <div class="col-md-3">
          <a href="<?php echo site_url('/Nmacbookw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nmacbookw; ?></h3>
                <p>New Macbooks</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            <a href="<?php echo site_url('/Nmacbookw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
      <?php endif ?>
      
      <?php if($count_Umacbookw > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/Umacbookw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Umacbookw; ?></h3>
                <p>Used Macbooks</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/Umacbookw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
       <?php endif ?>
       

       <?php if($count_Rmacbookw > 0): ?> 
        <div class="col-md-3">
          <a href="<?php echo site_url('/Rmacbookw') ?>">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rmacbookw; ?></h3>
                <p>Refurb Macbooks</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            <a href="<?php echo site_url('/Rmacbookw') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
            </div>
          </div>
         </a>
       <?php endif ?>
      </div>

      </div>
<!-- //workstations --> 
                
                <?php
                else: ?>
                  
        <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards will appear when you upload items</h5>

                  <?php
                endif ?>
    </div>
  
     