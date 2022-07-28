<?php if($user_data == 'admin'): 

 include('template/header.php');
 
else:
     include('template/head.php');

endif;

 ?>

<?php include('inc/db_connect.php'); ?>


<?php echo $random = rand(1000000, 9999999); ?>

<div class="row container col-12">
      <form name="test" class=" mt-4 pt-5" action="<?php echo  base_url('ProductsCrud/sverify'); ?>" method="POST">
      <div class="col-10">
         <input type="text" class="col-2 me-2 rounded-pill" id="serialno" name="serialno" placeholder="serial no." autofocus>
         <select class="col-2 p-1 rounded-pill" id="sort-item" name='table' type="text" placeholder="serial no." required>
            <option selected value='All'>All</option>
            <option  value='Stockin'>Stock in</option>
            <option value='stockout'>Stock out</option>
            <option value='faulty'>Faulty in</option>
            <option value='faultyout'>Faulty Out</option>
            <option value='warranty'>Warranty in</option>
            <option value='warrantyout'>Warranty Out</option>
            <option value='credit'>Credit</option>
            <optionm value='debit'>Debit</option>
          </select>
       </div>
            <button type ="submit" class="d-none" id="myBtn" onchange="this.form.submit()">Submit</button>
            <input class="form-control my-3 d-none" value="<?= $random; ?>" name="random">
       <div class="d-flex justify-content-end">
       </div>
        </form>
        <form>
          <div class=" float-end">
              <?php if(!$count_verify): ?>
                  <!-- filter design -->
              <div class="container">
                  <div class="row searchFilter" >
                    <div class="col-sm-12" >
                      <div class="input-group" >
                      <div class="input-group-btn" >
                      <select class="col-2 p-1 rounded-pill" id="sort-item" name='search' type="text"  >
                          <?php foreach($type as $t): ?>
                          <option></option>
                          <option value='<?php echo $t->type; ?>'><?php echo $t->type; ?></option>
                          <?php endforeach; ?>
                      </select>
                      <input type="text" class="col-2  rounded-pill" id="model" name="model" placeholder="model." autofocus>
                      <input type="text" class="col-2  rounded-pill" id="serialno" name="find" placeholder="search." autofocus>
                        <select class="col-2 p-1 rounded-pill" id="sort-item" name='table' type="text" placeholder="serial no." required>
                          <option  value='All'>All</option>
                          <option selected value='Stockin'>Stock in</option>
                          <option value='stockout'>Stock out</option>
                          <option value='faulty'>Faulty in</option>
                          <option value='faultyout'>Faulty Out</option>
                          <option value='warranty'>Warranty in</option>
                          <option value='warrantyout'>Warranty Out</option>
                          <option value='credit'>Credit</option>
                          <optionm value='debit'>Debit</option>
                        </select>
                          <button type ="submit" class="btn btn-sm btn-outline-success rounded-pill bi bi-search px-3" id="myBtn" ></button>
                          <?php elseif($count_verify && $user_data == 'admin' ): ?>
                            <input type="text" class="col-3 me-2 rounded-pill" id="serialno" name="replace" placeholder="Replace." autofocus>
                            <select class="col-3 me-2 rounded-pill" id="sort-item" name='column' type="text" placeholder="." required>
                              <option value='Conditions'>Conditions</option>
                              <option value='Model'>Model</option>
                              <option value='gen'>Generation</option>
                              <option value='Brand'>Brand</option>
                              <option value='Hdd'>Hdd</option>
                              <option value='Speed'>speed</option>
                              <option value='Price'>Price</option>
                              <option value='Ram'>Ram</option>
                              <option value='Odd'>Odd</option>
                              <optionm value='Problem'>Problem</option>
                            </select>
                            <button type ="submit" class="btn btn-sm btn-outline-primary rounded-pill" id="myBtn" >Replace</button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-outline-secondary rounded-pill btn-sm position-relative">
                            items
                            <?php if($count_verify): ?>
                            <span class="position-absolute d-flex justify-content-end top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $count_verify; ?>
                                <span class="visually-hidden">Items</span>
                            </span>
                                  <?php endif; ?>
                            </button>
                         <a href="<?php echo site_url('clear') ?>" class=" btn btn-outline-danger bi bi-trash-fill rounded-pill  btn-sm mt-1">Clear</a>

                      </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- end -->
               
                <!-- <select class="col-3 me-2 rounded-pill" id="sort-item" name='table' type="text" placeholder="" required>
                  <option value='stockin'>Stock in</option>
                  <option value='stockout'>Stock out</option>
                  <option value='faulty'>Faulty in</option>
                  <option value='faultyout'>Faulty Out</option>
                  <option value='warranty'>Warranty in</option>
                  <option value='warrantyout'>Warranty Out</option>
                  <option value='credit'>Credit</option>
                  <optionm value='debit'>Debit</option>
               </select> -->
               
         </form>
       
    </div>
    
