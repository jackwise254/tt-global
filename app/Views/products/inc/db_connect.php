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

$get_Imac = "SELECT * FROM masterlist where type = 'Imac' AND conditions ='New'";
$run_Imac = mysqli_query($con, $get_Imac);
$count_NImacs = mysqli_num_rows($run_Imac);

$get_UImac = "SELECT * FROM masterlist where type = 'Imac' AND conditions ='Used'";
$run_UImac = mysqli_query($con, $get_UImac);
$count_UImacs = mysqli_num_rows($run_UImac);

$get_RImac = "SELECT * FROM masterlist where type = 'Imac' AND conditions ='Refurb'";
$run_RImac = mysqli_query($con, $get_RImac);
$count_RImacs = mysqli_num_rows($run_RImac);

// servers
$get_Nserver = "SELECT * FROM masterlist where type = 'Server' AND conditions ='New'";
$run_Nserver = mysqli_query($con, $get_Nserver);
$count_Nserver = mysqli_num_rows($run_Nserver);

$get_Userver = "SELECT * FROM masterlist where type = 'Server' AND conditions ='Used'";
$run_Userver = mysqli_query($con, $get_Userver);
$count_Userver = mysqli_num_rows($run_Userver);

$get_Rserver = "SELECT * FROM masterlist where type = 'Server' AND conditions ='Refurb'";
$run_Rserver = mysqli_query($con, $get_Rserver);
$count_Rserver = mysqli_num_rows($run_Rserver);
// //servers

// Workstations
$get_Nworkstation = "SELECT * FROM masterlist where type = 'Workstation' AND conditions ='New'";
$run_Nworkstation = mysqli_query($con, $get_Nworkstation);
$count_Nworkstation = mysqli_num_rows($run_Nworkstation);

$get_Uworkstation = "SELECT * FROM masterlist where type = 'Workstation' AND conditions ='Used'";
$run_Uworkstation = mysqli_query($con, $get_Uworkstation);
$count_Uworkstation = mysqli_num_rows($run_Uworkstation);

$get_Rworkstation = "SELECT * FROM masterlist where type = 'Workstation' AND conditions ='Refurb'";
$run_Rworkstation = mysqli_query($con, $get_Rworkstation);
$count_Rworkstation = mysqli_num_rows($run_Rworkstation);
// //Workstations

// Macbooks
$get_Nmacbook = "SELECT * FROM masterlist where type = 'Macbook' AND conditions ='New'";
$run_Nmacbook = mysqli_query($con, $get_Nmacbook);
$count_Nmacbook = mysqli_num_rows($run_Nmacbook);

$get_Umacbook = "SELECT * FROM masterlist where type = 'Macbook' AND conditions ='Used'";
$run_Umacbook = mysqli_query($con, $get_Umacbook);
$count_Umacbook = mysqli_num_rows($run_Umacbook);

$get_Rmacbook = "SELECT * FROM masterlist where type = 'Macbook' AND conditions ='Refurb'";
$run_Rmacbook = mysqli_query($con, $get_Rmacbook);
$count_Rmacbook = mysqli_num_rows($run_Rmacbook);
// //Macbooks




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
$count_nlcdw = mysqli_num_rows($run_nlcdw);

$get_whdd = "SELECT * FROM warrantyin where type = 'hdd'";
$run_hdd = mysqli_query($con, $get_whdd);
$count_whdd = mysqli_num_rows($run_hdd);

$get_smartphones = "SELECT * FROM warrantyin where type = 'smartphone'";
$run_smartphones = mysqli_query($con, $get_smartphones);
$count_smartphones = mysqli_num_rows($run_smartphones);


$get_Imacw = "SELECT * FROM warrantyin where type = 'Imac' AND conditions ='New'";
$run_Imacw = mysqli_query($con, $get_Imacw);
$count_NImacsw = mysqli_num_rows($run_Imacw);

$get_UImacw = "SELECT * FROM warrantyin where type = 'Imac' AND conditions ='Used'";
$run_UImacw = mysqli_query($con, $get_UImacw);
$count_UImacsw = mysqli_num_rows($run_UImacw);

$get_RImacw = "SELECT * FROM warrantyin where type = 'Imac' AND conditions ='Refurb'";
$run_RImacw = mysqli_query($con, $get_RImacw);
$count_RImacsw = mysqli_num_rows($run_RImacw);

// servers
$get_Nserverw = "SELECT * FROM warrantyin where type = 'Server' AND conditions ='New'";
$run_Nserverw = mysqli_query($con, $get_Nserverw);
$count_Nserverw = mysqli_num_rows($run_Nserverw);

$get_Userverw = "SELECT * FROM warrantyin where type = 'Server' AND conditions ='Used'";
$run_Userverw = mysqli_query($con, $get_Userverw);
$count_Userverw = mysqli_num_rows($run_Userverw);

$get_Rserverw = "SELECT * FROM warrantyin where type = 'Server' AND conditions ='Refurb'";
$run_Rserverw = mysqli_query($con, $get_Rserverw);
$count_Rserverw = mysqli_num_rows($run_Rserverw);
// //servers

// Workstations
$get_Nworkstationw = "SELECT * FROM warrantyin where type = 'Workstation' AND conditions ='New'";
$run_Nworkstationw = mysqli_query($con, $get_Nworkstation);
$count_Nworkstationw = mysqli_num_rows($run_Nworkstationw);

$get_Uworkstationw = "SELECT * FROM warrantyin where type = 'Workstation' AND conditions ='Used'";
$run_Uworkstationw = mysqli_query($con, $get_Uworkstationw);
$count_Uworkstationw = mysqli_num_rows($run_Uworkstationw);

$get_Rworkstationw = "SELECT * FROM warrantyin where type = 'Workstation' AND conditions ='Refurb'";
$run_Rworkstationw = mysqli_query($con, $get_Rworkstationw);
$count_Rworkstationw = mysqli_num_rows($run_Rworkstationw);
// //Workstations

// Macbooks
$get_Nmacbookw = "SELECT * FROM warrantyin where type = 'Macbook' AND conditions ='New'";
$run_Nmacbookw = mysqli_query($con, $get_Nmacbookw);
$count_Nmacbookw = mysqli_num_rows($run_Nmacbookw);

$get_Umacbookw = "SELECT * FROM warrantyin where type = 'Macbook' AND conditions ='Used'";
$run_Umacbookw = mysqli_query($con, $get_Umacbookw);
$count_Umacbookw = mysqli_num_rows($run_Umacbookw);

$get_Rmacbookw = "SELECT * FROM warrantyin where type = 'Macbook' AND conditions ='Refurb'";
$run_Rmacbookw = mysqli_query($con, $get_Rmacbookw);
$count_Rmacbookw = mysqli_num_rows($run_Rmacbookw);
// //Macbooks


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
