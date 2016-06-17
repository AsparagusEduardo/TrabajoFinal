<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>MANTENEDOR</title>
        <link rel="stylesheet" href="css/style_mantenedor.css" />
        <script src="js/validar_mantenedor.js"></script>
	</head>
	<?php //acceder base de datos
		$base_musica = new MySQLi("localhost", "root", "", "musica");
		//---------------------------------------------
		//AGREGAR A BANDA
		if (isset($_POST["banda_enviar"]))
		{
			$nombre = $_POST["banda_nombre"];
			$foto = $_FILES["banda_foto"]["name"];
			$genero = $_POST["banda_genero"];

			$agregar = $base_musica -> query("INSERT INTO bandas VALUES (null,'$nombre','$foto','$genero')");
			
			if($agregar)
			{
				move_uploaded_file($_FILES["banda_foto"]["tmp_name"], "img/bandas/".$foto);
			}
		}

	?>
	<body>
		<div id="bloque_bandas">
			<div class="centro"><h2>BANDAS</h2></div>
			<form name="form_bandas" id="form_bandas" method="post" action="mantenedor.php" enctype="multipart/form-data" onsubmit="">
				<div class="centro"><h3>NUEVA BANDA</h3></div>
				<div>
					<label class="label" for="banda_nombre">NOMBRE: </label>
					<input type="text" name="banda_nombre" id="banda_nombre">
				</div>
				<div>
	                <label class="label" for="banda_foto">FOTO: </label>
	                <input type="file" name="banda_foto" id="banda_foto" />
	            </div>
	            <div>
	                <label class="label" for="banda_genero">GÉNERO: </label>
	                <select name="banda_genero" id="banda_genero">
	                    <option value="0">Seleccione</option>
	                    <option value="Balada">Balada</option>
	                    <option value="Ballenato">Ballenato</option>
	                    <option value="Clasica">Clásica</option>
	                    <option value="Electronica">Electrónica</option>
	                    <option value="Flamenco">Flamenco</option>
	                    <option value="Infantil">Infantil</option>
	                    <option value="Jazz">Jazz</option>
	                    <option value="Latina">Latina</option>
	                    <option value="Pop">Pop</option>
	                    <option value="Popular">Popular</option>
	                    <option value="Ranchera">Ranchera</option>
	                    <option value="Rap">Rap</option>
	                    <option value="Reggae">Reggae</option>
	                    <option value="Reggaeton">Reggaeton</option>
	                    <option value="Rock">Rock</option>
	                    <option value="Salsa">Salsa</option>
	                    <option value="Ska">Ska</option>
	                    <option value="Tango">Tango</option>
	                    <option value="Techno">Techno</option>
	                    <option value="Tropical">Tropical</option>
	                </select>
	            </div>
				<div>
	                <p id="banda_error"> </p>
	            </div>
				<div class="centro">
	                <input type="submit" name="banda_enviar" id="banda_enviar" value="Agregar" />
	                <input type="reset" name="banda_limpiar" id="banda_limpiar" value="Limpiar" onclick="document.getElementById('banda_error').innerHTML = '';" />
            	</div>
			</form>
			<div id="banda_tabla">
				<?php
				$lista_bandas = $base_musica -> query("SELECT * FROM bandas ORDER BY nombre");
				if (mysqli_num_rows($lista_bandas) > 0)
				{
				?>
					<table border="1">
	                <tr>
	                    <th>ID</th>
	                    <th>NOMBRE</th>
	                    <th>FOTO</th>
	                    <th>GÉNERO</th>
	                    <th>ELIMINAR</th>
	                </tr>
	            <?php
	            }
	            while ($registro = $lista_bandas -> fetch_assoc())
	            {?>
	            	<tr>
	            		<td><?php echo $registro["id"];?> </td>
	            		<td><?php echo $registro["nombre"];?></td>
	            		<td></td>
	            		<td><?php echo $registro["genero"];?></td>
	            		<td></td>
	            	</tr>
	            <?php
	            } ?>
	            </table><br>
			</div>

		</div>

		<div id="bloque_cds">
			<div class="centro"><h2>CDs</h2></div>
			<form name="form_cds" id="form_cds" method="post" action="" enctype="multipart/form-data" onsubmit="">
				<div class="centro"><h3>NUEVO CD</h3></div>
				<div>
					<label class="label" for="cd_nombre">NOMBRE: </label>
					<input type="text" name="cd_nombre" id="cd_nombre">
				</div>
				<div>
	                <label class="label" for="cd_foto">CARÁTULA: </label>
	                <input type="file" name="cd_foto" id="cd_foto" />
	            </div>
	            <div>
	                <label class="label" for="cd_banda">BANDA: </label>
	                <select name="cd_banda" id="cd_banda">
	                    <option value="0">Seleccione</option>
	                    <?php
	                    $lista_bandas = $base_musica -> query("SELECT * FROM bandas ORDER BY nombre");
	                    while ($registro = $lista_bandas -> fetch_assoc())
                		{
	                    ?>
		                    <option value="<?php echo $registro['nombre'];?>"><?php echo $registro['nombre'];?></option>
		                   <?php
		                   }?>
	                </select>
	            </div>
				<div>
	                <p id="banda_error"> </p>
	            </div>
				<div class="centro">
	                <input type="submit" name="banda_enviar" id="banda_enviar" value="Agregar" />
	                <input type="reset" name="banda_limpiar" id="banda_limpiar" value="Limpiar" onclick="document.getElementById('banda_error').innerHTML = '';" />
            	</div>
			</form>
			<div id="cd_tabla">
				<?php
				$lista_cds = $base_musica -> query("SELECT * FROM cds ORDER BY banda");
				if (mysqli_num_rows($lista_cds) > 0)
				{
				?>
					<table border="1">
	                <tr>
	                    <th>ID</th>
	                    <th>NOMBRE</th>
	                    <th>CARÁTULA</th>
	                    <th>BANDA</th>
	                    <th>ELIMINAR</th>
	                </tr>
	            <?php
	            }
	            while ($registro = $lista_cds -> fetch_assoc())
	            {?>
	            	<tr>
	            		<td><?php echo $registro["id"];?> </td>
	            		<td><?php echo $registro["nombre"];?></td>
	            		<td></td>
	            		<td><?php echo $registro["banda"];?></td>
	            		<td></td>
	            	</tr>
	            <?php
	            } ?>
	            </table><br>
			</div>
		</div>
	</body>
</html>