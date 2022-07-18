<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); 

?>

<div class="py-2 mt-2">
  
      <br/> <br/>
      <div class="my-3">
      <a href="<?php echo site_url('stockt-view') ?>" class="btn btn-success btn-sm bi bi-chevron-left">back</a>
      <!-- spreadsheet -->
      <a href="<?php echo site_url('spreadsheet') ?>" class="btn btn-info btn-sm bi bi-download">spreadsheet</a>


      <form class="d-flex float-end">
          <input class="form-control me-2" name="q" placeholder="Search" aria-label="Search">
          <button class="btn btn-info" type="submit">Search </button>
      </form>
      </div>

   <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>"; 
    }
?>    
 <div class="container-fluid">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead >
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3 px-5">AssetId</th>

                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3 px-5">Gen</th>
                            <th scope="col" class="col-3">Part</th>
                            <th scope="col" class="col-3">Serial_No.</th>
                            <th scope="col" class="col-3">Model_Id</th>
                            <th scope="col" class="col-5 px-5">Model</th>
                            <th scope="col" class="col-4 px-5">CPU</th>
                            <th scope="col" class="col-3">Speed</th>
                            <th scope="col" class="col-3 px-3">Ram</th>
                            <th scope="col" class="col-3">HDD</th>
                            <th scope="col" class="col-3">Screen</th>
                            <th scope="col" class="col-3">Odd</th>
                            <th scope="col" class="col-3">Comment</th>
                            <th scope="col" class="col-3">Problem</th>

                            <th scope="col" class="col-3">Price</th>
                            <th scope="col" class="col-3">Date_Recieved</th>
                            <th scope="col" class="col-3">Customer</th>
                            </tr>
                        </thead>
                        <?php if($printer): ?>
                        <?php foreach($printer as $user):
                          $datereceived = substr($user->daterecieved,0,10);
                          $datedelivered = substr($user->datedelivered,0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="">  
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="<?php echo base_url('ProductsCrud/singleProduct/'.$user->id);?>" class='px-2'>[Edit]</a>
                              <a href="#myModal" class="trigger-btn" data-toggle="modal" class="pr-2">[del]</a>
                              <a href="<?= base_url('ProductsCrud/printbarcodso/'.$user->assetid) ?>" class="px-2">[barcode]</a> 
                              <a href="<?= base_url('ProductsCrud/printbarcode2so/'.$user->del ) ?>" class="px-2">[barcode2]</a> 





                            </div>
                            </td>
                            <td class="col-5"><?=  $user->list; ?></td>
                            <td class="col-5"><?=  $user->assetid; ?></td>
                            <td class="col-3"><?=  $user->conditions; ?></td>
                            <td class="col-3"><?=  $user->type; ?></td>
                            <td class="col-3"><?=  $user->brand; ?></td>
                            <td class="col-3"><?=  $user->gen; ?></td>
                            <td class="col-3"><?=  $user->part; ?></td>
                            <td class="col-3"><?=  $user->serialno; ?></td>
                            <td class="col-3"><?=  $user->modelid; ?></td>
                            <td class="col-5"><?=  $user->model; ?></td>
                            <td class="col-4 "><?=  $user->cpu; ?></td>
                            <td class="col-3"><?=  $user->speed; ?></td>
                            <td class="col-3"><?=  $user->ram; ?></td>
                            <td class="col-3"><?=  $user->hdd; ?></td>
                            <td class="col-3"><?=  $user->screen; ?></td>
                            <td class="col-3"><?=  $user->odd; ?></td>
                            <td class="col-3"><?=  $user->comment; ?></td>
                            <td class="col-3"><?=  $user->problem; ?></td>

                            <td class="col-3"><?=  $user->price; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td class="col-3"><?=  $user->customer; ?></td>
                            </tr>
                        </tbody>


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
                    <a href="<?php echo base_url('ProductsCrud/delete/'.$user->id);?> " class="btn btn-danger deletebtn" >Delete</a>

                </div>
            </div>
        </div>
    </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script type='text/javascript'></script>
</body>

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

