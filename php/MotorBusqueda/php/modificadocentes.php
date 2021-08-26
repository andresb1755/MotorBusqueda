<?php

	require_once "conexion.php";
	$conexion = Conexion();
	
	$Documento= $_POST['Documento'];
	$Nombre=$_POST['Nombre'];
	$Facultad=$_POST['Facultad'];	
	$Nivel_formacion=$_POST['Nivel_formacion'];
	$Titulo=$_POST['Titulo'];
	$Grupo_investigacion=$_POST['Grupo_investigacion'];
	$Institucion=$_POST['Institucion'];
	$CvLAC=$_POST['CvLAC'];

	$query = "UPDATE docentes SET Nombre = '$Nombre', Facultad = '$Facultad', Nivel_formacion = '$Nivel_formacion', Titulo = '$Titulo', Grupo_investigacion = '$Grupo_investigacion', Institucion = '$Institucion', CvLAC = '$CvLAC' WHERE Documento = $Documento";

	echo $r = mysqli_query($conexion, $query);

?>