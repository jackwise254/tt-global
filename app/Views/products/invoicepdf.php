<?php
ob_clean();
require_once('fpdf.php');
include_once('Output/connection.php');
// require ('../vendor/autoload.php');
foreach($items as $item){
$_SESSION['fname']=$item->fname;
$_SESSION['invno']=$item->invno;
$_SESSION['user_name']=$item->user_name;
$_SESSION['username']=$item->username;
$_SESSION['phone']=$item->phone;
$_SESSION['id_no']=$item->id_no;
$_SESSION['invoice']=$item->invoice;
$_SESSION['location']=$item->location;
$_SESSION['random']=$item->random;
$_SESSION['ref']=$item->random;
$_SESSION['description']=$item->description;
$_SESSION['unitprice']=$item->unitprice;
$_SESSION['qty']=$item->qty;
$_SESSION['total']=$item->total;
$_SESSION['type']=$item->type;
$_SESSION['date']=date("Y/m/d");

$fname = $item->fname;
$user_name = $item->user_name;
$random = $item->random;
$username = $item->username;
$invno = $item->invno;
$invoice = $item->invoice;
$lname = $item->lname;
$phone = $item->phone;
$email = $item->email;
$id_no = $item->id_no;
$address = $item->location;
$date = $item->date;
$ref = $_SESSION['random'];
$dates = date("d/m/Y");

}

class PDF extends FPDF
{
    
// Page header
function Header()
{
    $this->SetFont('Arial','B',16);
    $this->Cell(7);
    $currentdate = date("d-m-Y");
    $number = 'I-'.$_SESSION['invno'];
    
     //Title
     $this->Cell(180,16,'PROFOMA INVOICE',10,0,'C');
     $this->Ln(16);
    $this->SetFont('Arial','',10);
     $this->Cell(40,6,'Customer : '.$_SESSION['username'],10,0,'L');
     $this->Cell(150,6,'Invoice no : '.$number,10,1,'R');
     $this->Cell(40,6,'Address : '.$_SESSION['location'],10,0,'L');
     $this->Cell(150,6,'Date : '.$currentdate,10,1,'R');
     $this->Cell(40,6,'ID no : '.$_SESSION['id_no'],10,1,'L');
     $this->Cell(40,6,'Contact : '.$_SESSION['phone'],10,1,'L');
     //  $this->Ln(10);
    $this->Cell(110);
      $this->Ln(10);
     
}

// }
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-60);
    // Arial italic 8
    $this->Rect(5, 5, 200, 287, 'D'); 

    $this->SetFont('Arial','I',8);
    $this->Cell(140,6,'1. GOODS REMAIN OUR PROPERTY UNTIL FULLY PAID FOR' ,0,0,'L'); 
    $this->Cell(10,6, 'DELIVERED TO:',0,1,'C');
    // $this->Ln(6);
    $this->Cell(140,6,'2. PAYMENT TERMS ARE STRICTLY WITHIN 30 DAYS FROM THE DAY OF INVOICE',0,0,'L');
    $this->Cell(10,6, 'NAME: __________________________',0,1,'C');
    // $this->Ln(6);

    $this->Cell(140,6,'3. TERMS AND CONDITIONS APPLY AS PER DETAIL AGREEMENT ' ,0,0,'L');
    $this->Cell(10,6, 'TEL: ___________________________',0,1,'C' );
    // $this->Ln(6);

    $this->Cell(140,6,'4. GOODS ARE UNDER ONE MONTH WARRANTY FROM DATE OF PURCHASE' ,0,0,'L');
    $this->Cell(10,6, 'ID: ____________________________',0,1,'C');
    $this->Cell(140,6,'5. GOODS ONCE SOLD CANNOT BE RETURNED OR EXCHANGED ',0,0,'L');
    $this->Cell(10,12, 'Sign: ____________________________',0,1,'C');

    $this->Cell(180,6,'THANK YOU FOR BUSINESS ',0,1,'C');

    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$with_cell = array(10,20,30,40,50,60, 60, 100, 140, 150, 190, );
$pdf->SetFont('Times','',8);
// $pdf->SetFillColor(193,229,252);
$pdf->SetFillColor(192,192,192);
$pdf->Cell($with_cell[0],7,'No.',1,0,'C',true);
$pdf->Cell($with_cell[6],7,'Description',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Type',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Qty',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Unit Price',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Total',1,1,'C',true);





