<!--Modal de Agregar-->
<script src="librerias/jquery-3.5.1.min.js"></script>
<script src="js/funciones.js"></script>

<div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir un nuevo Docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--campos para agregar--->
        <label for="message-text" class="col-form-label">Documento:</label>
        <input type="text" class="form-control" id="Documento">

        <label for="message-text" class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" id="Nombre">

        <label for="message-text" class="col-form-label">Facultad:</label>
        <input type="text" class="form-control" id="Facultad">

        <label for="message-text" class="col-form-label">Nivel_formacion:</label>
        <input type="text" class="form-control" id="Nivel_formacion">

        <label for="message-text" class="col-form-label">Titulo:</label>
        <input type="text" class="form-control" id="Titulo">

        <label for="message-text" class="col-form-label">Grupo_investigacion:</label>
        <input type="text" class="form-control" id="Grupo_investigacion">

        <label for="message-text" class="col-form-label">Institucion:</label>
        <input type="text" class="form-control" id="Institucion">

        <label for="message-text" class="col-form-label">CvLAC:</label>
        <input type="text" class="form-control" id="CvLAC">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnGuardar">
        Insertar Docente
      </button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    //Llamamos la función AñadirDocente() al darle click al boton Insertar Docente
    $('#btnGuardar').click(function() {
      Documento = $('#Documento').val();
      Nombre = $('#Nombre').val();
      Facultad = $('#Facultad').val();
      Nivel_formacion = $('#Nivel_formacion').val();
      Titulo = $('#Titulo').val();
      Grupo_investigacion = $('#Grupo_investigacion').val();
      Institucion = $('#Institucion').val();
      CvLAC = $('#CvLAC').val();

      if (Documento) {
        Agregardocente(Documento, Nombre, Facultad, Nivel_formacion, Titulo,
        Grupo_investigacion, Institucion, CvLAC);
        $('#ModalAgregar').close();
      }
      else{
        swal({
              title: "Error",
              text: "Inserte el Documento correctamente",
              icon: "warning",
              dangerMode: true
            });
      }
    });
  });
</script>