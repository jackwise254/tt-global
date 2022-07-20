<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<div class='container pt-5 mt-5'>
<div class="row col-sm-12">

<?php foreach($templist as $l): ?>
<?php foreach($condition as $c): ?>

<?php $conc = $c['conditions'].' '.$l['type'] ?>

<div class="col-md-3 p-2">
        <div class="small-box bg-light p-2">
    <div class="inner">
        <p ><?php echo $conc ?></p>
    </div>
    <div class="icon">
        <i class="ionicons ion-android-desktop"></i>
    </div>
    <a href="<?php echo site_url('/inventory-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Details</a>
    </div>
</div>
                  



<?php endforeach; ?>
<?php endforeach; ?>

</div>

</div>
