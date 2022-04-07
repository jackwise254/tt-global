<?php include('template/header.php');?>

<?php
use Phppot\DataSource;

require_once 'DataSource.php';

$rand = rand(1000, 9999);


$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $conditions = "";
            if (isset($column[0])) {
                $conditions = mysqli_real_escape_string($conn, $column[0]);
            }
            $type = "";
            if (isset($column[1])) {
                $type = mysqli_real_escape_string($conn, $column[1]);
            }
            $assetid = "";
            if (isset($column[2])) {
                $assetid = mysqli_real_escape_string($conn, $column[2]);
            }
            $gen = "";
            if (isset($column[3])) {
                $gen = mysqli_real_escape_string($conn, $column[3]);
            }
            $ram = "";
            if (isset($column[4])) {
                $ram = mysqli_real_escape_string($conn, $column[4]);
            }
            $screen = "";
            if (isset($column[5])) {
                $screen = mysqli_real_escape_string($conn, $column[5]);
            }
            
            $part = "";
            if (isset($column[6])) {
                $part = mysqli_real_escape_string($conn, $column[6]);
            }
            
            $serialno = "";
            if (isset($column[7])) {
                $serialno = mysqli_real_escape_string($conn, $column[7]);
            }
            
            $modelid = "";
            if (isset($column[8])) {
                $modelid = mysqli_real_escape_string($conn, $column[8]);
            }
            
            $cpu = "";
            if (isset($column[9])) {
                $cpu = mysqli_real_escape_string($conn, $column[9]);
            }
            
            $speed = "";
            if (isset($column[10])) {
                $speed = mysqli_real_escape_string($conn, $column[10]);
            }
            
            $price = "";
            if (isset($column[11])) {
                $price = mysqli_real_escape_string($conn, $column[11]);
            }
            $odd = "";
            if (isset($column[12])) {
                $odd = mysqli_real_escape_string($conn, $column[12]);
            }
            
            $comment = "";
            if (isset($column[13])) {
                $comment = mysqli_real_escape_string($conn, $column[13]);
            }
            
            $hdd = "";
            if (isset($column[14])) {
                $hdd = mysqli_real_escape_string($conn, $column[14]);
            }
            // $speed = "";
            // if (isset($column[15])) {
            //     $speed = mysqli_real_escape_string($conn, $column[15]);
            // }
            
            $datedelivered = "";
            if (isset($column[16])) {
                $datedelivered = mysqli_real_escape_string($conn, $column[16]);
            }
           $customer = "";
            if (isset($column[18])) {
                $customer = mysqli_real_escape_string($conn, $column[18]);
            }
            $list = "";
            if (isset($column[19])) {
                $list = mysqli_real_escape_string($conn, $column[19]);
            }
            $status = "";
            if (isset($column[20])) {
                $status = mysqli_real_escape_string($conn, $column[20]);
            }
            $del = "";
            if (isset($column[26])) {
                $del = mysqli_real_escape_string($conn, $column[26]);
            }
            
            
            $sqlInsert = "INSERT into templist (conditions, type, assetid, gen, ram, screen, part, serialno, modelid, cpu, speed, price, odd, comment, hdd, datedelivered, customer, list, status, del)
                   values (?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "ssssssssssisssssssss";
            $paramArray = array(
            $conditions,$type,$assetid,$gen,$ram,$screen, $part , $serialno , $modelid, $cpu, $speed, $price, $odd, $comment, $hdd , $datedelivered, $customer, $list, $status, $del ,
            
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            // $insertId = ($sqlInsert, $paramType, $paramArray);
            

        //  echo '<pre>';
        //  print_r($param);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "success";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>

<style>


/*.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 10px;
    border-radius: 2px;
}*/

/*.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}*/

/*.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}*/

/*.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}*/

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

        $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>
    
    
<body>
    <br/><br/>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
    </div>
    <div class='container bg-light mt-5 p-4' style="border-radius: 1rem">
    <div class="container col-md-12">
    <h4> <u>Upload CSV</u> </h4>

        <div class="row col-md-12">
            <form class="form-group" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
        
                <input class="form-control w-25 d-inline" required type="file" name="file"id="file" accept=".csv">
                <button type="submit" id="submit" name="import"
                    class="btn-submit btn btn-success bi bi-upload">
                </button>
               </form>
              
            </div>
       </div>
       <div class='ms-3'>
       <p>OR</p>
        <a href="<?= site_url('products-form') ?>" class="btn btn-danger w-25">Add Multiple</a> 
       </div> 
      
<div class="mt-2">
  <div class="container">
      <h6><u>Uploaded CSV's/Many</u> </h6>
    <form method="post" action="<?php echo base_url("/ProductsCrud/inventory")?>">
    <div id="table" class="table-editable">
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
                    <a href="<?= base_url('ProductsCrud/deleteCSV/'. $l['del']) ?>" class="btn btn-danger btn-sm">Delete</a> 
                    </button></td>            

                </tr>
            <?php endforeach ?>
                
         </tbody> 
      </table>

      <a href="<?= base_url('ProductsCrud/sendtomasterlist') ?>" class="btn btn-success btn-sm">Push to masterlist</a> 
      
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

                






















