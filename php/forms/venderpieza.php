<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "partes";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "PAR_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php
$vendido = valoreditable("PAR_VENDIDO","partes","PAR_ID");
$eldia = valoreditable("PAR_FECHA_VE","partes","PAR_ID");
if($vendido == '1')
{
	echo '<img src="images/vendido.png" align="right">';
	
}

?>



<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PAR_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="partes" id="SETUP_DB" name="SETUP_DB" />

<? 
//SOLO SI VAMOS A AGREGAR PIEZAS A UN VEHICULO. despliega un cuadro donde salen todas las piezas agregadas.
echo '';
?>

<h1>Vender Pieza</h1>
Agregado el dia: <? $checaeditar = $_GET['acc'];

if($checaeditar == 'write')
{
echo date("Y-m-d");
}
else
{
	echo valoreditable("PAR_FECHA_AG","partes","PAR_ID");
}
 if($vendido == '1')
{
echo "<Br><b>Vendido el dia: $eldia</b>";
}
 
 ?><br />
 

Tipo de pieza:
<select name="PI_ID*R" AUTOCOMPLETE="OFF" disabled="disabled"/>

<?Php
$seleccionado = valoreditable("PI_ID","partes","PAR_ID");
echo rellenacombo("partes_catalogo","PI_ID", "PI_NOMBRE", ''.$seleccionado.'') ?>
</select><br /><br />

Marca: <select name="PAR_MARCA*R" AUTOCOMPLETE="OFF" disabled="disabled"/>
<?Php 
$seleccionado = valoreditable("PAR_MARCA","partes","PAR_ID");
echo rellenacombo("marcas","MAR_CLAVE", "MAR_NOMBRE",''.$seleccionado.'') ?>
</select><br /><br />
Modelo: <select name="PAR_MODELO*R" AUTOCOMPLETE="OFF" disabled="disabled"/>

<?Php 
$seleccionado = valoreditable("PAR_MODELO","partes","PAR_ID");
echo rellenacombo("modelos","MOD_CLAVE", "MOD_NOMBRE",''.$seleccionado.'') ?>
</select><br /><br />
Color:<select name="PAR_COLOR*R" AUTOCOMPLETE="OFF" disabled="disabled">
<?Php 
$seleccionado = valoreditable("PAR_COLOR","partes","PAR_ID");
echo rellenacombo("colores","COL_ASCII", "COL_NOMBRE",''.$seleccionado.'') ?>

</select>
<Br /><Br />
<b>Año:</b> <input type="text" id="PAR_ANO" name="PAR_ANO" value="<?Php echo valoreditable("PAR_ANO","partes","$ID_VALOR"); ?>" disabled="disabled"/>

<br /><br />
<input type="hidden" id="PAR_FECHA_AG" name="PAR_FECHA_AG" value="
<?Php 
$checaeditar = $_GET['acc'];
if($checaeditar == 'write')
{
echo date("Y-m-d");
}
else
{
	echo valoreditable("PAR_FECHA_AG","partes","PAR_ID");
}

 ?>" disabled="disabled"/>

<input type="hidden" id="PAR_FECHA_AG" name="PAR_FECHA_VE" value="<? echo date("Y-m-d"); ?>"  />
<input type="hidden" id="PAR_FECHA_AG" name="PAR_VENDIDO" value="1"  />

<b>A Nombre de/Cliente:</b> <input type="text" id="PAR_CLIENTE" name="PAR_CLIENTE" value="<?Php echo valoreditable("PAR_CLIENTE","partes","$ID_VALOR"); ?>" style="width:70%"/>

<br /><br />

