<<<<<<< HEAD
<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container-fluid mt-5 py-4'>
<h5 class="text-center"><u>Previous Recieved</u></h5>

</div>

<div class="container-fluid">
        <div class=" form-row">
        <a href="<?php echo site_url('stock-view') ?>" class="btn btn-success btn-sm bi bi-chevron-left">back</a>
      <a href="<?php echo site_url('spreadsheetp') ?>" class="btn btn-info btn-sm bi bi-download">spreadsheet</a>

            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed  " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead class="bg-success text-light">
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3">Assetid</th>
                            <th scope="col" class="col-3">Total</th>
                            <?php if($user_data != 'manager'): ?>
                            <th scope="col" class="col-3">Batch</th>
                            <?php endif; ?>
                            <th scope="col" class="col-3">Total</th>
                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3 px-4">Gen</th>
                            <th scope="col" class="col-3">Part</th>
                            <th scope="col" class="col-3">Serial_No.</th>
                            <th scope="col" class="col-3">Model_Id</th>
                            <th scope="col" class="col-3 px-4">Model</th>
                            <th scope="col" class="col-3 px-4">CPU</th>
                            <th scope="col" class="col-3">Speed</th>
                            <th scope="col" class="col-3 px-3">Ram</th>
                            <th scope="col" class="col-3">HDD</th>
                            <th scope="col" class="col-3">Screen</th>
                            <th scope="col" class="col-3">Odd</th>
                            <th scope="col" class="col-3">Comment</th>
                            <th scope="col" class="col-3">Problem</th>
                            <th scope="col" class="col-3">Price</th>
                            <th scope="col" class="col-3">Date_Recieved</th>
                            <th scope="col" class="col-3">Date_Delivered</th>
                            <th scope="col" class="col-3">Customer</th>
                            <th scope="col" class="col-3">Vendor</th>
                            <th scope="col" class="col-3">List</th>

                            </tr>
                        </thead>
                        <?php foreach($all as $l): 
                           $datereceived = substr($l['daterecieved'],0,10);
                           $datedelivered = substr($l['datedelivered'],0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="">  
                              <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <a href="#myModal" class="trigger-btn  mx-2" data-toggle="modal" >[del]</a> -->
                            <?php if($user_data == 'manager'): ?>
                              <a href="<?= base_url('ProductsCrud/printbarcode/'.$l['del']) ?>" class="mx-2">[barcode]</a> 
                              <a href="<?= base_url('ProductsCrud/printbarcode2/'.$l['del']) ?>" class="">[barcode2]</a>
                            <?php else:?>
                             <a href="<?= base_url('ProductsCrud/deleteRCVD/'. $l['del']) ?>" class="mx-2">[del]</a>
                              <a href="<?= base_url('ProductsCrud/multipleRCVD/'. $l['del']) ?>" class="mx-2">[edit]</a>
                              <a href="<?= base_url('ProductsCrud/printbarcode/'.$l['del']) ?>" class="mx-2">[barcode]</a> 
                              <a href="<?= base_url('ProductsCrud/printbarcode2/'.$l['del']) ?>" class="">[barcode2]</a> 
                            <?php endif; ?>

                            </div>
                            </td>
                            <td class="pt-3-half"><?=  $l['list']; ?></td>
                            <td class="col-3"><?=  $l['conditions']; ?></td>
                            <td class="col-3"><?=  $l['assetid']; ?></td>
                            <td class="col-3"><?=  $l['total']; ?></td>
                            <?php if($user_data != 'manager'): ?>
                            <td class="col-3"><?=  $l['del']; ?></td>
                            <?php endif; ?>
                            <td class="col-3"><?=  $l['total']; ?></td>
                            <td class="col-3"><?=  $l['type']; ?></td>
                            <td class="col-3"><?=  $l['brand']; ?></td>
                            <td class="col-3 "><?=  $l['gen']; ?></td>
                            <td class="col-3"><?=  $l['part']; ?></td>
                            <td class="col-3"><?=  $l['serialno']; ?></td>
                            <td class="col-3"><?=  $l['modelid']; ?></td>
                            <td class="col-5"><?=  $l['model']; ?></td>
                            <td class="col-3"><?=  $l['cpu']; ?></td>
                            <td class="col-3"><?=  $l['speed']; ?></td>
                            <td class="col-3"><?=  $l['ram']; ?></td>
                            <td class="col-3"><?=  $l['hdd']; ?></td>
                            <td class="col-3"><?=  $l['screen']; ?></td>
                            <td class="col-3"><?=  $l['odd']; ?></td>
                            <td class="col-3"><?=  $l['comment']; ?></td>
                            <td class="col-3"><?=  $l['problem']; ?></td>
                            <td class="col-3"><?=  $l['price']; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td cclass="col-3"><?=  $datedelivered; ?></td>
                            <td class="col-3"><?=  $l['customer']; ?></td>
                            <td class="col-3"><?=  $l['vendor']; ?></td>
                            <td class="col-3"><?=  $l['list']; ?></td>

                            </tr>

<!-- Modal HTML -->


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
                      <a href="<?= base_url('ProductsCrud/deleteRCVD/'. $l['del']) ?> " class="btn btn-danger deletebtn" >Delete</a>

                      </div>
                      </div>
                      </div>
                      </div>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
 <style type="text/css">
.table th:first-child,
.table td:first-child {
  position: sticky;
  left: 0;
  background-color: #f2f2f2;
  color: #f2f2f2;
}
.stylehaed{
  background-color: #f2f2f2;
  color: #f2f2f2;
  inset-block-start: 0;
  position: sticky; 
}
</style>






























=======
<?php include('template/header.php');?>

<div class='container mt-5 py-5'>
<h5><u>Previous RCVD</u></h5>
<table class="table" id="inventory-view mt-5">
        <thead>
          <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Type</th>
            <th class="text-center">Condition</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Unique ID</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        
            <?php foreach($all as $l): ?>
                <tr>
                    <td class="text-center"><?= $l['daterecieved'] ?></td>
                    <td class="text-center"><?= $l['type'] ?></td> 
                    <td class="text-center"><?= $l['conditions'] ?></td> 
                    <td class="text-center"><?= $l['qty'] ?></td> 
                    <td class="text-center"><?= $l['del'] ?></td>            
                    <td><button class='btn btn-danger'>
                    <a href="<?= base_url('ProductsCrud/deleteRCVD/'. $l['del']) ?>" class="btn btn-danger btn-sm">Delete</a> 
                    </button></td>            

                </tr>
            <?php endforeach ?>
                
         </tbody> 
      </table>
</div>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
