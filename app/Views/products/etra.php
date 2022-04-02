<?php 
include_once("inc/db_connect.php");
include("template/header.php"); 
?>

<script type="text/javascript" src="dist/jquery.tabledit.js"></script>

<div class="container home">  
  <h2>Insert Multiple Items</h2>     
  <table id="data_table" class="table table-striped">
    <thead>
       <tr>
            <th class="text-center">Condition</th>
            <th class="text-center">Type</th>
            <th class="text-center">Asset Id</th>
            <th class="text-center">Generation</th>
            <th class="text-center">Ram</th>
            <th class="text-center">Screen</th>
            <th class="text-center">Part</th>
            <th class="text-center">Serial No.</th>
            <th class="text-center">Model Id</th>
            <th class="text-center">CPU</th>
            <th class="text-center">Speed</th>
            <th class="text-center">Price</th>
            <th class="text-center">Odd</th>
            <th class="text-center">Comment</th>
            <th class="text-center">HDD</th>
            <th class="text-center">Date Recieved</th>
            <th class="text-center"> Date Delivered</th>
            <th class="text-center">Customer</th>
            <th class="text-center">List</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
    </thead>
    <tbody>
      <?php 
      $sql_query = "SELECT conditions, type, assetid, gen, ram, screen, odd, comment, part, status, qty, serialno, modelid, cpu, hdd, speed, price, list FROM masterlist LIMIT 10";
      $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
      while( $developer = mysqli_fetch_assoc($resultset) ) {
      ?>
         <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['conditions']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['type']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['assetid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['gen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['ram']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['screen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['part']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['serialno']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['modelid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['cpu']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['speed']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['price']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['odd']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['comment']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $developer['hdd']; ?></td>
            </tr>
      <?php } ?>
    </tbody>
    </table>  

</div>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php include('template/footer.php');?>
 



                                                                                                       