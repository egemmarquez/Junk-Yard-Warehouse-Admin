
<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "partes_catalogo";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "PI_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PI_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="partes_catalogo" id="SETUP_DB" name="SETUP_DB" />

Tipo de pieza:
<select name="CAT_ID_FW*R"/>
<?Php 
$seleccionado = valoreditable("CAT_ID_FW","partes_catalogo","PI_ID");
echo rellenacombo("categorias","CAT_ID", "CAT_NOMBRE","$seleccionado"); ?>
</select>
<br /><br />
Nombre de la pieza: <input type="text" id="PI_NOMBRE" name="PI_NOMBRE*R" value="<?Php echo valoreditable("PI_NOMBRE","partes_catalogo","$ID_VALOR"); ?>"/>
<br /><br />
<input type="submit" value="Registrar" />
<br /><br />
<a href="#" onClick="CloseAndRefresh();"><img src="images/cerraryrefrescar.png" /></a>	
</form>