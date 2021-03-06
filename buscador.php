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
				<li><a href="mantenedor.php#bloque_noticias">Noticias</a></li>
				<li><a href="mantenedor.php#bloque_bandas">Bandas</a></li>
				<li><a href="mantenedor.php#bloque_cds">CDs</a></li>
				<li><a href="mantenedor.php#bloque_canciones">Canciones</a></li>
				<li style="float:right"><a class="active" href="#bloque_cds">Cerrar Sesión</a></li>
			</ul>
		</nav>
		<div id="bloque_buscar">
			<form name="form_buscar" id="form_buscar" method="post" action="buscador.php" enctype="multipart/form-data" onSubmit="">
			<!--<form name="form_buscar" id="form_buscar" method="post" action="buscador.php" enctype="multipart/form-data" onSubmit="return validar_busqueda();">-->
				<input type="text" name="elemento_buscar" id="elemento_buscar" placeholder="Buscar por nombre">
		            <select name="categoria_buscar" id="categoria_buscar">
		                <option value="0">Categoría</option>
		                <option value="bandas">Bandas</option>
		                <option value="cds">CDs</option>
		                <option value="canciones">Canciones</option>
		            </select>
	            <input type="submit" name="buscar_enviar" id="buscar_enviar" value="Buscar" />
	        </form>
		</div>
		<div id="bloque_resultado">
			<?php 
				if (isset($_POST["buscar_enviar"]))
				{
					$categoria = $_POST["categoria_buscar"];
					$elemento = $_POST["elemento_buscar"];

					if ($categoria == "bandas") //BUSQUEDA POR BANDAS
					{
						$lista_bandas = $base_musica -> query("SELECT * FROM $categoria WHERE nombre LIKE '%$elemento%' ORDER BY nombre");
						$num_resultados = mysqli_num_rows($lista_bandas);

						echo "<h3>".$num_resultados." banda(s) encontrada(s).</h3>";

						if ($num_resultados > 0)
						{?>
							<table border="1">
						<?php
						}
						while ($registro = $lista_bandas -> fetch_assoc())
						{?>
			            	<tr>
			            		<td><b><?php echo $registro["nombre"];?></b></td>
			            		<td>
			            			<div class="centro"><img class="thumb100" src="img/bandas/<?php echo $registro['foto'];?>"></div>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td colspan="2">
			            			<u>CD(s)</u><?php //CDS DE LA BANDA
			            			$hmm = $registro['id'];
			            			$lista_cds = $base_musica -> query("SELECT * FROM cds WHERE bandaID = '$hmm' ORDER BY nombre");
			            			while ($registro2 = $lista_cds -> fetch_assoc()) 
			            			{?>
			            			<table class="inside_table" border="0">
			            				<tr>
			            					<td><img class="thumb100" src="img/cds/<?php echo $registro2["caratula"]?>"></td>
			            					<td><?php echo $registro2["nombre"];?></td>
			            				</tr>

			            			</table>
			            			<?php
			            			}
			            			?>
			            		</td>
			            	</tr>
			            <?php
						}
					}
					if ($categoria == "cds") //BUSQUEDA POR CDS
					{
						$lista_cds = $base_musica -> query("SELECT * FROM $categoria WHERE nombre LIKE '%$elemento%' ORDER BY nombre");
						$num_resultados = mysqli_num_rows($lista_cds);

						echo "<h3>".$num_resultados." CD(s) encontrado(s).</h3>";

						if ($num_resultados > 0)
						{?>
							<table border="1">
				            <?php
				            }
				            while ($registro = $lista_cds -> fetch_assoc())
				            {?>
				            	<tr>
				            		<td>
				            			<div class="centro"><img class="thumb100" src="img/cds/<?php echo $registro['caratula'];?>"></div>
				            		</td>
				            		<td><b><?php echo $registro["nombre"];?><b></td>
				            		<td>
				            			<u>BANDA:</u><br>
				            			<?php echo $registro["banda"];?>
				            		</td>
				            	</tr>
				            	<tr>
				            	<td colspan="3"><?php //CANCIONES DEL CD
			            			$hmm = $registro['id'];
			            			$lista_canciones = $base_musica -> query("SELECT * FROM canciones WHERE cdID = '$hmm' ORDER BY nombre");
			            			while ($registro2 = $lista_canciones -> fetch_assoc()) 
			            			{?>
			            			<table class="inside_table" border="0">
			            				<tr>
			            					<td><?php echo "- ".$registro2["nombre"]."<br>";?></td>
			            				</tr>

			            			</table>
			            			<?php
			            			}

			            			?>
				            		
				            	</td>
				            	</tr>
				            <?php
						}
					}

					if ($categoria == "canciones") //BUSQUEDA POR CANCIONES
					{
						$lista_canciones = $base_musica -> query("SELECT * FROM $categoria WHERE nombre LIKE '%$elemento%' ORDER BY nombre");
						$num_resultados = mysqli_num_rows($lista_canciones);

						echo "<h3>".$num_resultados." cancione(s) encontrada(s).</h3>";

						if ($num_resultados > 0)
						{?>
							<table border="1">

			            <?php
			            }
			            while ($registro = $lista_canciones -> fetch_assoc())
			            {?>
			            	<tr>
			            		<td><b><?php echo $registro["nombre"];?><b></td>
			            		<td>
			            			<u>BANDA:</u><br>
			            			<?php 
				            			$hmm = $registro['cdID'];
				            			$lista_cds = $base_musica -> query("SELECT * FROM cds WHERE id = '$hmm' ORDER BY nombre");
				            			$registro2 = $lista_cds -> fetch_assoc();
				            			echo $registro2["banda"];?>
			            		</td>
			            		<td>
			            			<u>CD:</u><br>
			            			<?php echo $registro["cds"];?>
			            		</td>
			            	</tr>
			            	<tr>
				            	<td colspan="3">
			            			<table class="inside_table" border="0">
			            				<tr>
			            					<td><?php echo nl2br(file_get_contents("txt/letras/".$registro["letra"]));?></td>
			            				</tr>

			            			</table>					            		
				            	</td>
			            	</tr>
			            <?php
						}
					}
				}
			?></table><br>
		</div>
	</body>
</html>
