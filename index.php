<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sistema administrador</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> doBump('.bump'); </script>
</head>
<script src="scripts/reloj.js"></script>
<body onLoad="hora()"> 
<br>
<div id="maincontainer">
<div id="line">
SISTEMA DE PARTES
<div style="float:right;">
<? 
echo date("d-m-Y"); ?> <span id="hora"> </span>
</div>

- Hola: <?Php echo $_SESSION['MM_Username']; ?>  <a href="index.php?doLogout=true"><img src="images/desconectarse.png"></a> </div>
<br>
<br>

<div id="linea">
<b>Registrar</b>
<br>
<?PHP if($_SESSION['MM_tipodeusuario'] == '1') { ?>
<div id="boxsec">
<a href="handler.php?act=pieza&acc=write" class="bump" rel="950-600"><img src="images/register.png" width="80"></a><br>
Registra una pieza
</div>
<? } ?>
<?PHP if($_SESSION['MM_tipodeusuario'] == '1') { ?>
<div id="boxsec">
<a href="handler.php?act=vehiculo&acc=write" class="bump" rel="950-600"><img src="images/agregarauto.png" width="80"></a><br>
Registra un Vehiculo
</div>
<? } ?>
<div id="boxsec">
<a href="handler.php?act=buscarpieza&acc=lista" class="bump" rel="950-600"><img src="images/piezas.png" width="80"></a><br>
Listado Pieza
</div>

<div id="boxsec">
<a href="handler.php?act=buscarauto&acc=lista" class="bump" rel="950-600"><img src="images/modify.png" width="80"></a><br>
Listado Vehiculo	
</div>

<br>

</div>



<div id="lineb">
<b>Vender</b>
<br>
<div id="boxsec"><a href="handler.php?act=buscarpieza&acc=lista" class="bump" rel="950-600">
<img src="images/sell.png" width="80"></a><br>
Vender una parte
</div>
<br>

</div>

<div id="linea">
<b>Buscar</b>
<br>
<div id="boxsec">
<a href="handler.php?act=busquedadetalladadevehiculo&acc=lista" class="bump" rel="950-600">
<img src="images/buscar.png" width="80"></a><br>
Buscar un Vehiculo
</div>
<div id="boxsec">
<a href="handler.php?act=busquedadetalladadepieza&acc=lista" class="bump" rel="950-600">
<img src="images/register.png" width="80"></a><br>
Buscar Una parte
</div>
<br>

</div>

<?PHP if($_SESSION['MM_tipodeusuario'] == '1') { ?>
<div id="lineb">
<b>Impresion</b>
<br>
<div id="boxsec">
<a href="handler.php?act=imprimir_ventas&acc=imprimir" class="bump" rel="950-600"><img src="images/print.png" width="80"></a><br>
Imprimir reporte de ventas
</div>
<div id="boxsec">
<a href="handler.php?act=imprimir_pieza&acc=imprimir" class="bump" rel="950-600"><img src="images/imprimircodigo.png" width="80"></a><br>
Imprimir codigos de barras
</div>
<div id="boxsec">
<a href="handler.php?act=imprimir_inventario&acc=imprimir" class="bump" rel="950-600"><img src="images/print.png" width="80"></a><br>
Imprimir inventario
</div>
 <? } ?>
 <br>

</div>
<?PHP if($_SESSION['MM_tipodeusuario'] == '1')
{ ?>
<div id="linea">
<b>Sistema</b>
<br>
<div id="boxsec">
<a href="handler.php?act=listadotipopieza" class="bump" rel="950-600">
<img src="images/editarpieza.png" width="80"></a><br>
Piezas
</div>
<div id="boxsec">
<a href="handler.php?act=listadotipomarca" class="bump" rel="950-600">
<img src="images/editarmarca.png" width="80"></a><br>
Marcas
</div>
<div id="boxsec">
<a href="handler.php?act=listadotipomodelo" class="bump" rel="950-600">
<img src="images/modelo.png" width="80"></a><br>
Modelos
</div>
<div id="boxsec">
<a href="handler.php?act=listado_almacen" class="bump" rel="950-600">
<img src="images/racks.png" width="80"></a><br>
Racks
</div>
<div id="boxsec">
<a href="handler.php?act=listado_usuarios" class="bump" rel="950-600">
<img src="images/usuarios.png" width="80"></a><br>
Usuarios
</div>
<div id="boxsec">
<a href="handler.php?act=nuevo_color" class="bump" rel="950-600">
<img src="images/color.png" width="80"></a><br> 
Registra Color
</div>

<? } else { } ?>
<br>

</div>


</div>

<br><br>
<script type="text/javascript" src="js/mootools.js"></script> 
<script type="text/javascript" src="js/bumpbox-2.1.js" ></script> 
<script type="text/javascript">
window.addEvent('domready',function(){
//names,inSpeed,outSpeed,boxColor,backColor,bgOpacity,bRadius,borderWeight,borderColor,boxShadowSize,boxShadowColor,iconSet,effectsIn,effectsOut
doBump('.bump',500,250,'CCC','323232',0.7,7,2,'111',12,'111',3);
})
</script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-840263-2";
urchinTracker();
</script></body>
</html>