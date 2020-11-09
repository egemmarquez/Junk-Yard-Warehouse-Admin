<?Php 
include('verificavalores.php');
include('uploadfile.php');
include('getdata.php');
$database = $_POST['SETUP_DB'];

$valorsearch = array();
$cuantos = count($valores);
$e = 0;
//las variables $valores y $datos la sacamos de getdata.php
//En esta operacion, agregaremos la opcion "or like" para que el sistema haga la busqueda en la base de datos. es importante que en el primer valor se despliegue de forma distinta y al final tambien, asi que verifica los cambios.
while($e <= $cuantos-1)
{

if($e == $cuantos-1)
{
$construct = "$valores[$e] LIKE $datos[$e]";
}
else
{
$construct = "$valores[$e] LIKE $datos[$e] or ";	
}


$e++;
array_push($valorsearch,$construct);
}

//$busquedadata es nuestra variable que contiene la separacion correcta y la sintaxis correcta para realizar la busqueda!!
$busquedadata = implode("", $valorsearch);
$searchquery = "SELECT * from $database where $busquedadata";
//echo $searchquery;



?>
