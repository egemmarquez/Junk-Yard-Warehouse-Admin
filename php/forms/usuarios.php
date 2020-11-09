
<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "users";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "idusuario"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="idusuario" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="users" id="SETUP_DB" name="SETUP_DB" />
Usuario: <input type="text" id="username" name="username*R" value="<?Php echo valoreditable("username","users","$ID_VALOR"); ?>"/>
<br /><br />
Nombre: <input type="text" id="nombre" name="nombre*R" value="<?Php echo valoreditable("nombre","users","$ID_VALOR"); ?>"/>
<br /><br />
Password :<input type="password" value="<?Php echo valoreditable("password","users","$ID_VALOR"); ?>" id="password*R" name="password*R" /> <br />
<br />

Tipo de usuario:

<select name="tipodeusuario" AUTOCOMPLETE="OFF"/>
<?Php
$seleccionado = valoreditable("tipodeusuario","users","idusuario");
echo rellenacombo("tiposdeusuario","ID_TIPO", "ID_NOMBRE",''.$seleccionado.'') ?>
</select>
<br /><br />
:: Administrador es el usuario que tiene acceso a TODAS las opciones de administracion, incluidas el poder agregar nuevos tipos de piezas y nuevos modelos y marcas.<br />
:: El Usuario normal, tiene acceso a la venta y listado de piezas y vehiculos.
<br />
:: El Nombre es el nombre que aparecera en las notas de venta.

<br /><br />

<!-- //Este es un campo especial para generar la clave para el registro. -->



<input type="submit" value="Registrar" />
<br /><br />

</form>