<?php include('template/header.php'); ?>
<div class='container'>

<div class ='row col-sm-12 p-1 mt-5 pt-5 '>
  <h3 class='text-center'><u>Stock Out</u></h3>
  <div class='container'>
    
  <a href="<?php echo site_url('test') ?>" class="btn btn-outline-success btn-sm bi bi-chevron-left">back</a>
  <a href="<?php echo site_url('delivery-create') ?>" class="btn btn-outline-secondary btn-sm ">Delivery note</a>
  <a href="<?php echo site_url('debit-create') ?>" class="btn btn-outline-success btn-sm ">Debit note</a>
  </div>
<?php
  $arr = array(); 
  $arr2 = array();

foreach($type as $t): ?>
<?php foreach($condition as $c):
  
  $db      = \Config\Database::connect();
  $builder1 = $db->table('stockout');
  $builder1->selectCount('type', 'conditions');
  $builder1->where('type', $t->type);
  $builder1->where('conditions', $c->conditions);
  $builder1->HAVING('conditions' > 1);
  $builder1->groupBy(['type', 'conditions']);
  $data = $builder1->get()->getResultArray(); 
  foreach($data as $d): 
  $link = 'vendor/generateFunctions/'.$c->conditions.' '.$t->type;
   ?>

  <div class="col-md-3">
    <a href="<?php echo base_url($link) ?>">
     <div class="small-box bg-light p-2">
        <div class="inner">
          <h3 ><?php echo $d['conditions'];?></h>
          <p ><?php echo $c->conditions .' '. $t->type?></p>
        </div>
      <div class="icon">
        <i class="ionicons ion-android-phone-landscape"></i>
     </div>
  <a href="<?php echo base_url($link) ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
</div>
</div>
</a>

<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>
