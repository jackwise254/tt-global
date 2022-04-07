<?php include('template/header.php'); ?>
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
