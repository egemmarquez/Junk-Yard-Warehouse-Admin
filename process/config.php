<? //este es config

//Defines valores
define ("sitio","http://www.mcallenbanners.com");
define ("adress","localhost");
define ("usuario","mcallen1_mcallen");
define ("password","Mc0991lOX");
define ("database","mcallen1_payment");
//define ("adress","localhost");
//define ("usuario","root");
//define ("password","");
//define ("database","mcallen");
define ("verificacion","ASDX1");

function conectarse()
{
global $conexion;

$ADRESS = ''.adress.'';
$USUARIO = ''.usuario.'';
$PASSWORD = ''.password.'';
$DATABASE = ''.database.'';

   if (!($link=mysql_connect(''.$ADRESS.'',''.$USUARIO.'',''.$PASSWORD.'')))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db(''.$DATABASE.'',$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
   
}

//definicion
define("imagenes","images");

function processquery($consulta)
{
$link=Conectarse();
$query = mysql_query($consulta,$link) or die(mysql_error()); 
global $query;
}

function preciototal($precio,$cantidad,$envio)
{
	
$precio = $precio * $cantidad;
$precio = $precio * 1.0825;
$precio = number_format($precio, 2, '.', '');

if($envio == '')
{
}
else
{
	$precio = $precio + $envio;
}
return "$ $precio";
	
}

function status($status)
{
//Aqui se define el status del pedido. Si solo se ha generado el quote, significa que esta en 0 (No Pagado) cuando dice 1, esta en Pagado, esperando archivo si dice 2 Es Pagado, Con Archivo online, un numero 3 seria "problema con el pago")

if($status == '0')
{
$shout = '<font style="color:#FF0000">No pagado</font>'; 	
}
elseif($status == '1')
{
$shout = '<font style="color:#0000FF">Pagado, Esperando Archivo</font>';	
}
elseif($status == '2')
{
$shout = '<font style="color:#009900">Pagado, Archivo Recibido</font>';	
}
elseif($status == '3')
{
$shout = '<font style="color:#FF0000">Problema con el pago</font>';	
}
elseif($status == '4')
{
$shout = '<font style="color:#009900">Enviado</font>';	
}
return $shout;
}

function filextension($fileName)
{

$ext = substr($fileName, strrpos($fileName, '.') + 1);

if ($ext == 'jpg')
{
$despliega = '<img src="../up/'.$fileName.'" width="350">';	
}
elseif ($ext == 'JPG')
{
$despliega = '<img src="../up/'.$fileName.'" width="350">';	
}
elseif ($ext == 'JPEG')
{
$despliega = '<img src="../up/'.$fileName.'" width="350">';	
}
elseif ($ext == 'PNG')
{
$despliega = '<img src="../up/'.$fileName.'" width="350">';	
}
elseif ($ext == 'png')
{
$despliega = '<img src="../up/'.$fileName.'" width="350">';	
}
elseif ($ext == 'PDF')
{
$despliega = '<img src="'.imagenes.'/pdficon.jpg">';	
}
elseif ($ext == 'pdf')
{
$despliega = '<img src="'.imagenes.'/pdficon.jpg">';	
}
elseif ($ext == 'EPS')
{
$despliega = '<img src="'.imagenes.'/epsicon.jpg">';	
}
elseif ($ext == 'eps')
{
$despliega = '<img src="'.imagenes.'/epsicon.jpg">';	
}
elseif ($ext == '')
{
$despliega = '<img src="'.imagenes.'/nopic.jpg">';	
}
else
{
$despliega = '<img src="'.imagenes.'/warning.png">';	
}
return $despliega;
}

function sendinvoice($email,$item_number)
{
	
$URLID = $item_number;
	
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'From: info@mcallenbanners.com' . "\r\n";
$Message = '
<img src="http://mcallenbanners.com/site2/img/logodef.png">
<h1>Payment Request</h1>
You ve requested an invoice trough our site, via Live Chat or contact form <a href="http://mcallenbanners.com/">www.McallenBanners.com</a> 

You can Checkout and upload your file trough this link:

<a href="http://mcallenbanners.com/index.php?action=4458&customcheckout=true&ID='.$URLID.'">http://mcallenbanners.com/index.php?action=customcheckout&ID='.$URLID.'</a>
';

mail($email, "Mcallen Banners : Custom request order", "$Message",$headers);

}


function sendnotification($email,$ID,$item_number,$tracking)
{
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'From: info@mcallenbanners.com' . "\r\n";
$Message = '
<img src="http://mcallenbanners.com/site2/img/logodef.png">
<h1>Good News!, Your package is on its way</h1>
Thanks for buying on <a href="http://mcallenbanners.com/">www.McallenBanners.com</a>!! 

Your package with the item number: '.$item_number.' has been shipped! 

Your tracking number is: '.$tracking.'

Please refer to the site <a href="usps.com">Usps.com</a> and keep the track of your shipping!

';

mail($email, "Mcallen Banners : Custom request order", "$Message",$headers);
}

?>