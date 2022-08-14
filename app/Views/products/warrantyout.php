 <?php if($user_data == 'admin'): 
include('template/header.php');

else:
    include('template/head.php');

endif;

?>
   <?php
        include('inc/db_con.php'); 
         $session = session();
         $names = $session->get('user_name');
         $desg = $session->get('designation');
         ?> 
<div class="container mt-5 pt-4 col-12">
<h5 class="text-center"><u>Warranty Out</u></h5>
<div class="container col-11">
<a href="<?php echo site_url('warranty') ?>" class="btn btn-outline-success btn-sm">Back</a>
<?php if($desg == 'warranty'): ?>
<a href="<?php echo site_url('warranty-create') ?>" class="btn d-none btn-outline-secondary btn-sm">warranty note</a>
  <?php else: ?>
    <a href="<?php echo site_url('warranty-create') ?>" class="btn btn-outline-secondary btn-sm">warranty note</a>
  <a href="<?php echo site_url('credit-create') ?>" class="btn btn-outline-success btn-sm ">credit note</a>
  <?php endif; ?>
<div class="row ">
    <?php if($count_products > 0): ?> 
        <?php if($count_products > 0): ?> 
           <div class="col-md-3">
              <a href="<?php echo site_url('/warrantyoutv') ?>">
                <?php if($count_products <= 10): ?> 
                  <div class="small-box bg-primary p-2">
                    <?php elseif($count_products  < 20): ?>
                       <div class="small-box bg-info p-2">
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
                       <a href="<?php echo site_url('/warrantyoutv') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
               </a>
            </div>
    <?php endif ?>

    <?php
  $arr = array(); 
  $arr2 = array();

foreach($type as $t): ?>
<?php foreach($condition as $c):
  
  $db      = \Config\Database::connect();
  $builder1 = $db->table('warrantyout');
  $builder1->selectCount('type', 'conditions');
  $builder1->where('type', $t->type);
  $builder1->where('conditions', $c->conditions);
  $builder1->HAVING('conditions' > 1);
  $builder1->groupBy(['type', 'conditions']);
  $data = $builder1->get()->getResultArray(); 
  foreach($data as $d): 
  $link = 'vendor/generateFunctionwo/'.$c->conditions.' '.$t->type;
   ?>

<div class="col-md-3">
              <a href="<?php echo base_url($link) ?>">
                <?php if($d['conditions'] <= 10): ?> 
                  <div class="small-box bg-primary p-2">
                    <?php elseif($d['conditions']  < 20): ?>
                       <div class="small-box bg-primary p-2">
                         <?php else: ?>
                           <div class="small-box bg-light p-2">
                               <?php endif ?>
                                  <div class="inner">
                                    <h3 ><?php echo $d['conditions']; ?></h3>
                                       <p ><?php echo $c->conditions .' '. $t->type?></p>
                                  </div>
                            <div class="icon">
                            <i class="ionicons ion-android-desktop"></i>
                       </div>
                       <a href="<?php echo base_url($link) ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
                  </div>
               </a>
            </div>

<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>


  <?php
else: ?>

          <h5 class=' alert alert-light d-flex align-items-center bi flex-shrink-0 me-2 ' width='12' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>Cards Will appear when you stock in</h5>

<?php
endif ?>

    </div>
<div class ='row col-sm-12 p-1 mt-5 pt-5 '>

     

