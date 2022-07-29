<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<br/>
<div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
    </div>
    <div class="container bg-light mt-5 pt-3 ">
    <h4 class="text-center"> <u>Stocking panel</u> </h4>
    <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>"; 
    }
?> 
    <a href="<?php echo site_url('fualty-stock') ?>" class="btn btn-light btn-sm bi bi-chevron-left">back</a>
    
    <h4> <u>Upload CSV</u> </h4>

        <div class="row ">
           
            <form class="form-group" action="<?= base_url('Settings/fload') ?>" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="col-md-12">

                <input class="form-control w-25 d-inline pr-3 " required type="file" name="file"id="file" accept=".csv">
                <select class="form-select form-control w-25 d-inline"  name="vendor" >
                <option selected></option>
                    <?php foreach($customer as $user): ?>
                    <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                    <?php endforeach; ?>
                </select>
                
                <button type="submit" id="submit" name="import"
                    class="btn-submit btn btn-success bi bi-upload">
                </button>
                
                </div>
                
                
                <div class="col-md-4">
                
            </div>
               </form>
                
            </div>
       <div class='ms-3'>
       <p>OR</p>
        <a href="<?= base_url('Warranty/create') ?>" class="btn btn-danger w-25">Add Multiple</a> 
       </div> 
      
<div class="mt-2">
  <div class="container-fluid">
      <h6><u>Uploaded CSV's/Many</u> </h6>
</div>  
    <form method="post" action="<?php echo base_url("/ProductsCrud/faultyp")?>">
    <div class="container-fluid">
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:50%'>
                        <thead >
                            <tr>
                            <th  scope="col" class="col-2"></th>
                            <th scope="col" class="col-2">List</th>
                            <th scope="col" class="col-2">Condition</th>
                            <th scope="col" class="col-2 px-5">Assetid</th>
                            <th scope="col" class="col-2">Batch</th>
                            <th scope="col" class="col-2">Type</th>
                            <th scope="col" class="col-2">Brand</th>
                            <th scope="col" class="col-2 px-5">Gen</th>
                            <th scope="col" class="col-2">Part</th>
                            <th scope="col" class="col-2">Serial_No.</th>
                            <th scope="col" class="col-2">Model_Id</th>
                            <th scope="col" class="col-2 px-5">Model</th>
                            <th scope="col" class="col-2 px-5">CPU</th>
                            <th scope="col" class="col-2">Speed</th>
                            <th scope="col" class="col-2 px-3">Ram</th>
                            <th scope="col" class="col-2">HDD</th>
                            <th scope="col" class="col-2">Screen</th>
                            <th scope="col" class="col-2">Odd</th>
                            <th scope="col" class="col-2">Comment</th>
                            <th scope="col" class="col-2">Price</th>
                            <th scope="col" class="col-2">Date_Recieved</th>
                            <th scope="col" class="col-2">Date_Delivered</th>

                            <th scope="col" class="col-2">Customer</th>
                            <th scope="col" class="col-2">Vendor</th>

                            </tr>
                        </thead>
                        <?php foreach($all as $l): 
                          $datereceived = substr($l['daterecieved'],0,10);
                          $datedelivered = substr($l['datedelivered'],0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="">  
                            <a href="<?= base_url('ProductsCrud/deletetf/'. $l['del']) ?>" class="btn btn-danger btn-sm">Delete</a> 
                            
                            </div>
                            </td>
                            <td class="col-2"><?=  $l['list']; ?></td>
                            <td class="col-2"><?=  $l['conditions']; ?></td>
                            <td class="col-2"><?=  $l['assetid']; ?></td>
                            <td class="col-2"><?=  $l['del']; ?></td>
                            <td class="col-2"><?=  $l['type']; ?></td>
                            <td class="col-2"><?=  $l['brand']; ?></td>
                            <td class="col-2 "><?=  $l['gen']; ?></td>
                            <td class="col-2"><?=  $l['part']; ?></td>
                            <td class="col-2"><?=  $l['serialno']; ?></td>
                            <td class="col-2"><?=  $l['modelid']; ?></td>
                            <td class="col-5"><?=  $l['model']; ?></td>
                            <td class="col-2"><?=  $l['cpu']; ?></td>
                            <td class="col-2"><?=  $l['speed']; ?></td>
                            <td class="col-2"><?=  $l['ram']; ?></td>
                            <td class="col-2"><?=  $l['hdd']; ?></td>
                            <td class="col-2"><?=  $l['screen']; ?></td>
                            <td class="col-2"><?=  $l['odd']; ?></td>
                            <td class="col-2"><?=  $l['comment']; ?></td>
                            <td class="col-2"><?=  $l['price']; ?></td>
                            <td cclass="col-2"><?=  $datereceived; ?></td>
                            <td cclass="col-2"><?=  $datedelivered; ?></td>
                            <td class="col-2"><?=  $l['customer']; ?></td>
                            <td class="col-2"><?=  $l['vendor']; ?></td>

                            </tr>
                            
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

   
      <a href="<?= base_url('ProductsCrud/sendtofaulty') ?>" class="btn btn-success btn-sm mb-3">Push to faulty</a> 
      
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

                




















