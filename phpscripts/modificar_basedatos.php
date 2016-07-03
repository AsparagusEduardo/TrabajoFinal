<?php
	function agregar_noticia()
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$titulo = $_POST["noticia_titulo"];
		$texto = $_POST["noticia_texto"];
		$imagen = $_FILES["noticia_imagen"]["name"];
		$fecha = $_POST["noticia_fecha"];

		$agregar = $base_musica -> query("INSERT INTO noticias VALUES (null,'$titulo','$texto','$imagen','$fecha')");
		
		if($agregar)
		{
			move_uploaded_file($_FILES["noticia_imagen"]["tmp_name"], "img/noticias/".$imagen);
		}
	}
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
	function borrar_noticia($borrarNoticia)
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$buscado = $base_musica -> query("SELECT * FROM noticias WHERE id = '$borrarNoticia'") -> fetch_assoc();
		unlink("img/noticias/".$buscado["imagen"]);

		$base_musica -> query("DELETE FROM noticias WHERE id = '$borrarNoticia'");
	}
	function borrar_cancion($borrarCancion)
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$buscado = $base_musica -> query("SELECT * FROM canciones WHERE id = '$borrarCancion'") -> fetch_assoc();
		unlink("txt/letras/".$buscado["letra"]);

		$base_musica -> query("DELETE FROM canciones WHERE id = '$borrarCancion'");
	}
	function borrar_cd($borrarCd)
	{
		$base_musica = new MySQLi("localhost", "root", "", "musica");

		$lista_buscado = $base_musica -> query("SELECT * FROM canciones WHERE cdID = '$borrarCd'");
		while ($buscado = $lista_buscado -> fetch_assoc())
		{
			borrar_cancion($buscado["id"]);
		}

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
