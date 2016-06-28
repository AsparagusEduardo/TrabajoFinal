<?php
	function agregar_cancion()
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$nombre = $_POST["cancion_nombre"];
		$letra = $_FILES["cancion_letra"]["name"];
		$cdID = $_POST["cancion_cd"];

		$registro = $base_musica -> query("SELECT * FROM cds WHERE id = '$cdID'") -> fetch_assoc();
		$cd = $registro["nombre"];

		$agregar = $base_musica -> query("INSERT INTO canciones VALUES (null,'$nombre','$letra','$cd','$cdID')");
		

		if($agregar)
		{
			move_uploaded_file($_FILES["cancion_letra"]["tmp_name"], "txt/letras/".$letra);
		}
		/* else{echo $base_musica -> error;}*/
	}

	function agregar_cd()
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$nombre = $_POST["cd_nombre"];
		$caratula = $_FILES["cd_caratula"]["name"];
		$bandaID = $_POST["cd_banda"];

		$registro = $base_musica -> query("SELECT * FROM bandas WHERE id = '$bandaID'") -> fetch_assoc();
		$banda = $registro["nombre"];

		$agregar = $base_musica -> query("INSERT INTO cds VALUES (null,'$nombre','$caratula','$banda','$bandaID')");
		
		if($agregar)
		{
			move_uploaded_file($_FILES["cd_caratula"]["tmp_name"], "img/cds/".$caratula);
		}
	}
	function agregar_banda()
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$nombre = $_POST["banda_nombre"];
		$foto = $_FILES["banda_foto"]["name"];
		$genero = $_POST["banda_genero"];

		$agregar = $base_musica -> query("INSERT INTO bandas VALUES (null,'$nombre','$foto','$genero')");
		
		if($agregar)
		{
			move_uploaded_file($_FILES["banda_foto"]["tmp_name"], "img/bandas/".$foto);
		}
	}
	function borrar_cd($borrarCd)
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$buscado = $base_musica -> query("SELECT * FROM cds WHERE id = '$borrarCd'") -> fetch_assoc();
		unlink("img/cds/".$buscado["caratula"]);

		$base_musica -> query("DELETE FROM cds WHERE id = '$borrarCd'");
	}
	function borrar_banda($borrarBanda)
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$lista_buscado = $base_musica -> query("SELECT * FROM cds WHERE bandaID = '$borrarBanda'");
		while ($buscado = $lista_buscado -> fetch_assoc())
		{
			borrar_cd($buscado["id"]);
		}
		$buscado = $base_musica -> query("SELECT * FROM bandas WHERE id = '$borrarBanda'") -> fetch_assoc();
		unlink("img/bandas/".$buscado["foto"]);

		$base_musica -> query("DELETE FROM bandas WHERE id = '$borrarBanda'");
	}
	
