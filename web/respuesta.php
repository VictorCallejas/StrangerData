<!DOCTYPE html>
<html lang="es-ES">

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
			<a href="respuesta.php" class="btn-nav">Respuestas</a>
			<a href="tecnologia.php" class="btn-nav">Tecnologia</a>
			<a href="equipo.php" class="btn-nav">Equipo</a>
		</nav>
	</header>
		
		
	<div id="main-r">
		
	<h2>La historia que cuentan los datos</h2>	
		
	<div class="media">
		<img class="r-img" src="assets/img/r/e3.png" alt="">
	</div>
		
	<section class="section section-light">
		  <h3>Menores tiempos de espera para rentas altas</h3>
			<p>
				Las oficinas en zonas cuyas rentas son mayores de 35.000€, <br>sus tiempos de espera en las oficinas son menores que aquellas que estan en zonas con rentas mas bajas.
			</p>
		<a href="https://s3.us-east-2.amazonaws.com/strangerdata/Estudio-ocupacion-renta.ipynb">Download R Jupyter Notebook</a>
	</section>
<div class="media">
		<img class="r-img" src="assets/img/r/e1.png" alt="">
		<img class="r-img" src="assets/img/r/e2.png" alt="">
	</div>
		
	<section class="section section-light">
		  <h3>Cajeros rotos y la renta</h3>
			<p>
				En la primera gráfica se muestra el número de fallos del total de cajeros por horas. Las horas en las que más fallan son las 8 de la mañana y al medio dia. <br>Estas horas coinciden con las de <strong>mantenimiento y actualizacion</strong> de los cajeros.
				<br>
				En el segundo gráfico se muestra la media del tiempo inoperativo de los cajeros agrupados por codigo postal según la renta media de esa zona. <br>Se observa que <b>no existe ninguna relación</b>.
			</p>
		<a href="https://s3.us-east-2.amazonaws.com/strangerdata/Estudio-cajerosRotos.ipynb">Download R Jupyter Notebook</a>
	</section>
		
	<div class="media">
		<img class="r-img" src="assets/img/r/e9.png" alt="">
	</div>
		
	<section class="section section-light">
		  <h3>Ves a la oficina a última hora</h3>
			<p>
				En el gráfico se muestra el tiempo de espera medio según la hora del día. El tiempo de espera <b>se mantiene constante</b> a lo largo de la mañana y desciende desde la una de la mañana hasta que cierra la oficina, usualmente a las 14:00.
			</p>
		<a href="https://s3.us-east-2.amazonaws.com/strangerdata/Estudio-Ocupacion.ipynb">Download R Jupyter Notebook</a>
	</section>
		
	<div class="media">
		<img class="r-img" src="assets/img/r/e7.png" alt="">
		<img class="r-img" src="assets/img/r/e8.png" alt="">
	</div>
	
	<section class="section section-light">
		  <h3>Mejor los viernes</h3>
			<p>
				Hay una <strong>ligera tendencia negativa</strong> de la ocupacion a lo largo de los dias de la semana.
				<br>
				La diferencia entre ir un viernes a las 14:00 y un lunes a las 9:00 es de casi 10 minutos.
			</p>
		<a href="https://s3.us-east-2.amazonaws.com/strangerdata/Estudio-Ocupacion.ipynb">Download R Jupyter Notebook</a>
	</section>
		
	<div class="media">
		<img class="r-img" src="assets/img/r/e5.png" alt="">
		<img class="r-img" src="assets/img/r/e6.png" alt="">
	</div>
		
	<section class="section section-light">
		  <h3>No todos los meses son iguales, ni los dias</h3>
			<p>
				En los meses de <strong>julio, agosto y septiembre</strong> los tiempos de espera son menores.
				<br>
				Más importante es el día del mes.
				Es mejor ir <strong>a mediados del mes</strong>. Los días con más ocupación son los primeros del mes seguidos de los últimos dias del mes.
			</p>
		<a href="https://s3.us-east-2.amazonaws.com/strangerdata/Estudio-Ocupacion.ipynb">Download R Jupyter Notebook</a>
	</section>
		
	<div class="media">
		<img class="r-img" src="assets/img/r/e4.png" alt="">
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
			<img src="assets/img/logo-cajamarhack.png" alt="Cajamar UniversityHack 2019">
        	<img src="assets/img/logo-datalab.png" alt="Cajamar Datalab">
		</div>
        <a class="btn-nav pointer" id="btn-contact" title="Mandar email">Contact us</a>
		<div class="footer-box">
			<img src="assets/img/logo-etsinf.png" alt="Escuela Superior de ingenieria informatica">
        	<img src="assets/img/logo-upv.png" alt="Universidad Politecnica de alencia">
		</div>
        
    </footer>
    <!-- SCRIPTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/respuesta.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>