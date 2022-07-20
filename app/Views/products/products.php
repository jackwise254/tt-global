<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<div class="card">
  
  <div class="card-body container">
    <form method="post" action="<?php echo base_url("/ProductsCrud/singleProduct")?>">
    <div id="table" class="table-editable">
      <table class="table table-striped" id="products-list">
        <h3 ><u>
    Products
  </u></h3>
  <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Srial No.</th>
            <th class="text-center">Model Id</th>
            <th class="text-center">Speed</th>
            <th class="text-center">Price</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['id']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['serialno']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['modelid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['speed']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['price']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['status']; ?></td>
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