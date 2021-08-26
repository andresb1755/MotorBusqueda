<?php
	
	//Recibimos los datos enviados por la función AñadirDocentes()
	//Y los insertamos en la base de datos por medio de una consulta

	//Obtenemos la concexión con la base de datos
	require_once 'conexion.php';
	$conexion = Conexion();

	$Documento = $_POST['Documento'];
	$Nombre = $_POST['Nombre'];
	$Facultad = $_POST['Facultad'];
	$Nivel_formacion = $_POST['Nivel_formacion'];
	$Titulo = $_POST['Titulo'];
	$Grupo_investigacion = $_POST['Grupo_investigacion'];
	$Institucion = $_POST['Institucion'];
	$CvLAC = $_POST['CvLAC'];

	//Hacemos la consulta
	$query = "INSERT INTO docentes (Documento, Nombre, Facultad, Nivel_formacion, Titulo, Grupo_investigacion, Institucion, CvLAC) VALUES ('$Documento', '$Nombre', '$Facultad', '$Nivel_formacion', '$Titulo', 
	'$Grupo_investigacion', '$Institucion', '$CvLAC')";
	echo $r = mysqli_query($conexion, $query);
?>