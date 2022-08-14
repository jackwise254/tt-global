<?php if($user_data == 'admin'): 
include('template/header.php');

else:
    include('template/head.php');

endif;

?>

   <?php
   include('inc/db_conne.php');
    $session = session();
    $names = $session->get('user_name');
    ?> 
<div class="container mt-5 pt-4 col-11">
<h4 class="text-center"><u>Faulty stock</u></h4>
      <a href="<?php echo site_url('tload') ?>" class="btn btn-outline-success bi bi-upload btn-sm ">upload faulty</a>
      <a href="<?php echo base_url('ProductsCrud/previousRCVDf') ?>" class="btn btn-outline-info btn-sm flex m-2">Previous Recieved</a>
      <a href="<?php echo site_url('warranty') ?>" class="btn btn-outline-secondary  btn-sm ">Warranty</a>

<div class="row ">
    <?php if($count_produ > 0): ?> 
        <?php if($count_produ > 0): ?> 
           <div class="col-md-3">
              <a href="<?php echo site_url('/faulty-view') ?>">
                <?php if($count_produ <= 10): ?> 
                  <div class="small-box bg-primary p-2">
                    <?php elseif($count_produ  < 20): ?>
                       <div class="small-box bg-info p-2">
                         <?php else: ?>
                           <div class="small-box bg-light p-2">
                               <?php endif ?>
                                  <div class="inner">
                                    <h3 ><?php echo $count_produ; ?></h3>
                                       <p >Total stock</p>
                                  </div>
                            <div class="icon">
                            <i class="ionicons ion-android-desktop"></i>
                       </div>
                       <a href="<?php echo site_url('/faulty-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
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
  $builder1 = $db->table('faulty');
  $builder1->selectCount('type', 'conditions');
  $builder1->where('type', $t->type);
  $builder1->where('conditions', $c->conditions);
  $builder1->HAVING('conditions' > 1);
  $builder1->groupBy(['type', 'conditions']);
  $data = $builder1->get()->getResultArray(); 
  foreach($data as $d): 
  $link = 'vendor/generateFunctionf/'.$c->conditions.' '.$t->type;
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

     