</div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script>
  $('#serialno').keyup(function(){
      if(this.value.length >= 6){
      $('#myBtn').click();
      }
  });
  $('#exampleFormControlSelect1').keyup(function(){
      if(this.value.length >= 3){
      $('#myBtn1').click();
      }
  });

  window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
    $('#sort-item').val(selItem);
    }
    $('#sort-item').change(function() { 
        var selVal = $(this).val();
        sessionStorage.setItem("SelItem", selVal);
    });

</script>  

<?php
    if(session()->getFlashdata('status')) {
        echo "<h6 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='10' height='10' role='alert' style='font-family:'Airal', Arial, Arial; font-size:40%'>" . session()->getFlashdata('status') . "</h6>"; 
    }
?>
<form method="post" id="invoice_create" name="invoice_create" action="<?php echo base_url('ProductsCrud/verified'); ?>">
<div class="container-fluid">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped tableditable" style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead >
                            <tr>
                              <?php if($user_data == 'admin'): ?>
                                
                            <th  scope="col" class="col-3"></th>
                            <?php endif ?>
                            <th scope="col" class="col-3">Table</th>
                            <th scope="col" class="col-3">Status</th>

                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3 px-5">Assetid</th>
                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3 px-5">Gen</th>
                            <th scope="col" class="col-3">Part</th>
                            <th scope="col" class="col-3">Serial_No.</th>
                            <th scope="col" class="col-3">Model_Id</th>
                            <th scope="col" class="col-5 px-5">Model</th>
                            <th scope="col" class="col-4 px-5">CPU</th>
                            <th scope="col" class="col-3">Speed</th>
                            <th scope="col" class="col-3 px-5">Ram</th>
                            <th scope="col" class="col-3">HDD</th>
                            <th scope="col" class="col-3 px-5">Screen</th>
                            <th scope="col" class="col-3">Odd</th>
                            <th scope="col" class="col-3">Comment</th>
                            <th scope="col" class="col-3">problem</th>
                            <th scope="col" class="col-3">Price</th>
                            <th scope="col" class="col-3">Date_Recieved</th>
                            <th scope="col" class="col-3">Date_Delivered</th>
                            <th scope="col" class="col-3">Customer</th>
                            <th scope="col" class="col-3">Vendor</th>



                            </tr>
                        </thead>
                        <?php if($items): ?>
                        <?php foreach($items as $user):
                            
                          $datereceived = substr($user['daterecieved'],0,10);
                          $datedelivered = substr($user['datedelivered'],0,10);
                          ?>
                        <tbody>
                            <tr id='someElementID'>
                              <?php if($user_data == 'admin'): ?>

                            <td class="">  
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="<?php echo base_url('ProductsCrud/sdelete/'.$user['id']);?> "  class="pr-3">[del]</a>
                              <a href="<?= base_url('ProductsCrud/printbarcods/'.$user['assetid']) ?>" class="px-2">[barcode]</a> 
                              <a href="<?= base_url('ProductsCrud/printbarcode2s/'.$user['assetid'] ) ?>" class="px-2">[barcode2]</a> 
                              <a href="<?php echo base_url('ProductsCrud/faultyvp/'.$user['assetid']);?> " class="px-2" >[faulty]</a>
                              <a href="<?php echo base_url('ProductsCrud/masterlistp/'.$user['assetid']);?> " class="px-2" >[masterlist]</a>
                              
                            </div>

                            </td>
                            <?php endif ?>
                            <td class="col-3"><?=  $user['tbl']; ?></td>
                            <td class="col-3" ><?=  $user['status']; ?></td>
                            <td class="pt-3-half"><?=  $user['list']; ?></td>
                            <td class="col-3" ><?=  $user['conditions']; ?></td>
                            <td class="col-3 " ><?=  $user['assetid']; ?></td>
                            <td class="col-3" ><?=  $user['type']; ?></td>
                            <td class="col-3" \><?=  $user['brand']; ?></td>
                            <td class="col-3" ><?=  $user['gen']; ?></td>
                            <td class="col-3" ><?=  $user['part']; ?></td>
                            <td class="col-3"><?=  $user['serialno']; ?></td>
                            <td class="col-3"><?=  $user['modelid']; ?></td>
                            <td class="col-5" ><?=  $user['model']; ?></td>
                            <td class="col-4 " ><?=  $user['cpu']; ?></td>
                            <td class="col-3" ><?=  $user['speed']; ?></td>
                            <td class="col-3" ><?=  $user['ram']; ?></td>
                            <td class="col-3" ><?=  $user['hdd']; ?></td>
                            <td class="col-3" ><?=  $user['screen']; ?></td>
                            <td class="col-3" ><?=  $user['odd']; ?></td>
                            <td class="col-3" ><?=  $user['comment']; ?></td>
                            <td class="col-3" ><?=  $user['problem']; ?></td>
                            <td class="col-3"><?=  $user['price']; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td cclass="col-3"><?=  $datedelivered; ?></td>

                            <td class="col-3" ><?=  $user['customer']; ?></td>
                            <td class="col-3" ><?=  $user['vendor']; ?></td>


                            </tr>
                        </tbody>
                        </div>
                    </div>
                        <?php endforeach; ?>
                        

                      <?php endif; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script type='text/javascript'>
      var ignoreClickOnMeElement = document.getElementById('someElementID');
        document.addEventListener('click', function(event) {
            var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
            if (!isClickInsideElement) {
                //Do something click is outside specified element
                console.log('hello, you clicked outsid');
            }
        });

        window.onload = function() {
    var someElementID = sessionStorage.getItem("someElementID");  
    $('#sort-item').val(someElementID);
    }
    $('#sort-item').change(function() { 
        var selVal = $(this).val();
        sessionStorage.setItem("someElementID", selVal);
    });

    </script>
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

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="search-filter.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</style>
  
   </div>
  </div>

        <?php foreach($items as $user): ?>
          <input class="form-control my-3 d-none" id="barcodeValue" value="<?= $user['random']; ?>" name="random">
          <input class="form-control my-3 d-none" id="barcodeValue2" value="<?= $user['random']; ?>" name="assetid">
          <?php endforeach; ?>

    
    </div>
