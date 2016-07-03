function validar_noticia()
{
	titulo = document.getElementById("noticia_titulo");
	texto = document.getElementById("noticia_texto");
	imagen = document.getElementById("noticia_imagen");
	fecha = document.getElementById("noticia_fecha");

	if (titulo.value == "")
	{
		document.getElementById("noticia_error").innerHTML = "TITULO OBLIGATORIO";
		titulo.focus();
		return false;
	}
	if (texto.value == "")
	{
		document.getElementById("noticia_error").innerHTML = "TIENE QUE ESCRIBIR UNA NOTICIA";
		texto.focus();
		return false;
	}
	if (imagen.value == "")
	{
		document.getElementById("noticia_error").innerHTML = "IMAGEN OBLIGATORIA";
		imagen.focus();
		return false;
	}
	if (fecha.value == "")
	{
		document.getElementById("noticia_error").innerHTML = "FECHA OBLIGATORIA";
		fecha.focus();
		return false;
	}
	return true;
}

function validar_banda()
{
	nombre = document.getElementById("banda_nombre");
	foto = document.getElementById("banda_foto");
	genero = document.getElementById("banda_genero")

	if (nombre.value == "")
	{
		document.getElementById("banda_error").innerHTML = "NOMBRE OBLIGATORIO";
		nombre.focus();
		return false;
	}

	else if (foto.value == "")
	{
		document.getElementById("banda_error").innerHTML = "ELIJA UNA IMAGEN";
		foto.focus();
		return false;
	}

	else if (genero.value == "0")
	{
		document.getElementById("banda_error").innerHTML = "SELECCIONE UN GÉNERO";
		genero.focus();
		return false;
	}

	else
	{
		document.getElementById("banda_error").innerHTML = ""
	}
	return true;
}

function validar_cd()
{
	nombre = document.getElementById("cd_nombre");
	caratula = document.getElementById("cd_caratula");
	banda = document.getElementById("cd_banda")

	if (nombre.value == "")
	{
		document.getElementById("cd_error").innerHTML = "NOMBRE OBLIGATORIO";
		nombre.focus();
		return false;
	}

	else if (caratula.value == "")
	{
		document.getElementById("cd_error").innerHTML = "ELIJA UNA IMAGEN";
		caratula.focus();
		return false;
	}

	else if (banda.value == "0")
	{
		document.getElementById("cd_error").innerHTML = "SELECCIONE UNA BANDA";
		banda.focus();
		return false;
	}

	else
	{
		document.getElementById("cd_error").innerHTML = ""
	}
	return true;
}

function validar_cancion()
{
	nombre = document.getElementById("cancion_nombre");
	letra = document.getElementById("cancion_letra");
	cd = document.getElementById("cancion_cd");

	if (nombre.value == "")
	{
		document.getElementById("cancion_error").innerHTML = "NOMBRE OBLIGATORIO";
		nombre.focus();
		return false;
	}

	else if (letra.value == "")
	{
		document.getElementById("cancion_error").innerHTML = "ELIJA UNA IMAGEN";
		letra.focus();
		return false;
	}
	else if (cd.value == "0")
	{
		document.getElementById("cancion_error").innerHTML = "SELECCIONE UN CD";
		cd.focus();
		return false;
	}

	
	document.getElementById("cancion_error").innerHTML = "";
	return true;
}
