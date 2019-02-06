<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Stranger Data</title>

        <!-- FAVICON -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon.png">
    </head>

    <body>
    <header>
	   	<a href="index.php" id="home"><img src="assets/img/strangerData.png" alt="Inicio"></a>
		<nav>
			<a href="aplicacion.php" class="btn-nav">Aplicacion</a>
			<a href="proyecto.php" class="btn-nav">Proyecto</a>
			<a href="equipo.php" class="btn-nav">Equipo</a>
		</nav>
	</header>
	<!-- PROGRESS BAR -->
	<progress value="0" id="progressBar">
  		<div class="progress-container">
   		   <span class="progress-bar"></span>
 	    </div>
    </progress>
    
    <div class="aplication-main">
		<div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3127.1803697518367!2d-0.505647974955759!3d38.391078400989464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x914b2101c952d709!2sPELUQUERIA+Rosa+Fuentes!5e0!3m2!1sen!2ses!4v1501801979653" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="filtros">
				<div>
                    Filtros
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
        <img src="assets/img/logo-cajamarhack.png" alt="Cajamar UniversityHack 2019">
        <img src="assets/img/logo-datalab.png" alt="Cajamar Datalab">
        <a href="mail.php" class="btn-nav" id="btn-contact">Contact us</a>
        <img src="assets/img/logo-etsinf.png" alt="Escuela Superior de ingenieria informatica">
        <img src="assets/img/logo-upv.png" alt="Universidad Politecnica de alencia">
    </footer>
    <!-- SCRIPTS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/aplication.css">
	<script type="text/javascript" src="js/main.js"></script>
    </body>
</html>