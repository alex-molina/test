<?php
function do_html_form_login(){
echo'<link type="text/css" rel="stylesheet" href="css/estilo.css" /><br><div id="cform"><center>
<div style="background-color:#2E9AFE;width:504px;font-size:15px;color:#ffffff;font-weight:bold">Login</div>
<form method="POST" action="login.php">
<!--Creamos los campos y un label para cada uno de ellos-->
<br><label for="n_usuario">Usuario </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
<label for="pwd">Contraseña </label>    <br>
<input type="text" name="username" id="username"/>&nbsp;&nbsp;&nbsp;&nbsp;
<!--Este input debe ser -type="password" para que no se muestren los caracteres-->
<input type="password" name="passwd" id="passwd"/><br />
<!--Al dar click al botón se ejecutará el -action\-->
<br><input type="submit" value="Iniciar Sesión"/></center>   <br>
<br></form></div>';
}
 //---------------------------------funcion--------------------------------------------------------

function userIsAuth(){
  // Si no hay una sesión iniciada, lo hacemos
  if ( !isset($_SESSION) ){
    session_start();
  }

  // If existe la variable de sesión "user" entonces es que un usuario ha iniciado sesión
  if ( isset($_SESSION['user']) ){
    return true;
  } else {
    return false;
  }
}

 //--------------------------------end funcion--------------------------------------------------------

//---------------------------------funcion--------------------------------------------------------
function login($username, $passwd){
  if ( !isset($_SESSION) ){
    session_start();
  }

  // Nos conectamos a la base de datos
  $conn = db_connect();

  // Evitemos un poco de SQL-injection
  $username = mysql_real_escape_string($username);
  $passwd = mysql_real_escape_string($passwd);

  // comprobamos si el nombre de usuario es exclusivo
  $result = $conn->query("select * from user
                          where username='$username'
                          and passwd='$passwd' and id=1");

  // Miramos si hemos podido hacer la consulta a la base de datos
  if ( !$result ){
    return false;
  }

  // Si hemos autenticado al usuario entonces lo registramos en la sesión
  if ( $result->num_rows > 0 ){
    $_SESSION['user'] = $username;
    return true;
  } else {
    return false;
  }
}
 //--------------------------------end funcion--------------------------------------------------------
function db_connect(){
$host="localhost";
$username="root";
$password="";
$dbname="adsis";
  $result = new mysqli($host, $username, $password, $dbname);
  if( !$result ){
    throw new Exception('No se ha podido conectar a la base de datos');
  } else {
    return $result;
  }
}
 //--------------------------------end funcion login----------------------------------------------------

function ultimoDia($mes,$ano){
    $ultimo_dia=28;
    while (checkdate($mes,$ultimo_dia + 1,$ano)){
       $ultimo_dia++;
    }
    return $ultimo_dia;
} 

function calendar_html(){
	$meses= array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	//$fecha_fin=date('d-m-Y',time());
	$mes=date('m',time());
	$anio=date('Y',time());
	?>
	<table style="width:200px;text-align:center;border:1px solid #808080;border-bottom:0px;" cellpadding="0" cellspacing="0">
	 <tr>
	  <td colspan="4">
	  	<select id="calendar_mes" onchange="update_calendar()">
		 <?php
		 $mes_numero=1;
		 while($mes_numero<=12){
		 	if($mes_numero==$mes){
				echo "<option value=".$mes_numero." selected=\"selected\">".$meses[$mes_numero-1]."</option> \n";
			}else{
		 		echo "<option value=".$mes_numero.">".$meses[$mes_numero-1]."</option> \n";
			}
			$mes_numero++;
		 }
		 ?>
		</select>
	  </td>
	  <td colspan="3">
	  	<select style="width:70px;" id="calendar_anio" onchange="update_calendar()">
		 <?php
		 // años a mostrar
		 $anio_min=$anio-30; //hace 30 años
		 $anio_max=$anio; //año actual
		 while($anio_min<=$anio_max){
		 	echo "<option value=".$anio_min.">".$anio_min."</option> \n";
			$anio_min++;
		 }
		 ?>
		</select>
	  </td>
	 </tr>
	</table>
	<div id="calendario_dias">
	<?php calendar($mes,$anio) ?>
	</div>
	<?php
}

function calendar($mes,$anio){
	$dia=1;
	if(strlen($mes)==1) $mes='0'.$mes;
	?>
	<table style="width:200px;text-align:center;border:1px solid #808080;border-top:0px;" cellpadding="0" cellspacing="0">
	 <tr style="background-color:#CCCCCC;">
	  <td>D</td>
	  <td>L</td>
	  <td>M</td>
	  <td>M</td>
	  <td>J</td>
	  <td>V</td>
	  <td>S</td>
	 </tr>
	<?php

	//echo $mes.$dia.$anio;
	$numero_primer_dia = date('w', mktime(0,0,0,$mes,$dia,$anio));
	$ultimo_dia=ultimoDia($mes,$anio);
	
	$total_dias=$numero_primer_dia+$ultimo_dia;

	$diames=1;
	//$j dias totales (dias que empieza a contarse el 1º + los dias del mes)
	$j=1;
	while($j<$total_dias){
		echo "<tr> \n";
		//$i contador dias por semana
		$i=0;
		while($i<7){
			if($j<=$numero_primer_dia){
				echo " <td></td> \n";
			}elseif($diames>$ultimo_dia){
				echo " <td></td> \n";
			}else{
				if($diames<10) $diames_con_cero='0'.$diames;
				else $diames_con_cero=$diames;

				//echo " <td><a style=\"display:block;cursor:pointer;\" onclick=\"set_date('".$diames_con_cero."-".$mes."-".$anio."')\">".$diames."</a></td> \n";
				echo " <td><a style=\"display:block;cursor:pointer;\" onclick=\"set_date('".$anio."-".$mes."-".$diames_con_cero."')\">".$diames."</a></td> \n";
				$diames++;
			}
			$i++;
			$j++;
		}
		echo "</tr> \n";
	}
	?>
	</table>
	<?php
}
?>
