
<div class= "container mt-5 pt-5 bg-light rounded shadow">
     <h4 class="text-center"><u>Testing page</u></h4>

     <?php foreach($type as $t): ?>
        <!-- first card -->
        <div class="col-md-3">
          <a href="<?php echo site_url('/Ndesktopf') ?>">
              <div class="small-box bg-info p-2">
                  <div class="small-box bg-light p-2">
                   <div class="inner">
                   <h3>60</h3>
                   <p>New Desktops</p>
                   </div>
                   <div class="icon">
                   <i class="ionicons ion-android-desktop"></i>
              </div>
            <a href="<?php echo site_url('/Ndesktopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
         </div>
        </a>
       </div>
      <!-- end -->


        <?php endforeach; ?>

</div>