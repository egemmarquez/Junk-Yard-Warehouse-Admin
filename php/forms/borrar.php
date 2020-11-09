
<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = $_GET['db'];  
//Nombre de la variable para obtener los datos
$ID_VALOR = $_GET['ID']; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="<?Php echo $_GET['value']; ?>" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="<?Php echo $_GET['db']; ?>" id="SETUP_DB" name="SETUP_DB" />
<center><br /><br /><br /><br />
Haciendo clic en el boton borrar, eliminará el registro de forma permanente.
<input type="hidden" id="ID_BORRAR" name="ID_BORRAR" value="<?Php echo $_GET['ID'] ?>"/>
<br /><br />

<input type="submit" value="Borrar" />
</center>
<br /><br />

</form>