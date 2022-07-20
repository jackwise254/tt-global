<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<div class='container mt-5  px-1'>


<!-- <br/><br/><br/><br/> -->
<h4 class="text-center  pt-5 mt-4"><strong><u>INVOICE PANEL</u></strong> </h4>
 

<!-- <hr> -->

<!-- *******************************************************************************  -->
<?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='10' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";

    }
?>  
   
<div class="">
<?php if($user_data == 'admin'): ?>
<a href="<?php echo site_url('home-view') ?>" class="btn btn-outline-warning btn-sm bi bi-chevron-left">Home</a>
<!-- <a href="<?php echo base_url('ProductsCrud/collecting') ?>" class="btn btn-warning btn-sm bi bi-chevron-left">Home1</a> -->


  <?php endif; ?><a href="<?php echo site_url('ProductsCrud/storeie'); ?>" class="btn btn-outline-success btn-sm ">Create invoice</a>

      <form class="d-flex float-end">
          <input class="form-control me-2" name="q" placeholder="Search" aria-label="Search">
          <button class="btn btn-light" type="submit">Search </button>
      </form>
  </div>
  <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>
  <thead>
    <tr>
      <th>Customer</th>
      <th>Served by</th>
      <th>Invoice No</th>
      <th>Sale order</th>
      <th >Date</th>
      <th>Document</th>
      <th></th>
    </tr>
  </thead>
    <?php foreach($invoicecreate as $user):
      $datereceived = substr($user->date,0,10);
        ?>
  <tbody>
    <tr>
    <td class="pt-4-half" ><?=  $user->username; ?></td>
      <td class="pt-4-half" ><?=  $user->user_name; ?></td>
      <td class="pt-4-half" ><?=  $user->invno; ?></td>
      <td class="pt-4-half" ><?=  $user->invoice; ?></td>
      <td class="pt-3-half " ><?=  $datereceived; ?></td>
      <td class="pt-3-half" ><?=  $user->document; ?></td>
      <td class="pt-3-half">
      <a href="<?= base_url('Settings/fetchinvoicespre/'. $user->ref) ?>" class=" btn btn-outline-success bi bi-file-earmark-spreadsheet btn-sm px-2"></a>
        <a href="<?= base_url('ProductsCrud/fetchinvoices/'. $user->document) ?>" class="btn btn-outline-light btn-sm bi bi-eye"></a>
        <a href="<?= base_url('ProductsCrud/editinvoice/'. $user->random) ?>" class="btn btn-outline-warning btn-sm bi bi-pencil-square"></a>
<?php if($user_data == 'admin'): ?>
        
    <a href="<?= base_url('ProductsCrud/deleteInvoice/'. $user->id) ?>" class="trigger-btn btn btn-outline-danger bi bi-trash-fill btn-sm"  ></a>
    <?php endif; ?>
 
      </td>
    </tr>
                    
<?php endforeach; ?>
</tbody>
</table>


<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
  <div class="modal-content">
  <div class="modal-header flex-column">
  <div class="icon-box">
  <i class="material-icons">&#xE5CD;</i>
  </div>
  <h4 class="modal-title w-100">Are you sure?</h4>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  </div>
  <div class="modal-body">
  <p>Do you really want to delete these records? This process cannot be undone.</p>
  </div>
  <div class="modal-footer justify-content-center">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
  <a href=" " class="btn btn-danger deletebtn" >Delete</a>

  </div>
  </div>
  </div>
  </div>
</div>


  
