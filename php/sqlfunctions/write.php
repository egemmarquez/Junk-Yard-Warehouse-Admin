<?Php 
include('verificavalores.php');
include('uploadfile.php');
include('getdata.php');
$database = $_POST['SETUP_DB'];

//Escribimos en la base de datos	
class dbwrite {
function __construct($database,$valoresformateados,$datosformateados)
{

$query = "INSERT INTO $database ($valoresformateados) VALUES ($datosformateados)";
//echo $query;

$creaconexion = new conexion;
mysql_query($query) or die (mysql_error());
}
}
$write = new dbwrite($database,$valoresformateados,$datosformateados);
if(!$write){ echo error("No se ha podido realizar el registro. contacte a soporte","0px"); 
$writecomplete = 0;
}
else { echo exito("Se ha realizado el registro de forma correcta", "0px"); 
$writecomplete = 1;
}

?>