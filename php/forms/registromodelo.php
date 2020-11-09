
<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "modelos";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "MOD_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="MOD_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="modelos" id="SETUP_DB" name="SETUP_DB" />

Nuevo Modelo: <input type="text" id="MOD_NOMBRE" name="MOD_NOMBRE*R" value="<?Php echo valoreditable("MOD_NOMBRE","modelos","$ID_VALOR"); ?>"/>
<br /><br />
CLAVE :<input type="TEXT" value="<?Php echo valoreditable("MOD_CLAVE","modelos","$ID_VALOR"); ?>" id="MOD_CLAVE" name="MOD_CLAVE" /> <br />
<br /><br />
Marca: <select name="MAR_CLAVE_FW*R" AUTOCOMPLETE="OFF"/>
<?Php
$seleccionado = valoreditable("MAR_CLAVE_FW","modelos","MOD_ID");
echo rellenacombo("marcas","MAR_CLAVE","MAR_NOMBRE",''.$seleccionado.'',"") ?>
</select>
<br /><br />
<input type="submit" value="Registrar" />
<br /><br />
<a href="#" onClick="CloseAndRefresh();"><img src="images/cerraryrefrescar.png" /></a>	
</form>