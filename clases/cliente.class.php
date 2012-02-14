<?php
include_once("conexion.class.php");

class Cliente{
 //constructor	
 	var $con;
 	function Cliente(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){
			//print_r($campos);
			//echo "INSERT INTO cliente (nombres, ciudad, sexo, telefono, fecha_nacimiento) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')";
			return mysql_query("INSERT INTO cliente (nombres, pais, estado, ciudad, sexo, fecha_nacimiento, avatar, tipo_id) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."','".$campos[6]."','".$campos[7]."')");
		}
	}
	
	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE cliente SET nombres = '".$campos[0]."', pais = '".$campos[1]."', estado = '".$campos[2]."', ciudad = '".$campos[3]."', sexo = '".$campos[4]."', fecha_nacimiento = '".$campos[5]."', avatar = '".$campos[6]."', tipo_id = '".$campos[7]."' WHERE id = ".$id);
		}
	}
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM cliente WHERE id=".$id);
		}
	}

	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM cliente ORDER BY id DESC");
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM cliente WHERE id=".$id);
		}
	}
}
?>
