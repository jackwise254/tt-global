<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

   <?php
   include('inc/db_connec.php');
    $session = session();
    $names = $session->get('user_name');
    ?> 
<section class="content mt-4">

<div class=" px-5 float end">

<div class='container' style="margin-top: 5rem; border-radius: 1rem">

      <a href="<?php echo site_url('home-view') ?>" class="btn btn-success btn-sm bi bi-chevron-left">back</a>
      <a href="<?php echo base_url('Warranty/create') ?>" class="btn btn-warning btn-sm bi bi-upload">Add Item</a>
      <a href="<?php echo site_url('faulty-load') ?>" class="btn btn-success btn-sm ">upload faulty</a>
      <a href="<?php echo site_url('fualty-stock') ?>" class="btn btn-warning btn-sm ">table</a>


<h4 class="text-center"> <u>Faulty stock </u> </h4>
    <div class="container">
    <div class="row">
      
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
             <div class="inner">
                <h3 class="text-center"><?php echo $count_Ndesktop; ?></h3>

                <p class="text-center">New Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Rdesktop; ?></h3>

                <p>Refurb Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
            </div>
          </div>
          
        
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Odesktop; ?></h3>

                <p>Used Desktops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-desktop"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nlaptop; ?></h3>

                <p>New Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            </div>
          </div>
          

         </div>
         <div>
         </div>

         <div class="row">
      
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rlaptop; ?></h3>

                <p class="text-center">Refurb laptops </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Olaptop; ?></h3>

                <p>Used Laptops</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-laptop"></i>
              </div>
            </div>
          </div>
          
        
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Nallinone; ?></h3>

                <p>New All in one</p>
              </div>
              <div class="icon">
                
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_Oallinone; ?></h3>

                <p>Used All in one</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            </div>
          </div>
         </div>
    </div>
    <div class="row">
      
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3 class="text-center"><?php echo $count_Rallinone; ?></h3>

                <p class="text-center">Refurb All in one </p>
              </div>
              <div class="icon">
                <i class="ionicons ion-android-phone-landscape"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_hdd; ?></h3>

                <p>HDD</p>
              </div>
              <div class="icon">
                <i class="ion ion-laptop"></i>
              </div>
            </div>
          </div>
          
        
          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ssd; ?></h3>

                <p>SSD</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_ram; ?></h3>

                <p>RAM</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
            </div>
          </div>
         </div>
         </div>

         <div class="row px-3">
         
         <div class="col-md-3">
            <div class="small-box bg-light p-2">
              <div class="inner">
                <h3><?php echo $count_printer; ?></h3>

                <p>Printers</p>
              </div>
              <div class="icon">
                <i class="ionicons ion-ios-printer-outline"></i>
              </div>
            </div>
          </div>
  </div>
</div>
  
     