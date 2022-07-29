<?php
ob_clean();
require_once('fpdf.php');
include_once('Output/connection.php');
// require ('../vendor/autoload.php');
foreach($items as $item){
$_SESSION['customer']=$item->customer;
$_SESSION['fname']=$item->fname;
$_SESSION['username']=$item->username;
$_SESSION['phone']=$item->phone;
$_SESSION['location']=$item->location;


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
$_SESSION['problem']=$item->comment;
$_SESSION['total']=$item->list;
$_SESSION['random']=$item->del;
$_SESSION['daterecieved']=$item->daterecieved;
// $_SESSION['qty']=$item->qty;
$_SESSION['tqty']=$item->tqty;
$_SESSION['assetid']=$item->assetid;

$customer = $item->customer;
$random = $item->del;



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
    $this->SetFont('Arial','',14);
    // Move to the right
    $this->Cell(7);
     //Title
     $this->Cell(180,16,'Job Card',10,0,'C');
     $this->Ln(10);
    $this->SetFont('Arial','',11);
     $this->Cell(40,16,'Customer : '.$_SESSION['customer'],10,0,'L');
    $this->Cell(140,16,'Date: '.$currentdate,10,0,'R');
     $this->Ln(10);
     $this->Cell(40,16,'Address : '.$_SESSION['location'],10,0,'L');
    $this->Cell(140,16,'Reference: '.$_SESSION['ref'],10,0,'R');
     $this->Ln(10);
     $this->Cell(40,16,'Contact : '.$_SESSION['phone'],10,0,'L');
     $this->Ln(10);
     $this->Cell(27);
    
    $this->Cell(110);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(57.5,10,'Date : '.date("d-m-Y",$_SESSION['date']),10,0,'C');
    // $this->Ln(4);
    // $this->Cell(287.5,10,'type : '.$_SESSION['type'],10,0,'C');
    // $this->Cell(312,10,'Company : TT GLOBAL Limited',10,0,'C');
    // $this->Ln(10);
    // $this->Cell(312,10,'Company KRA : P051954703H',10,0,'C');
    // $this->Ln(10);
    // $this->Cell(312,10,'Account Number : 1279865660',10,0,'C');
    // $this->Ln(10);
    // $this->Cell(278,10,'Bank : KCB',10,0,'C');
    // $this->Ln(10);
    // $this->Cell(294,10,'Invoice No. : '.$_SESSION['assetid'],10,0,'C');
    // $this->Ln(10);
    // $this->Cell(9);
    // $this->Cell(70,16,'Customer : '.$vendor,10,0,'C');
    // $this->Ln(15);
    // // $this->Cell(70,16,'name : '.$_SESSION['vendor'],10,0,'L');
    // $this->Ln(4);
    // $this->Cell(70,16,'address : '.$_SESSION['address'],10,0,'L');
    // $this->Ln(20);
    // // $this->Cell(70,16,'Promotion : '.$_SESSION['promo'],10,0,'L');
    // $this->Ln(10);
    // $this->Cell(70,16,'ref : '.$_SESSION['ref'],10,0,'L');
    // $this->Ln(4);
    // // $this->Cell(70,16,'Color : '.$_SESSION['color'],10,0,'L');
    // $this->Ln(20);
    // // Line break
    $this->Cell(70);
    // $this->Cell(50,10,'Cash Sale',1,0,'C');
    $this->Ln(7);
     
}

// }
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-35);
    // Arial italic 8
    $this->SetFont('Arial','I',8);

    $this->Cell(140,6,'Checked by:  ___________________________________________',0,0,'L');
    $this->Cell(10,6,'Recieved by: ____________________________________________',0,1,'C');
    $this->Cell(140,6,'Delivered by:___________________________________________',0,0,'L');
    $this->Cell(10,6,'Vehicle no:  ____________________________________________',0,1,'C');
    $this->Cell(140,6,'Id number:   ____________________________________________',0,1,'L');
    $this->Rect(5, 5, 200, 287, 'D'); //For A4
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$with_cell = array(10,20,30,40,50,180);
$pdf->SetFont('Times','',8);
// $pdf->SetFillColor(193,229,252);
$pdf->SetFillColor(192,192,192);
$pdf->Cell($with_cell[1],7,'Type',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Brand',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Gen',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Model',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Cpu',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Ram',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Hdd',1,0,'C',true);
$pdf->Cell($with_cell[3],7,'Problem',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Comment',1,0,'C',true);
$pdf->Cell($with_cell[0],7,'Qty',1,1,'C',true);
// $pdf->Cell($with_cell[3],7,'Rate',1,0,'C',true);
// $pdf->Cell($with_cell[4],7,'Amount',1,1,'C',true);


$pdf->SetFont('Times','',8);
$pdf->SetFillColor(193,229,252);
$totalqty = 0;

 foreach ($items as $v):
$pdf->Cell($with_cell[1],7,$v->type ,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->brand,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->gen ,1,0,'L');
$pdf->Cell($with_cell[2],7,$v->model ,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->cpu ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->ram ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->hdd ,1,0,'L');
$pdf->Cell($with_cell[3],7,$v->problem ,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->comment ,1,0,'L');
$pdf->Cell($with_cell[0],7,$v->tqty ,1,1,'L');
$totalqty = $totalqty + $v->tqty;
// $pdf->Cell($with_cell[3],10,number_format($v[''],2) ,1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format($v['rate'],2),1,1,'C');
// $pdf->Cell($with_cell[5],10,$v['gross_amount']/1.16*0.16,1,1,'C');

// $pdf->Cell($with_cell[0],10,'',0,0,'C');
// $pdf->Cell($with_cell[1],10,'',0,0,'L');
// $pdf->Cell($with_cell[2],10,'',0,0,'L');
// $pdf->Cell($with_cell[3],10,'Net :',1,0,'C');
// $pdf->Cell($with_cell[4],10,number_format(($v['total']-1580)/1.16,2),1,1,'C');

endforeach;

$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[2],7,'',1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[3],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,1,'L');




//one line
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[2],7,'',1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[3],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,1,'L');

$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[2],7,'',1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[3],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,1,'L');


$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[2],7,'',1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'',1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[3],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'' ,1,0,'L');
$pdf->Cell($with_cell[0],7,'' ,1,1,'L');


$pdf->Cell($with_cell[5],10,'Total Qty : ',1,0,'L');
$pdf->Cell($with_cell[0],10,$totalqty ,1,1,'L');
$pdf->Cell($with_cell[0],10,'',0,1,'L');



// $pdf->Output();
// $rand = uniqid();

$idd = $random;
// $idd = 'ref';
$ref = $random;

$namepdf = $idd. '.pdf';
$pdf->Output('uploads/jobcdocuments/' .$namepdf, "F");



$db = new dbObj();
$connString =  $db->getConnstring();
date_default_timezone_set("Africa/Nairobi");
$date = date("Y/m/d");
$link = mysqli_connect("localhost", "root", "", "users");
// $link = mysqli_connect("localhost", "localhost", "ttglobal123", "users");

$sql = "INSERT INTO `jobcard` (customer,  ref, document) 
VALUES ('$customer','$ref', '$namepdf')";

$results = mysqli_query($link, $sql);

mysqli_close($link);

$redirect = site_url('job-create');
header('Location: '.$redirect);


exit();

?>

