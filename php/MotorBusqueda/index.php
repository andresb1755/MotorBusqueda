<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<!--Alertufy-->
	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

	<!--SweetAlert-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
	<header>
		<img src="assets/LogoP.png" width="450px">
	</header>
	
	<div class="container">
		<div id="buscador"></div>
	</div>
	
	<div class="container">
		<div id="ResultadoBusqueda"></div>
	</div>
	
	<!--Llamamos los componentes-->
	<div>
		<div id = "tabla"></div>
	</div>

	<div class="container">
		<div id = "Magregar"></div>
	</div>
	
	<div class="container">
		<div id = "Mmodificar"></div>
	</div>
	
</body>
</html>
<script>

	//Mostramos el buscador
	$(document).ready(function () {
		$('#buscador').load('components/buscador.php');
	});

	
	//Mostramos la tabla con los registros de la BD
	$(document).ready(function() {
		$('#tabla').load('components/tabla.php');
	});

	//Mostramos la modal correspondiente a agregar docentes
	$(document).ready(function() {
		$('#Magregar').load('components/modalAgregar.php');
	});

	//Mostramos la modal que corresponde a la modificacion de docentes
	$(document).ready(function() {
		$('#Mmodificar').load('components/modalEditar.php');
	});
</script>