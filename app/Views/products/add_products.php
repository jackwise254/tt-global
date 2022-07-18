<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<script type="text/javascript">
            $(".chosen-select").chosen({});
          $(".chosen-container").bind('keyup',function(e) {
         if(e.which === 13) {
        $('#add_create').submit();
    }
});
            }
 </script>
<br/></br/>
<body class="bg-light container mt-5 p-5">
<div class="container-fluid">
<form class="form-group " method="post" id="add_create" name="add_create" action="<?= site_url('/submit-products') ?>">
<h4 class="text-center position-fixed w-75"><u>Multiple Upload</u></h4>
<div class="form-row p-5 mt-5">
  	<table class="table table-striped bg-light" style='font-family:"Airal", Arial, Arial; font-size:50% table-layout:fixed cellspacing=1 cellpadding=2 width="25%" border="1"' id="inventory-create mt-6">
		<table class="table table-bordered table-responsive-md table-striped text-center ">
        <thead>
          <tr>
          <th class="text-center px-5">Type</th>
            <th class="text-center px-5">Condition</th>
            <th class="text-center px-5">List</th>
            <th class="text-center px-5">Brand</th>
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
           <th class="text-center px-5 d-none">Date_dlvd</th> 
            <th class="text-center px-5">Vendor</th>
            <th class="text-center px-5">Status</th>
            <th class="text-center px-5">Quantity</th>
        </tr>
    </thead>
    
    <tbody>
    	<tr>
      <td>
        <select class="form-select" name="type" >
          <option selected> </option>
          <!-- <option> -->
            <?php foreach($type as $user): ?>
              <option value="<?php echo $user->type; ?>"><?php echo $user->type; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
    		</td>
    		<td>
        <select class="form-select"  name="conditions" >
        <option selected> </option>
          <!-- <option> -->
            <?php foreach($condition as $user): ?>
              <option value="<?php echo $user->conditions; ?>"><?php echo $user->conditions; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
    		</td>
    		<td>
   				  <input type="text" class="form-control w-5" name="list" >
   				 
			</td>
      <td>
   		<select class="form-select"  name="brand" >
        <option selected> </option>
          <!-- <option> -->
            <?php foreach($brand as $user): ?>
              <option value="<?php echo $user->brand; ?>"><?php echo $user->brand; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
   				 
			</td>
    		<td>
        <select class="form-select" name="gen" >
        <option selected></option>
          <!-- <option> -->
            <?php foreach($gen as $user): ?>
              <option value="<?php echo $user->gen; ?>"><?php echo $user->gen; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
    		</td>
        <td>
   				  <input type="text" class="form-control" name="part" >
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="serialno" >
    		</td>
    		<td>
   				  <input type="text" class="form-control" name="modelid" >
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="model" >
    		</td>
    		<td>
        <select class="form-select" name="cpu" >
        <option selected></option>
          <!-- <option> -->
            <?php foreach($cpu as $user): ?>
              <option value="<?php echo $user->cpu; ?>"><?php echo $user->cpu; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
    		</td>
        <td>
        <select class="form-select" name="speed" >
        <option selected></option>
          <!-- <option> -->
            <?php foreach($speed as $user): ?>
              <option value="<?php echo $user->speed; ?>"><?php echo $user->speed; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
   				 
			</td>
    		<td>
        <select class="form-select" name="ram" >
        <option selected></option>
          <!-- <option> -->
            <?php foreach($ram as $user): ?>
              <option value="<?php echo $user->ram; ?>"><?php echo $user->ram; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
    		</td>
    		<td>
        <select class="form-select" name="hdd" >
        <option selected></option>
          <!-- <option> -->
            <?php foreach($hdd as $user): ?>
              <option value="<?php echo $user->hdd; ?>"><?php echo $user->hdd; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
   				 
			</td>
    		<td>
        <select class="form-select"  name="screen" >
        <option selected></option>
          <!-- <option> -->
            <?php foreach($screen as $user): ?>
              <option value="<?php echo $user->screen; ?>"><?php echo $user->screen; ?></option>
            <?php endforeach; ?>
          <!-- </option> -->
        </select>
    		</td>
    		<td>
        <select class="form-select"  name="odd" >
          <option selected ></option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
    		</td>
        <td>
   				  <input type="text" class="form-control" name="comment" >
   				 
			</td>
      <td>
   				  <input type="text" class="form-control" name="problem" >
   				 
			</td>
    		<td>
    			<input type="number" class="form-control" name="price" >
    		</td>
    		
   				 
			
      
   				  <input type="date" class="form-control d-none" name="datedelivered" >
   				 
			
    		<td>
        <select class="form-select"  name="customer" >
        <option selected></option>
            <?php foreach($customer as $user): ?>
              <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
            <?php endforeach; ?>
        </select>
    		</td>
        <td>
    			<input type="text" class="form-control" name="status" >
    		</td>
        <td>
    			<input type="text" class="form-control" name="qty" required>
    		</td>
    	</tr>
</tbody>
</table>
<div class="form-group mt-3 col-12">
  <button type="submit" id="generateBarcode" name="generateBarcode" class="btn btn-success w-25 form-control position-fixed" value="Generate barcode">Save</button>
</div>
  </div>
</form>

</div>


  <style type="text/css">
.table th:first-child,
.table td:first-child {
  position: sticky;
  left: 0;
  background-color: #ADD8E6;
  color: #373737;
}
.stylehaed{
  background-color: #ADD8E6;
  color: #373737;
  inset-block-start: 0;
  position: sticky; 
}

</style>
</body>
</html>