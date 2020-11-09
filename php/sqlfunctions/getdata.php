<?PHP

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
echo error("Verifica que los campos requeridos esten llenos","0px");	
}
else 
{
//Eliminamos las R para que se pueda escribir en la base de datos
$patron = "/\*R/";
$key = preg_replace($patron, "", $key);

}	

//las variables de clave, tendran codificacion md5
if(strstr($key, 'password'))
{
	$value = md5($value);
	
}



}




mysql_real_escape_string($value);
$array_formateada = array_push_assoc($array_formateada, $key, $value);
}

//manejo de archivos
//Si la variable de FILES esta vacia, no se procesa nada.
if(!$_FILES)
{
}
else
{
//verificamos cada campo de file. si el archivo existe (verificando si hay un nombre de archivo en la variable value) se activa el proceso de subir el archivo y mover el nombre del archivo al array correspondiente. SI el archivo NO existe, solo lo ignora.
//Actualizacion! Contamos cuantos archivos existen....
$cuantosarchivos = count($_FILES);
$s = 0;
//aqui tenemos todos los valores de la array files, separados por campos y valores.
$camposdefoto = array_keys($_FILES);
$archivos =  array_values($_FILES);
while($s <= $cuantosarchivos)
{
//echo count($_FILES);

//A Verificar... si el campo esta vacio, significa que no tiene ningun archivo seleccionado, por tanto, no procesa nada ni envia la array a la query para la DB!
if($archivos[$s]['name'] == '')
{
	
}
else
{
//si no esta vacio, inicia la subida de archivo y su colocacion en la array principal.
//echo $camposdefoto[$s]; echo "<br>";
//echo $archivos[$s]['name'];
//echo "<br>";
uploadfiles($camposdefoto[$s]);
$array_formateada = array_push_assoc($array_formateada, $camposdefoto[$s], $archivos[$s]['name']);
}

$s++;
}
}


//Separamos los valores y los nombres de los campos
$valores = array_keys($array_formateada);
//echo "<pre>";
//print_r($valores);
$datos = array_values($array_formateada);
//print_r($datos);
$valoresformateados = implode(", ", $valores);
$datosformateados = implode(", ", $datos);
?>