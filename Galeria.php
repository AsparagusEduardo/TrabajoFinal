<!doctype html>
<html>
<head>
	<title>Galeria Metallica</title>
	<link rel = "stylesheet" href ="css/style_galeria.css"/>
	<link rel = "stylesheet" href ="css/style_index.css"/>
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<h1>
		<img  src="img/misc/corso-musica.jpg" class="fade" alt="web2.0" title="web2.0">
		</h1>
		<nav>
			<ul>
				<li><a href = "index.php">Volver al Inicio</a></a></li>
			</ul>
		</nav>
	</header>
	<h1>Galería de integrantes de Metallica</h1>
    
    <ul class="galeria">
        <li><a href="#img1"><img src="img/misc/1.jpeg"></a></li>
        <li><a href="#img2"><img src="img/misc/hetfield_2015.png"></a></li>
        <li><a href="#img3"><img src="img/misc/kirk-hammett-fire.jpg"></a></li>
        <li><a href="#img4"><img src="img/misc/trujillo.jpg"></a></li>
    </ul>

    <div class="modal" id="img1">
        <h1>"Lars Ulrich"</h1>
        <div class="imagen">
            <a href="#img4">&#60;</a>
            <a href="#img2"><img src="img/misc/1.jpeg"></a>
            <a href="#img2">></a>
        </div>
        <a class="cerrar" href="">X</a>
    </div>
    
    <div class="modal" id="img2">
        <h1>"James Hetfield"</h1>
        <div class="imagen">
            <a href="#img1">&#60;</a>
            <a href="#img3"><img src="img/misc/hetfield_2015.png"></a>
            <a href="#img3">></a>
        </div>
        <a class="cerrar" href="">X</a>
    </div>
    
    <div class="modal" id="img3">
        <h1>"Kirk Hammett"</h1>
        <div class="imagen">
            <a href="#img2">&#60;</a>
            <a href="#img4"><img src="img/misc/kirk-hammett-fire.jpg"></a>
            <a href="#img4">></a>
        </div>
        <a class="cerrar" href="">X</a>
    </div>
    
    <div class="modal" id="img4">
        <h1>"Robert Trujillo"</h1>
        <div class="imagen">
            <a href="#img3">&#60;</a>
            <a href="#img1"><img src="img/misc/trujillo.jpg"></a>
            <a href="#img1">></a>
        </div>
        <a class="cerrar" href="">X</a>
    </div>
	<footer>
	  Creado por John Bravo
	</footer>
</body>
</html>