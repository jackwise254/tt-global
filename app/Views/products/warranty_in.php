<?php include('template/header.php');?>
<!--  -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
<script src="https://ajax.googleapis.com/ajax/libbootstraps/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com//3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="customBarcodeGenerate.js"></script>
</head>   
        
 <div class="container mt-5 py-5">
  	
     <table class="table table-striped" id="warranty">
     <h4 class="text-center "><u>Goods on Warranty In</u></h4>
       <thead>
          <tr>
             <th  scope="col">Id </th>
             <th  scope="col">Type</th>
             <th  scope="col">Asset Id</th>
             <th  scope="col">Generation</th>
             <th  scope="col">Ram</th>
             <th  scope="col">Screen</th>
             <th  scope="col">Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
          <tr>
             <td scope="row"><?=  $user['id']; ?></td>
             <td scope="row"><?php echo $user['type']; ?></td>
             <td scope="row"><?php echo $user['assetid']; ?></td>
             <td scope="row"><?php echo $user['gen']; ?></td>
             <td scope="row"><?php echo $user['ram']; ?></td>
             <td scope="row"><?php echo $user['screen']; ?></td>
             <td>

               
             </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>

       </tbody>
	</table>

     <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/products-form') ?>" class="btn btn-success bi-plus mb-4">Add Item</a>
        <a href="ProductsCrud/barcode/<?php echo $user['id'];?>" class="btn btn-secondary  mb-4"> Barcode</a>
      </tr>
  </div>
</div> 
<script type="text/javascript">
  $('document').ready(function() {
  $('#generateBarcode').on('click', function() {  
    var barcodeValue = $("#barcodeValue").val();
    var barcodeType = $("#barcodeType").val();  
    var showText = $("#showText").val();      
    JsBarcode("#barcode", barcodeValue, {
      format: barcodeType,
      displayValue: showText,
      lineColor: "#24292e",
      width:2,
      height:40,  
      fontSize: 20          
    });   
    
  });
});

</script>
<?php include('template/footer.php');?>