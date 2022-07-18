<?php include('template/header.php'); ?>
<<<<<<< HEAD

<?php
    $session = session();
    $names = $session->get('user_name');
    include('inc/db_connect.php'); 

?>
    ?>
<div class="container mt-4 p-5">
  <h4 class="text-center" style='font-family:"Airal", Arial, Arial; font-size:100%'><u>Technician panel</u></h4>
  
  
  <h4 style='font-family:"Airal", Arial, Arial; font-size:60%' class="float-end"> Hello <?= $names ?>  </h4>
<form class="">
<a href="<?php echo site_url('home-view') ?>" class="btn btn-light btn-sm bi bi-chevron-left"></a>
    <input class="form-control w-25 d-inline" name="q" type="text" placeholder="Enter Asset ID" aria-label="Search">
    <button class="btn btn-light mb-1 fa fa-search" type="submit">Search </button>
</form>

<!-- <h5 class='pt-3'><u>Sold Items on Warranty</u></h5> -->
<hr>
<div id="table" class="table-editable">
<h5 style='font-family:"Airal", Arial, Arial; font-size:60%'>Total: <?php echo $count_products; ?> </h5>
<table style='font-family:"Airal", Arial, Arial; font-size:60%' class="table table-bordered table-responsive-md table-striped text-center ">
        <thead class="stylehaed">
          <tr>
            <th class="text-center">Asset_Id</th>
            <th class="text-center">Type</th>
            <th class="text-center">Condition</th>
            <th class="text-center">Generation</th>
            <th class="text-center">Ram</th>
            <th class="text-center">Screen</th>
            <th class="text-center">Part</th>
            <th class="text-center">Serial_No.</th>
            <th class="text-center">Model_Id</th>
            <th class="text-center">CPU</th>
            <th class="text-center">Speed</th>
            <th class="text-center">Price</th>
            <th class="text-center">Odd</th>
            <th class="text-center">Comment</th>
            <th class="text-center">HDD</th>
            <th class="text-center">Date_Recieved</th>
            <th class="text-center">Date_Delivered</th>
            <th class="text-center">Customer</th>
            <th class="text-center">List</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):
            $datereceived = substr($user['daterecieved'],0,16);
            $datedelivered = substr($user['datedelivered'],0,16);
            ?>
        <tbody>
          <tr>
            <td class="pt-3-half"><?=  $user['assetid']; ?></td>
            <td class="pt-3-half"><?=  $user['type']; ?></td>
            <td class="pt-3-half"><?=  $user['conditions']; ?></td>
            <td class="pt-3-half"><?=  $user['gen']; ?></td>
            <td class="pt-3-half"><?=  $user['ram']; ?></td>
            <td class="pt-3-half"><?=  $user['screen']; ?></td>
            <td class="pt-3-half"><?=  $user['part']; ?></td>
            <td class="pt-3-half"><?=  $user['serialno']; ?></td>
            <td class="pt-3-half"><?=  $user['modelid']; ?></td>
            <td class="pt-3-half"><?=  $user['cpu']; ?></td>
            <td class="pt-3-half"><?=  $user['speed']; ?></td>
            <td class="pt-3-half"><?=  $user['price']; ?></td>
            <td class="pt-3-half"><?=  $user['odd']; ?></td>
            <td class="pt-3-half"><?=  $user['comment']; ?></td>
            <td class="pt-3-half"><?=  $user['hdd']; ?></td>
            <td class="pt-3-half"><?=  $datereceived; ?></td>
            <td class="pt-3-half"><?=  $datedelivered; ?></td>
            <td class="pt-3-half"><?=  $user['customer']; ?></td>
            <td class="pt-3-half"><?=  $user['list']; ?></td>
            <td class="pt-3-half"><?=  $user['status']; ?></td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</table>
</div>
</div>
<style type="text/css">
.table th:first-child,
.table td:first-child {
  position: sticky;
  left: 0;
  background-color: #ADD8E6;
  color: #373737;
}
.stylehaed{
  background-color: #ADD8E6;
  color: #373737;
  inset-block-start: 0;
  position: sticky; 
}

</style>
=======
<div class="container mt-4">
  <h4><u>Technician panel</u></h4>
<form class="">
    <input class="form-control w-25 d-inline" name="q" type="text" placeholder="Enter Asset ID" aria-label="Search">
    <button class="btn btn-info mb-1" type="submit">Search </button>
</form>

<h5 class='pt-3'><u>Sold Items on Warranty</u></h5>
<hr>
<table class="table" id="inventory-view mt-5">
    <thead>
      <tr>
      <th>ASSET ID</th>
        <th>Condition</th>
        <th>Type</th>
        <th>Generation</th>
        <th>Screen</th>
        <th>Date Recieved</th>
        <th>Customer</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php if($masterlist): ?>
      <?php foreach($masterlist as $user):?>
    <tbody>
      <tr>
      <td class="pt-3-half"><?=  $user['assetid']; ?></td>
        <td class="pt-3-half"><?=  $user['conditions']; ?></td>
        <td class="pt-3-half"><?=  $user['type']; ?></td>
        <td class="pt-3-half"><?=  $user['gen']; ?></td>
        <td class="pt-3-half"><?=  $user['screen']; ?></td>
        <td class="pt-3-half"><?=  $user['daterecieved']; ?></td>
        <td class="pt-3-half"><?=  $user['customer']; ?></td>
        <td class="pt-3-half"><?=  $user['status']; ?></td>
        <td class="pt-3-half" >
          <a href="<?= base_url('ProductsCrud/techview/'. $user['id']) ?>" class="btn btn-light bi bi-eye-fill"></a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
</div>
</table>
</div>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
