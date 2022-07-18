<<<<<<< HEAD
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
      <a href="<?php echo site_url('stock-view') ?>" class="btn btn-outline-success btn-sm bi bi-chevron-left">back</a>
      <!-- spreadsheet -->
      <a href="<?php echo base_url('Settings/spreadsheet') ?>" class="btn btn-outline-info btn-sm bi bi-download">spreadsheet</a>
      <?php if($true == 1): ?>
        <form class="d-flex float-end">
          <input class="form-control me-2 d-none rounded-pill" name="true" placeholder="Search" aria-label="Search" value="true">
          <button class="btn btn-info me-2 rounded-pill px-2" type="submit" >Download </button>
      </form>
     <?php endif; ?>

      <a href="<?php echo base_url('Login/undo/');?>" class="btn btn-outline-warning d-none btn-sm bi bi-arrow-counterclockwise">undo</a>
      <button type="button" class="btn btn-outline-secondary rounded-pill btn-sm position-relative">
          Items
           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
               <?php echo $num; ?>
               <span class="visually-hidden">Items</span>
           </span>
      </button>

    <!-- duplicates -->
    <form class="d-flex float-end">
      <input class="d-none " name="duplicate" value="duplicate">
      <button type="submit" class="btn btn-outline-warning rounded-pill btn-sm position-relative px-2" >
            duplicate
           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
               <?php echo $count; ?>
               <span class="visually-hidden">duplicate</span>
           </span>
      </button>
      <!-- end -->
      </form>
      
      <form class="d-flex float-end">
          <input class="form-control me-2 rounded-pill" name="model" placeholder="Search model" aria-label="Search">
          <input class="form-control me-2 rounded-pill" name="q" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info rounded-pill me-2 btn-sm" type="submit">Search </button>
          <button type="button" class="btn btn-primary d-none rounded-pill px-2 btn-sm" data-toggle="modal" data-target="#myModal">Advanced</button>
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
                    <table class="table table-striped  " id="header-fixed" style='font-family:"Airal", Arial, Arial; font-size:60%'>
                    <thead class="bg-primary text-light sticky-top">
                            <tr style= "position: sticky">
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
                            <th scope="col" class="col-3">Price</th>
                            <th scope="col" class="col-3">Date_Recieved</th>
                            <th scope="col" class="col-3">Date_Delivered</th>
                            <th scope="col" class="col-3">Customer</th>
                            <th scope="col" class="col-3">Vendor</th>
                            <th scope="col" class="col-3">Status</th>
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
                            <?php if($user_data == 'admin'): ?>
                              <a href="<?php echo base_url('ProductsCrud/singleProduct/'.$user['id']);?>" class='px-2'>[Edit]</a>
                              <a href="<?php echo base_url('ProductsCrud/delete/'.$user['assetid']);?>" class="pr-2">[del]</a>
                            <?php endif; ?>
                              <a href="<?= base_url('ProductsCrud/printbarcod/'.$user['assetid']) ?>" class="px-2">[barcode]</a>
                              <a href="<?= base_url('ProductsCrud/printbarcode2/'.$user['del'] ) ?>" class="px-2">[barcode2]</a> 
                              <a href="<?php echo base_url('ProductsCrud/faultyp/'.$user['assetid']);?> " class="" >[faulty]</a>
                            </div>
                            </td>
                            <td class="col-5"><?=  $user['list']; ?></td>
                            <td class="col-5"><?=  $user['assetid']; ?></td>
                            <td class="col-3"><?=  $user['conditions']; ?></td>
                            <td class="col-3"><?=  $user['type']; ?></td>
                            <td class="col-3"><?=  $user['brand']; ?></td>
                            <td class="col-3"><?=  $user['gen']; ?></td>
                            <td class="col-3"><?=  $user['part']; ?></td>
                            <td class="col-3"><?=  $user['serialno']; ?></td>
                            <td class="col-3"><?=  $user['modelid']; ?></td>
                            <td class="col-5"><?=  $user['model']; ?></td>
                            <td class="col-4 "><?=  $user['cpu']; ?></td>
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
                            <td class="col-3"><?=  $user['vendor']; ?></td>
                            <td class="col-3"><?=  $user['status']; ?></td>
                            </tr>
                        </tbody>

                        <?php endforeach; ?>

                       
                      <?php endif; ?>
                    </table>
                </div>
                
            </div>
        </div>
=======
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
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
    </div>

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <form class="form-group " method="post" id="add_create" name="add_create" action="<?= base_url('Settings/search/') ?>">
        <div class="row col-sm-12">  
            <div class="col-sm-3">
                  <input type="text" name="gen" class="rounded-pill md-3 w-100 " placeholder="gen" autofocus >
            </div>
            <div class="col-sm-3">
                  <input type="text" name="type" class="md-3 rounded-pill w-100" placeholder="type" autofocus  >
            </div>
            <div class="col-sm-3">
                  <input type="text" name="conditions" class="rounded-pill md-3 w-100 " placeholder="Conditions" autofocus  >
            </div>
            <div class="col-sm-3">
                  <input type="text" name="model" class="md-3 rounded-pill w-100" placeholder="model" autofocus  >
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary px-2 btn-sm rounded-pill bi bi-search">Search</button>
  </form>

      </div>
    </div>

  </div>
<<<<<<< HEAD

<script type='text/javascript'>
    var tableOffset = $("#table").offset().top;
    var $header = $("#table > thead").clone();
    var $fixedHeader = $("#header-fixed").append($header);
    $(window).bind("scroll", function() {
    var offset = $(this).scrollTop();
    if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
      $fixedHeader.show();
     }
    else if (offset < tableOffset) {
       $fixedHeader.hide();
      }
      });
</script>
</body>

 <style type="text/css">
=======
</div>
</table>
</div>
</div>
<style type="text/css">
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
.table th:first-child,
.table td:first-child {
  position: sticky;
  left: 0;
<<<<<<< HEAD
  background-color: #f2f2f2;
  color: #f2f2f2;
}


.table th:first-child{
  position: sticky;
  top: 0;
  background-color: #f2f2f2;
  color: #f2f2f2;
}

.stylehaed{
  background-color: #f2f2f2;
  color: #f2f2f2;
  inset-block-start: 0;
  position: sticky; 
}

#header-fihxed {
    position: fixed;
    top: 20px; display:none;
    background-color:white;
=======
  background-color: #ADD8E6;
  color: #373737;
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
}
.stylehead{
  background-color: #ADD8E6;
  color: #373737;
}
.stylerow:nth-child(even){
  background-color: #f2f2f2;
}

<<<<<<< HEAD
</style>



=======
</style>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
