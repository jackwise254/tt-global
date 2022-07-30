<?php include('template/header.php'); ?>
<div class='container'>

<div class ='row col-sm-12 p-1 mt-5 pt-5 '>
<?php
  $arr = array(); 
  $arr2 = array();

foreach($type as $t): ?>
<?php foreach($condition as $c):
  
  $db      = \Config\Database::connect();
  $builder1 = $db->table('masterlist');
  $builder1->selectCount('type', 'conditions');
  $builder1->where('type', $t->type);
  $builder1->where('conditions', $c->conditions);
  $builder1->HAVING('conditions' > 1);
  $builder1->groupBy(['type', 'conditions']);
  $data = $builder1->get()->getResultArray(); 
  foreach($data as $d): ?>

  <div class="col-md-3">
    <a href="<?php echo site_url('/Nimac') ?>">
     <div class="small-box bg-light p-2">
        <div class="inner">
          <h3 ><?php echo $d['conditions'];?></h>
          <p ><?php echo $c->conditions .' '. $t->type?></p>
        </div>
      <div class="icon">
        <i class="ionicons ion-android-phone-landscape"></i>
     </div>
  <a href="<?php echo site_url('/Nimac') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
</div>
</div>
</a>

<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>
