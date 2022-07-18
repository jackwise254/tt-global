<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container-fluid mt-5 py-4'>
<h5 class="text-center"><u>Previous warranty</u></h5>

</div>
<div class="container-fluid">
        <div class=" form-row">
        <a href="<?php echo site_url('warranty') ?>" class="btn btn-success btn-sm bi bi-chevron-left">back</a>
      <a href="<?php echo site_url('spreadsheetpwi') ?>" class="btn btn-info btn-sm bi bi-download">spreadsheet</a>
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed  " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                         <thead class="bg-success text-light">
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3">Assetid</th>
                            <th scope="col" class="col-3">Batch</th>

                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3">Gen</th>
                            <th scope="col" class="col-3">Part</th>
                            <th scope="col" class="col-3">Serial_No.</th>
                            <th scope="col" class="col-3">Model_Id</th>
                            <th scope="col" class="col-5 px-5">Model</th>
                            <th scope="col" class="col-3 px-4">CPU</th>
                            <th scope="col" class="col-3">Speed</th>
                            <th scope="col" class="col-3 px-3">Ram</th>
                            <th scope="col" class="col-3">HDD</th>
                            <th scope="col" class="col-3">Screen</th>
                            <th scope="col" class="col-3">Odd</th>
                            <th scope="col" class="col-3">Comment</th>
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
                        <?php if($user_data == 'admin'): ?>
                        <a href="<?= base_url('ProductsCrud/deleteRCVDw/'. $l['del']) ?>" class="trigger-btn  mx-2" >[del]</a>
                        <?php endif; ?>
                              <a href="<?= base_url('ProductsCrud/multipleRCVDw/'. $l['del']) ?>" class="mx-2">[edit]</a>
                              <a href="<?= base_url('ProductsCrud/printbarcodef/'.$l['del']) ?>" class="mx-2">[barcode]</a> 
                              <a href="<?= base_url('ProductsCrud/printbarcode2wi/'.$l['del']) ?>" class="mx-2">[barcode2]</a> 
                              <a href="<?= base_url('ProductsCrud/printjobwi/'.$l['del']) ?>" class="pr-2">[Job_Card]</a> 
                            </div>
                            </td>
                            <td class="pt-3-half"><?=  $l['list']; ?></td>
                            <td class="col-3"><?=  $l['conditions']; ?></td>
                            <td class="col-3"><?=  $l['assetid']; ?></td>
                            <td class="col-3"><?=  $l['del']; ?></td>
                            <td class="col-3"><?=  $l['type']; ?></td>
                            <td class="col-3"><?=  $l['brand']; ?></td>
                            <td class="col-3"><?=  $l['gen']; ?></td>
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
                            <td class="col-3"><?=  $l['price']; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td cclass="col-3"><?=  $datedelivered; ?></td>
                            <td class="col-3"><?=  $l['customer']; ?></td>
                            <td class="col-3"><?=  $l['vendor']; ?></td>
                            <td class="col-3"><?=  $l['list']; ?></td>
                            </tr>
                        </tbody>
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
                      <a href="<?= base_url('ProductsCrud/deleteRCVDw/'. $l['del']) ?> " class="btn btn-danger deletebtn" >Delete</a>

                      </div>
                      </div>
                      </div>
                      </div>
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






























