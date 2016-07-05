<?php
session_start();
if(!isset($_SESSION["usuario"]))
	header("location:iniciarsesion.php?msg=Su session ha caducado");
?>

<?php include("phpscripts/modificar_basedatos.php"); ?>

<!DOCTYPE html>
<html>
	<head>
	<script src="js/validar_mantenedor.js"></script>
		<meta charset="utf-8">
        <title>MANTENEDOR</title>
        <link rel="stylesheet" href="css/style_mantenedor.css" />
        
	</head>
	<?php //Agregar y Borrar noticias, bandas, cds y canciones
		$base_musica = new MySQLi("localhost", "root", "", "musica");
		//---------------------------------------------
		//AGREGAR NOTICIA
		if (isset($_POST["noticia_enviar"]))
		{
			agregar_noticia();
		}
		//----------------------------------------------
		//ELIMINAR NOTICIA
		if (isset($_GET["borrarNoticia"]))
		{
			borrar_noticia($_GET['borrarNoticia']);
			header("location:mantenedor.php"); //<-----Evita que aparezca en la url
		}
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
		//AGREGAR CANCION
		if (isset($_POST["cancion_enviar"]))
		{
			agregar_cancion();
		}
		//ELIMINAR CANCION
		if (isset($_GET["borrarCancion"]))
		{
			borrar_cancion($_GET['borrarCancion']);
			header("location:mantenedor.php"); //<-----Evita que aparezca en la url
		}
	?>
	<body>
		<div id="top"></div>
		<nav>
			<ul>
				<li><a href="#bloque_noticias">Noticias</a></li>
				<li><a href="#bloque_bandas">Bandas</a></li>
				<li><a href="#bloque_cds">CDs</a></li>
				<li><a href="#bloque_canciones">Canciones</a></li>
				<li style="float:right"><a class="active" href="phpscripts/cerrar_session.php">Cerrar Sesión</a></li>
			</ul>
		</nav>
			
		<div id="bloque_listas">
				<!--BLOQUE_BUSCAR-->
			<div id="bloque_buscar">
				<form name="form_buscar" id="form_buscar" method="post" action="buscador.php" enctype="multipart/form-data" onSubmit="">
					<input type="text" name="elemento_buscar" id="elemento_buscar" placeholder="Buscar por nombre">
		            <select name="categoria_buscar" id="categoria_buscar">
		                <option value="0">Seleccione</option>
		                <option value="bandas">Bandas</option>
		                <option value="cds">CDs</option>
		                <option value="canciones">Canciones</option>
		            </select>
		            <input type="submit" name="buscar_enviar" id="buscar_enviar" value="Buscar" />
		        </form>
			</div>
				<!--BLOQUE_NOTICIAS-->
			<div id="bloque_noticias">
				<div class="centro"><h2>NOTICIAS</h2></div>
				<form name="form_noticias" id="form_noticias" method="post" action="mantenedor.php" enctype="multipart/form-data" onSubmit="return validar_noticia()">
					<div class="centro"><h3>NUEVA NOTICIA</h3></div>
					<div>
						<label class="label" for="noticia_titulo">TITULO: </label>
						<input type="text" name="noticia_titulo" id="noticia_titulo">
					</div>
					<div>
						<label class="label" for="noticia_texto">TEXTO: </label>
						<textarea rows="5" name="noticia_texto" id="noticia_texto" style="width: 300px;"></textarea>
					</div>
					<div>
		                <label class="label" for="noticia_imagen">FOTO: </label>
		                <input type="file" accept=".png,.gif,.jpg,.bmp" name="noticia_imagen" id="noticia_imagen" />
		            </div>
		            <div>
		            	<label class="label" for="noticia_fecha">FECHA: </label>
		            	<input type="date" name="noticia_fecha" id="noticia_fecha">
		            </div>
					<div>
		                <p id="noticia_error"  style="color: red;text-align: center;"> </p>
		            </div>
					<div class="centro">
		                <input type="submit" name="noticia_enviar" id="noticia_enviar" value="Agregar" />
		                <input type="reset" name="noticia_limpiar" id="noticia_limpiar" value="Limpiar" onclick="document.getElementById('noticia_error').innerHTML = '';" />
	            	</div>
				</form>
				<div id="noticia_tabla">
					<?php
					$lista_noticias = $base_musica -> query("SELECT * FROM noticias ORDER BY fecha DESC");
					if (mysqli_num_rows($lista_noticias) > 0)
					{
					?>
						<table border="1">
		                <tr>
		                    <th>ID</th>
		                    <th>TITULO</th>
		                    <th>NOTICIA</th>
		                    <th>IMAGEN</th>
		                    <th>FECHA</th>
		                    <th>ELIMINAR</th>
		                </tr>
		            <?php
		            }
		            while ($registro = $lista_noticias -> fetch_assoc())
		            {?>
		            	<tr>
		            		<td><?php echo $registro["id"];?> </td>
		            		<td><?php echo $registro["titulo"];?></td>
		            		<td><?php echo $registro["noticia"];?></td>
		            		<td>
		            			<div class="centro"><img class="thumb100" src="img/noticias/<?php echo $registro['imagen'];?>"></div>
		            		</td>
		            		<td><?php echo $registro["fecha"];?></td>
		            		<td><a href="mantenedor.php?borrarNoticia=<?php echo $registro['id'];?>">ELIMINAR</a></td>
		            	</tr>
		            <?php
		            } ?>
		            </table><br>
				</div>
			</div>
			<div class="to_top">
				<a href="#top">VOLVER ARRIBA</a>
			</div>
				<!--BLOQUE_BANDAS-->
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
		                <input type="file" accept=".png,.gif,.jpg,.bmp" name="banda_foto" id="banda_foto" />
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
		            			<div class="centro"><img class="thumb100" src="img/bandas/<?php echo $registro['foto'];?>"></div>
		            		</td>
		            		<td><?php echo $registro["genero"];?></td>
		            		<td><a href="mantenedor.php?borrarBanda=<?php echo $registro['id'];?>">ELIMINAR</a></td>
		            	</tr>
		            <?php
		            } ?>
		            </table><br>
				</div>
			</div>
				<!--BLOQUE_CDS-->
			<?php
				$lista_bandas = $base_musica -> query("SELECT * FROM bandas");
				if (mysqli_num_rows($lista_bandas) > 0)
				{
			?>
			<div class="to_top">
				<a href="#top">VOLVER ARRIBA</a>
			</div>
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
		                <input type="file" accept=".png,.gif,.jpg,.bmp" name="cd_caratula" id="cd_caratula" />
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
		            			<div class="centro"><img class="thumb100" src="img/cds/<?php echo $registro['caratula'];?>"></div>
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
			<?php
				}
				$lista_cds = $base_musica -> query("SELECT * FROM cds");
				if (mysqli_num_rows($lista_cds) > 0)
				{
			?>
				<!--BLOQUE_CANCIONES-->

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
						<input type="file" accept=".txt" name="cancion_letra" id="cancion_letra">
					</div>
	            	<div>
		                <label class="label" for="cancion_cd">CD: </label>
		                <select name="cancion_cd" id="cancion_cd">
		                    <option value="0">Seleccione</option>
		                    <?php
		                    $lista_cds = $base_musica -> query("SELECT * FROM cds ORDER BY banda, nombre");
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
				<div id="canciones_tabla">
					<?php
					$lista_canciones = $base_musica -> query("SELECT * FROM canciones ORDER BY nombre");
					if (mysqli_num_rows($lista_canciones) > 0)
					{
					?>
						<table border="1">
		                <tr>
		                    <th>ID</th>
		                    <th>NOMBRE</th>
		                    <th>LETRA</th>
		                    <th>CD</th>
		                    <th>ID CD</th>
		                    <th>ELIMINAR</th>
		                </tr>
		            <?php
		            }
		            while ($registro = $lista_canciones -> fetch_assoc())
		            {?>
		            	<tr>
		            		<td><?php echo $registro["id"];?> </td>
		            		<td><?php echo $registro["nombre"];?></td>
		            		<td>
		            			<div><a href="txt/letras/<?php echo $registro['letra']?>">LETRA</a></div>
		            		</td>
		            		<td><?php echo $registro["cds"];?></td>
		            		<td><?php echo $registro["cdID"];?></td>
		            		<td><a href="mantenedor.php?borrarCancion=<?php echo $registro['id'];?>">ELIMINAR</a></td>
		            	</tr>
		            <?php
		            } ?>
		            </table><br>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</body>
</html>