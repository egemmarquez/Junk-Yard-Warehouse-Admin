<?Php 

//Funcion para los URL'S
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

//obtenemos datos mediante triangulacion
function dime($ID,$quecosa,$tabla,$quevalor)
{
	
	if($ID == 'ultima')
	{
		$consulta = "SELECT $quecosa from $tabla order by $quevalor desc limit 0,1";
	}
	else
	{
$consulta = "SELECT $quecosa from $tabla where $quevalor = $ID";
	}
$query= mysql_query($consulta);
while($row = mysql_fetch_array($query))
{
$resulta = ''.$row[''.$quecosa.''].'';
}
return $resulta;
}


//Detecta que operacion estamos realizando.
//Existen varios tipos de acciones. Write, Edit, Search, Delete. estas acciones llamaran al archivo que manejara dicho formulario.
class detecta {
function __construct($forma)
{
switch($forma)
{
	
case "pieza": usuariosadmitidos("0,1"); include('php/forms/registrapieza.php'); break;
case "vehiculo": usuariosadmitidos("0,1"); include('php/forms/registravehiculo.php'); break;
case "nuevo_catalogo": usuariosadmitidos("0,1"); include('php/forms/registrocatalogo.php'); break;
case "nuevo_marca": usuariosadmitidos("0,1"); include('php/forms/registromarca.php'); break;
case "nuevo_modelo": usuariosadmitidos("0,1"); include('php/forms/registromodelo.php'); break;
case "nuevo_color": usuariosadmitidos("0,1"); include('php/forms/registracolor.php'); break;
case "buscarpieza": usuariosadmitidos("0,1,2"); include('php/forms/listadopieza.php'); break;
case "buscarauto": usuariosadmitidos("0,1,2"); include('php/forms/listadoauto.php'); break;
case "piezaagregar": usuariosadmitidos("0,1"); include('php/forms/registrapieza.php'); break;
case "borrarpieza": usuariosadmitidos("0,1"); include('php/forms/borrar.php'); break;
case "borrarauto": usuariosadmitidos("0,1"); include('php/forms/borrar.php'); break;
case "venderpieza": usuariosadmitidos("0,1,2"); include('php/forms/venderpieza.php'); break;
case "busquedadetalladadepieza": usuariosadmitidos("0,1,2"); include('php/forms/buscapieza.php'); break;
case "busquedadetalladadepieza_listado": usuariosadmitidos("0,1,2"); include('php/forms/listadopieza.php'); break;
case "busquedadetalladadevehiculo": usuariosadmitidos("0,1,2"); include('php/forms/buscavehiculo.php'); break;
case "busquedadetalladadevehiculo_listado": usuariosadmitidos("0,1,2"); include('php/forms/listadoauto.php'); break;
case "listadotipopieza": usuariosadmitidos("0,1,2"); include('php/forms/listado.php'); break;
case "listadotipomarca": usuariosadmitidos("0,1,2"); include('php/forms/listado.php'); break;
case "borrar" : usuariosadmitidos("0,1"); include('php/forms/borrar.php'); break;
case "listado_almacen" : usuariosadmitidos("0,1"); include('php/forms/listado.php'); break;
case "nuevo_almacen" : usuariosadmitidos("0,1"); include('php/forms/registroalmacen.php'); break;
case "nuevo_rack" : usuariosadmitidos("0,1"); include('php/forms/nuevorack.php'); break;
case "listado_racks" : usuariosadmitidos("0,1"); include('php/forms/listado.php'); break;
case "listadotipomodelo" : usuariosadmitidos("0,1"); include('php/forms/listado.php'); break;
case "listado_usuarios" : usuariosadmitidos("0,1"); include('php/forms/listado.php'); break;
case "registra_usuario" : usuariosadmitidos("0,1"); include('php/forms/usuarios.php'); break;
case "editar_usuario" : usuariosadmitidos("0,1"); include('php/forms/usuarios.php'); break;
case "imprimir_ventas" : usuariosadmitidos("0,1"); include('php/forms/imprimir_ventas.php'); break;
case "pdf_ventas" : usuariosadmitidos("0,1"); include('php/reports/reporte_ventas.php'); break;
case "imprimir_inventario" : usuariosadmitidos("0,1"); include('php/forms/imprimir_inventario.php'); break;
case "imprimir_pieza" : usuariosadmitidos("0,1"); include('php/forms/imprimir_pieza.php'); break;

}
}
}

class determinaaccion {
var $validapost;
var $forma;
function __construct($forma,$validapost)
{
if(isset($validapost))
{
switch($forma)
{
case "write": include('php/sqlfunctions/write.php'); break;
case "edit": include('php/sqlfunctions/edit.php'); break;
case "delete": include('php/sqlfunctions/delete.php'); break;
case "lista" : include(''); break;
case "print" : include('php/sqlfunctions/print.php'); break;

}


}

}	
	
}


?>