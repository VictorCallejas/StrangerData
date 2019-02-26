<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Stranger Data</title>

        <!-- FAVICON -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-min.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-min.png">
    </head>

    <body>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <header>
	   	<a href="index.php" id="home"><img src="assets/img/strangerData-min.png" alt="Inicio"></a>
		<nav>
			<a href="aplicacion.php" class="btn-nav">Aplicacion</a>
			<a href="respuesta.php" class="btn-nav">Respuestas</a>
			<a href="tecnologia.php" class="btn-nav">Tecnologia</a>
			<a href="equipo.php" class="btn-nav">Equipo</a>
		</nav>
	</header>
		

	<div class="main5">
	
		<?php require_once('dashboard/prediccion.php'); ?>
 	    		
	</div>	
	
		
<!-- BTN FUNC -->
<div class="modal2">
	<div class="ventana" id="func-div">
		<div class="func-in">
			<h4>Como funciona</h4>
			<br><br>
			<p>
				En el mapa se pueden observar los cajeros y oficinas que cumplen los requisitos determinados.
				<br><br>
				Si el usuario utiliza su ubicación, en el mapa se mostraran los cajeros/oficinas mas cercanos que cumplen los requisitos determinados. Junto a la recomendación que hace nuestro sistema en base a parámetros en tiempo real como el tiempo que se tarda en llegar según el medio de transporte seleccionado, predicción del tiempo de espera...
			</p>
		</div>
		<div class="cerrar2">
			<button class="cerrar-func pointer">Cerrar</button>
		</div>
		</div>
	</div>
		
<!-- MANDAR EMAIL -->
<div class="modal1">
	<div class="ventana" id="email_div">
		<div class="email_formulario">
			<form action="contact.php" method="post">
	<label for="nombre" id="label_nombre">Nombre</label>
	 <input id="nombre" type="text" name="nombre" placeholder="Nombre y Apellido" required="flase" />

	 <label for="email" id="label_email">Email</label>
	 <input id="email" type="email" name="email" placeholder="ejemplo@correo.com" required="true" />

	 <label for="mensaje" id="label_mensaje">Mensaje</label>
	 <textarea id="mensaje" name="mensaje" placeholder="Mensaje" required></textarea>

	<input id="submit" type="submit" name="submit" value="Enviar" />
		   </form>
		</div>
		<div class="cerrar">
			<button class="cerrar_contact pointer">Cerrar</button>
		</div>
		</div>
	</div>
    
    <!-- FOOTER -->
    <footer>
		<div class="footer-box">
			<img src="assets/img/logo-cajamarhack-min.png" alt="Cajamar UniversityHack 2019">
        	<img src="assets/img/logo-datalab-min.png" alt="Cajamar Datalab">
		</div>
        <a class="btn-nav pointer" id="btn-contact" title="Mandar email">Contact us</a>
		<div class="footer-box">
			<img src="assets/img/logo-etsinf-min.png" alt="Escuela Superior de ingenieria informatica">
        	<img src="assets/img/logo-upv-min.png" alt="Universidad Politecnica de alencia">
		</div>
        
    </footer>
    <!-- SCRIPTS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>		
	<link rel="stylesheet" type="text/css" href="dashboard/style_app.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/aplication.css">
	
	<script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>