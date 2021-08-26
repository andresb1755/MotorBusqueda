<?php
	require_once "conexion.php";
	$conexion = Conexion();

	$doc = $_POST['Documento'];

	$query = "DELETE FROM docentes WHERE Documento = $doc";
	echo $r = mysqli_query($conexion, $query);

?>