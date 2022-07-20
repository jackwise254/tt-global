<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); ?>

<?php echo $random = rand(10000, 99999); ?>

    <div class="container mt-5">
        <h4 class="text-center"><u>Invoice Page</u></h4>
    <form name="test" class="mt-3" action="<?php echo  base_url('ProductsCrud/invosub'); ?>" method="POST">
        <div class="row">
                <div class="px-1 col-sm-2">
                   <a href="<?php echo base_url('ProductsCrud/invoicePage') ?>" class="btn btn-success btn-sm ">Back</a>
                </div>
                <div class="col-sm-3 px-1">
                    <select class="form-select form-control" style="font-family: arial, arial, arial; font-size: 13px " name="username" >
                    <option selected>Customer</option>
                        <?php foreach($customers as $user): ?>
                        <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            
                <div class="col-sm-3 px-1">
                    <input type="text" class=" form-control" name="invoice" style="font-family: arial, arial, arial; font-size: 13px " placeholder="Sale order" required>
                </div>

                <div class="col-sm-2 px-1">
                        <button type ="submit" class="btn btn-success" style="font-family: arial, arial, arial; font-size: 13px ">Submit</button>
                </div>
        </div>
        <!-- <a href="<?php echo  base_url('ProductsCrud/faultyclear'); ?>" class=" btn btn-danger bi bi-trash-fill float-end btn-sm">Clear</a> -->
    </div>
    </form>
    </div>
      


<script src="https://code.jquery.com/jquery-2.2.4.js"></script>

<script>
  $('#serialno').keyup(function(){
      if(this.value.length >= 6){
      $('#myBtn').click();
      }
  });
</script> 
<?php
    if(session()->getFlashdata('status', 10)) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>"; 
    }
?>  

<hr/>

<div class="row "> 
 <div class="col-3 ">
 <div class="container"> 
         <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded ">
            <h4 class="text-center" style="font-family: arial, arial, arial; font-size: 14px ">Customer details </h4>

                        <?php foreach($customer as $user): ?>
                    <div class="row px-3">
                    
                        <div class="col">
                        <label  class="col-sm-6 col-form-label" style="font-family: arial, arial, arial; font-size: 13px ">cuctomer:</label>
                        <input type="text" class="form-control" name="username" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->username; ?> "readonly>
                        </div>
                      
                        <div class="col">
                        <label  class="col-sm-6 col-form-label" style="font-family: arial, arial, arial; font-size: 13px ">F.name:</label>
                        <input type="text" class="form-control" name="fname" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->fname; ?> "readonly>
                        </div>
                        

                    </div>
                    <div class="row px-3">
                        <div class="col">
                        <label for="inputPassword3" class="col-sm-2 col-form-label" style="font-family: arial, arial, arial; font-size: 13px ">Phone</label>
                        <input type="text" class="form-control" name="phone" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->phone; ?>" readonly>
                        </div>
                        
                        <div class="col">
                        <label for="inputPassword3" class="col-sm-6 col-form-label" style="font-family: arial, arial, arial; font-size: 13px ">L.name:</label>
                        <input type="text" class="form-control" name="lname" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->lname; ?>" readonly>
                        </div>

                    </div>
                    <div class="row px-3 ">
                        <div class="col">
                        <label  class="col-sm-2 col-form-label " style="font-family: arial, arial, arial; font-size: 13px ">Email</label>
                        <input type="text" class="form-control " style="font-family: arial, arial, arial; font-size: 13px " name="email" placeholder="<?=  $user->email; ?>" readonly>
                        </div>
                        <div class="col">
                        <label for="inputPassword3" class="col-sm-2 col-form-label" style="font-family: arial, arial, arial; font-size: 13px " >Location</label>
                        <input type="text" class="form-control " name="location" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->location; ?> " readonly>
                      </div>
                        
                        </div>

                        <div class="row px-3 ">
                        <div class="col">
                        <label  class="col-sm-2 col-form-label " style="font-family: arial, arial, arial; font-size: 13px ">Sale:</label>
                        <input type="text" class="form-control mb-2 " style="font-family: arial, arial, arial; font-size: 13px " name="invoice" placeholder="<?=  $user->invoice; ?>" readonly>
                        </div>
                        <div class="col">
                        <label for="inputPassword3" class="col-sm-2 col-form-label" style="font-family: arial, arial, arial; font-size: 13px " >Id_no</label>
                        <input type="text" class="form-control mb-2" name="id_no" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->id_no; ?> " readonly>
                      </div>
                        
                        </div>
                    <?php endforeach; ?>
            <!-- </div> -->
        </div>  
    </div>
