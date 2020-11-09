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
$consulta = "select * from partes where PAR_ID = $idfinal and PAR_VENDIDO = 1";

//obtenemos datos mediante triangulacion
function dime($ID,$quecosa,$tabla,$quevalor)
{
$consulta = 'SELECT '.$quecosa.' from '.$tabla.' where '.$quevalor.' = "'.$ID.'"';

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
  $x        = 170;  // barcode center
  $y        = 240;  // barcode center
  $height   = 20;   // barcode height in 1D ; module size in 2D
  $width    = .8;    // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
  
  $code     = $idfinal; // barcode, of course ;)
  $type     = 'code128';
  $black    = '000000'; // color in hexa
  


//Inicia creacion del PDF


$query = mysql_query($consulta);
$row = mysql_fetch_assoc($query);

include('../../pdf/fpdf.php');
$pdf=new FPDF();

$pdf->AddPage();

$data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);


$i = 0;

 $pdf->SetFont('Arial','B',20);

    // Title
    $pdf->Cell(50,40,'Venta de Pieza',0,0,'C');
		$pdf->SetFont('Arial','B',12);
	$pdf->Ln(27);
$pdf->Cell(50,7,'AUTOPARTES: ',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'DIRECCION: AQUI DEBE IR LA DIRECCION',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'TELEFONO: DATOS DEL TELEFONO',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'RFC Y OTROS DATOS:',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'VENDIDO POR: '.dime($row['PAR_USUARIO_VEN'],"nombre","users","username").'',0,0);


    // Line break


$pdf->Ln(25);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,7,'PIEZA: '.dime($row['PI_ID'],"PI_NOMBRE","partes_catalogo","PI_ID").'',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'MARCA: '.dime($row['PAR_MARCA'],"MAR_NOMBRE","marcas","MAR_CLAVE").'',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'MODELO: '.dime($row['PAR_MODELO'],"MOD_NOMBRE","modelos","MOD_CLAVE").'',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'YEAR: '.$row['PAR_ANO'].' / '.$row['PAR_VENDIDO'].'',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'COLOR: '.dime($row['PAR_COLOR'],"COL_NOMBRE","colores","COL_ASCII").'',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'PRECIO: $'.$row['PAR_PRECIO'].'',0,0);
$pdf->Ln();
$pdf->Cell(50,7,'CLIENTE: '.$row['PAR_CLIENTE'].'',0,0);

$pdf->Ln(115);
$pdf->Cell(50,7,'____________________________________',0,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(50,7,'Cliente: '.$row['PAR_CLIENTE'].'',0,0);

$data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
$pdf->Ln(); $pdf->Ln();
$pdf->Cell(50,7,'Disclaimer y cualquier otra condicion de uso Disclaimer y cualquier otra condicion de uso Disclaimer y cualquier otra condicion de uso ',0,0);
if($row['PAR_VENDIDO'] == '')
{
	echo "OPERACION NO PERMITIDA";
}
else
{
	
$pdf->Output();
}
?>