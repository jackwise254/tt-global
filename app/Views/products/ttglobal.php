<?php
ob_clean();
require_once('fpdf.php');
include_once('Output/connection.php');
require_once APPPATH . "Config/Database.php";
//SQL to get 10 records
// $patient_Id = $presc->Patient_Id;
// include_once("connection.php");
// $count="select * from prescription WHERE Patient_Id = $patient_Id LIMIT 0,50";
// $count1="select * from documents WHERE patient_id = $patient_Id LIMIT 0,50";
foreach($items as $patient) {
    
$_SESSION['bname'] = $patient['assetid'];
$_SESSION['bage'] = $patient['assetid'];
$_SESSION['bsex'] = $patient['assetid'];
$_SESSION['bpresc'] = $patient['assetid'];
$_SESSION['bidn'] = $patient['assetid'];
$_SESSION['blocation'] = $patient['assetid'];
$_SESSION['btime'] = $patient['assetid'];
$_SESSION['bdays'] = $patient['assetid'];
$_SESSION['hosnum'] = $patient['assetid'];



//  print_r($count);

// foreach ($dbo->query($count1) as $row) {
// $idn -> $row['id_no'];
// $loc -> $row['location'];
// $time -> $row['time'];
// $days -> $row['days'];
}

class PDF extends FPDF
{
// Page header
function Header()
{
    //$this->Image('assets/img/cpl-logo.jpg',10,5,30);
    $this->SetFont('Arial','B',13);
    $this->SetTextColor(153,0,153);
    $this->SetFillColor(230,230,0);
    $this->Cell(60);
    $this->Cell(70,5,'',0,0,'C');
    // $this->Image('../public/images/bar1.jpg',80,20,0);
    // $this->Image('../public/images/bar3.jpg',50,0,0);
    $this->SetFont('Arial','',10);
    $this->Cell(60);
    $this->Cell(-245,16,'',0,0,'C');
    $this->SetFont('Times','',11);
    $this->Cell(60);
    $this->Cell(0.1,18,'LOGO               '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,28,'Serial NO. '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,38,'767676767 '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,48,'Product NO. '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,58,'767676767 '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,68,'Processor: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,78,'Processor Speed: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,88,'Memory: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,98,'Hard Drive: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,108,'ODD: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,118,'Screen Size: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,128,'Color: '.$_SESSION['bname'],0,0,'L');
    $this->Cell(0.1,138,'Made in China ',0,0,'L');
    
    
    $this->Cell(180,16,'',0,0,'C');
    $this->Cell(-0.1,18,'',0,0,'R');
    $this->Cell(-0.1,28,'',0,0,'R');
    $this->Cell(-0.1,38,'',0,0,'R');
    $this->Cell(-0.1,48,'',0,0,'R');
    $this->Ln(20);
    $this->Cell(01);
    $this->Cell(70,15,'',0,0,'C');
    $this->Ln(20);
    // $this->Cell(0);
    // $this->Cell(-194,28,'NAME:_______________________________________',0,0,'C');
    // $this->Cell(20);
    // $this->Cell(0);
    // $this->Cell(-194,28,$_SESSION['bname'],0,0,'C');
    // // $this->Cell(-204,28,'Name'.$name->Name,0,0,'C');
    // print_r($name->Name);
    // $this->Cell(20);
    // $this->Ln(20);
    // $this->Cell(0);
    // $this->Cell(-298,24,'D:O:B: '.$_SESSION['bage'],0,0,'C');
    // $this->Cell(20);
    // $this->Cell(0);
    // $this->Cell(-70,24,'Sex: '.$_SESSION['bsex'],0,0,'C');
    // $this->Cell(20);
    $this->Cell(0);
    $this->SetFont('Arial','B',13);
    $this->Cell(-190,24,'',0,0,'C');
    $this->Ln(20);
    $this->Cell(0);
    $this->SetFont('Arial','',10);
    $this->Cell(-190,24,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-80,24,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-190,48,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-290,48,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-190,48,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-60,48,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-190,72,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-190,96,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(-190,96,'',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    $this->Cell(0);
    // $this->Cell(-190,120,'Cause of death as per the patient history is _______________________________ ',0,0,'C');
    $this->Cell(20);
    $this->Cell(0);
    // $this->Cell(-190,144,'or a possibility of _______________________________ and _________________________________.',0,0,'C');
    $this->Ln(20);
    //$this->Image('assets/images/logo.jpeg',1,86,50);
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
        // $this->Image('../public/images/logo2.jpeg',80,269,50);
        // Page number
        $this->Cell(0,10,"",0,0,'C');
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
// $pdf->Cell($width_cell1[0],10,'No',1,0,'C',true);
//Second header column//
// $pdf->Cell($width_cell2[4],10,'Medicine',1,0,'C',true);
//Third header column//
// $pdf->Cell($width_cell3[2],10,'Dose',1,0,'C',true); 
//Fourth header column//
// $pdf->Cell($width_cell4[3],10,'Times',1,0,'C',true);
//Third header column//
// $pdf->Cell($width_cell5[1],10,'Days',1,1,'C',true); 
// foreach ($dbo->query($count1) as $row) {
// $pdf->Cell($width_cell1[0],10,$row['id_no'],1,0,'C',$fill);
// $pdf->Cell($width_cell2[4],10,$row['id_no'],1,0,'C',$fill);
// $pdf->Cell($width_cell3[2],10,$row['location'],1,0,'C',$fill);
// $pdf->Cell($width_cell4[3],10,$row['time'],1,0,'C',$fill);
// $pdf->Cell($width_cell5[1],10,$row['days'],1,1,'C',$fill);
// //to give alternate background fill  color to rows//
// $fill = !$fill;
// }
// foreach ($dbo->query($count) as $row) {
// // $pdf->Cell($width_cell1[0],10,$row['prescription_id'],1,0,'C',$fill);
// $pdf->Cell($width_cell2[4],10,$row['medicine'],1,0,'C',$fill);
// $pdf->Cell($width_cell3[2],10,$row['dose'],1,0,'C',$fill);
// $pdf->Cell($width_cell4[3],10,$row['times'],1,0,'C',$fill);
// $pdf->Cell($width_cell5[1],10,$row['days'],1,1,'C',$fill);
// //to give alternate background fill  color to rows//
// $fill = !$fill;
// }
ob_clean();
ob_start(); 

$rand = uniqid();

$idd = $_SESSION['bname'];
$namepdf = $idd.$rand. '.pdf';
$pdf->Output('uploads/documents/' .$namepdf, "F");


$db = new dbObj();
$connString =  $db->getConnstring();
date_default_timezone_set("Africa/Nairobi");
$date = date("Y/m/d");

$link = mysqli_connect("localhost", "hra2517_users", "APTechKenya", "hra2517_hradatabase");

$sql = "INSERT INTO `otherdocs` (hospitalnum, date, document, type) 
VALUES ('$idd', '$date', '$namepdf', 'Sick-Off Letter')";

$results = mysqli_query($link, $sql);

mysqli_close($link);

$redirect = base_url('system/documents/'. $idd);
header('Location: '.$redirect);


exit();

?>


<?php if ($pager) :?>
       <?php $pagi_path='dev1/public/inventory-view'; ?>
         <?php $pager->setPath($pagi_path); ?>
          <?= $pager->links() ?>
          <?php endif ?> 