</div>
</div> 
<div class="col-9 ">
<div class="container ">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded">
            <input class="form-control my-3 d-none" id="barcodeValue2" value="<?= $random; ?>" name="assetid">
                <h4 class="text-center" style="font-family: arial, arial, arial; font-size: 14px ">Products details </h4>
                <form method="post" id="invoice_create" name="invoice_create" action="<?php echo base_url('ProductsCrud/invstore'); ?>">
                <div class="row">
                <div class="col-2">
                    <label style="font-family: arial, arial, arial; font-size: 13px ">Type</label>
                       <select class="form-select form-control" style="font-family: arial, arial, arial; font-size: 13px " name="type" >
                           <option selected></option>
                               <?php foreach($type as $user): ?>
                            <option value="<?php echo $user->type; ?>"><?php echo $user->type; ?></option>
                              <?php endforeach; ?>
                     </select>
                  </div>
                  <div class="col-6">
                  <label class="form-label" style="font-family: arial, arial, arial; font-size: 13px " >Description</label>
                    <input type="text" class="form-control" style="font-family: arial, arial, arial; font-size: 13px " name="description" placeholder="Description" required>
                  </div>
                  
                  <div class="col-2">
                  <label class="form-label" style="font-family: arial, arial, arial; font-size: 13px ">Quantity</label>

                    <input type="number" style="font-family: arial, arial, arial; font-size: 13px " class="form-control" name="qty" placeholder="" required>
                  </div>
                  
                  <div class="col-2">
                  <label class="form-label" style="font-family: arial, arial, arial; font-size: 13px " >Unit price</label>

                    <input type="number"  style="font-family: arial, arial, arial; font-size: 13px " class="form-control" name="unitprice" placeholder="" required>
                  </div>
                  <div class="col">
                  <label class="form-label d-none mt-5 pt-4" style="font-family: arial, arial, arial; font-size: 13px " >submit</label>
                  <button type ="submit" class="btn btn-success mt-4 py-1" style="font-family: arial, arial, arial; font-size: 13px ">Submit</button>
                  </div>
                </div>
              </form>
                <form method="post" id="invoice_create" name="invoice_create" action="<?php echo base_url('ProductsCrud/invout'); ?>">
                <input class="form-control my-3 d-none" id="barcodeValue" value="<?= $random; ?>" name="random">
               
                <div class="table-responsive">
                <?php if($masterlist): ?>
                <h5 class="d-flex justify-content-end" style='font-family:"Airal", Arial, Arial; font-size:60%'><?php echo $count_invoice; ?> Item(s) added </h5>
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead >
                            <tr>
                            <th scope="col" class="col-1"></th>
                            <th scope="col" class="col-2">Type</th>
                            <th scope="col" class="col-5">Descrption</th>
                            <th scope="col" class="col-2">Qty</th>
                            <th scope="col" class="col-2">Unit Price</th>
                            <th scope="col" class="col-2">Total</th>
                            </tr>
                        </thead>
                        <?php foreach($masterlist as $user): ?>
                        <tbody>
                            <tr>
                            <td class="">  
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?php echo base_url('ProductsCrud/ddeletei/'.$user['del']);?> "  class="pr-2">[del]</a>
                        </div>
                            <td class="col-2"><?=  $user['type']; ?></td>
                            <td class="col-6"><?=  $user['description']; ?></td>
                            <td class="col-2"><?=  $user['qty']; ?></td>
                            <td class="col-2"><?=  $user['unitprice']; ?></td>
                            <td class="col-3"><?=  $user['total']; ?></td>
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
                                                <a href="<?php echo base_url('ProductsCrud/ddeletei/'.$user['del']);?> " class="btn btn-danger deletebtn" >Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>

</div>
<?php if($masterlist): ?>
<div class="">
<button type="submit" class="btn btn-primary  col-12 " style="font-family: arial, arial, arial; font-size: 13px ">Create</button>
</div>
<?php endif; ?>
</div>
</form>
</div>
</div>
 
</div>
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

<script type="text/javascript">

/// Onclick scrpt

   var input = document.getElementById("serialno");
          function selectText() {
          const input = document.getElementById('fname');
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
  
    




 










 



                                                                                                       