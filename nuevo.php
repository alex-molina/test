<?php
require('functions.php');
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');

       $user= "root";
    $pass="";
    $bbdd="adsis";
    $dbh = mysql_connect("localhost", $user, $pass);
    $db = mysql_select_db($bbdd);



    if(isset($_POST['pais'])){
    $consulta = "SELECT * from pais WHERE id = ".$_POST['pais'];
    $query = mysql_query($consulta);
    while ($fila = @mysql_fetch_array($query)) {
    $pais=$fila['nombre'];
 };
     }
     if(isset($_POST['estado'])){
    $consulta = "SELECT * from estado WHERE id = ".$_POST['estado'];
    $query = mysql_query($consulta);
    while ($fila = @mysql_fetch_array($query)) {
    $estado=$fila['nombre'];
 };
     }
     if(isset($_POST['ciudad'])){
    $consulta = "SELECT * from ciudad WHERE id = ".$_POST['ciudad'];
    $query = mysql_query($consulta);
    while ($fila = @mysql_fetch_array($query)) {
    $ciudad=$fila['nombre'];
 };
     }
     if($_POST['avatar']=="undefined")
     {
     $avatar="img/tux.jpg";
     }
     else
     {
     $avatar = htmlspecialchars(trim($_POST['avatar']));
     }

     $nombres = htmlspecialchars(trim($_POST['nombres']));
        $pais = htmlspecialchars(trim($pais));
        $estado = htmlspecialchars(trim($estado));
        $ciudad = htmlspecialchars(trim($ciudad));
        $sexo = htmlspecialchars(trim($_POST['alternativas']));
        $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento']));

        $tipo_id = htmlspecialchars(trim($_POST['tipo_id']));

	$objCliente=new Cliente;
	if ( $objCliente->insertar(array($nombres,$pais,$estado,$ciudad,$sexo,$fecha_nacimiento,$avatar,$tipo_id)) == true){
		echo 'Datos guardados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	}
}
else{


if(!isset($_POST['submit'])){
?>
<script language="javascript" src="js/AjaxUpload.2.0.min.js"></script>

<script language="javascript">
$(document).ready(function(){
	var button = $('#upload_button'), interval;
	new AjaxUpload('#upload_button', {

                action: 'upload.php',
		onSubmit : function(file , ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extensiones permitidas
			alert('Error: Solo se permiten imagenes');
			// cancela upload
			return false;
		} else {
			button.text('Cargando..');
			this.disable();
		}
		},
		onComplete: function(file, response){
			button.text('Cambiar Avatar');
			// enable upload button
			this.enable();
			// Agrega archivo a la lista
			$('#lista').appendTo('.files').html('<img src="img/'+file+'" alt="" height="120" width="130" /><br><input class="text" type="hidden" name="avatar" id="avatar" value="img/'+file+'" />');
		}
	});
});
</script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#pais").change(function(event){
            var id_pais = $("#pais").find(':selected').val();
            $("#estado").load('genera-select.php?id_pais='+id_pais);
        });
    });

    $(document).ready(function(){
        $("#estado").change(function(event){
            var id_estado = $("#estado").find(':selected').val();
            $("#ciudad").load('genera-select.php?id_estado='+id_estado);
        });
    });
</script>      <?
}
?>
<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevo.php" onsubmit="GrabarDatos(); return false">
 <div style="text-align:left;border:0px solid; margin: 0px 0 0 25px; padding: 0px auto; float:left; position:relative; width:480px">
 <div align="center" style="text-align:center;border:0px solid; margin: 0 70px 0 0; padding: 0 auto; float:right;"><ul id="lista">
 </ul>
     </div><br><br><div style="text-align:center;border:0px solid; margin: 0 auto; padding: 0 auto; float:left;" id="upload_button">Cargar Avatar</div>

  </div>
  <p><label>Tipo<br />
  <input class="text" type="text" name="tipo_id" id="tipo_id" />
  </label>
  </p>
  <p><label>Nombres<br />
  <input class="text" type="text" name="nombres" id="nombres" />
  </label>
  </p>
   <p>
    <label>pais<br />
    <select name="pais" id="pais">
   <?
    $user= "root";
    $pass="";
    $bbdd="adsis";
    $dbh = mysql_connect("localhost", $user, $pass);
    $db = mysql_select_db($bbdd);
   $consulta = "SELECT * from pais order by id";
    $query = mysql_query($consulta);
    echo'<option value="0">Selecciona Pais</option>';
    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
 };  ?>
</select>




    <!--input class="text" type="text" name="pais" id="pais" /-->
    </label>
  </p>
   <p>
     <label>Estado<br /><select name="estado" id="estado">
    <ul id="estado" style="margin: 0 0 0 25px"></ul>
    </select>
    <!--input class="text" type="text" name="estado" id="estado" /-->
    </label>
  </p>
  <p>
  <label>Ciudad<br /><select name="ciudad" id="ciudad">
    <ul id="ciudad" style="margin: 0 0 0 25px"></ul>
    </select>
    <!--input class="text" type="text" name="ciudad" id="ciudad" /-->
    </label>
  </p>
  <p>
    <label>
    <input type="radio" name="alternativas" id="masculino" value="M" />
    Masculino</label>
    <label>
    <input type="radio" name="alternativas" id="femenino" value="F" />
    Femenino</label>
  </p>
   <p>
    <label>Fecha Nacimiento <a onclick="show_calendar()" style="cursor: pointer;">
<small>(calendario)</small>
</a><br />
    <input readonly="readonly" class="text" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo date("Y-m-j")?>" />
    <div id="calendario" style="display:none;"><?php calendar_html() ?></div>
    </label>
  </p>
  <p>
    <input type="submit" name="submit" id="button" value="Enviar" />
    <label></label>
    <input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
  </p>
</form>
<?php
}
?>

