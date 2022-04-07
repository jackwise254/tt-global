<?php include('template/header.php');?>
<div class="py-2 mt-5">
<div class="container-fluid">
<table style='font-family:"Airal", Arial, Arial; font-size:60%' class="table table-bordered table-responsive-md table-striped text-center ">
        <thead class='stylehead'>
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
            $datereceived = substr($user['daterecieved'],0,10);
            $datedelivered = substr($user['datedelivered'],0,10);
            ?>
        <tbody>
          <tr class="stylerow">
            <td class="pt-3-half "><?=  $user['assetid']; ?></td>
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
.stylehead{
  background-color: #ADD8E6;
  color: #373737;
}
.stylerow:nth-child(even){
  background-color: #f2f2f2;
}

</style>