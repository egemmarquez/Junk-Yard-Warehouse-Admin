<?Php 
$ID = $_GET['ID'];
$editar = $_GET['act'];
//Verificamos que la accion sea igual a editar.
if($editar == 'borrar')
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
include('conectarse.php');
function valoreditable($valor,$database)
{
$editar = $_GET['act'];
$ID = $_GET['ID'];

if($editar == 'editar_pieza')
{
$creaconexion = new conexion;
$editar = mysql_real_escape_string($editar);
$ID = mysql_real_escape_string($ID);
$consulta = 'select '.$valor.' from automoviles where AUT_ID = '.$ID.'';
$query = mysql_query($consulta) or die(mysql_error());
$row = mysql_fetch_array($query);
echo $row[''.$valor.''];


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




?>