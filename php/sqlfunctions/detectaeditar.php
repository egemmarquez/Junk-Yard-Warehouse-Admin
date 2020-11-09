<?Php 
include('conectarse.php');
include('rellenacombo.php');
$ID = $_GET['ID'];
$editar = $_GET['acc'];
//Verificamos que la accion sea igual a editar.
if($editar == 'edit')
{
if($ID == '')
{
//Verifica que el ID este. Si no, se detiene. El Sistema final tendra codificacion md5.
include('verificavalores.php');
echo error("Operacion no aprovada.");	
}
else
{
	
	//Realizo conexion a la base de datos. me aseguro que tenga

function valoreditable($valor,$database,$idvalor,$cuantos)
{
$editar = $_GET['acc'];
$ID = $_GET['ID'];

if($editar == 'edit')
{
$creaconexion = new conexion;
$editar = mysql_real_escape_string($editar);
$ID = mysql_real_escape_string($ID);
$consulta = 'select '.$valor.' from '.$database.' where '.$idvalor.' = '.$ID.'';
//echo $consulta;
$query = mysql_query($consulta);
$row = mysql_fetch_array($query);
if($cuantos == '')
{
return $row[''.$valor.''];
}
elseif($cuantos == '1')
{

return mysql_num_rows($query);
}


}
	
	
}

}
//lol
}
else
{
	function valoreditable()
{
//Dummy valor editable. no tiene nada.
}
	
}


//funcion para verificar privilegios de usuarios
//la funcion es llamada desde detecta.php se utiliza para verificar los privilegios de usuarios. Antes de cargar el archivo del formulario via handler.php primero debe verificar el sistema que si puedes acceder. esto se hace gracias a la variable $_SESSION['MM_tipodeusuario'] que indicara el tipo de usuario que eres. Esta funcion debe mejorarse.
function usuariosadmitidos($data)
{
	

//convertimos la data en un array
$data = explode(',', $data);


//Buscaremos el valor en la array, si encontramos el valor de usuario permitido, pasa, si no, se rompe la funcion.
if(!array_search($_SESSION['MM_tipodeusuario'], $data))
{
	echo "<B>OPERACION NO PERMITIDA</B>";
	break;
}
else
{
//Todo bien, el usuario esta permitido.	
}
	

}



?>