?>

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
		//AGREGAR BANDA
		if (isset($_POST["banda_enviar"]))
		{
			agregar_banda();
		}
		//----------------------------------------------
		//ELIMINAR BANDA
		if (isset($_GET["borrarBanda"]))
		{
			borrar_banda($_GET['borrarBanda']);
			header("location:mantenedor.php"); //<-----Evita que aparezca en la url
		}
		//---------------------------------------------
		//AGREGAR CD
		if (isset($_POST["cd_enviar"]))
		{
			agregar_cd();
		}
		//----------------------------------------------
		//ELIMINAR CD
		if (isset($_GET["borrarCd"]))
		{
			borrar_cd($_GET['borrarCd']);
			header("location:mantenedor.php"); //<-----Evita que aparezca en la url
		}
		//---------------------------------------------
		//AGREGAR CD
		if (isset($_POST["cancion_enviar"]))
		{
			agregar_cancion();
		}
	?>
	<body>
					<!--########################### B L O Q U E _ B A N D A S ########################################-->
		<div id="bloque_bandas">
			<div class="centro"><h2>BANDAS</h2></div>
			<form name="form_bandas" id="form_bandas" method="post" action="mantenedor.php" enctype="multipart/form-data" onSubmit="return validar_banda();">
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
	                <p id="banda_error" style="color: red;text-align: center;"> </p>
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
	            		<td>
	            			<div ><img class="thumb100" src="img/bandas/<?php echo $registro['foto'];?>"></div>
	            		</td>
	            		<td><?php echo $registro["genero"];?></td>
	            		<td><a href="mantenedor.php?borrarBanda=<?php echo $registro['id'];?>">ELIMINAR</a></td>
	            	</tr>
	            <?php
	            } ?>
	            </table><br>
			</div>
		</div>
					<!--########################### B L O Q U E _ C D S ########################################-->
		<div id="bloque_cds">
			<div class="centro"><h2>CDs</h2></div>
			<form name="form_cds" id="form_cds" method="post" action="mantenedor.php" enctype="multipart/form-data" onSubmit="return validar_cd();">
				<div class="centro"><h3>NUEVO CD</h3></div>
				<div>
					<label class="label" for="cd_nombre">NOMBRE: </label>
					<input type="text" name="cd_nombre" id="cd_nombre">
				</div>
				<div>
	                <label class="label" for="cd_caratula">CARÁTULA: </label>
	                <input type="file" name="cd_caratula" id="cd_caratula" />
	            </div>
	            <div>
	                <label class="label" for="cd_banda">BANDA: </label>
	                <select name="cd_banda" id="cd_banda">
	                    <option value="0">Seleccione</option>
	                    <?php
	                    $lista_bandas = $base_musica -> query("SELECT * FROM bandas ORDER BY nombre");
	                    while ($registro = $lista_bandas -> fetch_assoc())
                		{
                			echo "<option value='".$registro['id']."'>".$registro['nombre']."</option>";	                   
		                  }?>
	                </select>
	            </div>
				<div>
	                <p id="cd_error"  style="color: red;text-align: center;"> </p>
	            </div>
				<div class="centro">
	                <input type="submit" name="cd_enviar" id="cd_enviar" value="Agregar" />
	                <input type="reset" name="cd_limpiar" id="cd_limpiar" value="Limpiar" onclick="document.getElementById('cd_error').innerHTML = '';" />
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
	                    <th>ID BANDA</th>
	                    <th>ELIMINAR</th>
	                </tr>
	            <?php
	            }
	            while ($registro = $lista_cds -> fetch_assoc())
	            {?>
	            	<tr>
	            		<td><?php echo $registro["id"];?> </td>
	            		<td><?php echo $registro["nombre"];?></td>
	            		<td>
	            			<div ><img class="thumb100" src="img/cds/<?php echo $registro['caratula'];?>"></div>
	            		</td>
	            		<td><?php echo $registro["banda"];?></td>
	            		<td><?php echo $registro["bandaID"];?></td>
	            		<td><a href="mantenedor.php?borrarCd=<?php echo $registro['id'];?>">ELIMINAR</a></td>
	            	</tr>
	            <?php
	            } ?>
	            </table><br>
			</div>
		</div>
					<!--########################### B L O Q U E _ C A N C I O N E S ########################################-->
		<div id="bloque_canciones">
			<div class="centro"><h2>CANCIONES</h2></div>
			<form name="form_canciones" id="form_canciones" method="post" action="mantenedor.php" enctype="multipart/form-data" onSubmit="return validar_cancion();">
				<div class="centro"><h3>NUEVA CANCIÓN</h3></div>
				<div>
					<label class="label" for="cancion_nombre">NOMBRE: </label>
					<input type="text" name="cancion_nombre" id="cancion_nombre">
				</div>
				<div>
					<label class="label" for="cancion_letra">LETRA: </label>
					<input type="file" name="cancion_letra" id="cancion_letra">
				</div>
            	<div>
	                <label class="label" for="cancion_cd">CD: </label>
	                <select name="cancion_cd" id="cancion_cd">
	                    <option value="0">Seleccione</option>
	                    <?php
	                    $lista_cds = $base_musica -> query("SELECT * FROM cds ORDER BY banda");
	                    while ($registro = $lista_cds -> fetch_assoc())
                		{
                			echo "<option value='".$registro['id']."'>".$registro['nombre']." - ".$registro['banda']."</option>";	                   
		                  }?>
	                </select>
	            </div>
	            <div>
	                <p id="cancion_error"  style="color: red;text-align: center;"> </p>
	            </div>
				<div class="centro">
	                <input type="submit" name="cancion_enviar" id="cancion_enviar" value="Agregar" />
	                <input type="reset" name="cancion_limpiar" id="cancion_limpiar" value="Limpiar" onclick="document.getElementById('cancion_error').innerHTML = '';" />
            	</div>
			</form>
		</div>

	</body>
</html>