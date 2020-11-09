
<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "partes";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "PAR_ID"; ?>
<form action="php/reports/reporte_inventario.php" method="post" enctype="multipart/form-data">

<h1>Imprimir reporte de ventas</h1>
<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PAR_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="partes" id="SETUP_DB" name="SETUP_DB" />

<script type="text/javascript" language="javascript">

$(function() {

$("#PAR_FECHA_VE").datepicker({dateFormat: 'yy-mm-dd'});
$("#PAR_FECHA_VE2").datepicker({dateFormat: 'yy-mm-dd'});
});

</script>
<center>
Imprimir Inventario: 

<br /><br />



<!-- //Este es un campo especial para generar la clave para el registro. -->



<input type="submit" value="Imprimir" />
<br /><br />
</center>
</form>