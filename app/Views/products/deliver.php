<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); ?>

<?php  $random = rand(10000, 99999); ?>

<br/>
<br/>
    <div class="row mx-3 mt-5">
  <h4 class="text-center mb-1"> <u>Delivery Note</u></h4>
    <div class="col-6">
          <form name="test" class="col-10 " action="<?php echo  base_url('ProductsCrud/dsub'); ?>" method="POST">
            <a href="<?php echo site_url('delivery-create') ?>" class="btn btn-outline-dark rounded-pill btn-sm bi bi-chevron-left">back</a>
            <!-- <label >Customer</label> -->
            <select class="p-1 rounded-pill col-3 "  name="username" >
                <option selected>Customer</option>
                    <?php foreach($customers as $user): ?>
                    <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="w-25 d-inline">
            <label class=""></label>
                <input type="text" class=" col-3 rounded-pill " name="deliver" placeholder="Invoice No:" required>
            </div>
            <button type ="submit" class="btn btn-outline-success btn-sm rounded-pill" id="myBtn1" onchange="this.form.submit()">Submit</button>
        </form>
        </div>
        <div class="col-md-6">
        <form name="test" class="col-12 " action="<?php echo  base_url('ProductsCrud/delvsub'); ?>" method="POST">
            <input type="text" class="col-6 rounded-pill " id="serialno" name="serialno" placeholder='scan here' autofocus required>
            <button type="button" class="btn btn-outline-success btn-sm rounded-pill" data-toggle="modal" data-target="#myModal">Upload</button>
            <!-- <a href="<?php echo base_url('ProductsCrud/manual') ?>" class="btn btn-outline-success btn-sm float-end">Manual</a> -->
            <button type="button" class="btn btn-outline-secondary rounded-pill btn-sm position-relative">
                items
                <?php if($num): ?>
                <span class="position-absolute d-flex justify-content-end top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo $num; ?>
                    <span class="visually-hidden">Items</span>
                </span>
              <?php endif; ?>
             </button>
            <a href="<?php echo  base_url('ProductsCrud/delvclear'); ?>" class=" btn btn-outline-danger px-2 rounded-pill bi bi-trash-fill btn-sm">Clear</a>
            
            <button type ="submit" class="d-none" id="myBtn" onchange="this.form.submit()"></button>
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
<?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>"; 
    }
?>  

<hr/>

<form method="post" id="invoice_create" name="invoice_create" action="<?php echo base_url('ProductsCrud/delvout'); ?>">

<div class="row">

<div class="col-3">
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
                        <input type="text" class="form-control mb-4" style="font-family: arial, arial, arial; font-size: 13px " name="invoice" placeholder="<?=  $user->deliver; ?>" readonly>
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

<div class="col-9">

<div class="container">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <h4 class="text-center" style="font-family: arial, arial, arial; font-size: 14px ">Products details </h4>
                
                <?php $max = date("Y-m-d H:i:s");
                    ?>

                <input type="date" class=" col-sm-2  rounded-pill px-1" name="datedelivered" max='date(yyyy/mm/dd)' style="font-family: arial, rounded-pill arial, arial; font-size: 14px" >
                <div class="table-responsive">
                <?php if($masterlist): 
                    $max = date("Y-m-d H:i:s");
                    ?>
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
                            <a href="<?php echo base_url('ProductsCrud/ddelete/'.$user->assetid);?>" class="pr-2">[del]</a>
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
                     
                                
                        <input class="form-control my-3 d-none" id="barcodeValue" value="<?=  $random; ?>" name="random">

                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>

                <div class="row col-sm-12">
                    <div class= "col-sm-6 p-1">
                    <input type="text" class=" px-2 col-sm-5  rounded-pill" name="desc1" style="font-family: arial, arial, arial; font-size: 14px" placeholder="decription 1" >
                    <input type="text" class=" px-2  col-sm-2 rounded-pill" name="qty1" style="font-family: arial, arial, arial; font-size: 14px" placeholder="Qty 1">
                    </div>
                    <div class= "col-sm-6 p-1">
                    <input type="text" class=" px-2 col-sm-5 rounded-pill " name="desc2" style="font-family: arial, arial, arial; font-size: 14px" placeholder="decription 2" >
                    <input type="text" class=" px-2  col-sm-2 rounded-pill" name="qty2" style="font-family: arial, arial, arial; font-size: 14px" placeholder="Qty 2">
                    </div>
                </div> 
                <div class="row col-sm-12">
                    <div class= "col-sm-6 p-1">
                    <input type="text" class=" px-2 col-sm-5  rounded-pill" name="desc3" style="font-family: arial, arial, arial; font-size: 14px" placeholder="decription 3" >
                    <input type="text" class=" px-2  col-sm-2 rounded-pill" name="qty3" style="font-family: arial, arial, arial; font-size: 14px" placeholder="Qty 3">
                    </div>
                    <div class= "col-sm-6 p-1">
                    <input type="text" class=" px-2 col-sm-5 rounded-pill " name="desc4" style="font-family: arial, arial, arial; font-size: 14px" placeholder="decription 4" >
                    <input type="text" class=" px-2  col-sm-2 rounded-pill" name="qty4" style="font-family: arial, arial, arial; font-size: 14px" placeholder="Qty 4">
                    </div>
                </div>
                <div class="row col-sm-12">
                    <div class= "col-sm-6 p-1">
                    <input type="text" class=" px-2 col-sm-5  rounded-pill" name="desc5" style="font-family: arial, arial, arial; font-size: 14px" placeholder="decription 5" >
                    <input type="text" class="   col-sm-2 rounded-pill" name="qty5" style="font-family: arial, arial, arial; font-size: 14px" placeholder="Qty 5">
                    </div>
                    <div class= "col-sm-6 p-1">
                    <input type="text" class=" px-2 col-sm-5 rounded-pill " name="desc6" style="font-family: arial, arial, arial; font-size: 14px" placeholder="decription 6" >
                    <input type="text" class=" px-2  col-sm-2 rounded-pill" name="qty6" style="font-family: arial, arial, arial; font-size: 14px" placeholder="Qty 6">
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




<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body center">
      <form class="form-group" action="<?= base_url('Settings/deliveryimport') ?>" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
        <div class="col-md-12">
            <input class="form-control w-25 d-inline" required type="file" name="file"id="file" accept=".csv">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary px-2 btn-sm">Upload</button>
      </div>
    </div>
</form>
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
  
    




 






