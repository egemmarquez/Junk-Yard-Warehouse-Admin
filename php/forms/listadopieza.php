<?PHP
 
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("yonke") or die (mysql_error());


//especial, listado especifico por vehiculo
//si se esta buscando las piezas de un vehiculo en especifico, se utiliza esta query especial
$ID =$_GET['ID'];
$act = $_GET['act'];
if($act == 'busquedadetalladadepieza_listado')
{
//Esto es por si ocupas una busqueda de una pieza mediante el motor de busqueda.
//Si obtiene la variable de busqueda 
include('php/sqlfunctions/search.php');
$query = $searchquery;

	}
elseif($ID == '')
{
//si no hay nada en la variable ID, no se esta buscando ningun vehiculo especifico.	
$query = "SELECT PAR_ID, PI_ID, PAR_COLOR, PAR_VENDIDO, PAR_FOTO, PAR_MODELO, PAR_PRECIO, PAR_MARCA FROM partes ORDER BY PAR_ID desc";
}

//SI SETUP_VALIDAPOST es igual a 1, se esta buscando algo.
elseif($_POST['SETUP_VALIDAPOST'] == '1')
{

if($_POST['PI_ID'] == '')
{

}
else
{
$query = 'PI_ID = '.$_POST['PI_ID'].' and';	
}

if($_POST['PAR_MARCA'] == '')
{
	
}
else
{
$query2 = 'PAR_MARCA = '.$_POST['PAR_MARCA'].'';		
}

if($_POST['PAR_MODELO'] == '')
{
	
}
else
{
$query3 = 'PAR_MODELO = '.$_POST['PAR_MODELO'].'';		
}

if($_POST['PAR_COLOR'] == '')
{
	
}
else
{
$query4 = 'PAR_COLOR = '.$_POST['PAR_COLOR'].'';		
}

$querybuilder = "SELECT PAR_ID, PI_ID, PAR_COLOR, PAR_VENDIDO, PAR_FOTO, PAR_MODELO, PAR_PRECIO, PAR_MARCA from partes WHERE $query";
}
else
{
	//si si hay un valor, en ID, busca las piezas especificas de dicho auto.
	
	$query = "SELECT PAR_ID, PI_ID, PAR_COLOR, PAR_VENDIDO, PAR_FOTO, PAR_MODELO, PAR_PRECIO, PAR_MARCA FROM partes WHERE AUT_ID = $ID ORDER BY PAR_ID desc";
}

//listado de piezas. esta es la query
$sql = mysql_query($query);
// Adam's Custom PHP MySQL Pagination Tutorial and Script
// You have to put your mysql connection data and alter the SQL queries(both queries)
// This script is in tutorial form and is accompanied by the following video:
// http://www.youtube.com/watch?v=K8xYGnEOXYc

//////////////  QUERY THE MEMBER DATA INITIALLY LIKE YOU NORMALLY WOULD

//////////////////////////////////// Adam's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($sql); // Get total of Num rows from the database query
if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
}
//This is where we set how many database items to show on each page
$itemsPerPage = 5;
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
}
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . curPageURL() . '&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage;
// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax
// $sql2 is what we will use to fuel our while loop statement below
$sql2 = mysql_query("$query $limit"); 

//////////////////////////////// END Adam's Pagination Logic ////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Adam's Pagination Display Setup /////////////////////////////////////////////////////////////////////
$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . curPageURL() . '&pn=' . $previous . '"> Back</a> ';
    }
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . curPageURL() . '&pn=' . $nextPage . '"> Next</a> ';
    }
}
///////////////////////////////////// END Adam's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////
function vendido($PAR_VENDIDO)
{

if($PAR_VENDIDO == '1')
{
	$resulta ='<img src="images/vendido.png" width="90" align="right">';
}
else
{
$resulta = '';	
}
return $resulta;
	
}




// Build the Output Section Here
$outputList = '';
while($row = mysql_fetch_array($sql2)){

    $id = $row["PAR_ID"];
    $PI_ID = $row["PI_ID"];
    $PAR_COLOR = $row["PAR_COLOR"];
	$PAR_FOTO = $row["PAR_FOTO"];
	$PAR_MODELO = $row["PAR_MODELO"];
	$PAR_MARCA = $row["PAR_MARCA"];
	$PAR_VENDIDO = $row["PAR_VENDIDO"];
	$PAR_PRECIO = $row["PAR_PRECIO"];

$dato1 = dime("$PI_ID","PI_NOMBRE","partes_catalogo","PI_ID");
$dato2 = dime("$PAR_COLOR","COL_NOMBRE","colores","COL_ASCII");



    $outputList .= '
		<img src="fotos/'.$PAR_FOTO.'" WIDTH="120" height="70" align="right" style="margin:7px; border:1px solid #CCC;">
	<h1>ID: '.$id.' Pieza: <a href="handler.php?act=pieza&acc=edit&ID='.$id.'"> '. $dato1 . ' </a></h1> 
	Marca: '.$PAR_MODELO.' / Modelo: '.$PAR_MARCA.' / Precio: $'.$PAR_PRECIO.'<Br><Br>
	<div style="background-color:#'.$PAR_COLOR.'; float:left; width:5%">_</div> <div style="float:left; display:block">Color: ' . $dato2 . ' </div>
	<a href="handler.php?act=pieza&acc=edit&ID='.$id.'"><img src="images/editar.png" align="right"></a> 
	<a href="handler.php?act=borrarpieza&acc=delete&ID='.$id.'&value=PAR_ID&db=partes"><img src="images/borrar.png" align="right"></a>
		<a href="handler.php?act=venderpieza&acc=edit&ID='.$id.'"><img src="images/vender.png" align="right"></a> 
		 <a href="php/reports/reporte_pieza.php?ID='.$row['PAR_ID'].'" target="_blank"><img src="images/imprimir.png" align="right"></a>
		'.vendido(''.$PAR_VENDIDO.'').'
		
<br><br>
	<hr />
	';
    
} // close while loop
?>
<h1>Indice de Piezas <?php if($ID == '') {} else { echo "Por vehiculo con el ID #$ID"; } ?></h1>
  <h2>Resultados: <?php echo $nr; ?></h2>
   </div>
      <div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;"><?php echo $paginationDisplay; ?></div>
      <div style="margin-left:64px; margin-right:64px;"><?php print "$outputList"; ?></div>
      <div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;"><?php echo $paginationDisplay; ?></div>