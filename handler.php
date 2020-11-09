
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/layout.css" />
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.22.custom.css" rel="Stylesheet" />
 <script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
 
 	<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
<script src="js/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
   
<script language="JavaScript" type="text/javascript">
 function CloseAndRefresh() 
  {
     opener.location.reload(true);
     self.close();
  }
</script>
<title>handler.php</title>
</head>
<body>

<div style="width:98%; height:auto;">
<?php 
error_reporting(0);
//act me sirve para determinar el formulario a cargar
$forma = $_GET['act'];
//acc me sirve para determinar la accion que se realizara.
$accion = $_GET['acc'];
include_once('php/sqlfunctions/detectaeditar.php');
include_once('php/sqlfunctions/detecta.php');
$accion = new determinaaccion($accion,$_POST['SETUP_VALIDAPOST']);
$detecta = new detecta($forma);


?>
</div>
</body>
</html>