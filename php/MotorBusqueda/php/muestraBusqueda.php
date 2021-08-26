<script src="librerias/jquery-3.5.1.min.js"></script>
<script src="librerias/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>


<div id="busquedas">
				<figcaption>
					<button class="btn btn-danger" id="CerrarBusqueda">
  						X
					</button>
				</figcaption>
				<table class="table table-hover table-condensed table-bordered" border="solid" >
						<tr class = "thead-light"><!--Filas-->
							<th>Cédula:</th>
							<th>Nombre:</th>
							<th>Facultad:</th>
							<th>Nivel de Formación:</th>
							<th>Títulos:</th>
							<th>Grupo de Investigación:</th>
							<th>Institución:</th>
							<th>CvLAC:</th>
						</tr>
					<tr>
						<td id="cedula">
							
						</td>
						<td id="nombre">
							
						</td>
						<td id="facultad">
							
						</td>
						<td id="nivel_formacion">
							
						</td>
						<td id="titulo">
							
						</td>
						<td id="grupo_investigacion">
							
						</td>
						<td id="institucion">
							
						</td>
						<td id="cvlac">
							
						</td>
            		</tr>
				</table>
				
</div>

</body>
<script>
	//Cerramos la modal 
  $(document).ready(function() {
    $('#CerrarBusqueda').click(function() {
     $('#ResultadoBusqueda').hide();
    });
  });
</script>