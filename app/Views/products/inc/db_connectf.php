<?php
	$conn = new PDO("mysql:host=localhost;dbname=users", 'root', '');
?>
<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php
$get_hdd = "SELECT * FROM faultyout where type = 'laptop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nlaptop = mysqli_num_rows($run_hdd);

$get_ulcdfo = "SELECT * FROM faultyout where type = 'Lcd' AND conditions ='Used'";
$run_ulcdfo = mysqli_query($con, $get_ulcdfo);
$count_ulcdfo = mysqli_num_rows($run_ulcdfo);

$get_rlcdfo = "SELECT * FROM faultyout where type = 'Lcd' AND conditions ='Refurb'";
$run_rlcdfo = mysqli_query($con, $get_rlcdfo);
$count_rlcdfo = mysqli_num_rows($run_rlcdfo);

$get_nlcdfo = "SELECT * FROM faultyout where type = 'Lcd' AND conditions ='New'";
$run_nlcdfo = mysqli_query($con, $get_nlcdfo);
$count_nlcdfo = mysqli_num_rows($run_nlcdfo);

$get_hdd = "SELECT * FROM faultyout where type = 'laptop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Olaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'laptop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rlaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'desktop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Ndesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'desktop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Odesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'desktop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rdesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'allinone' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'allinone' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Oallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'allinone' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_hdd = mysqli_num_rows($run_hdd);

$get_smartphones = "SELECT * FROM faultyout where type = 'smartphones'";
$run_smartphones = mysqli_query($con, $get_smartphones);
$count_smartphones = mysqli_num_rows($run_smartphones);

$get_Tablet = "SELECT * FROM faultyout where type = 'Tablet'";
$run_Tablet = mysqli_query($con, $get_Tablet);
$count_Tablet = mysqli_num_rows($run_Tablet);

$get_Others = "SELECT * FROM faultyout where type = 'Others'";
$run_Others = mysqli_query($con, $get_Others);
$count_Others = mysqli_num_rows($run_Others);

$get_hdd = "SELECT * FROM faultyout where type = 'ssd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ssd = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'printer'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_printer = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM faultyout where type = 'ram'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ram = mysqli_num_rows($run_hdd);
$get_products = "SELECT * FROM faultyout";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_product = "SELECT * FROM tempinsert";
$run_product = mysqli_query($con,$get_product);
$count_produ = mysqli_num_rows($run_product);


//warranty in operations
$get_whdd = "SELECT * FROM warrantyin where type = 'laptop' AND conditions ='New'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wNlaptop = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'laptop' AND conditions ='Used'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wOlaptop = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'laptop' AND conditions ='Refurb'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wRlaptop = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'desktop' AND conditions ='New'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wNdesktop = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'desktop' AND conditions ='Used'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wOdesktop = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'desktop' AND conditions ='Refurb'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wRdesktop = mysqli_num_rows($run_whdd);

$run_whdd = "SELECT * FROM warrantyin where type = 'allinone' AND conditions ='New'";
$run_hdd = mysqli_query($con, $run_whdd);
$count_wNallinone = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'allinone' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_wOallinone = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'allinone' AND conditions ='Refurb'";
$run_whdd = mysqli_query($con, $get_whdd);
$count_wRallinone = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_whdd = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'ssd'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_wssd = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'printer'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_wprinter = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'ram'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_wram = mysqli_num_rows($run_hdd);
$get_products = "SELECT * FROM warrantyin";
$run_products = mysqli_query($con,$get_products);
$count_wproducts = mysqli_num_rows($run_products);

$get_product = "SELECT * FROM tempinsert";
$run_product = mysqli_query($con,$get_product);
$count_produ = mysqli_num_rows($run_product);

$get_credit = "SELECT * FROM credit";
$run_credit = mysqli_query($con,$get_credit);
$count_credit = mysqli_num_rows($run_credit);

$get_debit = "SELECT * FROM debit";
$run_debit = mysqli_query($con,$get_debit);
$count_debit = mysqli_num_rows($run_debit);

?>
