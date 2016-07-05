<!doctype html>
<html>
<head>
	<title>Music.com</title>
	<link rel = "stylesheet" href ="css/style_index.CSS"/>
</head>
<body>
	<header>
		<h1>
		<img  src="img/menu/corso-musica.jpg" class="fade" alt="web2.0" title="web2.0">
		</h1>
		<nav>
			<ul>
				<li><a href = "formulario.html">Registro</a></a></li>
                <li><a href = "iniciarsesion.php">Administracion</a></a></li>
				<li><a href = "contacto.html">Contacto</a></a></li>
			</ul>
		</nav>
	</header>
	<section id= "contenido">
		<section id="principal">
			<article id="slider">
				<h2>&iexcl;Revisa nuestras principales bandas en Music.com!</h2>
			</article>
		</section>
		<section id="articulo-destacado">
			<?php

			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			include('conexion.php');
				
				$exitosos = 0;
				$verificar = 1;
				$resultado = mysqli_query($con,"SELECT * from bandas");

				while ($fila = mysqli_fetch_assoc($resultado)) {
					$f= $fila['foto'];
					$n= $fila['nombre'];
					$id1= $fila['id'];
					$foto1 = "img/bandas/". $f . "";
					?>
					<article id="articulo1">
						<img src="<?php echo $foto1?>" class "fade" width="300" high="300">
						<p class="justificado">Banda:</p>
						<div id="leermas">
						<a href="cds.php?id=<?php echo $id1?>" class "enviar"><?php echo $n?> </a>
						</div>
					</article>

					<?php
				}
			?>			
		</section>
		
	</section>
	<footer>
	  Creado por John Bravo


	</footer>
</body>
</html>




