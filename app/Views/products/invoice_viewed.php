<?php
ob_clean();
require_once('fpdf.php');
require_once APPPATH . "Config/Database.php";
//SQL to get 10 records
// $patient_Id = $presc->Patient_Id;
// include_once("Output/connection.php");

// foreach($invoicecreate as $patient) {
$_SESSION['vendor'] = $invoicecreate['vendor'];
$_SESSION['address'] = $invoicecreate['address'];
$_SESSION['memo'] = $invoicecreate['memo'];
$_SESSION['terms'] = $invoicecreate['terms'];
$_SESSION['ref'] = $invoicecreate['ref'];
$_SESSION['address'] = $invoicecreate['address'];
// }

// $db = new dbObj();
// $connString =  $db->getConnstring();
// $result = mysqli_query($connString, "select * from temporaystorage WHERE hospitalnum = $hospitalnum") or die("database error:". mysqli_error($connString));
// $patients2 = mysqli_fetch_array($result);

//$count="select * from temporaystorage WHERE hospitalnum = $hospitalnum";

// print_r($bname);

class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Image('../public/images/logo.jpeg',10,5,30);
    $this->SetFont('Arial','B',13);
    $this->SetTextColor(153,0,153);
    $this->SetFillColor(230,230,0);
    $this->Cell(60);
    $this->Cell(70,5,'TT GLOBAL',0,0,'C');
    $this->Image('../public/images/logo.jpeg',80,20,0);
    $this->SetFont('Arial','',10);
    $this->Cell(60);
    $this->Cell(-245,16,'',0,0,'C');
    $this->SetFont('Times','',11);
    $this->Cell(60);
    $this->Cell(0.1,18,'NIPPON HOLDINGS,',0,0,'L');
    $this->Cell(0.1,28,'623 Wood Avenue Plaza,',0,0,'L');
    $this->Cell(0.1,38,'Along Ngong road Rd.',0,0,'L');
    $this->Cell(0.1,48,'Kilimani Nairobi.',0,0,'L');
    $this->Cell(180,16,'',0,0,'C');
    $this->Cell(-0.1,18,'Mobile: +254(0) 00000000',0,0,'R');
    $this->Cell(-0.1,28,'E-Mail: info@ttglobal.co.ke',0,0,'R');
    $this->Cell(-0.1,38,'Website: www.ttglobal.co.ke',0,0,'R');
    $this->Cell(-0.1,48,'Date: '.date('d/m/y'),0,0,'R');
    $this->Ln(20);
    $this->Cell(01);
    $this->Cell(70,15,'',0,0,'C');
    $this->Ln(20);
    $this->Cell(0);
    $this->Cell(-194,28,'NAME:_______________________________________',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-194,28,$_SESSION['vendor'],0,0,'C');
    // $this->Cell(-204,28,'Name'.$name->Name,0,0,'C');
    print_r($_SESSION['vendor']);
    $this->Cell(20);
    $this->Ln(20);
    $this->Cell(0);
    $this->Cell(-298,24,'memo: '.$_SESSION['memo'],0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-70,24,'Terms: '.$_SESSION['terms'],0,0,'C');
    $this->Cell(-70,24,'Ref No: '.$_SESSION['ref'],0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->SetFont('Arial','B',13);
    $this->Cell(-190,48,'DETAILS',0,0,'C');
    $this->Ln(20);
    $this->Image('../public/images/logo.jpeg',80,269,50);
    $this->Ln(16);
    $this->Cell(20);
    $this->Ln(1);
}

// Page footer
   function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        $this->Image('../public/images/logo.jpeg',80,269,50);
        // Page number
        $this->Cell(0,10,"Managers's signature________________________________________________________________________________",0,0,'C');
    } 
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(153,0,153);
$pdf->SetFont('Times','',12);
$width_cell1=array(10,40,40,40,40);
$width_cell2=array(20,70,40,40,70);
$width_cell3=array(20,40,60,40,40);
$width_cell4=array(20,40,40,30,40);
$width_cell5=array(20,30,40,40,20);
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;
//$pdf->Cell($width_cell1[0],10,'No',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell2[4],10,'Product',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell3[2],10,'Date',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell4[3],10,'Quantity',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell5[1],10,'Amount',1,1,'C',true); 
foreach ($invoicecreate as $d) {
// // $pdf->Cell($width_cell1[0],10,$d->prescription_id,1,0,'C',$fill);
// $pdf->Cell($width_cell2[4],10,$d->invoicecreate,1,0,'C',$fill);
// $pdf->Cell($width_cell3[2],10,$d->invoicecreate,1,0,'C',$fill);
// $pdf->Cell($width_cell4[3],10,$d->invoicecreate,1,0,'C',$fill);
// $pdf->Cell($width_cell5[1],10,$d->invoicecreate,1,1,'C',$fill);
// to give alternate background fill  color to rows

// // echo "<pre>";
// // print_r($row);
// // $saves = $d->session_id;
// // $hospitalnum = $d->hospitalnum;
// // $medicine = $d->medicine;
// // $prescription_id = $d->prescription_id;
// // $date = $d->date;

// // $fill = !$fill;
}


ob_clean();
ob_start();


// $rand = uniqid();

// $idd = $_SESSION['session'];
// $namepdf = $idd.'.pdf';
// $pdf->Output('uploads/invoices/' .$namepdf, "F");
$pdf->Output();

// $db = new dbObj();
// $connString =  $db->getConnstring();
// date_default_timezone_set("Africa/Nairobi");
// $date = date("Y/m/d");

// $link = mysqli_connect("localhost", "hra2517_users", "APTechKenya", "hra2517_hradatabase");
        
// $sql = "INSERT INTO `ivoice` (hospitalnum, date, document) 
// VALUES ('$idd', '$date', '$namepdf')";

// $results = mysqli_query($link, $sql);

// mysqli_close($link);

// $redirect = base_url('system/invoice/'. $idd);
// header('Location: '.$redirect);


exit();
