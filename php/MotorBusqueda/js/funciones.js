//Funciones de agregado, borrado y edición de docentes
'use strict'
function Agregardocente(Documento, Nombre, Facultad, Nivel_formacion, Titulo, 
        Grupo_investigacion, Institucion, CvLAC){
		var datos = {
				"Documento" : Documento,
				"Nombre" : Nombre,
				"Facultad" : Facultad,
				"Nivel_formacion" : Nivel_formacion,
				"Titulo" : Titulo,
				"Grupo_investigacion" : Grupo_investigacion,
				"Institucion" : Institucion,
				"CvLAC" : CvLAC
				};
		$.ajax({
	 		data:datos,
	        url:'php/agregardocente.php',
	        type:'POST',
	 		success:function(r){
	 			if (r == 1) {
	 				$('#tabla').load('components/tabla.php');
	 				 alertify.success('Añadido Correctamente');
	 			}
	 			else { alertify.error('No se pudo añadir correctamente');}
	 		}
	  	});
}

/*funcion de borrado de datos*/
function Borrado(Documento){
	var remove = {
		"Documento": Documento
	};
 	$.ajax({
 		data: remove,
 		type:'POST',
 		url:'php/eliminardocentes.php',
 		success:function(r){
 			if (r == 1) {
 				$('#tabla').load('components/tabla.php');
 				alertify.success('Borrado Correctamente');

 			}
 			else { alertify.error('No se pudo borrar exitosamente');}
 		}
  	});
}

/*Funcion para mostrar en el modal los datos
guadados en cada fila*/
function MuestraDocente(datos){//recibe un array con items separados por ||
	//Separamos los items del array   
	var d = datos.split('||');
	$('#mDocumento').val(d[0]);
	$('#mNombres').val(d[1]);
	$('#mFacultad').val(d[2]);
	$('#mNivel_formacion').val(d[3]);
	$('#mTitulo').val(d[4]);
	$('#mGrupo_investigacion').val(d[5]);
	$('#mInstitucion').val(d[6]);
	$('#mCvLAC').val(d[7]);
}

/*Funcion que permite hacer la modificacion de los datos*/
function ModificarDocente(){
	var Documento=$('#mDocumento').val();
	var Nombre=$('#mNombres').val();
	var Facultad=$('#mFacultad').val();
	var Nivel_formacion=$('#mNivel_formacion').val();
	var Titulo=$('#mTitulo').val();
	var Grupo_investigacion=$('#mGrupo_investigacion').val();
	var Institucion=$('#mInstitucion').val();
	var CvLAC=$('#mCvLAC').val();

	var datos = "Documento=" + Documento +
			"&Nombre=" + Nombre +
			"&Facultad=" + Facultad +
			"&Nivel_formacion=" + Nivel_formacion + 
			"&Titulo=" + Titulo +
			"&Grupo_investigacion=" + Grupo_investigacion +
			"&Institucion=" + Institucion +
			"&CvLAC=" + CvLAC;
	$.ajax({
		type:"POST",
		url:"php/modificadocentes.php",
		data:datos,
		success:function(r){
			if(r == 1){
				$('#tabla').load('components/tabla.php');
				 alertify.success('Modificado');
			}
			else{
				 alertify.error('No se pudo editar correctamente');
			}
		}
	});
}

//Función de Busqueda
function Busqueda(Documento) {
	var search = {
		"Documento": Documento
	};
 	$.ajax({
 		data: search,
 		type:'POST',
 		url:'php/busqueda.php',
 		success:function(r){
 			var registros = r.split('||');
 			if(registros.length == 8){
	 			console.log(registros);
	 			$('#cedula').append(registros[0]);
	 			$('#nombre').append(registros[1]);
	 			$('#facultad').append(registros[2]);
	 			$('#nivel_formacion').append(registros[3]);
	 			$('#titulo').append(registros[4]);
	 			$('#grupo_investigacion').append(registros[5]);
	 			$('#institucion').append(registros[6]);
	 			$('#cvlac').append(registros[7]);
	 			//Mostramos la tabla con los registros correspondientes a la consulta
	 			
			}
			else{
				alertify.error('No se encontró el registro');
			}
 			$('#ResultadoBusqueda').load('php/muestraBusqueda.php');
 		}
  	});
  	
	
}