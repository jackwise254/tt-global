<?php include('template/header.php');?>

<div class='container mt-5 py-5'>
<h5><u>Previous RCVD</u></h5>
<table class="table" id="inventory-view mt-5">
        <thead>
          <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Type</th>
            <th class="text-center">Condition</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Unique ID</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        
            <?php foreach($all as $l): ?>
                <tr>
                    <td class="text-center"><?= $l['daterecieved'] ?></td>
                    <td class="text-center"><?= $l['type'] ?></td> 
                    <td class="text-center"><?= $l['conditions'] ?></td> 
                    <td class="text-center"><?= $l['qty'] ?></td> 
                    <td class="text-center"><?= $l['del'] ?></td>            
                    <td><button class='btn btn-danger'>
                    <a href="<?= base_url('ProductsCrud/deleteRCVD/'. $l['del']) ?>" class="btn btn-danger btn-sm">Delete</a> 
                    </button></td>            

                </tr>
            <?php endforeach ?>
                
         </tbody> 
      </table>
</div>