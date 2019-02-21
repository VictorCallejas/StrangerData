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
    <header>
	   	<a href="index.php" id="home"><img src="assets/img/strangerData-min.png" alt="Inicio"></a>
		<nav>
			<a href="aplicacion.php" class="btn-nav">Aplicacion</a>
			<a href="respuesta.php" class="btn-nav">Respuestas</a>
			<a href="tecnologia.php" class="btn-nav">Tecnologia</a>
			<a href="equipo.php" class="btn-nav">Equipo</a>
		</nav>
	</header>
		
		
	<div class="main2">
		
	<h2>Arquitectura</h2>
		<div class="wrapper" id="wrapper_arq">
			<img id="estructura_img" src="assets/img/arq-min.png" alt="Arquitectura">
			<a href="https://s3.us-east-2.amazonaws.com/strangerdata/arq.png" id="go-btn" class="btn-nav">Ver</a>
		</div>
		<h4>Infraestructura</h4>
		<div class="wrapper">
			<img id="aws_img" src="assets/img/aws-min.png" alt="Amazon Web Services">
			<img id="heroku_img" src="assets/img/heroku-min.png" alt="Heroku">
		</div>
		
	<h2>Tecnologias</h2>
		<h4>Fuentes de datos</h4>
		<div class="wrapper">
			<img id="caja_img" src="assets/img/logo-datalab-min.png" alt="Cajamar Datalab">
			<img src="assets/img/agencia_tributaria-min.png" alt="Agencia Tributaria">
		</div>
		<h4>Analisis de datos</h4>
		<div class="wrapper">
			<img src="assets/img/R.svg-min.png" alt="R Programming Languaje">
			<img src="assets/img/jupyter-min.png" alt="Jupyter Notebooks">
		</div>
		<h4>Visualizacion de los datos</h4>
		<div class="wrapper">
			<img src="assets/img/ggplot2-min.png" alt="R Studio ggplot2">
		</div>
		<h4>Frontend</h4>
		<div class="wrapper">
			<img id="front_img" src="assets/img/html5.webp" alt="HTML CSS Javascript">
		</div>
		<h4>Backend</h4>
		<div class="wrapper" id="back_wrapper">
		
			<img id="js_img" src="assets/img/js-min.png" alt="Javascript">
			<img src="assets/img/php-min.png" alt="PHP">
			<img src="assets/img/python.png" alt="Python">
			<img src="assets/img/flask-min.png" alt="Flask">
		
		</div>
		<h4>Database</h4>
		<div class="wrapper">
			<img src="assets/img/mysql-min.png" alt="MySQL">
		</div>
		<h4>APIs</h4>
		<div class="wrapper">
			<img id="maps_img" src="assets/img/googlemaps-min.png" alt="Google Maps API">
			<img src="assets/img/directions-min.png" alt="Google Directions API">
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
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/proyecto.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>