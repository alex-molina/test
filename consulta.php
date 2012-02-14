<?php
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_clientes();
?>
<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-10143667-20']);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(['_trackPageLoadTime']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
<script type="text/javascript">
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modi a").click(function(){
		$('#tabla').hide();
		$("#formulario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});

	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$.ajax({
			type: "GET",
			url: 'nuevo.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
<div style="position:relative;border: 0px solid; margin-top:3px">
<div id="busqueda" style="float:left;font-weight:bold;font-size:10px;margin-left:50px;">
		     Buscar <input type="text" id="q" name="q" value="" />
		</div>
<div style="float:right;margin-right:50px">&nbsp;&nbsp;<span style="float:right;color:#ff0000;"><a href="logout.php">
               <img src="img/salir.png" title="Salir" alt="Salir" /></a></span>
               </div> <div style="float:right"><span id="nuevo">
<a href="nuevo.php"><img src="img/add.png" title="Agregar" alt="Agregar" /></a></span>
    	</div>
     </div> <br><br>
               <table id="filtro">
   		<tr>
   		     <th>Avatar</th>
                     <th>Tipo</th>
                     <th>Nombres</th>
        <th>Fecha Nacimiento</th>
        <th>Sexo</th>
            <th>Pais</th>
                <th>Estado</th>
                <th>Ciudad</th>
    		  <th></th>
            <th></th>
        </tr>
<?php
if($consulta) {
	while( $cliente = mysql_fetch_array($consulta) ){
	?>

		  <tr id="fila-<?php echo $cliente['id'] ?>">
			  <td><img src="<?php echo $cliente['avatar'] ?>" style="width:40px; height:40px;"></td>
                          <td><?php echo $cliente['tipo_id'] ?></td>
                          <td><?php echo $cliente['nombres'] ?></td>
			  <td><?php echo $cliente['fecha_nacimiento'] ?></td>
                          <td><?php echo $cliente['sexo'] ?></td>
			  <td><?php echo $cliente['pais'] ?></td>
                          <td><?php echo $cliente['estado'] ?></td>
                           <td><?php echo $cliente['ciudad'] ?></td>
			  <td><span class="modi"><a href="actualizar.php?id=<?php echo $cliente['id'] ?>"><img src="img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminar.php?id=<?php echo $cliente['id'] ?>"><img src="img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>
