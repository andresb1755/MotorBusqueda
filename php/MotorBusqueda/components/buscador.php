<script src="librerias/jquery-3.5.1.min.js"></script>
<script src="librerias/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>

<section>
  <h1>
  Consulta de Docentes
  <small class="text-muted">IUPB</small>
  </h1>
  <form method="POST">
    <div class="form-inline">
      <!--Label/entrada de la consulta--> 
      <input type="text" class="form-control" id="InputConsulta" 
      placeholder="Buscar">
      <!--Boton Buscar -->
   	<button type="button" class="btn btn-info" id="buscar">
      <span class="glyphicon glyphicon-search"></span> 
      Buscar
     </button>
    </div>
    <small class="form-text text-muted">
      Introduzca su consulta.
    </small>	
  </form>

</section>

<script>
  $(document).ready(function() {
    $('#buscar').click(function() {
      Documento = $('#InputConsulta').val();
      if (Documento.length > 0) 
        Busqueda(Documento);
      else
      swal({
              title: "Error",
              text: "Introduzca su busqueda correctamente",
              icon: "warning",
              dangerMode: true
            });
      if ($('#ResultadoBusqueda').hide()) {
        $('#ResultadoBusqueda').show();
      }
    });
  });
</script>