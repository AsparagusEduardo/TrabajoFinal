<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>MANTENEDOR</title>
        <link rel="stylesheet" href="css/style_mantenedor.css" />
	</head>
	<?php 
		$base_musica = new MySQLi("localhost", "root", "", "musica");
	?>
	<body>
		<nav>
			<ul>
				<li><a href="mantenedor.php">Volver</a></li>
				<li style="float:right"><a class="active" href="#bloque_cds">Cerrar Sesión</a></li>
			</ul>
		</nav>
		<div id="bloque_buscar">
			<form name="form_buscar" id="form_buscar" method="post" action="buscador.php" enctype="multipart/form-data" onSubmit="">
			<!--<form name="form_buscar" id="form_buscar" method="post" action="buscador.php" enctype="multipart/form-data" onSubmit="return validar_busqueda();">-->
	            <select name="elemento_buscar" id="elemento_buscar">
	                <option value="0">Seleccione</option>
	                <option value="bandas">Bandas</option>
	                <option value="cds">CDs</option>
	                <option value="canciones">Canciones</option>
	            </select>
				<input type="text" name="buscar" id="buscar">
	            <input type="submit" name="buscar_enviar" id="buscar_enviar" value="Buscar" />
	        </form>
		</div>
		<div id="bloque_resultado">
			<?php 
				if (isset($_POST["buscar_enviar"]))
				{
					
					echo "<h3>Buscando ".$_POST["elemento_buscar"]."</h3>";
				}
			?>
		</div>
	</body>
</html>
