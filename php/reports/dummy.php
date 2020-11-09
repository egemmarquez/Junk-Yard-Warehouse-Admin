<?php 
$_POST[''];
set_time_limit(0);

$construyeconsulta = 'select * from partes where ';
if($generaporid == 'true')
{
$construyeconsulta2 = 'NOT_ID BETWEEN '.$de.' and '.$a.'';

}
else
{

if($seccion == 'all')
{
$construyeconsulta2= '';
}
else
{
$construyeconsulta2= "SEC_ID = $seccion and";	
}
$construyeconsulta3 = "NOT_FECHA BETWEEN '$fechaini 00:00:00' and '$fechafinal 00:00:00' order by NOT_ID desc limit $de,$a";

//End generapor id 
}


$consultafinal = "$construyeconsulta $construyeconsulta2 $construyeconsulta3";

include('php/class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('php/fonts/Helvetica.afm');
include('php/conectarse.php');
error_reporting(0);
$link=Conectarse();
$query = mysql_query($consultafinal,$link);
$cantidad = mysql_num_rows($query);
$i = 2;

while($i <= $cantidad)
{
mysql_data_seek($query, $i);	
$row = mysql_fetch_assoc($query);
$pdf->ezText("ID: ".$row['NOT_ID']."\n",10);
$pdf->ezText("".$row['NOT_TITULO']."",16);
$pdf->ezText("".$row['NOT_FECHA']."\n\n",12);
$pdf->ezImage("../fotos/".$row['NOT_FOTO1']."", 0, 180, "none", "left", 0);
$pdf->ezText("".strip_tags($row['NOT_CONTENIDO'])."",12);
$pdf->ezNewPage();


$i++;
}
$pdf->ezStream();
?>