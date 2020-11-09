<?PHP
//Esta funcion se encarga de verificar que todo este bein con los valores
function verificavalores($valor)
{
//El valor es requerido, si no esta listo, se cancela el proceso
strstr($valor, '*R');

}	

function error($mensaje,$posicion)
{
echo '<div style="width:98%; position:relative; z-index:1000; hieght:auto; position:relative; background-color:#990000; color:#FFF; padding:10px; top:'.$posicion.'; text-align:center"><b>Error</b>: '.$mensaje.' </div>';
die();
}

function exito($mensaje,$posicion)
{
	echo '<div style="width:98%; position:relative; z-index:1000; hieght:auto; position:relative; background-color:#009900; color:#FFF; padding:10px; top:'.$posicion.'; text-align:center"><b>Exito</b>: '.$mensaje.'</div>';
}


?>
