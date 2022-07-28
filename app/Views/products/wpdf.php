<?php
ob_clean();
require_once('fpdf.php');
include_once('Output/connection.php');
require ('../vendor/autoload.php');
foreach($items as $item){

$_SESSION['fname']=$item->fname;
$_SESSION['user_name']=$item->user_name;
$_SESSION['wnote']=$item->wnote;
$_SESSION['warranty']=$item->warranty;
$_SESSION['username']=$item->username;
$_SESSION['phone']=$item->phone;
$_SESSION['vendor']=$item->lname;
$_SESSION['email']=$item->email;
$_SESSION['location']=$item->location;
$_SESSION['id_no']=$item->id_no;
$_SESSION['date']=$item->date;
$_SESSION['ref']=$item->random;
$_SESSION['Brand']=$item->brand;
$_SESSION['type']=$item->type;
$_SESSION['assetid']=$item->assetid;
$_SESSION['ram']=$item->ram;
$_SESSION['screen']=$item->screen;
$_SESSION['hdd']=$item->hdd;
$_SESSION['odd']=$item->odd;
$_SESSION['status']=$item->status;
$_SESSION['comment']=$item->comment;
$_SESSION['total']=$item->list;
$_SESSION['random']=$item->random;
$_SESSION['daterecieved']=$item->daterecieved;
$_SESSION['qty']=$item->qty;
$_SESSION['tqty']=$item->tqty;
$_SESSION['assetid']=$item->assetid;

$fname = $item->fname;
$warranty = $item->warranty;
$user_name = $item->user_name;
$wnote = $item->wnote;
$username = $item->username;
$lname = $item->lname;
$phone = $item->phone;
$email = $item->email;
$id_no = $item->id_no;
$address = $item->location;
$date = $item->date;
$ref = $_SESSION['random'];

}

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('dist/img/logo.jpeg',10,6,20);
    
    // Arial bold 15



    $currentdate = date("d-m-Y");
    $number = 'W-'.$_SESSION['wnote'];

    $this->SetFont('Arial','',14);
    // Move to the right
    $this->Cell(7);
     //Title
     $this->Cell(180,16,'Warranty Delivery Note',10,0,'C');
     $this->Ln(10);
    $this->SetFont('Arial','',11);
    $this->Cell(40,16,'Customer: '.$_SESSION['username'],10,0,'L'); 
    $this->Cell(140,16,'Date: '.$currentdate,10,0,'R');
    $this->Ln(10);
    $this->Cell(40,16,'Contact: '.$_SESSION['phone'],10,0,'L');
    $this->Cell(140,16,'Warranty No: '.$number,10,0,'R');
    $this->Ln(10);
    $this->Cell(40,16,'Address: '.$_SESSION['location'],10,0,'L');
    $this->Ln(10);
    // $this->Cell(40,16,'Delivery No. : '.$delvno,10,0,'L');
    $this->Ln(10);
      //$this->Cell(40,16,'Reference : ',10,0,'L');
     $this->Ln(10);
     $this->Cell(27);
    
    $this->Cell(110);
    
    $this->Cell(70);
    // $this->Cell(50,10,'Cash Sale',1,0,'C');
    $this->Ln(7);
     
}

// }
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-40);
    // Arial italic 8
    $this->SetFont('Arial','I',8);

    $this->Cell(140,6,'Checked by:  ___________________________________________',0,0,'L');
    $this->Cell(10,6,'Recieved by: ____________________________________________',0,1,'C');
    $this->Cell(140,6,'Delivered by:___________________________________________',0,0,'L');
    $this->Cell(10,6,'Vehicle no:  ____________________________________________',0,1,'C');
    $this->Cell(140,6,'Id number:   ____________________________________________',0,0,'L');
    $this->Cell(10,6,'Phone no:  ____________________________________________',0,1,'C');
    $this->Rect(5, 5, 200, 287, 'D'); //For A4
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$with_cell = array(10,15,20,30,40,50,180);
$pdf->SetFont('Times','',8);
// $pdf->SetFillColor(193,229,252);
$pdf->SetFillColor(192,192,192);
$pdf->Cell($with_cell[1],7,'Type',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Brand',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Gen',1,0,'C',true);
$pdf->Cell($with_cell[3],7,'Model',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Cpu',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Speed',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Ram',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Hdd',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Screen',1,0,'C',true);
$pdf->Cell($with_cell[4],7,'Comment',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Qty',1,1,'C',true);


$pdf->SetFont('Times','',7);
$pdf->SetFillColor(193,229,252);
$totalqty = 0;

 foreach ($items as $v):
$pdf->Cell($with_cell[1],7,$v->type ,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->brand,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->gen ,1,0,'L');
$pdf->Cell($with_cell[3],7,$v->model ,1,0,'L');
$pdf->Cell($with_cell[2],7,$v->cpu ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->speed ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->ram ,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->hdd ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->screen ,1,0,'L');
$pdf->Cell($with_cell[4],7,$v->comment ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->tqty ,1,1,'L');
$totalqty = $totalqty + $v->tqty;

endforeach;

$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[3],7,'',1,0,'L');
$pdf->Cell($with_cell[2],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[4],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,1,'L');

$pdf->Cell($with_cell[6],10,'Total Qty : ',1,0,'L');
$pdf->Cell($with_cell[0],10,$totalqty ,1,1,'L');
$pdf->Cell($with_cell[0],10,'',0,1,'L');


// $pdf->Output();
// $rand = uniqid();

$idd = $_SESSION['random'];
$namepdf = $idd. '.pdf';
$pdf->Output('uploads/warrantydocs/' .$namepdf, "F");
$db = new dbObj();
$connString =  $db->getConnstring();
date_default_timezone_set("Africa/Nairobi");
$date = date("Y/m/d");
$link = mysqli_connect("localhost", "root", "", "users");



$sql = "INSERT INTO `customer3` (username,fname, lname, id_no, location,  phone, email, date, ref, document, wnote ,user_name, warranty) 
VALUES ('$username','$fname', '$lname', '$id_no',' $address', '$phone', '$email','$date','$ref',  '$namepdf', '$wnote', '$user_name', '$warranty')";

$results = mysqli_query($link, $sql);

mysqli_close($link);

$redirect = site_url('warranty-create');
header('Location: '.$redirect);


exit();




?>

