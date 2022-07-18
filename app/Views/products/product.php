<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<div class="container-xxl">
<?= $this->renderSection('content') ?>
<div class="container mt-7">
      
  </div>
    
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-striped " id="product-list">
       <thead>
          <tr>
             <th class="table-dark">Id</th>
             <th class="table-dark">Serial No</th>
             <th class="table-dark">Model Id</th>
             <th class="table-dark">CPU</th>
             <th class="table-dark">HDD</th>
             <th class="table-dark">Speed</th>
             <th class="table-dark">Price</th>
             <th class="table-dark">List</th>
             <th class="table-dark">Customer</th>
             <th class="table-dark">Recieved</th>
             <th class="table-dark">Delivered</th>
             <th class="table-dark">Comment</th>
             <th class="table-dark">Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($masterlist): ?>
          <?php foreach($masterlist as $user): ?>
          <tr>
             <td class="table-primary"><?=  $user['id']; ?></td>
             <td class="table-danger"><?php echo $user['serialno']; ?></td>
             <td class="table-secondary"><?php echo $user['modelid']; ?></td>
             <td class="table-warning"><?php echo $user['cpu']; ?></td>
             <td class="table-secondary"><?php echo $user['hdd']; ?></td>
             <td class="table-light"><?php echo $user['speed']; ?></td>
             <td class="table-secondary"><?php echo $user['price']; ?></td>
             <td class="table-info"><?php echo $user['list']; ?></td>
             <td class="table-light"><?php echo $user['customer']; ?></td>
             <td class="table-warning"><?php echo $user['daterecieved']; ?></td>
             <td class="table-danger"><?php echo $user['datedelivered']; ?></td>
             <td class="table-danger"><?php echo $user['comment']; ?></td>
             <td class="table-warning">
              <!-- <a href="<?php echo base_url('edit-products/'.$user['id']);?>" class="btn btn-primary">Update</a>
              <a href="<?php echo base_url('delete-products/'.$user['id']);?>" class="btn btn-danger">Delete</a> -->
              <a href="<?php echo site_url('/products-list') ?>" class="btn btn-info">Less</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>

       </tbody>

     </table>
     <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/products-form') ?>" class="btn btn-success bi-plus mb-4">Add Item</a>
     </div>
     </div>   
  </div>
  </div>

</div>
