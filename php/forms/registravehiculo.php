<?php 
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "automoviles";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "AUT_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="AUT_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="automoviles" id="SETUP_DB" name="SETUP_DB" />


Agregado el dia: <? $checaeditar = $_GET['acc'];
if($checaeditar == 'write')
{
echo date("Y-m-d");
echo '<script type="text/javascript" charset="utf-8">
          $(function(){
              
			$("#modelo").chained("#marca"); 
          });
          </script>';
}
else
{
	echo valoreditable("AUT_FECHA_AG","automoviles","AUT_ID");
}
 ?><br />

<b>Marca:<select name="AUT_MARCA*R" id="marca" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("AUT_MARCA","automoviles","AUT_ID");
echo rellenacombo("marcas","MAR_CLAVE", "MAR_NOMBRE",''.$seleccionado.'','') ?>
</select><a href="handler.php?act=nuevo_marca&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;">Registrar Nueva Marca</a>
<br />
Modelo: <select name="AUT_MODELO*R" id="modelo" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("AUT_MODELO","automoviles","AUT_ID");
echo rellenacombo("modelos","MOD_CLAVE", "MOD_NOMBRE",''.$seleccionado.'','MAR_CLAVE_FW') ?>
</select><a href="handler.php?act=nuevo_modelo&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;">Registrar Nuevo Modelo</a>
<br />
Color:<select name="AUT_COLOR*R" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("AUT_COLOR","automoviles","AUT_ID");
echo rellenacombo("colores","COL_ASCII", "COL_NOMBRE",''.$seleccionado.'','') ?>

</select><a href="handler.php?act=nuevo_color&acc=write" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=400'); return false;">Registrar Nuevo Color</a>

<input type="hidden" id="AUT_ID" name="AUT_ID" value="<?Php echo $_GET['VE']; ?>">

<input type="hidden" id="AUT_FECHA_AG" name="AUT_FECHA_AG" value="
<?Php 
$checaeditar = $_GET['acc'];
if($checaeditar == 'write')
{
echo date("Y-m-d");
}
else
{
	echo valoreditable("AUT_FECHA_AG","automoviles","AUT_ID");
}

 ?>"/>
<br /><br />
Año: <input type="text" id="AUT_ANO" name="AUT_ANO*R" value="<?Php echo valoreditable("AUT_ANO","automoviles","$ID_VALOR"); ?>"/>
<br /><br />
<table border="0" width="100%">
<td>
<img src="fotos/<?Php echo valoreditable("AUT_FOTO","automoviles","$ID_VALOR"); ?>" width="300" height="220" /><br />
<td>
<img src="fotos/<?Php echo valoreditable("AUT_FOTO2","automoviles","$ID_VALOR"); ?>" width="300" height="220" /><br />
</tr><tr>
<td>
<img src="fotos/<?Php echo valoreditable("AUT_FOTO3","automoviles","$ID_VALOR"); ?>" width="300" height="220" /><br />
<td>
<img src="fotos/<?Php echo valoreditable("AUT_FOTO4","automoviles","$ID_VALOR"); ?>" width="300" height="220" /><br />
</table>
<br /><br />
<? //valor especial que solo se utilizara en caso de modificar una pieza. obtiene el nombre del archivo de una foto que ya este subida. si el usuario no sube ninguna foto, el valor PAR_FOTO toma el valor de SETUP_FILENAME ?>


Subir Foto: <input type="file" name="AUT_FOTO" id="AUT_FOTO" /><br />
Subir Foto2: <input type="file" name="AUT_FOTO2" id="AUT_FOTO" /><br />
Subir Foto3: <input type="file" name="AUT_FOTO3" id="AUT_FOTO" /><br />
Subir Foto4: <input type="file" name="AUT_FOTO4" id="AUT_FOTO" /><br />

<input type="submit" />
</form>