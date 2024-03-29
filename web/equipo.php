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
		
		
    
	<div class="main-equipo">
		<div class="miembro">
			<a href="https://www.linkedin.com/in/joaquin-montesinos/" target="_blank">
				<img src="assets/img/equipo/joaquin-montesinos-min.jpeg" alt="Joaquin Montesinos">
			</a>
			<p class="nombre">Joaquin Montesinos</p>
	    </div>
		<div class="miembro">
			<a href="https://www.linkedin.com/in/valeriaharovalle/" target="_blank">
				<img src="assets/img/equipo/valeria-haro-min.jpg" alt="Valeria Haro">
			</a>
			<p class="nombre">Valeria Haro</p>
	    </div>		
		<div class="miembro">
			<a href="https://www.linkedin.com/in/victor-callejas-fuentes/" target="_blank">
				<img src="assets/img/equipo/victor-callejas-min.jpg" alt="Victor Callejas">
			</a>
			<p class="nombre">Víctor Callejas Fuentes</p>
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
	<link rel="stylesheet" type="text/css" href="assets/css/equipo.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>