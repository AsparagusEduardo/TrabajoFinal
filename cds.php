<!doctype html>
<html>
<head>
	<title>CD's</title>
	<link rel = "stylesheet" href ="css/style_index.css"/>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="http://notoyontoy.site40.net/Js/jquery.infinitecarousel3.min.js"></script>
    <script type="text/javascript" src="http://notoyontoy.site40.net/Js/easing.js"></script>
    <script src ="js/jsDiscografia.js"></script>
    <link rel="stylesheet" href="../Estilos/estiloDiscografia.css" type="text/css" />
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<h1>
		<img  src="img/menu/corso-musica.jpg" class="fade" alt="web2.0" title="web2.0">
		</h1>
		<nav>
			<ul>
            	<li><a href = "Galeria.php">Ver Galeria</a></a></li>
				<li><a href = "index.php">Volver al Inicio</a></a></li>
            </ul>
		</nav>
	</header>
    <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conexion.php');
$var = $_GET["id"];

$resultado = mysqli_query($con,"select banda from cds where bandaID = '" . $var ."'");
	$fila = mysqli_fetch_assoc($resultado);
	$b= $fila['banda'];
	
	$conteo = mysqli_query($con,"select count(*) as conteo from cds");
	$fila2 = mysqli_fetch_assoc($conteo);
	$c= $fila2['conteo'];
	

?>
	<section id= "contenido">
		<section id="articulo-destacado">
			<article id="usabilidad">
			<br></br>
			<h1 align="center">Discografia <?php echo $b?></h1>
			<br></br>
			<ul id="carousel">
			<li><img width="600" height="300" alt="" src="img/misc/mkil.jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/d2.jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/92473_default.jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/and_Justice_for_All_(album).jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/metallica-the-black-album-coverx.jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/Metallica-Load.jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/tumblr_n5wfl9B7Qe1su17npo1_1280.jpg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/static1.squarespace.com.jpeg" /></li>
			<li><img width="600" height="338" alt="" src="img/misc/0093624981565.600x600-75.jpg" /></li>
			</ul>
			</article>
			<article id="accesibilidad">
			<br></br>
            
			<h1 align="center">Discos de metallica</h1>
			<br></br>			
			<p align="center">Kill 'Em All 1983</p>
			<br></br>
			<p align="center">Ride the Lightning 1984</p>
			<br></br>
			<p align="center">Master of Puppets 1986</p>
			<br></br>
			<p align="center">Metallica 1991</p>
			<br></br>
			<p align="center">Load 1996</p>
			<br></br>
			<p align="center">Reload 1997</p>
			<br></br>
			<p align="center">St. Anger 2003</p>
			<br></br>
			<p align="center"> 	Death Magnetic 2008</p>
			<br></br>
			</article>
		
	</section>
	
	
	<footer>
	  <?php echo $c?>
      
	</footer>
</body>
</html>