<<<<<<< HEAD
<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); 
// header("refresh: 3");

?>
=======
<?php include('template/header.php');?>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
   <?php
    $session = session();
    $names = $session->get('user_name');
?>
<div class='container mt-5'>
<<<<<<< HEAD

</div>

      <br/>
      <div class="my-3">
      <h5 class="text-center"><strong><u>Stock on Warranty in</u></strong> </h5>
      <a href="<?php echo site_url('home-view') ?>" class="btn btn-success btn-sm bi bi-chevron-left">back</a>

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
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:50%'>
                    <thead class="bg-primary text-light">
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3">Assetid</th>
                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3">Gen</th>
                            <th scope="col" class="col-3">Part</th>
                            <th scope="col" class="col-3">Serial_No.</th>
                            <th scope="col" class="col-3">Model_Id</th>
                            <th scope="col" class="col-5 px-5">Model</th>
                            <th scope="col" class="col-3 px-5">CPU</th>
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
                            </tr>
                        </thead>
                        <?php if($masterlist): ?>
                        <?php foreach($masterlist as $user):
                          $datereceived = substr($user['daterecieved'],0,10);
                          $datedelivered = substr($user['datedelivered'],0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="">  
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="<?php echo site_url('ProductsCrud/deletes'); ?>" class="pr-3 d-none ">[del]</a>
                               <a href="<?php echo site_url('ProductsCrud/updates'); ?>" class="d-none">[edit]</a>
                              <a href="<?= base_url('ProductsCrud/printwibarcod/'.$user['id']) ?>" class="px-2 d-none">[barcode]</a> 
                            </div>
                            </td>
                            <td class="pt-3-half"><?=  $user['list']; ?></td>
                            <td class="col-3"><?=  $user['conditions']; ?></td>
                            <td class="col-3"><?=  $user['assetid']; ?></td>
                            <td class="col-3"><?=  $user['type']; ?></td>
                            <td class="col-3"><?=  $user['brand']; ?></td>
                            <td class="col-3"><?=  $user['gen']; ?></td>
                            <td class="col-3"><?=  $user['part']; ?></td>
                            <td class="col-3"><?=  $user['serialno']; ?></td>
                            <td class="col-3"><?=  $user['modelid']; ?></td>
                            <td class="col-5"><?=  $user['model']; ?></td>
                            <td class="col-3"><?=  $user['cpu']; ?></td>
                            <td class="col-3"><?=  $user['speed']; ?></td>
                            <td class="col-3"><?=  $user['ram']; ?></td>
                            <td class="col-3"><?=  $user['hdd']; ?></td>
                            <td class="col-3"><?=  $user['screen']; ?></td>
                            <td class="col-3"><?=  $user['odd']; ?></td>
                            <td class="col-3"><?=  $user['comment']; ?></td>
                            <td class="col-3"><?=  $user['price']; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td cclass="col-3"><?=  $datedelivered; ?></td>
                            <td class="col-3"><?=  $user['customer']; ?></td>
                            </tr>
                            
                        </tbody>
                        <?php endforeach; ?>
                      <?php endif; ?>
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
<?php include('template/footer.php');?>
=======
<h5 style="margin-top: 5rem; border-radius: 1rem"><strong><u>Stock on Warranty<ul></strong> </h5>
<div class="">
<a href="<?php echo site_url('ProductsCrud/wload'); ?>" class="btn btn-success mb-4 bi bi-file-plus-fill"></a>
<table class="table">
        <thead>
          <tr>
            <th class="text-center">Condition</th>
            <th class="text-center">Type</th>
            <th class="text-center">Generation</th>
            <th class="text-center">Ram</th>
            <th class="text-center">Screen</th>
            <th class="text-center">Part</th>
            <th class="text-center">Comment</th>
            <th class="text-center">Date Recieved</th>
            <th class="text-center">Customer</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['conditions']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['type']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['gen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['ram']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['screen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['part']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['comment']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['daterecieved']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['customer']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['status']; ?></td>
            <td class="pt-3-half">
              
            <a href="<?php echo site_url('ProductsCrud/deletes'); ?>" class="btn-submit mb-4 bi bi-file-x-fill btn btn-danger"></a>
            <a href="<?php echo site_url('ProductsCrud/updates'); ?>" class="btn btn-warning mb-4 bi bi-pencil-square"></a>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
</div>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
