<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Musica.com</title>
        <link rel="stylesheet"  type="text/css" href="css/style_login.css" />
    </head>
    <body>

        <div id="formulario">
            <h2><?php if(isset($_GET['msg'])) echo $_GET['msg'];?></h2>
            <form id="form1" name="form1" method="post" action="validar_login.php">

                <p>
                    <label for="usuario">USUARIO</label>
                    <input type="text" name="usuario" id="usuario" />
                </p>
                <p>
                    <label for="clave">CLAVE</label>
                    <input type="text" name="clave" id="clave" />
                </p>
                <p class="centro">
                    <input type="submit" name="btnValida" id="btnValida" value="Enviar" />
                </p>

            </form>
        </div>
    </body>
</html>