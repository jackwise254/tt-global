<?php
include_once("inc/db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['id'])) {
		$update_field.= "id='".$input['id']."'";
	} else if(isset($input['conditions'])) {
		$update_field.= "conditions='".$input['conditions']."'";
	}else if(isset($input['type'])) {
		$update_field.= "type='".$input['type']."'";
	} else if(isset($input['assetid'])) {
		$update_field.= "assetid='".$input['assetid']."'";
	} else if(isset($input['gen'])) {
		$update_field.= "gen='".$input['gen']."'";
	} else if(isset($input['ram'])) {
		$update_field.= "ram='".$input['ram']."'";
	}else if(isset($input['screen'])) {
		$update_field.= "screen='".$input['screen']."'";
	}else if(isset($input['odd'])) {
		$update_field.= "odd='".$input['odd']."'";
	}else if(isset($input['comment'])) {
		$update_field.= "comment='".$input['comment']."'";
	}else if(isset($input['part'])) {
		$update_field.= "part='".$input['part']."'";
	}else if(isset($input[' status'])) {
		$update_field.= " status='".$input[' status']."'";
	}else if(isset($input['qty'])) {
		$update_field.= "qty='".$input['qty']."'";
	}else if(isset($input['serialno'])) {
		$update_field.= "serialno='".$input['serialno']."'";
	}else if(isset($input['modelid'])) {
		$update_field.= "modelid='".$input['modelid']."'";
	}else if(isset($input['cpu'])) {
		$update_field.= "cpu='".$input['cpu']."'";
	}else if(isset($input['hdd'])) {
		$update_field.= "hdd='".$input['hdd']."'";
	}else if(isset($input['speed'])) {
		$update_field.= "speed='".$input['speed']."'";
	}else if(isset($input['price'])) {
		$update_field.= "price='".$input['price']."'";
	}else if(isset($input['list'])) {
		$update_field.= "list='".$input['list']."'";
	}	

	if($update_field && $input['id']) {
		$sql_query = "UPDATE masterlist SET $update_field WHERE id='" . $input['id'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}

