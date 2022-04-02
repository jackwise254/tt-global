<?php include('template/header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="customBarcodeGenerate.js"></script>		

<table class="table table-striped" id="warranty">
      
             <input type="hidden" name="barcodeValue" id="barcodeValue" class="form-control" value="<?php echo $masterlist['assetid']; ?>"
             <td>


            
          <input type="button" id="generateBarcode" name="generateBarcode" class="btn btn-success form-control" value="Generate barcode">
        <div class="col-md-4">
		<br><br><br>
		<svg id="barcode"></svg>
	  </div>
        
         

</div>




<script type="text/javascript">
	var i = 0;
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
	$('#printInvoice').click(function(){
    Popup($('.invoice')[0].outerHTML);
    function Popup(data) 
    {
        window.print();
        return true;
    }
});
});

    

</script>
<?php include('template/footer.php');?>







