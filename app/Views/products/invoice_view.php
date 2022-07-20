<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<div class="card">
  
  <div class="card-body container">
    <form method="post" action="<?php echo base_url("invoice-page")?>">
    <br/><br/>
      <table class="table table-striped p-5" id="invoice-view">
      
        <h3 class="text-center"><u>
    Invoice List
  </u></h3>
  <a href="<?php echo site_url('home-view') ?>" class="btn btn-light btn-sm bi bi-chevron-left"></a>
  <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">VENDOR</th>
            <th class="text-center">DATE</th>
          </tr>
        </thead>
        <?php if($invoicecreate): ?>
          <?php foreach($invoicecreate as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['id']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['vendor']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['date']; ?></td>
            <td>
              <a href="<?php echo base_url('ProductsCrud/invoiceViewid/'.$user['id']);?>" class="btn btn-success btn-sm">View</a>
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
<?php include('template/footer.php');?>