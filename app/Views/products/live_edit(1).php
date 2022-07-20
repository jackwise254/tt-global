<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
$update_field='';
if(isset($input['conditions'])) {
$update_field.= "conditions='".$input['conditions']."'";
} else if(isset($input['type'])) {
$update_field.= "type='".$input['type']."'";
} else if(isset($input['screen'])) {
$update_field.= "screen='".$input['screen']."'";
} else if(isset($input['age'])) {
$update_field.= "age='".$input['age']."'";
} else if(isset($input['hdd'])) {
$update_field.= "hdd='".$input['hdd']."'";
}else if(isset($input['ram'])) {
$update_field.= "ram='".$input['ram']."'";
}else if(isset($input['price'])) {
$update_field.= "price='".$input['price']."'";
}else if(isset($input['qty'])) {
$update_field.= "qty='".$input['qty']."'";
}else if(isset($input['total'])) {
$update_field.= "total='".$input['total']."'";
}
if($update_field && $input['id']) {
$sql_query = "UPDATE masterlist SET $update_field WHERE id='" . $input['id'] . "'";
mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
}
}
?>