<?php  
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
echo '';



?>




Agregado el dia: <? $checaeditar = $_GET['acc'];
if($checaeditar == 'write')
{
echo date("Y-m-d");
}
else
{
	echo valoreditable("PAR_FECHA_AG","partes","PAR_ID");
}
 ?><br />

Tipo de pieza:
<select name="PI_ID*R" AUTOCOMPLETE="OFF"/>

<?Php
$seleccionado = valoreditable("PI_ID","partes","PAR_ID");
echo rellenacombo("partes_catalogo","PI_ID", "PI_NOMBRE", ''.$seleccionado.'') ?>
</select>
<a href="handler.php?act=nuevo_catalogo&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;">Registrar Nueva Pieza</a>
<br />
Marca: <select name="PAR_MARCA*R" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("PAR_MARCA","partes","PAR_ID");
echo rellenacombo("marcas","MAR_CLAVE", "MAR_NOMBRE",''.$seleccionado.'') ?>
</select><a href="handler.php?act=nuevo_marca&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;">Registrar Nueva Marca</a>
<br />
Modelo: <select name="PAR_MODELO*R" AUTOCOMPLETE="OFF"/>

<?Php 
$seleccionado = valoreditable("PAR_MODELO","partes","PAR_ID");
echo rellenacombo("modelos","MOD_CLAVE", "MOD_NOMBRE",''.$seleccionado.'') ?>
</select><a href="handler.php?act=nuevo_modelo&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;">Registrar Nuevo Modelo</a>
<br />
Color:<select name="PAR_COLOR*R" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("PAR_COLOR","partes","PAR_ID");
echo rellenacombo("colores","COL_ASCII", "COL_NOMBRE",''.$seleccionado.'') ?>

</select><a href="handler.php?act=nuevo_color&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=400'); return false;">Registrar Nuevo Color</a>


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

<?Php if($_GET['VE'] == '')
{
	
}
else
{ ?>
<input type="hidden" id="AUT_ID" name="AUT_ID" value="<?Php echo $_GET['VE']; ?>">
<? } ?>
<br /><br />

Descripcion/Detalles:<br />
<textarea cols="35" rows="10" name="PAR_DETALLES"><?Php echo valoreditable("PAR_DETALLES","partes","$ID_VALOR"); ?></textarea><br /><br />

Precio: $<input type="text" id="PAR_PRECIO" name="PAR_PRECIO" value="<?Php echo valoreditable("PAR_PRECIO","partes","$ID_VALOR"); ?>"/>
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

<input type="submit" />
</form>