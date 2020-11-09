<?

//funcion para rellenar combo
error_reporting(0);
function rellenacombo($database, $variable, $valor, $seleccionado, $class)
{
new conexion;

if($class == '')
{
$clase = ',';	
}
else
{
	$clase = ', '.$class.', ';
}
$consulta = "SELECT $variable$clase$valor from $database order by $variable asc";
//echo $consulta;
$query = mysql_query($consulta);
echo '<option value=""></option>';
while($row=mysql_fetch_array($query))
{	
//Si se esta solicitando el combo de colores, color el codigo para que el fondo del campo se convierta en el color que se haya seleccionado.
if($database == 'colores')
{
$fondodecolor = 'style="background-color: #'.$row[''.$variable.''].';"';	
}
else
{
$fondodecolor = '';	
}

//si necesitas hacer chain en algunos combobox esto aparecera.
if($class == '')

{
	
}
else
{
$clasechain ='class="'.$row[''.$class.''].'"';	
}

//detectamos si el valor es seleccionado. si es asi, coloca un tag html selected, para que se seleccione de forma automatica.
$variableseleccionada = $row[''.$variable.''];
if($seleccionado == $row[''.$variable.''])
{
$selectedinput = 'selected="selected"';
}
else
{
$selectedinput = '';
}

	
	echo '<option  '.$selectedinput.' value="'.$row[''.$variable.''].'" '.$clasechain.' '.$fondodecolor.'>'.$row[''.$valor.''].'</option>
	';
	
	
}


}


function rellenacomboautoincremento($valor,$sonletras,$seleccionado)
{
	
$a = 0;

//detectamos si el valor es seleccionado. si es asi, coloca un tag html selected, para que se seleccione de forma automatica.
if($sonletras == '1')
{
$data = array("-", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
while($a <= $valor)
{
if($seleccionado == $a)
{
$selectedinput = 'selected="selected"';
}
else
{
$selectedinput = '';
}
	
echo "

<option value=\"$a\" $selectedinput>$data[$a]</option>

";
$a++;
	
}


}
else
{
	
while($a <= $valor)
{
	if($seleccionado == $a)
{
$selectedinput = 'selected="selected"';
}
else
{
$selectedinput = '';
}
echo "

<option value=\"$a\" $selectedinput>$a</option>

";
$a++;
	
}
	
		
}


}


?>