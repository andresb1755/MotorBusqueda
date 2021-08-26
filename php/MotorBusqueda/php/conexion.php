<?php
//creamos una funcion para hacer la conexion
	function Conexion(){
		$servidor = "localhost";
		$usuario = "cliente";
		$clave = "123";
		$bdname = "motordebusqueda";
		$conexion = mysqli_connect($servidor, $usuario, $clave, $bdname);
		return $conexion;
	}
?>
