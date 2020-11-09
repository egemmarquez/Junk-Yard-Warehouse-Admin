
<?php
include('../sqlfunctions/conectarse.php');
set_time_limit(0);
//error_reporting(E_ALL);
error_reporting(0);
new conexion;

//variables
$de = $_POST['PAR_FECHA_VE'];
$a = $_POST['PAR_FECHA_VE2'];
//consulta
$consulta = "select * from partes where PAR_FECHA_VE BETWEEN '$de' and '$a'";

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

//Inicia creacion del PDF
include('../../pdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();


$query = mysql_query($consulta);
$cantidad = mysql_num_rows($query);


$i = 0;

 $pdf->SetFont('Arial','B',20);
    // Move to the right

    // Title
    $pdf->Cell(0,10,'Inventario de Ventas de piezas en Yonke',0,0,'C');
    // Line break
    $pdf->Ln(20);

$pdf->SetFont('Arial','B',12);
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,7,'ID',1);
$pdf->Cell(70,7,'NOMBRE',1);
$pdf->Cell(30,7,'PRECIO',1);
$pdf->Cell(30,7,'VENDIDO',1);
$pdf->Cell(30,7,'POR',1);
$pdf->Ln();
while($i <= $cantidad-1)
{
mysql_data_seek($query, $i);	
$row = mysql_fetch_assoc($query);

$pdf->Cell(20,7,''.$row['PAR_ID'].'',1);
$pdf->Cell(70,7,''.dime($row['PI_ID'],"PI_NOMBRE","partes_catalogo","PI_ID").'',1);
$pdf->Cell(30,7,'$'.$row['PAR_PRECIO'].'',1);
$pdf->Cell(30,7,''.$row['PAR_FECHA_VE'].'',1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,7,''.$row['PAR_USUARIO_VEN'].'',1);
$pdf->Ln();
//$pdf->ezImage("../fotos/".$row['NOT_FOTO1']."", 0, 180, "none", "left", 0);
$i++;
}
$pdf->Output();
?>