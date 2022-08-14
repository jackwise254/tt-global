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
<div class="container mt-5 pt-4 col-12">
<h4 class="text-center"> <u>Warranty In </u> </h4>
    <div class="container col-11">
    <a href="<?php echo base_url('Warranty/wload') ?>" class="btn btn-outline-success btn-sm bi bi-upload">Add Item</a>
<a href="<?php echo base_url('ProductsCrud/previousRCVDw') ?>" class="btn btn-outline-info btn-sm flex m-2">Previous Recieved</a>
<a href="<?php echo site_url('warrantyout') ?>" class="btn btn-outline-secondary btn-sm ">Warranty out</a>
<?php if($desg == 'warranty'): ?>
<a href="<?php echo site_url('/fualty-stock') ?>" class="btn btn-outline-secondary d-none btn-sm flex m-2">Faulty stock</a>
<?php elseif($desg == 'manager'): ?>
<a href="<?php echo site_url('/stock-view') ?>" class="btn btn-outline-secondary btn-sm flex m-2">Back</a>
<?php else: ?>
 <?php endif; ?>
<div class="row ">
    <?php if($count_warrantys > 0): ?> 
        <?php if($count_warrantys > 0): ?> 
           <div class="col-md-3">
              <a href="<?php echo site_url('/Warrantys') ?>">
                <?php if($count_warrantys <= 10): ?> 
                  <div class="small-box bg-primary p-2">
                    <?php elseif($count_warrantys  < 20): ?>
                       <div class="small-box bg-info p-2">
                         <?php else: ?>
                           <div class="small-box bg-light p-2">
                               <?php endif ?>
                                  <div class="inner">
                                    <h3 ><?php echo $count_warrantys; ?></h3>
                                       <p >Total stock</p>
                                  </div>
                            <div class="icon">
                            <i class="ionicons ion-android-desktop"></i>
                       </div>
                       <a href="<?php echo site_url('/Warrantys') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
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
  $builder1 = $db->table('warrantyin');
  $builder1->selectCount('type', 'conditions');
  $builder1->where('type', $t->type);
  $builder1->where('conditions', $c->conditions);
  $builder1->HAVING('conditions' > 1);
  $builder1->groupBy(['type', 'conditions']);
  $data = $builder1->get()->getResultArray(); 
  foreach($data as $d): 
  $link = 'vendor/generateFunctionw/'.$c->conditions.' '.$t->type;
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

     

