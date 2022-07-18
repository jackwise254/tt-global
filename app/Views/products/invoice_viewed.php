<?php
ob_clean();
require_once('fpdf.php');
include_once('Output/connection.php');
foreach($items as $item){
$_SESSION['name']=$item->vendor;
$_SESSION['address']=$item->address;
$_SESSION['date']=$item->date;
$_SESSION['ref']=$item->ref;
$_SESSION['conditions']=$item->conditions;
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

$vendor = $item->vendor;
$address = $item->address;
$date = $item->date;
$ref = $item->ref;

}

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // $this->Image('assets/images/logo.jpeg',10,6,20);
    // Arial bold 15
    $this->SetFont('Arial','',11);
    // Move to the right
    $this->Cell(7);
    // Title
    // $this->Cell(30,10,'Motosouk Limited',10,0,'C');
    // $this->Cell(27);
    
    $this->Cell(110);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(57.5,10,'Date : '.date("d-m-Y",$_SESSION['date']),10,0,'C');
    $this->Ln(4);
    // $this->Cell(287.5,10,'type : '.$_SESSION['type'],10,0,'C');
    $this->Cell(312.5,10,'Company NAME : TT GLOBAL',10,0,'C');
    $this->Ln(4);
    $this->Cell(312.5,10,'Company KRA : P051954703H',10,0,'C');
    $this->Ln(4);
    $this->Cell(312.5,10,'Account Number : 1279865660',10,0,'C');
    $this->Ln(4);
    $this->Cell(278.5,10,'Bank : KCB',10,0,'C');
    $this->Ln(4);
    $this->Cell(304.5,10,'Invoice No. : '.$_SESSION['assetid'],10,0,'C');
    $this->Ln(4);
    //$this->Cell(9);
    // $this->Cell(70,16,'Customer : '.$vendor,10,0,'C');
    $this->Ln(15);
    // $this->Cell(70,16,'name : '.$_SESSION['vendor'],10,0,'L');
    $this->Ln(4);
    $this->Cell(70,16,'address : '.$_SESSION['address'],10,0,'L');
    $this->Ln(20);
    // $this->Cell(70,16,'Promotion : '.$_SESSION['promo'],10,0,'L');
    $this->Ln(10);
    $this->Cell(70,16,'ref : '.$_SESSION['ref'],10,0,'L');
    $this->Ln(4);
    $this->Cell(70,16,'assetid : '.$_SESSION['assetid'],10,0,'L');
    $this->Ln(4);
    // $this->Cell(70,16,'Color : '.$_SESSION['color'],10,0,'L');
    $this->Ln(20);
    // Line break
    $this->Cell(70);
    // $this->Cell(50,10,'Cash Sale',1,0,'C');
    $this->Ln(7);
     
}

// }
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$with_cell = array(60,50,20,20,30,10);
$pdf->SetFont('Times','',12);
// $pdf->SetFillColor(193,229,252);
$pdf->SetFillColor(192,192,192);
$pdf->Cell($with_cell[0],7,'Type',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Condition',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Qty',1,0,'C',true);
// $pdf->Cell($with_cell[3],7,'Rate',1,0,'C',true);
// $pdf->Cell($with_cell[4],7,'Amount',1,1,'C',true);


$pdf->SetFont('Times','',12);
$pdf->SetFillColor(193,229,252);

 foreach ($items as $v):
$pdf->Cell($with_cell[0],10,$v->type ,1,0,'L');
$pdf->MultiCell($with_cell[0],25,$v->conditions,1,'L',0);
$pdf->Cell($with_cell[1],10,$v->date ,1,0,'L');
$pdf->Cell($with_cell[2],10,$v->qty ,1,0,'L');
// $pdf->Cell($with_cell[3],10,number_format($v[''],2) ,1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format($v['rate'],2),1,1,'C');
// $pdf->Cell($with_cell[5],10,$v['gross_amount']/1.16*0.16,1,1,'C');

$pdf->Cell($with_cell[0],10,'',0,0,'C');
$pdf->Cell($with_cell[1],10,'',0,0,'L');
$pdf->Cell($with_cell[2],10,'',0,0,'L');
// $pdf->Cell($with_cell[3],10,'Net :',1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format(($v['total']-1580)/1.16,2),1,1,'C');

$pdf->Cell($with_cell[0],10,'',0,0,'C');
$pdf->Cell($with_cell[1],10,'',0,0,'L');
$pdf->Cell($with_cell[2],10,'',0,0,'L');
// $pdf->Cell($with_cell[3],10,'Vat:',1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format(($v['total']-1580)/1.16*0.16,2),1,1,'C');

$pdf->Cell($with_cell[0],10,'',0,0,'C');
$pdf->Cell($with_cell[1],10,'',0,0,'L');
$pdf->Cell($with_cell[2],10,'',0,0,'L');
// $pdf->Cell($with_cell[3],10,'Subtotal:',1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format($v['total']-1580,2),1,1,'C');

$pdf->Cell($with_cell[0],10,'',0,0,'C');
$pdf->Cell($with_cell[1],10,'',0,0,'L');
$pdf->Cell($with_cell[2],10,'',0,0,'L');
// $pdf->Cell($with_cell[3],10,'Logbook:*',1,0,'C');
// $pdf->Cell($with_cell[4],10,'1580.00',1,1,'C');

$pdf->Cell($with_cell[0],10,'',0,0,'C');
$pdf->Cell($with_cell[1],10,'',0,0,'L');
$pdf->Cell($with_cell[2],10,'',0,0,'L');
// $pdf->Cell($with_cell[3],10,'Gross:',1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format($v['total'],2),1,1,'C');

$pdf->Cell($with_cell[0],10,'* Kindly note the Logbook amount is a reimbursement.',0,0,'L');

endforeach;




// $pdf->Output();
// $rand = uniqid();

$idd = $_SESSION['random'];
$namepdf = $idd. '.pdf';
$pdf->Output('uploads/delvdocuments/' .$namepdf, "F");



$db = new dbObj();
$connString =  $db->getConnstring();
date_default_timezone_set("Africa/Nairobi");
$date = date("Y/m/d");
$link = mysqli_connect("localhost", "root", "", "users");
// $link = mysqli_connect("localhost", "localhost", "ttglobal123", "users");

$sql = "INSERT INTO `invoicecreate` (vendor, address, date, ref, document) 
VALUES ('$vendor', '$address', '$date','$ref', '$namepdf')";

$results = mysqli_query($link, $sql);

mysqli_close($link);

$redirect = site_url('delivery-create');
header('Location: '.$redirect);


exit();

?>

