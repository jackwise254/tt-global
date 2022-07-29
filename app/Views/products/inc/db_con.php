<?php
	$conn = new PDO("mysql:host=localhost;dbname=users", 'root', '');
?>
<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php
$get_hdd = "SELECT * FROM warrantyout where type = 'laptop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nlaptop = mysqli_num_rows($run_hdd);


$get_Imacw = "SELECT * FROM warrantyout where type = 'Imac' AND conditions ='New'";
$run_Imacw = mysqli_query($con, $get_Imacw);
$count_NImacsw = mysqli_num_rows($run_Imacw);

$get_UImacw = "SELECT * FROM warrantyout where type = 'Imac' AND conditions ='Used'";
$run_UImacw = mysqli_query($con, $get_UImacw);
$count_UImacsw = mysqli_num_rows($run_UImacw);

$get_RImacw = "SELECT * FROM warrantyout where type = 'Imac' AND conditions ='Refurb'";
$run_RImacw = mysqli_query($con, $get_RImacw);
$count_RImacsw = mysqli_num_rows($run_RImacw);

// servers
$get_Nserverw = "SELECT * FROM warrantyout where type = 'Server' AND conditions ='New'";
$run_Nserverw = mysqli_query($con, $get_Nserverw);
$count_Nserverw = mysqli_num_rows($run_Nserverw);

$get_Userverw = "SELECT * FROM warrantyout where type = 'Server' AND conditions ='Used'";
$run_Userverw = mysqli_query($con, $get_Userverw);
$count_Userverw = mysqli_num_rows($run_Userverw);

$get_Rserverw = "SELECT * FROM warrantyout where type = 'Server' AND conditions ='Refurb'";
$run_Rserverw = mysqli_query($con, $get_Rserverw);
$count_Rserverw = mysqli_num_rows($run_Rserverw);
// //servers

// Workstations
$get_Nworkstationw = "SELECT * FROM warrantyout where type = 'Workstation' AND conditions ='New'";
$run_Nworkstationw = mysqli_query($con, $get_Nworkstationw);
$count_Nworkstationw = mysqli_num_rows($run_Nworkstationw);

$get_Uworkstationw = "SELECT * FROM warrantyout where type = 'Workstation' AND conditions ='Used'";
$run_Uworkstationw = mysqli_query($con, $get_Uworkstationw);
$count_Uworkstationw = mysqli_num_rows($run_Uworkstationw);

$get_Rworkstationw = "SELECT * FROM warrantyout where type = 'Workstation' AND conditions ='Refurb'";
$run_Rworkstationw = mysqli_query($con, $get_Rworkstationw);
$count_Rworkstationw = mysqli_num_rows($run_Rworkstationw);
// //Workstations

// Macbooks
$get_Nmacbookw = "SELECT * FROM warrantyout where type = 'Macbook' AND conditions ='New'";
$run_Nmacbookw = mysqli_query($con, $get_Nmacbookw);
$count_Nmacbookw = mysqli_num_rows($run_Nmacbookw);

$get_Umacbookw = "SELECT * FROM warrantyout where type = 'Macbook' AND conditions ='Used'";
$run_Umacbookw = mysqli_query($con, $get_Umacbookw);
$count_Umacbookw = mysqli_num_rows($run_Umacbookw);

$get_Rmacbookw = "SELECT * FROM warrantyout where type = 'Macbook' AND conditions ='Refurb'";
$run_Rmacbookw = mysqli_query($con, $get_Rmacbookw);
$count_Rmacbookw = mysqli_num_rows($run_Rmacbookw);
// //Macbooks



$get_rlcdwo = "SELECT * FROM warrantyout where type = 'Lcd' AND conditions ='Refurb'";
$run_rlcdwo = mysqli_query($con, $get_rlcdwo);
$count_rlcdwo = mysqli_num_rows($run_rlcdwo);

$get_ulcdwo = "SELECT * FROM warrantyout where type = 'Lcd' AND conditions ='Used'";
$run_ulcdwo = mysqli_query($con, $get_ulcdwo);
$count_ulcdwo = mysqli_num_rows($run_ulcdwo);

$get_nlcdwo = "SELECT * FROM warrantyout where type = 'Lcd' AND conditions ='New'";
$run_nlcdwo = mysqli_query($con, $get_nlcdwo);
$count_nlcdwo = mysqli_num_rows($run_nlcdwo);

$get_hdd = "SELECT * FROM warrantyout where type = 'laptop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Olaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'laptop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rlaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'desktop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Ndesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'desktop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Odesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'desktop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rdesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'allinone' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'allinone' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Oallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'allinone' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_hdd = mysqli_num_rows($run_hdd);

$get_smartphones = "SELECT * FROM warrantyout where type = 'smartphones'";
$run_smartphones = mysqli_query($con, $get_smartphones);
$count_smartphones = mysqli_num_rows($run_smartphones);

$get_Tablet = "SELECT * FROM warrantyout where type = 'Tablet'";
$run_Tablet = mysqli_query($con, $get_Tablet);
$count_Tablet = mysqli_num_rows($run_Tablet);

$get_Others = "SELECT * FROM warrantyout where type = 'Others'";
$run_Others = mysqli_query($con, $get_Others);
$count_Others = mysqli_num_rows($run_Others);

$get_hdd = "SELECT * FROM warrantyout where type = 'ssd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ssd = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'printer'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_printer = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM warrantyout where type = 'ram'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ram = mysqli_num_rows($run_hdd);
$get_products = "SELECT * FROM warrantyout";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_product = "SELECT * FROM warrantyout";
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


$get_credit = "SELECT * FROM credit";
$run_credit = mysqli_query($con,$get_credit);
$count_credit = mysqli_num_rows($run_credit);
?>
