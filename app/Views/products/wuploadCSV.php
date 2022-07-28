<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<br/>
<br/>
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
    </div>
    <div class='container bg-light mt-5 p-4' style="border-radius: 1rem">
    <h4 class="text-center"> <u>Stocking Panel</u> </h4>
    <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>"; 
    }
?> 
    <div class="container col-md-12">
   <a href="<?php echo site_url('warranty') ?>" class="btn btn-dark btn-sm bi bi-chevron-left px-3 mb-3">back</a>

    <h4> <u>Upload CSV</u> </h4>

        <div class="row col-md-12">
            <form class="form-group" action="<?= site_url('warrantyimport') ?>" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
        
                
                <input class="form-control w-25 d-inline" required type="file" name="file"id="file" accept=".csv">
                <!-- <input class="form-control w-25 d-inline " required type="text" name="customer"id="file" placeholder="customer" required> -->
                <select class="form-select form-control w-25 d-inline"  name="customer" >
                <option selected></option>
                    <?php foreach($customer as $user): ?>
                    <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                    <?php endforeach; ?>
                </select>


                <button type="submit" id="submit" name="import"
                    class="btn-submit btn btn-success bi bi-upload">
                </button>
                
               </form>


               <!-- <form class="form-group" action="<?= base_url('Settings/importusers') ?>" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
        
                
                <input class="form-control w-25 d-inline" required type="file" name="file"id="file" accept=".csv">
                


                <button type="submit" id="submit" name="import"
                    class="btn-submit btn btn-success bi bi-upload">
                </button>
                
               </form> -->
              
            </div>
       </div>
       <div class='ms-3'>
       <p>OR</p>
        <a href="<?= site_url('wproducts-form') ?>" class="btn btn-danger w-25">Add Multiple</a> 
       </div> 
      
<div class="mt-2">
  <div class="container-fluid">
      <h6><u>Uploaded CSV's/Many</u> </h6>
</div>  
    <form method="post" action="<?php echo base_url("/ProductsCrud/inventory")?>">
    
    <div class="container-fluid">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:50%'>
                        <thead >
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Condition</th>
                            <th scope="col" class="col-3 px-5">Assetid</th>
                            <th scope="col" class="col-3">Batch</th>
                            <th scope="col" class="col-3">Type</th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3 px-5">Gen</th>
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
                            <th scope="col" class="col-3">Customer</th>
                            </tr>
                        </thead>
                        <?php foreach($all as $l): 
                          $datereceived = substr($l['daterecieved'],0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="">  
                            <a href="<?= base_url('ProductsCrud/deleteCSVw/'. $l['del']) ?>" class="btn btn-danger btn-sm">Delete</a> 
                            
                            </div>
                            </td>
                            <td class="pt-3-half"><?=  $l['list']; ?></td>
                            <td class="col-3"><?=  $l['conditions']; ?></td>
                            <td class="col-3"><?=  $l['assetid']; ?></td>
                            <td class="col-3"><?=  $l['del']; ?></td>
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
                            <td class="col-3"><?=  $l['price']; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td class="col-3"><?=  $l['customer']; ?></td>
                            </tr>
                            
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

   
      <a href="<?= base_url('ProductsCrud/sendtowarrantyin') ?>" class="btn btn-success btn-sm">Push to warranty in</a> 
      
    </div>
  </div>
</div>
</div>
</form>

</div>
</div>
</div>

</body>
</html>

                





























