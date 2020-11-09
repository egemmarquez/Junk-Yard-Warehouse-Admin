<?php

//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "marcas";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "MAR_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="MAR_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="marcas" id="SETUP_DB" name="SETUP_DB" />
Nueva Marca: <input type="text" id="MAR_NOMBRE" name="MAR_NOMBRE*R" value="<?Php echo valoreditable("MAR_NOMBRE","marcas","$ID_VALOR"); ?>"/>
<br /><br />
CLAVE :<input type="TEXT" value="<?Php echo valoreditable("MAR_CLAVE","marcas","$ID_VALOR"); ?>" id="MAR_CLAVE" name="MAR_CLAVE" /> <br />

:: Que es la clave?: La clave pueden ser las 4 primeras letras de la marca. Eso sirve para organizar las marcas y para la impresion
<br /><br />

<!-- //Este es un campo especial para generar la clave para el registro. -->



<input type="submit" value="Registrar" />
<br /><br />
<a href="#" onClick="CloseAndRefresh();"><img src="images/cerraryrefrescar.png" /></a>	
</form>