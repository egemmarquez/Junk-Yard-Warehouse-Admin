
<?php
//valores para la funcion valor editable. para saber de donde saldran los valores
//Database
$db = "colores";  
//Nombre de la variable para obtener los datos
$ID_VALOR = "COL_ID"; ?>
<form action="<?php 
error_reporting(0); echo curPageURL(); ?>" method="post" enctype="multipart/form-data">

<?php //notas importantes: SETUP_VALIDAPOST es el valor que se encarga de triggerear el chequeo y registro de los datos en caso de que todo este bien. Sirve para todas las acciones de formularios, Registros nuevos, edicion y borrado :) ?>
<input type="hidden" value="1" id="SETUP_VALIDAPOST" name="SETUP_VALIDAPOST" />
<input type="hidden" value="PI_ID" id="SETUP_IDVALOR" name="SETUP_IDVALOR" />
<input type="hidden" value="colores" id="SETUP_DB" name="SETUP_DB" />
Nuevo Color: <input type="text" id="COL_NOMBRE" name="COL_NOMBRE*R" value="<?Php echo valoreditable("COL_NOMBRE","colores","$ID_VALOR"); ?>"/>
<br /><br />
Color :<input type="TEXT" value="" id="COL_ASCII" name="COL_ASCII" /> <br />
<script type="text/javascript">
$('#COL_ASCII, #colorpickerField2').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});
</script>
:: Haz clic aqui para que aparezca el cuadro de dialogo donde podras elegir el color y seleccionarlo. esto te servira para referenciar exactamente el color que ocupas.
<br /><br />

<!-- //Este es un campo especial para generar la clave para el registro. -->



<input type="submit" value="Registrar" />
<br /><br />
<a href="#" onClick="CloseAndRefresh();"><img src="images/cerraryrefrescar.png" /></a>	
</form>