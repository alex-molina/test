<?php
    $user= "root";
    $pass="";
    $bbdd="adsis";
    $dbh = mysql_connect("localhost", $user, $pass);
    $db = mysql_select_db($bbdd);

    if(isset($_GET['id_pais'])){
    $consulta = "SELECT * from estado WHERE id_pais = ".$_GET['id_pais'];
    $query = mysql_query($consulta);
    echo'<option value="0">Selecciona Estado</option>';
    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
 };
     }
    elseif(isset($_GET['id_estado'])){
      $consulta = "SELECT * from ciudad WHERE id_estado = ".$_GET['id_estado'];
    $query = mysql_query($consulta);
    echo'<option value="0">Selecciona Ciudad</option>';
 while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
    };

    }

?>
