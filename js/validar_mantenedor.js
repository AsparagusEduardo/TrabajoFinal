// JavaScript Document

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

/*
function validar()
{
	natDexNo = document.getElementById("natDexNo");
	speciesName = document.getElementById("speciesName");
	type1 = document.getElementById("type1");
	type2 = document.getElementById("type2");
	foto = document.getElementById("artwork");
	dexEntry = document.getElementById("dexEntry");
	
	//-----NUMERO POKEDEX NACIONAL------
	if (natDexNo.value == "")
	{
		document.getElementById("mensaje_error").innerHTML = "INGRESE NÚMERO DE LA POKÉDEX";
		natDexNo.focus();
		return false;
	}
	else if (natDexNo.value == "0")
	{
		document.getElementById("mensaje_error").innerHTML = "EL NUMERO DE LA POKEDEX DEBE SER MAYOR A 0";
		natDexNo.focus();
		return false;
	}
	else if (!/^[1-9]{1,}$/.test(natDexNo.value))
	{
		document.getElementById("mensaje_error").innerHTML = "DEBE INGRESAR UN NÚMERO";
		natDexNo.focus();
		return false;
	}

	//-----NOMBRE POKEMON----------
	else if (speciesName.value == "")
	{
		document.getElementById("mensaje_error").innerHTML = "INGRESE NOMBRE";
		speciesName.focus();
		return false;
	}

	//-------TIPOS POKEMON--------
	else if (type1.value == "0")
	{
		document.getElementById("mensaje_error").innerHTML = "SELECCIONE UN TIPO";
		type1.focus();
		return false;
	}
	else if (type2.value == type1.value)
	{
		document.getElementById("mensaje_error").innerHTML = "LOS DOS TIPOS NO PUEDEN SER IGUALES";
		type2.focus();
		return false;
	}

	//---------ARTWORK------------
	else if (artwork.value == "")
	{
		document.getElementById("mensaje_error").innerHTML = "ELIJA UNA IMAGEN";
		artwork.focus();
		return false;
	}

	//---------DESCRIPCION-----
	else if (dexEntry.value.length < 10)
	{
		document.getElementById("mensaje_error").innerHTML = "LA DESCRIPCIÓN ES MUY CORTA";
		dexEntry.focus();
		return false;
	}
	else if (dexEntry.value.length > 100)
	{
		document.getElementById("mensaje_error").innerHTML = "LA DESCRIPCIÓN ES MUY LARGA";
		dexEntry.focus();
		return false;
	}

	//-------TODO VALIDO XD-------
	else
	{
		document.getElementById("mensaje_error").innerHTML = ""
	}
	
	//------------------------------------------
	return true;

}
*/






