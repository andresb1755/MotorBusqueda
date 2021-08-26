
<?php
	require_once "conexion.php";
	$conexion = Conexion();

	$doc = $_POST['Documento'];
	$query = "SELECT * FROM docentes WHERE Documento = $doc";
	$r = mysqli_query($conexion, $query);
	while($row = mysqli_fetch_row($r)){
		echo $resultado= $row[0]."||".
						$row[1]."||".
						$row[2]."||".
						$row[3]."||".
						$row[4]."||".
						$row[5]."||".
						$row[6]."||".
						$row[7];
	}
?>