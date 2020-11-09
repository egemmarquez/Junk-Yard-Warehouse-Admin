<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "automoviles";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "AUT_ID";
echo '<script type="text/javascript" charset="utf-8">
          $(function(){
              
			$("#modelo").chained("#marca"); 
          });
          </script>';
 ?>

<h1>Busqueda de Vehiculo</h1>
<form action="handler.php?act=busquedadetalladadevehiculo_listado&acc=lista" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="AUT_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />

<input type="hidden" value="automoviles" id="SETUP_DB" name="SETUP_DB" />
<b>Marca:<select name="AUT_MARCA" id="marca" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("AUT_MARCA","automoviles","AUT_ID");
echo rellenacombo("marcas","MAR_CLAVE", "MAR_NOMBRE",''.$seleccionado.'','') ?>
</select>
<br />
Modelo: <select name="AUT_MODELO" id="modelo" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("AUT_MODELO","automoviles","AUT_ID");
echo rellenacombo("modelos","MOD_CLAVE", "MOD_NOMBRE",''.$seleccionado.'','MAR_CLAVE_FW') ?>
</select>
<br />
Color:<select name="AUT_COLOR" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("AUT_COLOR","automoviles","AUT_ID");
echo rellenacombo("colores","COL_ASCII", "COL_NOMBRE",''.$seleccionado.'','') ?>

</select>

<br />
ID: <input type="text" id="AUT_ID" name="AUT_ID" value=""/>
<br /><br />
<input type="submit" value="Buscar Vehiculo" />



</form>