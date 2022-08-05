<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<div class="container-fluid py-5">
    <h4 class="text-center pt-4"><u>Total stock out</u></h4>
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead >
                            <tr>
                            <th scope="col" class="col-3">List</th>
                            <th scope="col" class="col-3">Condition</th>
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
                            <th scope="col" class="col-3">Problem</th>

                            <th scope="col" class="col-3">Price</th>
                            <th scope="col" class="col-3">Date_Recieved</th>
                            <th scope="col" class="col-3">Date_Delivered</th>
                            <th scope="col" class="col-3">Customer</th>
                            </tr>
                        </thead>
                        <?php foreach($all as $l): 
                           $datereceived = substr($l->daterecieved,0,10);
                          $datedelivered = substr($l->datedelivered,0,10);
                          ?>
                        <tbody>
                            <tr>
                      
                            <td class="pt-3-half"><?=  $l->list; ?></td>
                            <td class="col-3"><?=  $l->conditions; ?></td>
                            <td class="col-3"><?=  $l->type; ?></td>
                            <td class="col-3"><?=  $l->brand; ?></td>
                            <td class="col-3"><?=  $l->gen; ?></td>
                            <td class="col-3"><?=  $l->part; ?></td>
                            <td class="col-3"><?=  $l->serialno; ?></td>
                            <td class="col-3"><?=  $l->modelid; ?></td>
                            <td class="col-5"><?=  $l->model; ?></td>
                            <td class="col-3"><?=  $l->cpu; ?></td>
                            <td class="col-3"><?=  $l->speed; ?></td>
                            <td class="col-3"><?=  $l->ram; ?></td>
                            <td class="col-3"><?=  $l->hdd; ?></td>
                            <td class="col-3"><?=  $l->screen; ?></td>
                            <td class="col-3"><?=  $l->odd; ?></td>
                            <td class="col-3"><?=  $l->comment; ?></td>
                            <td class="col-3"><?=  $user->problem; ?></td>
                            <td class="col-3"><?=  $l->price; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            <td cclass="col-3"><?=  $datedelivered; ?></td>
                            <td class="col-3"><?=  $l->customer; ?></td>
                            </tr>
                            
                        </tbody>


                        <?php endforeach; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