Descripcion/Detalles:<br />
<textarea cols="35" rows="10" name="PAR_DETALLES" disabled="disabled"  style="width:98%"><?Php echo valoreditable("PAR_DETALLES","partes","$ID_VALOR"); ?></textarea><br /><br />
<br />
Precio: $<?php 
if($_SESSION['MM_tipodeusuario'] == 1)
{
?>
<input type="text" id="PAR_PRECIO" name="PAR_PRECIO" value="<?Php echo valoreditable("PAR_PRECIO","partes","$ID_VALOR"); ?>"/>
<? } else { ?>
<input type="text" id="PAR_PRECIO" name="PAR_PRECIO" value="<?Php echo valoreditable("PAR_PRECIO","partes","$ID_VALOR"); ?>" disabled="disabled"/>
<? } ?>
<br /><br />
Vendido Por: <?Php 
$usuario = valoreditable("PAR_USUARIO_VEN","partes","$ID_VALOR");
if($usuario == '')
{
echo $_SESSION['MM_Username'];	
}
else
{
	echo $usuario;
}
 ?>

<input type="hidden" id="PAR_USUARIO_VEN" name="PAR_USUARIO_VEN" value="<?Php

if($usuario == '')
{
echo $_SESSION['MM_Username'];	
}
else
{
	echo $usuario;
} ?>"/>
<table border="0" width="100%">
<td>
<img src="fotos/<?Php echo valoreditable("PAR_FOTO","partes","$ID_VALOR"); ?>" width="300" height="220" />
<td>
<img src="fotos/<?Php echo valoreditable("PAR_FOTO2","partes","$ID_VALOR"); ?>" width="300" height="220" />
</tr><tr>
<td>
<img src="fotos/<?Php echo valoreditable("PAR_FOTO3","partes","$ID_VALOR"); ?>" width="300" height="220" />
<td>
<img src="fotos/<?Php echo valoreditable("PAR_FOTO4","partes","$ID_VALOR"); ?>" width="300" height="220" />
</table>

<br /><br />


<?php 

$detectaenalmacen = valoreditable("AUT_ID","partes","PAR_ID");

if($detectaenalmacen == ' ' or $detectaenalmacen == '0')
{
	unset($detectaenalmacen);
}


if(isset($detectaenalmacen) or isset($_GET['VE']))
{
?>
 Localizacion: La pieza se encuentra en el Vehiculo con el ID: <?PHP echo $_GET['VE']; echo valoreditable("AUT_ID","partes","PAR_ID"); ?>
<br />

<?
}
else
{
?>
Localización: 
<select name="ALM_ID_FW*R" id="almacen" AUTOCOMPLETE="OFF" disabled="disabled">
<?Php 
$seleccionado = valoreditable("ALM_ID_FW","partes","PAR_ID");
echo rellenacombo("almacen","ALM_ID", "ALM_NOMBRE",''.$seleccionado.'','ALM_ID') ?>
</select>

Rack: 
<select name="RAC_ID_FW*R" id="racks" AUTOCOMPLETE="OFF" disabled="disabled">
<?Php 
$seleccionado = valoreditable("RAC_ID_FW","partes","PAR_ID");
echo rellenacombo("racks","RAC_ID", "RAC_NUMERO",''.$seleccionado.'','ALM_ID_FW') ?>
</select>

Campo: 
<select name="RAC_CAMPO_FW*R" AUTOCOMPLETE="OFF" disabled="disabled">
<?Php 
$seleccionado = valoreditable("RAC_CAMPO_FW","partes","PAR_ID");

echo rellenacomboautoincremento("15","1",$seleccionado) ?>
</select>

Piso:
<select name="RAC_PISOS_FW*R" AUTOCOMPLETE="OFF" disabled="disabled">
<?Php 
$seleccionado = valoreditable("RAC_CAMPO_FW","partes","PAR_ID","");
echo rellenacomboautoincremento("10","",$seleccionado) ?>
</select>

    
 
    
    <? } ?>
    
    


<br /><br />



<? //valor especial que solo se utilizara en caso de modificar una pieza. obtiene el nombre del archivo de una foto que ya este subida. si el usuario no sube ninguna foto, el valor PAR_FOTO toma el valor de SETUP_FILENAME ?>


<? if($vendido == '1') { ?>

<a href="php/reports/reporte_ventapieza.php?ID=<?PHP echo $_GET['ID'] ?>" target="_blank"><IMG SRC="images/imprimir.png" BORDER="0" /></A>
<? } else { ?>
<input type="submit" value="VENDER PIEZA"/>


	
<? } ?>
</form>