<?php
require('functions.php');
// Si el usuario no está autenticado entonces lo mandamos a la página de autenticación(login.php)
if ( !userIsAuth() ){
header('Location: login.php'); // Cuidado con esta función. Debe ser llamada antes de MOSTRAR NADA por pantalla, incluidos espacios en blanco.
}

// Si no, significa que está autenticado y podemos cargar el contenido de la página.


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mantenimiento de Clientes</title>
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<script src="js/jquery.functions.js" type="text/javascript"></script>
<script src="js/jquery.uitablefilter.js" type="text/javascript"></script>
	<script language="javascript">
		$(function() {
		  theTable = $("#filtro");
		  $("#q").keyup(function() {
			$.uiTableFilter(theTable, this.value);
		  });
		});
		</script>
<link type="text/css" rel="stylesheet" href="css/estilo.css" />
</head>

<body>
<div id="contenedor">
    <div id="formulario" style="display:none;">
    </div>
    <div id="tabla">
    <?php include('consulta.php') ?>
    </div>
</div>

</body>
</html>
