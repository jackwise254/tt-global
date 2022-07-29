<?php
	$conn = new PDO("mysql:host=localhost;dbname=users", 'root', '');
?>
<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php
$get_nlcds = "SELECT * FROM stockout where type = 'Lcd' AND conditions ='New'";
$run_nlcds = mysqli_query($con, $get_nlcds);
$count_nlcds = mysqli_num_rows($run_nlcds);

$get_rlcds = "SELECT * FROM stockout where type = 'Lcd' AND conditions ='Refurb'";
$run_rlcds = mysqli_query($con, $get_rlcds);
$count_rlcds = mysqli_num_rows($run_rlcds);

$get_ulcds = "SELECT * FROM stockout where type = 'Lcd' AND conditions ='Used'";
$run_ulcds = mysqli_query($con, $get_ulcds);
$count_ulcds = mysqli_num_rows($run_ulcds);


$get_Imac = "SELECT * FROM stockout where type = 'Imac' AND conditions ='New'";
$run_Imac = mysqli_query($con, $get_Imac);
$count_NImacso = mysqli_num_rows($run_Imac);

$get_UImac = "SELECT * FROM stockout where type = 'Imac' AND conditions ='Used'";
$run_UImac = mysqli_query($con, $get_UImac);
$count_UImacso = mysqli_num_rows($run_UImac);

$get_RImac = "SELECT * FROM stockout where type = 'Imac' AND conditions ='Refurb'";
$run_RImac = mysqli_query($con, $get_RImac);
$count_RImacso = mysqli_num_rows($run_RImac);

// servers
$get_Nserver = "SELECT * FROM stockout where type = 'Server' AND conditions ='New'";
$run_Nserver = mysqli_query($con, $get_Nserver);
$count_Nserverso = mysqli_num_rows($run_Nserver);

$get_Userver = "SELECT * FROM stockout where type = 'Server' AND conditions ='Used'";
$run_Userver = mysqli_query($con, $get_Userver);
$count_Userverso = mysqli_num_rows($run_Userver);

$get_Rserver = "SELECT * FROM stockout where type = 'Server' AND conditions ='Refurb'";
$run_Rserver = mysqli_query($con, $get_Rserver);
$count_Rserverso = mysqli_num_rows($run_Rserver);
// //servers

// Workstations
$get_Nworkstation = "SELECT * FROM stockout where type = 'Workstation' AND conditions ='New'";
$run_Nworkstation = mysqli_query($con, $get_Nworkstation);
$count_Nworkstationso = mysqli_num_rows($run_Nworkstation);

$get_Uworkstation = "SELECT * FROM stockout where type = 'Workstation' AND conditions ='Used'";
$run_Uworkstation = mysqli_query($con, $get_Uworkstation);
$count_Uworkstationso = mysqli_num_rows($run_Uworkstation);

$get_Rworkstation = "SELECT * FROM stockout where type = 'Workstation' AND conditions ='Refurb'";
$run_Rworkstation = mysqli_query($con, $get_Rworkstation);
$count_Rworkstationso = mysqli_num_rows($run_Rworkstation);
// //Workstations

// Macbooks
$get_Nmacbook = "SELECT * FROM stockout where type = 'Macbook' AND conditions ='New'";
$run_Nmacbook = mysqli_query($con, $get_Nmacbook);
$count_Nmacbookso = mysqli_num_rows($run_Nmacbook);

$get_Umacbook = "SELECT * FROM stockout where type = 'Macbook' AND conditions ='Used'";
$run_Umacbook = mysqli_query($con, $get_Umacbook);
$count_Umacbookso = mysqli_num_rows($run_Umacbook);

$get_Rmacbook = "SELECT * FROM stockout where type = 'Macbook' AND conditions ='Refurb'";
$run_Rmacbook = mysqli_query($con, $get_Rmacbook);
$count_Rmacbookso = mysqli_num_rows($run_Rmacbook);
// //Macbooks

$get_hdd = "SELECT * FROM stockout where type = 'laptop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nlaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'laptop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Olaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'laptop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rlaptop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'desktop' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Ndesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'desktop' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Odesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'desktop' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rdesktop = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'allinone' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Nallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'allinone' AND conditions ='Old'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Oallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'allinone' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_Rallinone = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_hdd = mysqli_num_rows($run_hdd);

$get_smartphone = "SELECT * FROM stockout where type = 'smartphone'";
$run_smartphone = mysqli_query($con, $get_smartphone);
$count_smartphone = mysqli_num_rows($run_smartphone);

$get_tablets = "SELECT * FROM stockout where type = 'tablets'";
$run_tablets = mysqli_query($con, $get_tablets);
$count_tablets = mysqli_num_rows($run_tablets);


$get_others = "SELECT * FROM stockout where type = 'others'";
$run_others = mysqli_query($con, $get_others);
$count_others = mysqli_num_rows($run_others);

$get_hdd = "SELECT * FROM stockout where type = 'ssd'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ssd = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'printer'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_printer = mysqli_num_rows($run_hdd);

$get_hdd = "SELECT * FROM stockout where type = 'ram'";
$run_hdd = mysqli_query($con, $get_hdd);
$count_ram = mysqli_num_rows($run_hdd);
$get_products = "SELECT * FROM stockout";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_product = "SELECT * FROM stockout";
$run_product = mysqli_query($con,$get_product);
$count_produ = mysqli_num_rows($run_product);

$get_debit = "SELECT * FROM debit";
$run_debit = mysqli_query($con,$get_debit);
$count_debit = mysqli_num_rows($run_debit);

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
?>
