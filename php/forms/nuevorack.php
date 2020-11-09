<?php 
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "racks";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "RAC_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="RAC_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />

<input type="hidden" value="racks" id="SETUP_DB" name="SETUP_DB" />
 Rack #: <input type="text" id="RAC_NUMERO*R" name="RAC_NUMERO*R" value="<?PHP echo valoreditable("RAC_NUMERO","racks","RAC_ID"); ?>"/>

 <br /><Br />

<b>Cuantos Campos tiene?:<select name="RAC_CAMPOS*R"  AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("RAC_CAMPOS","racks","RAC_ID");
echo rellenacombo("campos","CAM_ID", "CAM_ID",''.$seleccionado.'','') ?>
</select> 
Cuantos pisos tiene?: <select name="RAC_PISOS*R" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("RAC_PISOS","racks","RAC_ID");
echo rellenacombo("campos","CAM_ID", "CAM_ID",''.$seleccionado.'','') ?>
</select>
<br />
<input type="hidden" id="ALM_ID_FW" name="ALM_ID_FW" value="<?Php echo $_GET['ID']; ?>">
<br /><br />
<center>
<b>Como entender el sistema de racks</b>
<br />
<img src="images/explicacion.png" />
</center>


<input type="submit" value="REGISTRAR" />
</form>