// $pdf->Cell($with_cell[3],7,'Rate',1,0,'C',true);
// $pdf->Cell($with_cell[4],7,'Amount',1,1,'C',true);


$pdf->SetFont('Times','',8);
$pdf->SetFillColor(193,229,252);
$totalqty = 0;
$Gtotal = 0;
$count = 0;
$number = 0;

 foreach ($items as $v):
    $number = $number + 1;
    if ($number > 19){
        $number = 0;
        $pdf->AddPage();
$pdf->SetFont('Times','',8);
// $pdf->SetFillColor(193,229,252);
$pdf->SetFillColor(192,192,192);
$pdf->Cell($with_cell[0],7,'No.',1,0,'C',true);
$pdf->Cell($with_cell[6],7,'Description',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Type',1,0,'C',true);
$pdf->Cell($with_cell[1],7,'Qty',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Unit Price',1,0,'C',true);
$pdf->Cell($with_cell[2],7,'Total',1,1,'C',true);

$pdf->SetFont('Times','',8);
$pdf->SetFillColor(193,229,252);
$pdf->Rect(5, 5, 200, 287, 'D'); 


    }
$count  += 1;
$pdf->Cell($with_cell[0],7,$count,1,0,'L');
$pdf->Cell($with_cell[6],7,$v->description ,1,0,'L');
$pdf->Cell($with_cell[2],7,$v->type ,1,0,'L');
$pdf->Cell($with_cell[1],7,$v->qty,1,0,'L');
$pdf->Cell($with_cell[2],7,number_format($v->unitprice) ,1,0,'L');
$pdf->Cell($with_cell[2],7,number_format($v->total) ,1,1,'L');
$totalqty = $totalqty + $v->qty;
$Gtotal = $Gtotal + $v->total;


endforeach;

//one line
$pdf->Cell($with_cell[0],7,'' ,1,0,'L');
$pdf->Cell($with_cell[6],7,'' ,1,0,'L');
$pdf->Cell($with_cell[2],7,'' ,1,0,'L');
$pdf->Cell($with_cell[1],7,'',1,0,'L');
$pdf->Cell($with_cell[2],7,'' ,1,0,'L');
$pdf->Cell($with_cell[2],7,'' ,1,1,'L');

$pdf->SetFont('Times','B',8);
$pdf->Cell($with_cell[7],10,'Total Qty : ',1,0,'L');
$pdf->Cell($with_cell[1],10,number_format($totalqty) ,1,0,'L');
$pdf->Cell($with_cell[2],10,'Total Amount : ',1,0,'L');
$pdf->Cell($with_cell[2],10,number_format($Gtotal) ,1,1,'L');
$pdf->Cell($with_cell[0],10,'',0,1,'L');


// &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 



// $pdf->Cell($with_cell[0],10,'Checked by:  _____________________________________',0,0,'L');
// $pdf->Cell($with_cell[0],10,'Checked by:  _____________________________________',0,0,'L');
// $pdf->Cell($with_cell[0],10,'Checked by:  _____________________________________',0,0,'L');


// $pdf->Cell($with_cell[0],10,'Checked by:  _____________________________________',0,0,'L');
// $pdf->Cell(200,10,'Recieved by: ______________________________________ ',10,1,'C');

// $pdf->Cell(200,10, 'Id number:   ______________________________________',0,1,'C');
// $pdf->Cell($with_cell[0],10,'Vehicle no:  ______________________________________',0,1,'L');


// $pdf->Output();
// $rand = uniqid();


$idd = $_SESSION['invno'];
$namepdf = $username.$idd. '.pdf';
$pdf->Output('uploads/delvdocuments/' .$namepdf, "F");



$db = new dbObj();
$connString =  $db->getConnstring();
date_default_timezone_set("Africa/Nairobi");
$date = date("Y/m/d");
$link = mysqli_connect("localhost", "root", "", "users");
// $link = mysqli_connect("localhost", "localhost", "ttglobal123", "users");

$sql = "INSERT INTO `invoicecreate` (username,fname, lname, id_no, location,  phone, email, date, ref, document , user_name, invno, invoice, random) 
VALUES ('$username','$fname', '$lname', '$id_no',' $address', '$phone', '$email','$date','$ref',  '$namepdf', '$user_name', '$invno', '$invoice', '$random')";


$results = mysqli_query($link, $sql);

mysqli_close($link);

$filename = "uploads/delvdocuments/".$ref.".pdf";
$redirect1 = site_url('invoice-page');
header('Location: '.$redirect1);

exit();

?>

