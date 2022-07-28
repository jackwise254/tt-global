<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<body class="bg-light container mt-5 p-5">

    <form method="post" id="update_user" name="update_user" 
     action="<?= site_url('/update-fproducts') ?>">
     <?php foreach($user_obj as $obj): 
     
     endforeach
     ?>


     <input type="hidden" name="id" id="id" value="<?php echo $obj->id; ?>">
     <br/><br/>
   <div class="container py-3">

<div class="form-row p-5 mt-5">
  	<table class="table table-striped bg-light" style='font-family:"Airal", Arial, Arial; font-size:50% table-layout:fixed cellspacing=1 cellpadding=2 width="25%" border="1"' id="inventory-create mt-6">
		<table class="table table-bordered table-responsive-md table-striped text-center ">
        <thead>
          <tr>
            <th class="text-center px-5">Condition</th>
            <th class="text-center px-5">List</th>
            <th class="text-center px-5">Brand</th>
            <th class="text-center px-5">Type</th>
            <th class="text-center px-5">Gen</th>
            <th class="text-center px-5">Part</th>
            <th class="text-center px-5">Serial_no</th>
            <th class="text-center px-5">Modelid</th>
            <th class="text-center px-5">Model</th>
            <th class="text-center px-5">Cpu</th>
            <th class="text-center px-5">Speed</th>
            <th class="text-center px-5">Ram</th>
            <th class="text-center px-5">Hdd</th>
            <th class="text-center px-5">Screen</th>
            <th class="text-center px-5">Odd</th>
            <th class="text-center px-5">Comment</th>
            <th class="text-center px-5">Problem</th>

            <th class="text-center px-5">Price</th>
            
            <th class="text-center px-5">Customer</th>
            <th class="text-center px-5">Status</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
      
   				  <input type="text" class="form-control w-5 d-none" name="assetid" value="<?php echo $obj->assetid; ?>">
   				 
			
    		<td>
        <select class="form-select"  name="conditions" value="<?php echo $obj->conditions; ?>">
          <option selected value="<?php echo $obj->conditions; ?>"> <?php echo $obj->conditions; ?></option>
          <option value="New">New</option>
          <option value="Used">Used</option>
          <option value="Refurb">Refurb</option>
        </select>
    		</td>
    		<td>
   				  <input type="text" class="form-control w-5" name="list" value="<?php echo $obj->list; ?>">
   				 
			</td>
      <td>
   				  <input type="text" class="form-control w-5" name="brand" value="<?php echo $obj->list; ?>">
   				 
			</td>
    		<td>
        <select class="form-select" name="type" value="<?php echo $obj->type; ?>">
          <option selected value="<?php echo $obj->type; ?>"><?php echo $obj->type; ?></option>
          <option value="laptop">Laptop</option>
          <option value="desktop">Desktop</option>
          <option value="allinone">All in one</option>
          <option value="hdd">HDD</option>
          <option value="ssd">SSD</option>
          <option value="printer">Printer</option>
        </select>
    		</td>
    		<td>
        <select class="form-select" name="gen" value="<?php echo $obj->gen; ?>">
          <option selected value="<?php echo $obj->gen; ?>"><?php echo $obj->gen; ?></option>
          <option value="8th">8 th</option>
          <option value="9th">9 th</option>
          <option value="10th">10 th</option>
          <option value="11th">11 th</option>
        </select>
    		</td>
        <td>
   				  <input type="text" class="form-control" name="part" value="<?php echo $obj->part; ?>">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="serialno" value="<?php echo $obj->serialno; ?>">
    		</td>
    		<td>
   				  <input type="text" class="form-control" name="modelid" value="<?php echo $obj->modelid; ?>">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="model" value="<?php echo $obj->modelid; ?>">
    		</td>
    		<td>
    			<input type="text" class="form-control" name="cpu" value="<?php echo $obj->cpu; ?>">
    		</td>
        <td>
   				  <input type="text" class="form-control" name="speed" value="<?php echo $obj->speed; ?>">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="ram" value="<?php echo $obj->ram; ?>">
    		</td>
    		<td>
   				  <input type="text" class="form-control" name="hdd" value="<?php echo $obj->hdd; ?>">
   				 
			</td>
    		<td>
        <select class="form-select"  name="screen" value="<?php echo $obj->screen; ?>">
          <option selected value="<?php echo $obj->screen; ?>"><?php echo $obj->screen; ?> </option>
          <option value="10">10'</option>
          <option value="11">11'</option>
          <option value="14">14'</option>
          <option value="15">15'</option>
        </select>
    		</td>
    		<td>
        <select class="form-select"  name="odd" value="<?php echo $obj->odd; ?>">
          <option selected value="<?php echo $obj->odd; ?>"> <?php echo $obj->odd; ?> </option>
          <option value="yes">No</option>
          <option value="no">Yes</option>
        </select>
    		</td>
        <td>
   				  <input type="text" class="form-control" name="comment" value="<?php echo $obj->comment; ?>">
   				 
			</td>
      <td>
   				  <input type="text" class="form-control" name="problem" value="<?php echo $obj->problem; ?>">
   				 
			</td>
    		<td>
    			<input type="number" class="form-control" name="price" value="<?php echo $obj->price; ?>">
    		</td>
    	
    		<td>
    			<input type="text" class="form-control" name="customer" value="<?php echo $obj->customer; ?>">
    		</td>
        <td>
    			<input type="text" class="form-control" name="status" value="<?php echo $obj->status; ?>">
    	
</tbody>
</table>
<div class="form-group mt-3 col-12">
  <button type="submit" id="generateBarcode" name="generateBarcode" class="btn btn-success w-25 form-control position-fixed" >Update Data</button>
</div>
  </div>
</form>

</div>