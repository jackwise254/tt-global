<?php include('template/header.php');?>
<div class="py-2 mt-2">
  <div class="container">
    <form method="post" action="<?php echo base_url("/ProductsCrud/inventory")?>">
    <div id="table" class="table-editable">
      <br/> <br/><br/>
       <h3 class="mt-5 text-center fixed-top pt-4" style="margin-top: 20rem" ><u>
    Inventory List
  </u></h3>
 <table class="table table-striped" id="inventory-view mt-5">
<table class="table table-bordered table-responsive-md table-striped text-center ">
        <thead>
          <tr>
            <th class="text-center">Condition</th>
            <th class="text-center">Type</th>
            <th class="text-center">Asset Id</th>
            <th class="text-center">Generation</th>
            <th class="text-center">Ram</th>
            <th class="text-center">Screen</th>
            <th class="text-center">Part</th>
            <th class="text-center">Serial No.</th>
            <th class="text-center">Model Id</th>
            <th class="text-center">CPU</th>
            <th class="text-center">Speed</th>
            <th class="text-center">Price</th>
            <th class="text-center">Odd</th>
            <th class="text-center">Comment</th>
            <th class="text-center">HDD</th>
            <th class="text-center">Date Recieved</th>
            <th class="text-center"> Date Delivered</th>
            <th class="text-center">Customer</th>
            <th class="text-center">List</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['conditions']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['type']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['assetid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['gen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['ram']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['screen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['part']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['serialno']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['modelid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['cpu']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['speed']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['price']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['odd']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['comment']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['hdd']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['daterecieved']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['datedelivered']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['customer']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['list']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['status']; ?></td>
            <td class="pt-3-half" >
              <a href="ProductsCrud/moreList/<?php echo $user['id'];?>" class="btn btn-secondary btn-sm">more</a>
              <a href="ProductsCrud/barcode/<?php echo $user['id'];?>" class="btn btn-secondary  mb-4"> Barcode</a>
            </td>
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
</form>
</div>
</div>
<style type="text/css">
.table th:first-child,
.table td:first-child {
  position: sticky;
  left: 0;
  background-color: #ad6c80;
  color: #373737;
}

</style>
<?php include('template/footer.php');?>