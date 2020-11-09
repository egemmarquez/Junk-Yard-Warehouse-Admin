<?Php 

include('verificavalores.php');
include('uploadfile.php');

//Pasos
//Contamos los valores (solo para fines informativos)
$cuantos = count($_POST);
$array_formateada = Array();
$database = $_POST['SETUP_DB'];
$ID = $_POST['SETUP_IDVALOR'];
//VERSION FINAL  DEBE LLEVAR UN CODIFICADOR MD5
$ID_DATO = $_GET['ID'];

include('getdata.php');
//Escribimos en la base de datos
class dbwrite {
	var $cuantos;
	var $database;
	var $valoresformateados;
	var $datosformateados;
	var $ID;
	var $ID_DATO;
function __construct($database,$datos,$valores,$ID,$ID_DATO)
{

//En la clase editar, utilizaremos el valor cuantos para saber cuantos for se deben hacer.
$a = 0;

$arrayconsulta = array();
$valoresenarray = explode(",",$valores);
$datosenarray = explode(",",$datos);
$cuantos = count($valoresenarray);

while ($a <= $cuantos)
{
//Ok, algo medio complicado. Aqui vamos organizando cada dato con su valor para acomodarlo como una query de mysql valida	
$datapush = ' '.$datosenarray[$a].' =  '.$valoresenarray[$a].'';

$a++;

if($a == $cuantos+1)
{
$datapush = '';	
}
else
{
}
array_push($arrayconsulta,$datapush);
}
//Convirtiendo la array recien creada en el while, en un string, separando por comas
$querydata = implode(",",$arrayconsulta);
//Quitando la ultima coma del ultimo registro!
$querydata = substr_replace($querydata,"",-1);
//Finalmente hacemos el registro!

$query = "UPDATE $database SET $querydata where $ID = $ID_DATO";
//echo $query;

new conexion;
mysql_query($query) or die (mysql_error());
}
}
$write = new dbwrite($database,$valoresformateados,$datosformateados,$ID,$ID_DATO);
if(!$write){ echo error("No se ha podido realizar la modificacion. contacte a soporte"); }
else { 

echo '<meta HTTP-EQUIV="Refresh" CONTENT="3;URL='.curPageURL().'">';	
echo exito("Se ha realizado la modificacion de manera exitosa... actualizando datos"); }
?>