<?php if($items): ?>
  <a href="<?php echo base_url('ProductsCrud/masterlistall'); ?>" class="btn btn-outline-success   btn-sm mt-1">Masterlist</a>
  <a href="<?php echo base_url('ProductsCrud/faultyall'); ?>" class="btn btn-outline-warning  btn-sm mt-1">Faulty</a>
  <button type="button" class="btn btn-outline-primary px-2  btn-sm" data-toggle="modal" data-target="#myModal">Summary</button>
  <a href="<?php echo site_url('spreadsheetv') ?>" class="btn btn-outline-info btn-sm  mt-1">spreadsheet</a>
  <a href="<?= base_url('ProductsCrud/printbarcodver/') ?>" class="btn   btn-outline-secondary btn-sm mt-1">barcode</a> 
  <a href="<?= base_url('ProductsCrud/printbarcode2ver/' ) ?>" class="btn    btn-outline-success btn-sm mt-1">barcode2</a> 
  <a href="<?= site_url('/verify-create' ) ?>" class="btn  btn-outline-secondary  btn-sm mt-1">Previous Summary</a>
  <a href="<?php echo site_url('clear') ?>" class=" btn btn-outline-danger bi bi-trash-fill  btn-sm mt-1">Clear</a>
<?php endif; ?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <label> Memo</label>

             <input type="text" name="memo" placeholder="Memo" autofocus required >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary px-2 btn-sm">Summary</button>

      </div>
    </div>
</form>
  </div>
</div>



    
 <script type="text/javascript">

/// Onclick scrpt

   var input = document.getElementById("serialno");
          function selectText() {
          const input = document.getElementById('serialno');
          input.focus();
          input.select();
        }
        input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("myBtn").click();
        }
        });
    
    </script>
  
    




 



