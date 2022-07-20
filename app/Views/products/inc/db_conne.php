<?php
	$conn = new PDO("mysql:host=localhost;dbname=users", 'root', '');
?>
<?php
$con = mysqli_connect("localhost","root","","users");

?>

<?php
$get_hddf = "SELECT * FROM faulty where type = 'laptop' AND conditions ='New'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_Nlaptopf = mysqli_num_rows($run_hddf);

$get_nlcdf = "SELECT * FROM faulty where type = 'Lcd' AND conditions ='New'";
$run_nlcdf = mysqli_query($con, $get_nlcdf);
$count_nlcdf = mysqli_num_rows($run_nlcdf);

$get_ulcdf = "SELECT * FROM faulty where type = 'Lcd' AND conditions ='Used'";
$run_lcdf = mysqli_query($con, $get_ulcdf);
$count_ulcdf = mysqli_num_rows($run_lcdf);

$get_rlcdf = "SELECT * FROM faulty where type = 'Lcd' AND conditions ='Refurb'";
$run_rlcdf = mysqli_query($con, $get_rlcdf);
$count_rlcdf = mysqli_num_rows($run_rlcdf);


$get_hddf = "SELECT * FROM faulty where type = 'laptop' AND conditions ='Used'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_Olaptopf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'laptop' AND conditions ='Refurb'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_Rlaptopf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'desktop' AND conditions ='New'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_Ndesktopf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'desktop' AND conditions ='Used'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_Odesktopf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'desktop' AND conditions ='Refurb'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_Rdesktopf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'allinone' AND conditions ='New'";
$run_hdd = mysqli_query($con, $get_hddf);
$count_Nallinonef = mysqli_num_rows($run_hdd);

$get_hddf = "SELECT * FROM faulty where type = 'allinone' AND conditions ='Used'";
$run_hdd = mysqli_query($con, $get_hddf);
$count_Oallinonef = mysqli_num_rows($run_hdd);

$get_hddf = "SELECT * FROM faulty where type = 'allinone' AND conditions ='Refurb'";
$run_hdd = mysqli_query($con, $get_hddf);
$count_Rallinonef = mysqli_num_rows($run_hdd);

$get_hddf = "SELECT * FROM faulty where type = 'hdd'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_hddf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'ssd'";
$run_hddf = mysqli_query($con, $get_hddf);
$count_ssdf = mysqli_num_rows($run_hddf);

$get_hddf = "SELECT * FROM faulty where type = 'printer'";
$run_hdd = mysqli_query($con, $get_hddf);
$count_printerf = mysqli_num_rows($run_hdd);

$get_hddf = "SELECT * FROM faulty where type = 'ram'";
$run_hdd = mysqli_query($con, $get_hddf);
$count_ramf = mysqli_num_rows($run_hdd);
$get_products = "SELECT * FROM faulty";
$run_products = mysqli_query($con,$get_products);
$count_productf = mysqli_num_rows($run_products);

$get_product = "SELECT * FROM faulty";
$run_product = mysqli_query($con,$get_product);
$count_produ = mysqli_num_rows($run_product);


$get_credit = "SELECT * FROM credit";
$run_credit = mysqli_query($con,$get_credit);
$count_credit = mysqli_num_rows($run_credit);

$get_debit = "SELECT * FROM debit";
$run_debit = mysqli_query($con,$get_debit);
$count_debit = mysqli_num_rows($run_debit);

?>
