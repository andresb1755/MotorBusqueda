<?php
	session_start();
	require_once "../php/conexion.php";
	$conexion = Conexion();
?>
<div id="contenedor">
	
				<table class="table table-hover table-condensed table-bordered" border="solid" id="table">
				<!--Boton de agregar-->
				<figcaption>
					<button class="btn btn-primary" data-toggle="modal" data-target="#ModalAgregar" id="añadirDocente">
  							Añadir Docente
					</button>
				</figcaption>
					<tr class = "thead-light"><!--Filas-->
						<th>Cédula:</th>
						<th>Nombre:</th>
						<th>Facultad:</th>
						<th>Nivel de Formación:</th>
						<th>Títulos:</th>
						<th>Grupo de Investigación:</th>
						<th>Institución:</th>
						<th>CvLAC:</th>
						<th>Editar</th>
						<th>Eliminar</th>

					</tr>

					<!--Consulta de registros-->
				<?php
					$query = "SELECT * FROM docentes";
					$resultado = mysqli_query($conexion, $query);
					while ($row = mysqli_fetch_row($resultado)) {
						/*Guardamos cada dato devuelto por la 
						consulta en la variable datos, cada uno de estos
						separados con '||'
						*/
						$datos= $row[0]."||".
								$row[1]."||".
								$row[2]."||".
								$row[3]."||".
								$row[4]."||".
								$row[5]."||".
								$row[6]."||".
								$row[7];
				?>

						<tr> <!--Columna-->
							<td>
								<!--Mostramos las columnas en orden-->
								<?php echo ($row[0])?>
							</td>
							<td>
								<?php echo ($row[1])?>
							</td>
							<td>
								<?php echo ($row[2])?>
							</td>
							<td>
								<?php echo ($row[3])?>
							</td>
							<td>
								<?php echo ($row[4])?>
							</td>
							<td>
								<?php echo ($row[5])?>
							</td>
							<td>
								<?php echo ($row[6])?>
							</td>
							<td>
								<?php echo ($row[7])?>
							</td>
							<!--Botones de editar-->
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalModificar" onclick="MuestraDocente('<?php echo $datos ?>')">
	  								<span class="glyphicon glyphicon-pencil">
	  									Editar
	  								</span>
								</button>
							</td>
							<!--Botones de eliminar-->
							<td>
								<button type="button" class="btn btn-danger" onclick="Borrado('<?php echo $row[0] ?>')">
	  								<span class="glyphicon glyphicon-remove">
	  									Elimar
	  								</span>
								</button>
							</td>
							
						</tr>
				<?php
					}
				?>
				</table>
				
</div>

</body>
