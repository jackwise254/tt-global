<?php
	$conn = new PDO("mysql:host=localhost;dbname=users", 'root', '');
?>
<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php
$get_hdd = "SELECT * FROM masterlist where type = 'laptop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nlaptop = mysqli_num_rows($run_hdd);

// $get_hdd = "SELECT * FROM masterlist where type = 'laptop' AND conditions ='New'";
// $run_hdd = mysqli_query($con, $get_hdd);
// $count_Nlaptop = mysqli_num_rows($run_hdd);


//  $conc = $c['conditions'].' '.$l['type']; 


$get_hdd = "SELECT * FROM masterlist where type = 'laptop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Olaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'laptop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rlaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'desktop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Ndesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'desktop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Odesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'desktop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rdesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'AllInOne' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'AllInOne' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Oallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'AllInOne' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rallinone = mysqli_num_rows($run_hdd);

$get_lcd = "SELECT * FROM masterlist where type = 'Lcd' AND conditions ='New'";
$run_lcd = mysqli_query($con, $get_lcd);
$count_Nlcd = mysqli_num_rows($run_lcd);

$get_Rlcd = "SELECT * FROM masterlist where type = 'Lcd' AND conditions ='Refurb'";
$run_Rlcd = mysqli_query($con, $get_Rlcd);
$count_Rlcd = mysqli_num_rows($run_Rlcd);

$get_Ulcd = "SELECT * FROM masterlist where type = 'Lcd' AND conditions ='Used'";
$run_Ulcd = mysqli_query($con, $get_Ulcd);
$count_Ulcd = mysqli_num_rows($run_Ulcd);

$get_hdd = "SELECT * FROM masterlist where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_hdd = mysqli_num_rows($run_hdd);

$get_smartphonesm = "SELECT * FROM masterlist where type = 'smartphone'";
$run_smartphonesm = mysqli_query($con, $get_smartphonesm);
$count_smartphonesm = mysqli_num_rows($run_smartphonesm);

$get_Tablem = "SELECT * FROM masterlist where type = 'Tablets'";
$run_Tablem = mysqli_query($con, $get_Tablem);
$count_Tablem = mysqli_num_rows($run_Tablem);

$get_Othersm= "SELECT * FROM masterlist where type = 'Others'";
$run_Othersm = mysqli_query($con, $get_Othersm);
$count_Othersm = mysqli_num_rows($run_Othersm);

$get_hdd = "SELECT * FROM masterlist where type = 'ssd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ssd = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'printers'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_printer = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM masterlist where type = 'ram'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ram = mysqli_num_rows($run_hdd);
$get_products = "SELECT * FROM masterlist";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);


$get_products = "SELECT * FROM faulty";
$run_products = mysqli_query($con,$get_products);
$count_productsf = mysqli_num_rows($run_products);

$get_products = "SELECT * FROM faultyout";
$run_products = mysqli_query($con,$get_products);
$count_productsfo = mysqli_num_rows($run_products);

$get_products = "SELECT * FROM stockout";
$run_products = mysqli_query($con,$get_products);
$count_productso = mysqli_num_rows($run_products);


$get_products = "SELECT * FROM warrantyout";
$run_products = mysqli_query($con,$get_products);
$count_productswo = mysqli_num_rows($run_products);

$get_product = "SELECT * FROM tempinsert";
$run_product = mysqli_query($con,$get_product);
$count_produ = mysqli_num_rows($run_product);


//warranty in operations
$get_product = "SELECT * FROM warrantyin";
$run_product = mysqli_query($con,$get_product);
$count_warrantys = mysqli_num_rows($run_product);

$get_product = "SELECT * FROM tcredit";
$run_product = mysqli_query($con,$get_product);
$count_tcredit= mysqli_num_rows($run_product);

$get_product = "SELECT * FROM tfaultyout";
$run_product = mysqli_query($con,$get_product);
$count_fouts= mysqli_num_rows($run_product);

$get_product = "SELECT * FROM tdebit";
$run_product = mysqli_query($con,$get_product);
$count_tdebit= mysqli_num_rows($run_product);

$get_product = "SELECT * FROM tinvoicecreate";
$run_product = mysqli_query($con,$get_product);
$count_invoice = mysqli_num_rows($run_product);


$get_product = "SELECT * FROM warrantyi";
$run_product = mysqli_query($con,$get_product);
$count_wnote = mysqli_num_rows($run_product);
// 
// 
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

$get_ulcdw = "SELECT * FROM warrantyin where type = 'Lcd' AND conditions ='Used'";
$run_ulcdw = mysqli_query($con, $get_ulcdw);
$count_ulcdw = mysqli_num_rows($run_ulcdw);

$get_rlcdw = "SELECT * FROM warrantyin where type = 'Lcd' AND conditions ='Refurb'";
$run_rlcdw = mysqli_query($con, $get_rlcdw);
$count_rlcdw = mysqli_num_rows($run_rlcdw);

$get_nlcdw = "SELECT * FROM warrantyin where type = 'Lcd' AND conditions ='New'";
$run_nlcdw = mysqli_query($con, $get_nlcdw);
$count_nlcdw = mysqli_num_rows($run_whdd);

$get_whdd = "SELECT * FROM warrantyin where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_whdd = mysqli_num_rows($run_hdd);

$get_smartphones = "SELECT * FROM warrantyin where type = 'smartphones'";
$run_smartphones = mysqli_query($con, $get_smartphones);
$count_smartphones = mysqli_num_rows($run_smartphones);





$get_tablet = "SELECT * FROM warrantyin where type = 'tablet'";
$run_tablet = mysqli_query($con, $get_tablet);
$count_tablet = mysqli_num_rows($run_tablet);

$get_Others = "SELECT * FROM warrantyin where type = 'Others'";
$run_Others = mysqli_query($con, $get_Others);
$count_Others = mysqli_num_rows($run_Others);

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

$get_product = "SELECT * FROM verify";
$run_product = mysqli_query($con,$get_product);
$count_verify = mysqli_num_rows($run_product);

$get_credit = "SELECT * FROM credit";
$run_credit = mysqli_query($con,$get_credit);
$count_credit = mysqli_num_rows($run_credit);

$get_debit = "SELECT * FROM debit";
$run_debit = mysqli_query($con,$get_debit);
$count_debit = mysqli_num_rows($run_debit);


$get_whdd = "SELECT * FROM warrantyin where status = 'irrepairable'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_ok = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where status = 'wip'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_wip = mysqli_num_rows($run_hdd);

$get_whdd = "SELECT * FROM warrantyin where status = 'fixed'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_fixed = mysqli_num_rows($run_hdd);

?>
