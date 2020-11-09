<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "partes";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "PAR_ID"; ?>
<form action="php/reports/reporte_pieza.php" method="post" enctype="multipart/form-data">

<h1>Imprimir ticket de pieza</h1>
<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PAR_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="partes" id="SETUP_DB" name="SETUP_DB" />

<input type="text" value="" id="ID" name="ID" />

<!-- //Este es un campo especial para generar la clave para el registro. -->



<input type="submit" value="Imprimir" />
<br /><br />
</center>
</form>