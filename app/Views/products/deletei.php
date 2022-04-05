<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TT GLOBAL</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	
	<link rel="stylesheet" href="table.css"/>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
	<!-- <script src="delete.js"></script> -->
	<style type="text/css">
		table.datatable {
	width:100%;
	border: none;
	background:#fff;
}
table.datatable td.table_foot {
	border: none;
	background: #fff;
	text-align: center;
}
table.datatable tr.odd_col {
	background: none;
}
table.datatable tr.even_col {
	background: #ddd;
}
table.datatable td {
	font-size:10pt;
	padding:5px 10px;
	border-bottom:1px solid #ddd;
	text-align: left;
}
table.datatable th {
	text-align: left;
	font-size: 8pt;
	padding: 10px 10px 7px;   
	text-transform: uppercase;
	color: #fff;
	background-color: black;
	font-family: sans-serif;
}
	</style>
</head>
<body>
	<div>
	<h1>DELETE MULTIPLE</h1>

		<div id="body">
			
<table class="datatable">
<table class="table table-bordered table-responsive-md table-striped text-center ">
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
        <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['conditions']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['type']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['assetid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['gen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['ram']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['screen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['part']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['serialno']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['modelid']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['cpu']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['speed']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['price']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['odd']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['comment']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['hdd']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['daterecieved']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['datedelivered']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['customer']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['list']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['status']; ?></td>
            <td class="pt-3-half" >
              <a href="ProductsCrud/moreList/<?php echo $user['id'];?>" class="btn btn-secondary btn-sm">more</a>
              <a href="ProductsCrud/barcode/<?php echo $user['id'];?>" class="btn btn-secondary  mb-4"> Barcode</a>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
		
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	$(function() {
	//If check_all checked then check all table rows
	$("#check_all").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$("input:checkbox[name='row-check']").prop("checked", true);
		} else {
			$("input:checkbox[name='row-check']").prop("checked", false);
		}
	});

	// Check each table row checkbox
	$("input:checkbox[name='row-check']").on("change", function () {
		var total_check_boxes = $("input:checkbox[name='row-check']").length;
		var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

		// If all checked manually then check check_all checkbox
		if (total_check_boxes === total_checked_boxes) {
			$("#check_all").prop("checked", true);
		}
		else {
			$("#check_all").prop("checked", false);
		}
	});
	
	$("#delete_selected").on("click", function () {
		var ids = '';
		var comma = '';
		$("input:checkbox[name='row-check']:checked").each(function() {
			ids = ids + comma + this.value;
			comma = ',';			
		});
		
		//console.log(ids);
		
		if(ids.length > 0) {
			$.ajax({
				type: "POST",
				url: "http://localhost:8080/index.php/product/delete_products",
				data: {'ids': ids},
				dataType: "html",
				cache: false,
				success: function(msg) {
					$("#msg").html(msg);
					window.setTimeout(function(){
						window.location.href = "http://localhost:8080/";
					}, 5000);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#msg").html("<span style='color:red;'>" + textStatus + " " + errorThrown + "</span>");
				}
			});
		} else {
			$("#msg").html('<span style="color:red;">You must select at least one product row for deletion</span>');
		}
	});
});
</script>