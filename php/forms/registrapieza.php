<?php

$detectavendido = valoreditable("PAR_VENDIDO","partes","PAR_ID");
if($detectavendido == '1')
{
echo '<center><b>Esta Pieza ya fue vendida. puede ver la informacion, pero no podra editar el registro.</b></center>';	
}
else
{
	
}

//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "partes";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "PAR_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PAR_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="partes" id="SETUP_DB" name="SETUP_DB" />

<? 
//SOLO SI VAMOS A AGREGAR PIEZAS A UN VEHICULO. despliega un cuadro donde salen todas las piezas agregadas.
?>

Agregado el dia: <? $checaeditar = $_GET['acc'];
if($checaeditar == 'write')
{
echo date("Y-m-d");
echo '<script type="text/javascript" charset="utf-8">
          $(function(){
              $("#pieza").chained("#tipopieza"); 
			$("#modelo").chained("#marca"); 
			$("#racks").chained("#almacen"); 
          });
          </script>';
}
else
{
	echo valoreditable("PAR_FECHA_AG","partes","PAR_ID");
}
 ?><br />


<b>Tipo:</b> <select name="CAT_ID_FW" id="tipopieza" AUTOCOMPLETE="OFF"/>

<?Php
$seleccionado = valoreditable("CAT_ID_FW","partes","PAR_ID");
echo rellenacombo("categorias","CAT_ID", "CAT_NOMBRE",''.$seleccionado.'',"CAT_ID") ?>
</select>

<b>Pieza:</b>
<select name="PI_ID*R" id="pieza" AUTOCOMPLETE="OFF"/>
<?Php
$seleccionado = valoreditable("PI_ID","partes","PAR_ID");
echo rellenacombo("partes_catalogo","PI_ID","PI_NOMBRE",''.$seleccionado.'',"CAT_ID_FW") ?>
</select>

<br />
<b>
<? if($_GET['VE'] == '') { ?> 
Marca:
<select name="PAR_MARCA*R" id="marca" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("PAR_MARCA","partes","PAR_ID");
echo rellenacombo("marcas","MAR_CLAVE", "MAR_NOMBRE",''.$seleccionado.'','') ?>
</select>

Modelo:	 <select name="PAR_MODELO*R" id="modelo" AUTOCOMPLETE="OFF"/>

<?Php 
$seleccionado = valoreditable("PAR_MODELO","partes","PAR_ID");
echo rellenacombo("modelos","MOD_CLAVE", "MOD_NOMBRE",''.$seleccionado.'','MAR_CLAVE_FW') ?>
</select>

<br />
<b>Color:</b><select name="PAR_COLOR*R" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("PAR_COLOR","partes","PAR_ID");
echo rellenacombo("colores","COL_ASCII", "COL_NOMBRE",''.$seleccionado.'') ?>
</select>
<br />
<b>Año:</b> <input type="text" id="PAR_ANO" name="PAR_ANO" value="<?Php echo valoreditable("PAR_ANO","partes","$ID_VALOR"); ?>"/>

<? } else { ?>

<input type="hidden" value="<?PHP echo $_GET['marca'] ?>" name="PAR_MARCA" />
<input type="hidden" value="<?PHP echo $_GET['modelo'] ?>" name="PAR_MODELO" />
<input type="hidden" value="<?PHP echo $_GET['color'] ?>" name="PAR_COLOR" />
<input type="hidden" value="<?PHP echo $_GET['ano'] ?>" name="PAR_ANO" />

<? } ?>

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

 ?>"/>

<?Php 
$obtenvehiculo = valoreditable("AUT_ID","partes","PAR_ID");
if($_GET['VE'] == '')
{
	
}
else
{ ?>
<input type="hidden" id="AUT_ID" name="AUT_ID" value="<?Php echo $_GET['VE']; ?>">
<? } ?>
<br /><br />

<b>Descripcion/Detalles:<br /></b>
<textarea cols="35" rows="10" name="PAR_DETALLES" style="width:98%"><?Php echo valoreditable("PAR_DETALLES","partes","$ID_VALOR"); ?></textarea><br /><br />

<b>Precio:</b> $<input type="text" id="PAR_PRECIO" name="PAR_PRECIO" value="<?Php echo valoreditable("PAR_PRECIO","partes","$ID_VALOR"); ?>"/>
<br /><br />

Registrado Por: <?Php

if($_GET['acc'] == 'write')
{
	echo $_SESSION['MM_Username'];
}
else
{
 echo valoreditable("PAR_USUARIO_REG","partes","$ID_VALOR"); } ?>

<input type="hidden" id="PAR_USUARIO_REG" name="PAR_USUARIO_REG" value="<?Php

if($_GET['acc'] == 'write')
{
	echo $_SESSION['MM_Username'];
}
else
{
 echo valoreditable("PAR_USUARIO_REG","partes","$ID_VALOR"); } ?>"/>

<br /><br />
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

<br />
<? //valor especial que solo se utilizara en caso de modificar una pieza. obtiene el nombre del archivo de una foto que ya este subida. si el usuario no sube ninguna foto, el valor PAR_FOTO toma el valor de SETUP_FILENAME ?>
Subir Foto 1: <input type="file" name="PAR_FOTO" id="PAR_FOTO" /><br />
Subir Foto 2: <input type="file" name="PAR_FOTO2" id="PAR_FOTO2" /><br />
Subir Foto 3: <input type="file" name="PAR_FOTO3" id="PAR_FOTO3" /><br />
Subir Foto 4: <input type="file" name="PAR_FOTO4" id="PAR_FOTO4" /><br />

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
<input type="checkbox" name="AUT_ID" value="0"> Haz clic aqui para mover a almacen y dar nueva localización.<br>
<?
}
else
{
?>
Localización: 
<select name="ALM_ID_FW*R" id="almacen" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("ALM_ID_FW","partes","PAR_ID");
echo rellenacombo("almacen","ALM_ID", "ALM_NOMBRE",''.$seleccionado.'','ALM_ID') ?>
</select>

Rack: 
<select name="RAC_ID_FW*R" id="racks" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("RAC_ID_FW","partes","PAR_ID");
echo rellenacombo("racks","RAC_ID", "RAC_NUMERO",''.$seleccionado.'','ALM_ID_FW') ?>
</select>

Campo: 
<select name="RAC_CAMPO_FW*R" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("RAC_CAMPO_FW","partes","PAR_ID");

echo rellenacomboautoincremento("15","1",$seleccionado) ?>
</select>

Piso:
<select name="RAC_PISOS_FW*R" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("RAC_CAMPO_FW","partes","PAR_ID","");
echo rellenacomboautoincremento("10","",$seleccionado) ?>
</select>

    
 
    
    <? } ?>
    
    
    
<br /><br />
<?php 


if($detectavendido == '1') { ?>


<? }else { ?> 
<? echo '<input type="submit" />'; } ?>
</form>

<?

if($_POST['SETUP_VALIDAPOST'] == '' and $_GET['acc'] == 'write')
{

}
else
{

if($_GET['ID'] == '')
{
$id1 = dime("ultima","PAR_ID","partes","PAR_ID");
}
else
{
$id1 = $_GET['ID'];
}
echo 
'
<a href="php/reports/reporte_pieza.php?ID='.$id1.'" target="_blank"><img src="images/imprimir.png"></a>


';	
}


?>