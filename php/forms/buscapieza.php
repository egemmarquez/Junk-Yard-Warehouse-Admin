<?php  
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "partes";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "PAR_ID"; 
echo '<script type="text/javascript" charset="utf-8">
          $(function(){
              $("#pieza").chained("#tipopieza"); 
			$("#modelo").chained("#marca"); 
          });
          </script>';
?>

<h1>Busqueda de Piezas</h1>
<form action="handler.php?act=busquedadetalladadepieza_listado&acc=lista" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PAR_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />

<input type="hidden" value="partes" id="SETUP_DB" name="SETUP_DB" />
<select name="CAT_ID_FW" id="tipopieza" AUTOCOMPLETE="OFF"/>

<?Php
$seleccionado = valoreditable("PI_ID","partes","PAR_ID");
echo rellenacombo("categorias","CAT_ID", "CAT_NOMBRE",''.$seleccionado.'',"CAT_ID") ?>
</select>

<b>Pieza:</b>
<select name="PI_ID" id="pieza" AUTOCOMPLETE="OFF"/>
<?Php
$seleccionado = valoreditable("PI_ID","partes","PAR_ID");
echo rellenacombo("partes_catalogo","PI_ID","PI_NOMBRE",''.$seleccionado.'',"CAT_ID_FW") ?>
</select>

<br />
<b>Marca: </b>
<select name="PAR_MARCA" id="marca" AUTOCOMPLETE="OFF"/>
<?Php 
$seleccionado = valoreditable("PAR_MARCA","partes","PAR_ID");
echo rellenacombo("marcas","MAR_CLAVE", "MAR_NOMBRE",''.$seleccionado.'','') ?>
</select>

<b>Modelo:</b>	 <select name="PAR_MODELO" id="modelo" AUTOCOMPLETE="OFF"/>

<?Php 
$seleccionado = valoreditable("PAR_MODELO","partes","PAR_ID");
echo rellenacombo("modelos","MOD_CLAVE", "MOD_NOMBRE",''.$seleccionado.'','MAR_CLAVE_FW') ?>
</select>
<br />
<b>Color:</b><select name="PAR_COLOR" AUTOCOMPLETE="OFF">
<?Php 
$seleccionado = valoreditable("PAR_COLOR","partes","PAR_ID");
echo rellenacombo("colores","COL_ASCII", "COL_NOMBRE",''.$seleccionado.'') ?>

</select>
<br />
ID: <input type="text" id="PAR_ID" name="PAR_ID" value=""/>
<br /><br />



<input type="submit" value="Buscar Pieza" />



</form>