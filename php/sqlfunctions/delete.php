<?Php 

include('verificavalores.php');

//Pasos
//Contamos los valores (solo para fines informativos)
$cuantos = count($_POST);
$array_formateada = Array();
$database = $_POST['SETUP_DB'];
$ID = $_POST['SETUP_IDVALOR'];
//VERSION FINAL  DEBE LLEVAR UN CODIFICADOR MD5
$ID_DATO = $_POST['ID_BORRAR'];

//Funcion para retirar ciertas cadenas de texto.
function sacar($TheStr, $sLeft, $sRight){
        $pleft = strpos($TheStr, $sLeft, 0);
        if ($pleft !== false){
                $pright = strpos($TheStr, $sRight, $pleft + strlen($sLeft));
                If ($pright !== false) {
                        return (substr($TheStr, $pleft + strlen($sLeft), ($pright - ($pleft + strlen($sLeft)))));
                }
        }
        return '';
}


//funcion para separar los array
function array_push_assoc($array, $key, $value){
 $array[$key] = "'$value'";
 return $array;
}

//Verifica los campos requeridos y verifica que tengan texto, si no, se detiene. 
//Realiza limpieza.
//Elimina todas las variables del sistema
foreach ($_POST as $key => $value) 
if(strstr($key, 'SETUP_'))
{ 
unset($key);
}
else
{
//Verifica que los valores requeridos sean llenados
if(strstr($key, '*R'))
{
if($value == '')
{
echo error("Verifica que los campos requeridos esten llenos");	
}
else 
{
//Eliminamos las R para que se pueda escribir en la base de datos
$patron = "/\*R/";
$key = preg_replace($patron, "", $key);

	
}
	
}

mysql_real_escape_string($value);
$array_formateada = array_push_assoc($array_formateada, $key, $value);
}

//Separamos los valores y los nombres de los campos
$valores = array_keys($array_formateada);
$datos = array_values($array_formateada);

$valoresformateados = implode(", ", $valores);
$datosformateados = implode(", ", $datos);

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
$query = "DELETE FROM $database WHERE $ID = $ID_DATO";
new conexion;
mysql_query($query) or die (mysql_error());
}
}
$write = new dbwrite($database,$valoresformateados,$datosformateados,$ID,$ID_DATO);
if(!$write){ echo error("No se ha podido realizar la modificacion. contacte a soporte"); }
else { echo exito("Se ha borrado el registro."); }
?>