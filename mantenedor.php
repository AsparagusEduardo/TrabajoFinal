<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>MANTENEDOR</title>
        <link rel="stylesheet" href="css/style_mantenedor.css" />
        <script src="js/validar_mantenedor.js"></script>
	</head>
	<?php //acceder base de datos
		$base_musica = new MySQLi("localhost", "root", "", "musica")
	?>
	<body>
		<center><div id="bandas">
			<div class="centro"><h2>BANDAS</h2></div>
			<form name="form_bandas" id="form_bandas" method="post" action="" enctype="multipart/form-data" onsubmit="">
				<div class="centro"><h3>NUEVA BANDA</h3></div>
				<div>
					<label class="label" for="nombre">NOMBRE: </label>
					<input type="text" name="nombre" id="nombre">
				</div>
				<div>
	                <label class="label" for="foto">FOTO: </label>
	                <input type="file" name="foto" id="foto" />
	            </div>
	            <div>
	                <label class="label" for="genero">GÉNERO: </label>
	                <select name="genero" id="genero">
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
	                <p id="mensaje_error"> </p>
	            </div>
				<div class="centro">
	                <input type="submit" name="btnEnviar" id="btnEnviar" value="Agregar" />
	                <input type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar" onclick="document.getElementById('mensaje_error').innerHTML = '';" />
            	</div>
			</form>
		<div></center>
	</body>
</html>