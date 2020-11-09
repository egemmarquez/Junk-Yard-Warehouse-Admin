<h1>Nuevo Almacen</h1>
<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "almacen";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "ALM_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="ALM_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="almacen" id="SETUP_DB" name="SETUP_DB" />
Nombre de Almacen: <input type="text" id="ALM_NOMBRE" name="ALM_NOMBRE*R" value="<?Php echo valoreditable("ALM_NOMBRE","almacen","$ID_VALOR"); ?>"/>
<br /><br />

:: Procura poner nombres reconocibles, por ejemplo "Almacen 1, 2" etc.
<br /><br />

<!-- //Este es un campo especial para generar la clave para el registro. -->



<input type="submit" value="Registrar" />
<br /><br />

</form>