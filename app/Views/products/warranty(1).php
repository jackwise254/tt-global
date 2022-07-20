<?php include('template/header.php');?>
<br/><br/>
  <div class="container mt-2 py-5">
  	<h4><u>Goods on warrant Out</u></h4>
  	<table class="table table-striped" id="warranty">
       <thead>
          <tr>
             <th  scope="col">Id </th>
             <th  scope="col">Type</th>
             <th  scope="col">Asset Id</th>
             <th  scope="col">Generation</th>
             <th  scope="col">Ram</th>
             <th  scope="col">Screen</th>
          </tr>
       </thead>
       <tbody>
          <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
          <tr>
             <td scope="row"><?=  $user['id']; ?></td>
             <td scope="row"><?php echo $user['type']; ?></td>
             <td scope="row"><?php echo $user['assetid']; ?></td>
             <td scope="row"><?php echo $user['gen']; ?></td>
             <td scope="row"><?php echo $user['ram']; ?></td>
             <td scope="row"><?php echo $user['screen']; ?></td>
             <td scope="row">
               <a href="<?php echo base_url('ProductsCrud/barcode/'.$user['id']);?>" class="btn btn-primary sm">barcode</a>
             </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>

       </tbody>
	</table>
     <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/products-form') ?>" class="btn btn-success bi-plus mb-4">Add Item</a>
            </tr>
  </div>
</div> 
<?php include('template/footer.php');?>