<?php
error_reporting(E_ALL);
include('../sqlfunctions/conectarse.php');
set_time_limit(0);
//error_reporting(E_ALL);
error_reporting(0);
new conexion;

//variables
$IDPost = $_POST['ID'];
$IDGet = $_GET['ID'];
$letras = array("-", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
if($IDPost == '')
{
$idfinal = $IDGet;	
}
else
{
	$idfinal = $IDPost;
}


//consulta
$consulta = "select * from partes where PAR_ID = $idfinal and PAR_VENDIDO = 0";

//obtenemos datos mediante triangulacion
function dime($ID,$quecosa,$tabla,$quevalor)
{
$consulta = "SELECT $quecosa from $tabla where $quevalor = $ID";
$query= mysql_query($consulta);
while($row = mysql_fetch_array($query))
{
$resulta = ' '.$row[''.$quecosa.''].' ';
}
return $resulta;
}

//Barcode
$bar_color=Array(0,0,0);
$bg_color=Array(255,255,255);
$text_color=Array(0,0,0);
$font_loc="../system/FreeSansBold.ttf";
require("../system/Barcode.php");

$fontSize = 10;
  $marge    = 6;   // between barcode and hri in pixel
  $x        = 60;  // barcode center
  $y        = 70;  // barcode center
  $height   = 20;   // barcode height in 1D ; module size in 2D
  $width    = .8;    // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
  
  $code     = $idfinal; // barcode, of course ;)
  $type     = 'code128';
  $black    = '000000'; // color in hexa
  


//Inicia creacion del PDF
include('../../pdf/fpdf.php');
$pdf=new FPDF('P','mm',array(120,140));
$pdf-> SetMargins(1,1);
$pdf->AddPage();

$data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
$query = mysql_query($consulta);
$cantidad = mysql_num_rows($query);


$i = 0;

 $pdf->SetFont('Arial','B',20);
    // Move to the right

    // Title
    $pdf->Cell(50,40,'Registro Pieza',0,0,'C');
	$pdf->SetFont('Arial','B',8);

    // Line break

$pdf->Ln(25);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,7,'ID',1);
$pdf->Cell(50,7,'NOMBRE',1);
$pdf->Cell(33,7,'AGREGADO',1);
$pdf->Cell(25,7,'POR',1);
$pdf->Ln();

mysql_data_seek($query, $i);	
$row = mysql_fetch_assoc($query);

$pdf->Cell(10,7,''.$row['PAR_ID'].'',1);
$pdf->Cell(50,7,''.dime($row['PI_ID'],"PI_NOMBRE","partes_catalogo","PI_ID").'',1);
$pdf->Cell(33,7,''.$row['PAR_FECHA_AG'].'',1);

$pdf->Cell(25,7,''.$row['PAR_USUARIO_REG'].'',1);
$pdf->Ln();

if($row['AUT_ID'] == '0') {
$pdf->Cell(118,7,'LOCALIZACION ',1);
$pdf->Ln();
$pdf->Cell(118,7,'A '.dime($row['ALM_ID_FW'],"ALM_NOMBRE","almacen","ALM_ID").'- R '.$letras[''.$row['RAC_ID_FW'].''].' - C '.$row['RAC_CAMPO_FW'].' - P '.$row['RAC_PISOS_FW'].' ',1);
}
else
{
$pdf->Cell(100,7,'En auto con ID: '.$row['AUT_ID'].' ',1);	
}

$data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

$pdf->Ln(45);
$pdf->SetFont('Arial','B',8);

$pdf->Cell(30,7,'NOMBRE',1);
$pdf->Cell(23,7,'AGREGADO',1);
$pdf->Cell(15,7,'POR',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(30,7,''.dime($row['PI_ID'],"PI_NOMBRE","partes_catalogo","PI_ID").'',1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(23,7,''.$row['PAR_FECHA_AG'].'',1);
$pdf->Cell(15,7,''.$row['PAR_USUARIO_REG'].'',1);
$pdf->Ln();
$data = Barcode::fpdf($pdf, $black, 95, 99, $angle, $type, array('code'=>$code), .7, 19);
$pdf->Ln();



$pdf->Output();
?>