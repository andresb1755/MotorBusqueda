<!--Modal de Modificacion-->
<script src="librerias/jquery-3.5.1.min.js"></script>
<script src="js/funciones.js"></script>

<div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificación de Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--campos a Modificar--->
        <label for="message-text" class="col-form-label">Documento:</label>
        <input type="text" class="form-control" id="mDocumento">

        <label for="message-text" class="col-form-label">Nombres:</label>
        <input type="text" class="form-control" id="mNombres">

        <label for="message-text" class="col-form-label">Facultad:</label>
        <input type="text" class="form-control" id="mFacultad">

        <label for="message-text" class="col-form-label">Nivel_formacion:</label>
        <input type="text" class="form-control" id="mNivel_formacion">

        <label for="message-text" class="col-form-label">Titulo:</label>
        <input type="text" class="form-control" id="mTitulo">

        <label for="message-text" class="col-form-label">Grupo_investigacion:</label>
        <input type="text" class="form-control" id="mGrupo_investigacion">

        <label for="message-text" class="col-form-label">Institucion:</label>
        <input type="text" class="form-control" id="mInstitucion">

        <label for="message-text" class="col-form-label">CvLAC:</label>
        <input type="text" class="form-control" id="mCvLAC">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"
        id="cancelar">Cancelar</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="modifica">Modificar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
    //al clickear el boton...
    $('#mDocumento').prop('disabled', true);
      $('#modifica').click(function(){
        /*llamamos la funcion desde el archivo funciones*/ 
        ModificarDocente();
        $("#ModalModificar").hide();//ocultamos el modal
      });
      $('#cancelar').click(function() {
        $("#ModalModificar").hide();//ocultamos el modal
      });
  });

</script>