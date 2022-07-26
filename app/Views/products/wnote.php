<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); ?>

    
<?php $randoms = rand(10000, 99999); ?>

<br/>

<br/>
    <div class="row mx-3 mt-5">
<!-- </h5 class="text-center mb-1"><u>Warranty note</u></h5> -->
<h5 class="text-center mb-1"> <u>Warranty Note</u></h5>
    <div class="col-6">
    <form name="test" class="col-10 " action="<?php echo  base_url('ProductsCrud/warrantysub1'); ?>" method="POST">
<a href="<?php echo site_url('/warranty-create') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">back</a>
            <label >Customer</label>
            <select class="form-select form-control d-inline rounded-pill col-4"  name="username" >
                <option selected></option>
                    <?php foreach($customers as $user): ?>
                    <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <div class="w-25 d-inline">
            <label class=""></label>
                <input type="text" class=" w-25 d-inline " name="warranty" placeholder="warranty No:" required>
            </div> -->
            <button type ="submit" class="bi bi-search col-2 rounded-pill btn-outline-success" id="myBtn1" onchange="this.form.submit()"></button>
        </form>
        </div>
        <div class="col-6 float-end">

        <form name="test" class="col-12" action="<?php echo  base_url('ProductsCrud/warrantysub'); ?>" method="POST">
        <a href="<?php echo  base_url('ProductsCrud/warrantyclear'); ?>" class=" btn btn-success d-none  btn-sm">Manual</a>

        <a href="<?php echo  base_url('ProductsCrud/warrantyclear'); ?>" class=" btn btn-danger bi bi-trash-fill float-end btn-sm">Clear</a>

            <!-- <label class="label">Serial no.</label> -->
            <input type="text" class="col-4 form-control rounded-pill" id="serialno" name="serialno" placeholder='serial no.' autofocus required>
            
            <button type ="submit" class="d-none" id="myBtn" onchange="this.form.submit()">Submit</button>
        </form>
        </div>
        
    </div>


<script src="https://code.jquery.com/jquery-2.2.4.js"></script>

<script>
  $('#serialno').keyup(function(){
      if(this.value.length >= 6){
      $('#myBtn').click();
      }
  });
</script> 

<div class="px-5 " data-dismiss="alert">
<?php
    if(session()->getFlashdata('status')) {
        echo "<h5 class=' alert alert-success  alert-dismissible fade show d-flex align-items-center bi flex-shrink-0 me-2' width='18' height='15' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>" . session()->getFlashdata('status') . "</h4>"; 
    }
?>  
</div>

<hr/>
<h5 class="d-flex justify-content-end" style='font-family:"Airal", Arial, Arial; font-size:60%'><?php echo $count_wnote; ?> Item(s) added </h5>

<form method="post" id="invoice_create" name="invoice_create" action="<?php echo base_url('ProductsCrud/wout'); ?>">

<div class="row">

<div class="col-3">
<!-- copy -->
<div class="container">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
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
                        <input type="text" class="form-control" name="location" style="font-family: arial, arial, arial; font-size: 13px " placeholder="<?=  $user->location; ?> " readonly>
                        </div>
                        
                        </div>
                    <div class="row px-3 ">
                        
                        <div class="col">
                        <label  class="col-sm-2 col-form-label " style="font-family: arial, arial, arial; font-size: 13px ">Delivery_no:</label>
                        <input type="text" class="form-control mb-4" style="font-family: arial, arial, arial; font-size: 13px " name="invoice" placeholder="<?=  $user->warranty; ?>" readonly>
                        </div>

                        <div class="col">
                        <label  class="col-sm-7 col-form-label " style="font-family: arial, arial, arial; font-size: 13px ">ID_No.</label>
                        <input type="text" class="form-control mb-4" style="font-family: arial, arial, arial; font-size: 13px " name="id_no" placeholder="<?=  $user->id_no; ?>" readonly>
                        </div>
                    </div>
                    <?php endforeach; ?>
                          
                        
            </div>
        </div>
    </div>
</div>

