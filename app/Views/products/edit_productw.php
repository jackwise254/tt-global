<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<body class="bg-light container mt-5 p-5">

    <form method="post" id="update_user" name="update_user" 
     action="<?= base_url('ProductsCrud/updatew') ?>">


     <input type="hidden" name="id" id="id" value="<?php echo $user_obj[0]['id']; ?>">
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
            <th class="text-center px-5">Daterecieved</th>
            <th class="text-center px-5">Comment</th>
            <th class="text-center px-5">Problem</th>
            <th class="text-center px-5">Price</th>
            <th class="text-center px-5">Customer</th>
            <th class="text-center px-5">Status</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
   				<input type="text" class="form-control w-5 d-none" name="assetid" value="<?php echo $user_obj[0]['assetid']; ?>">
    		<td>
        <select class="form-select"  name="conditions" >
        <option selected value="<?php echo $user_obj[0]['conditions']; ?>"> <?php echo $user_obj[0]['conditions']; ?></option>

          <?php foreach($condition as $c):?>
          <option value="<?php echo $c->conditions; ?>"> <?php echo $c->conditions; ?></option>
          <?php endforeach;?>
        </select>
    		</td>
    		<td>
   				  <input type="text" class="form-control w-5" name="list" value="<?php echo $user_obj[0]['list']; ?>">
   				 
			</td>
      <td>
        <select class="form-select"  name="brand" >
        <option selected value="<?php echo $user_obj[0]['brand']; ?>"> <?php echo $user_obj[0]['brand']; ?></option>

          <?php foreach($brand as $b):?>
          <option value="<?php echo $b->brand; ?>"> <?php echo $b->brand; ?></option>
          <?php endforeach;?>
        </select>
   				 
			</td>
    		<td>
        <select class="form-select" name="type" >
          <option selected value="<?php echo $user_obj[0]['type']; ?>"><?php echo $user_obj[0]['type']; ?></option>
          <?php foreach($type as $t):?>
          <option value="<?php echo $t->type; ?>"> <?php echo $t->type; ?></option>
          <?php endforeach;?>
        </select>
    		</td>
    		<td>
        <select class="form-select" name="gen" >
          <option selected value="<?php echo $user_obj[0]['gen']; ?>"><?php echo $user_obj[0]['gen']; ?></option>
          <?php foreach($gen as $g):?>
          <option value="<?php echo $g->gen; ?>"> <?php echo $g->gen; ?></option>
          <?php endforeach;?>
        </select>
    		</td>
        <td>
   				  <input type="text" class="form-control" name="part" value="<?php echo $user_obj[0]['part']; ?>">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="serialno" value="<?php echo $user_obj[0]['serialno']; ?>">
    		</td>
    		<td>
   				  <input type="text" class="form-control" name="modelid" value="<?php echo $user_obj[0]['modelid']; ?>">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="model" value="<?php echo $user_obj[0]['model']; ?>">
    		</td>
    		<td>
          <select class="form-select" name="cpu" >
         <option selected value="<?php echo $user_obj[0]['cpu']; ?>"> <?php echo $user_obj[0]['cpu']; ?></option>

          <?php foreach($cpu as $cp):?>
          <option value="<?php echo $cp->cpu; ?>"> <?php echo $cp->cpu; ?></option>
          <?php endforeach;?>
        </select>
    		</td>
        <td>
         <select class="form-select" name="speed">
         <option selected value="<?php echo $user_obj[0]['speed']; ?>"> <?php echo $user_obj[0]['speed']; ?></option>
          <?php foreach($speed as $s):?>
          <option value="<?php echo $s->speed; ?>"> <?php echo $s->speed; ?></option>
          <?php endforeach;?>
        </select>
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="ram" value="<?php echo $user_obj[0]['ram']; ?>">
    		</td>
    		<td>
   				  <input type="text" class="form-control" name="hdd" value="<?php echo $user_obj[0]['hdd']; ?>">
   				 
			</td>
    		<td>
        <select class="form-select"  name="screen">
          <option selected value="<?php echo $user_obj[0]['screen']; ?>"><?php echo $user_obj[0]['screen']; ?> </option>
          <?php foreach($screen as $sc):?>
          <option value="<?php echo $sc->screen; ?>"> <?php echo $sc->screen; ?></option>
          <?php endforeach;?>
        </select>
    		</td>
    		<td>
        <select class="form-select"  name="odd">
          <option selected value="<?php echo $user_obj[0]['odd']; ?>"> <?php echo $user_obj[0]['odd']; ?> </option>
          <option value="yes">No</option>
          <option value="no">Yes</option>
        </select>
    		</td>
        <td>
   				  <input type="text" class="form-control" name="daterecieved" value="<?php echo $user_obj[0]['daterecieved']; ?>">
			</td>
        <td>
   				  <input type="text" class="form-control" name="comment" value="<?php echo $user_obj[0]['comment']; ?>">
   				 
			</td>
      <td>
   				  <input type="text" class="form-control" name="problem" value="<?php echo $user_obj[0]['problem']; ?>">
   				 
			</td>
    		<td>
    			<input type="number" class="form-control" name="price" value="<?php echo $user_obj[0]['price']; ?>">
    		</td>
    	
    		<td>
        <select class="form-select"  name="customer" >
          <option selected value="<?php echo $user_obj[0]['customer']; ?>"> <?php echo $user_obj[0]['customer']; ?> </option>
          <?php foreach($customer as $cu):?>
          <option value="<?php echo $cu->username; ?>"> <?php echo $cu->username; ?></option>
          <?php endforeach;?>
        </select>
    		</td>
        <td>
    			<input type="text" class="form-control" name="status" value="<?php echo $user_obj[0]['status']; ?>">
</tbody>
</table>
<div class="form-group mt-3 col-12">
  <button type="submit" id="generateBarcode" name="generateBarcode" class="btn btn-success w-25 form-control position-fixed" >Update Data</button>
</div>
  </div>
</form>

</div>