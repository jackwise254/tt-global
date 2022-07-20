<?php include('template/header.php'); 

foreach($num as $d):
        
  $db      = \Config\Database::connect();
  $builder10 = $db->table('masterlist');
  $builder10->selectCount('assetid ');
  $builder10->where('type', $d['type']);
  $builder10->groupBy('type');
  $cart = $builder10->get()->getResult();

foreach($cart as $ct):

      echo '<pre>';
        print_r($ct);

  endforeach; 
  endforeach; 

?>



<div class= "container mt-5 pt-5 bg-light ">
<h4 class="text-center"><u>Testing page</u></h4>
  <div class="row pt-3"> 
     <?php foreach($type as $t): ?>
     <?php foreach($condition as $c): 
      


        // foreach($cart as $ct):

        // $cart4 = count($ct);

        
      
      ?>
        <!-- first card -->
        <!-- <div class="col-sm-3">
            <a href="<?php echo site_url('/Ndesktopf') ?>">
                  <div class="small-box bg-light p-2">
                        <div class="inner">
                            <h3><?php echo 'helllp    ' ?></h3>
                            <p><?php echo $c->conditions .' '. $t->type ?></p>
                        </div>
                         <div class="icon">
                             <i class="ionicons ion-android-desktop"></i>
                         </div>
                     <a href="<?php echo site_url('/Ndesktopf') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                   </div>
             </a>
      </div> -->
      <!-- end -->
    
    <?php endforeach; ?>
    <?php endforeach; ?>

  </div>
</div>