<!-- end -->
<div class="col-9">
<div class="container">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded ">
                <h4 class="text-center" style="font-family: arial, arial, arial; font-size: 14px ">Products details </h4>
                <input type="date" class=" px-2  " name="datedelivered" style="font-family: arial, arial, arial; font-size: 14px" >
                <div class="table-responsive">
                <?php if($masterlist): ?>
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead >
                            <tr>
                            <th scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">Asset_Id</th>
                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3">Generation</th>
                            <th scope="col" class="col-3">Ram</th>
                            <th scope="col" class="col-3">Screen</th>
                            <th scope="col" class="col-3">Part</th>
                            <th scope="col" class="col-3">Serial_No.</th>
                            <th scope="col" class="col-3">Model_Id</th>
                            <th scope="col" class="col-3 px-5">Model</th>
                            <th scope="col" class="col-3 px-5">CPU</th>
                            <th scope="col" class="col-3">Speed</th>
                            <th scope="col" class="col-3">Price</th>
                            <th scope="col" class="col-3">Odd</th>
                            <th scope="col" class="col-3">Comment</th>
                            <th scope="col" class="col-3">HDD</th>
                            <th scope="col" class="col-3">Date_Recieved</th>
                            <th scope="col" class="col-3">Customer</th>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Status</th>
                            </tr>
                        </thead>
                        <?php foreach($masterlist as $user):
                            $datereceived = substr($user->daterecieved,0,10);
                            $datedelivered = substr($user->datedelivered,0,10);
                            ?>
                        <tbody>
                            <tr>
                            <td class="">  
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#myModal" class="trigger-btn" data-toggle="modal" class="pr-2">[del]</a>
                        </div>
                            <td class="col-5"><?=  $user->assetid; ?></td>
                            <td class="col-5"><?=  $user->type; ?></td>
                            <td class="col-5"><?=  $user->conditions; ?></td>
                            <td class="col-5"><?=  $user->gen; ?></td>
                            <td class="col-5"><?=  $user->ram; ?></td>
                            <td class="col-5"><?=  $user->screen; ?></td>
                            <td class="col-5"><?=  $user->part; ?></td>
                            <td class="col-5"><?=  $user->serialno; ?></td>
                            <td class="col-5"><?=  $user->modelid; ?></td>
                            <td class="col-5"><?=  $user->model; ?></td>
                            <td class="col-5"><?=  $user->cpu; ?></td>
                            <td class="col-5"><?=  $user->speed; ?></td>
                            <td class="col-5"><?=  $user->price; ?></td>
                            <td class="col-5"><?=  $user->odd; ?></td>
                            <td class="col-5"><?=  $user->comment; ?></td>
                            <td class="col-5"><?=  $user->hdd; ?></td>
                            <td class="col-5"><?=  $datereceived; ?></td>
                            <td class="col-5"><?=  $user->customer; ?></td>
                            <td class="col-5"><?=  $user->list; ?></td>
                            <td class="col-5"><?=  $user->status; ?></td>

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
                                                <a href="<?php echo base_url('ProductsCrud/deletew/'.$user->id);?> " class="btn btn-danger deletebtn" >Delete</a>
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php foreach($customer as $users): ?>

                        <input type="text" class="d-none" name="lname" value="<?php echo  $users->lname; ?>">
                        <?php endforeach; ?>

                        <input class="form-control my-3 d-none" id="barcodeValue" value="<?=  $randoms; ?>" name="random">

                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>

                </div>
                
            </div>
        </div>
        
    </div>
    </div>

</div>
<div class="py-4 px-5">
<button type="submit" class="btn btn-primary  col-12">Create</button>
 </div>

</div>
 
</div>
</form>

    </div>
    </div>

    
<!-- 
 
 Extra form -->
<!-- 
<div class="container ">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light p-4">
                <form method="post" id="invoice_create" name="invoice_create" action="<?php echo base_url('ProductsCrud/warrantysub2'); ?>">
                <div class="row">
                  <div class="col-6">
                  <label class="form-label" style="font-family: arial, arial, arial; font-size: 13px " >Description</label>
                    <input type="text" class="form-control" style="font-family: arial, arial, arial; font-size: 13px " name="description" placeholder="Description" required>
                  </div>
                  <div class="col-2">
                  <label class="form-label" style="font-family: arial, arial, arial; font-size: 13px ">Quantity</label>

                    <input type="number" class="form-control" style="font-family: arial, arial, arial; font-size: 13px " name="qty" placeholder="" required>
                  </div>
                  
                  <div class="col-2">
                  <label class="form-label" style="font-family: arial, arial, arial; font-size: 13px " >Unit price</label>

                    <input type="number"  style="font-family: arial, arial, arial; font-size: 13px " class="form-control" name="unitprice" placeholder="" required>
                  </div>
                  <div class="col">
                  <label class="form-label d-none mt-5" style="font-family: arial, arial, arial; font-size: 13px "   >submit</label>
                  <button type ="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
              end of extra fomr  -->


    
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
  
    








