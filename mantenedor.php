<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CATÁLOGO</title>
        <link rel="stylesheet" href="../css/style_pokemon_catalog.css" />
        <script src="../js/validar_pokemon.js"></script>
    </head>

    <?php
        //-----------------servidor--usuario--contraseña--basedatos
        $mysqli = new MySQLi("localhost", "root", "", "pokemondatabase");

        // AGREGAR
        if (isset($_POST["btnEnviar"]))
        {
            $natDexNo = $_POST["natDexNo"];

            $result = $mysqli -> query("SELECT * FROM pokemoninfo WHERE natDexNo = $natDexNo");
            if(mysqli_num_rows($result) > 0) //REVISA SI YA EXISTE UN POKEMON CON EL NO. DE POKEDEX
            {
                echo "<script>alert('YA EXISTE UN POKEMON CON ESE NUMERO')</script>";
            }
            else
            {
                $speciesName = $_POST["speciesName"];
                $type1 = $_POST["type1"];
                $type2 = $_POST["type2"];
                $artwork = $_FILES["artwork"]["name"];
                $dexEntry = $_POST["dexEntry"];

                $sql = "insert into pokemoninfo values('$natDexNo', '$speciesName', '$type1', '$type2', '$artwork','$dexEntry')";
                $agregar = $mysqli -> query($sql);
                if ($agregar)
                {
                    move_uploaded_file($_FILES["artwork"]["tmp_name"], "../img/pokemon/".$artwork);
                }
            }
        }

        //ELIMINAR
        if (isset($_GET["pokemonDelete"]))
        {
            $pokemonDelete = $_GET["pokemonDelete"];
            $sql = "Delete from pokemoninfo where natDexNo = '$pokemonDelete' ";
            $eliminar = $mysqli -> query($sql);
            header("location:pokemon_catalog-admin.php");//<-----Evita que aparezca en la url :D
        }
    ?>

    <body>
        <form name="form1" id="form1" method="post" action="pokemon_catalog-admin.php" enctype="multipart/form-data" onSubmit="return validar();">
            <div class="centro"><h2>INGRESA UN NUEVO POKÉMON</h2></div>
            <div>
                <label class="label" for="natDexNo">No. Pokedex Nacional: </label>
                <input type="text" name="natDexNo" id="natDexNo" />
            </div>
            <div>
                <label class="label" for="speciesName">Nombre: </label>
                <input type="text" name="speciesName" id="speciesName" />
            </div>
            <div>
                <label class="label" for="type1">Tipo Primario: </label>
                <select name="type1" id="type1">
                    <option value="0">Seleccione</option>
                    <option value="Normal">Normal</option>
                    <option value="Fire">Fuego</option>
                    <option value="Fighting">Lucha</option>
                    <option value="Water">Agua</option>
                    <option value="Flying">Volador</option>
                    <option value="Grass">Planta</option>
                    <option value="Poison">Veneno</option>
                    <option value="Electric">Electrico</option>
                    <option value="Ground">Tierra</option>
                    <option value="Psychic">Psíquico</option>
                    <option value="Rock">Roca</option>
                    <option value="Ice">Hielo</option>
                    <option value="Bug">Bicho</option>
                    <option value="Dragon">Dragón</option>
                    <option value="Ghost">Fantasma</option>
                    <option value="Dark">Siniestro</option>
                    <option value="Steel">Acero</option>
                    <option value="Fairy">Hada</option>
                </select>
            </div>
            <div>
                <label class="label" for="type2">Tipo Secundario: </label>
                <select name="type2" id="type2">
                    <option value="0">Seleccione</option>
                    <option value="Normal">Normal</option>
                    <option value="Fire">Fuego</option>
                    <option value="Fighting">Lucha</option>
                    <option value="Water">Agua</option>
                    <option value="Flying">Volador</option>
                    <option value="Grass">Planta</option>
                    <option value="Poison">Veneno</option>
                    <option value="Electric">Electrico</option>
                    <option value="Ground">Tierra</option>
                    <option value="Psychic">Psíquico</option>
                    <option value="Rock">Roca</option>
                    <option value="Ice">Hielo</option>
                    <option value="Bug">Bicho</option>
                    <option value="Dragon">Dragón</option>
                    <option value="Ghost">Fantasma</option>
                    <option value="Dark">Siniestro</option>
                    <option value="Steel">Acero</option>
                    <option value="Fairy">Hada</option>
                </select>
            </div>
            <div>
                <label class="label" for="artwork">Imagen: </label>
                <input type="file" name="artwork" id="artwork" />
            </div>
            <div>
                <label class="label" for="dexEntry">Información: </label>
                <textarea name="dexEntry" id="dexEntry" rows="5"></textarea>
            </div>
            <div>
                <p id="mensaje_error"> </p>
            </div>
            <div class="centro">
                <input type="submit" name="btnEnviar" id="btnEnviar" value="Agregar" />
                <input type="reset" name="btnLimpiar" id="btnLimpiar" value="Limpiar" onclick="document.getElementById('mensaje_error').innerHTML = '';" />
            </div>
        </form>
        <div class="centro">
            <?php
                $sql = "SELECT * FROM pokemoninfo ORDER BY natDexNo ASC";
                $result = $mysqli -> query($sql);

                if (mysqli_num_rows($result) > 0)
                {
                ?>
                <table border="1">
                <tr>
                    <th>No. Dex</th>
                    <th>Icono</th>
                    <th>Nombre</th>
                    <th>Tipo 1</th>
                    <th>Tipo 2</th>
                    <th width="50px">Imagen</th>
                    <th width="330px">Descripción</th>
                    <th>ELIMINAR</th>
                </tr>
            <?php
            }
                while ($registro = $result -> fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $registro["natDexNo"]; ?></td>
                        <td><img src="../img/pokemon/icons/<?php echo $registro['natDexNo'].'.png' ?>"></td>
                        <td><?php echo $registro["speciesName"];?></td>
                        <td><img src="../img/types/<?php echo $registro['type1'].'.png'; ?>"</td> 
                        <td><img src="../img/types/<?php echo $registro['type2'].'.png'; ?>"</td>

                        <td><a href="../img/pokemon/<?php echo $registro['artwork']; ?>"><img width= "50px" src ="../img/pokemon/<?php echo $registro['artwork']; ?>"></a></td>
                        <td width = "330px"><?php echo $registro['dexEntry'];?></td>
                        <td> <a href= "pokemon_catalog-admin.php?pokemonDelete=<?php echo $registro["natDexNo"]; ?>">ELIMINAR</a></td>
                    </tr>
                    <?php  
                }
            ?>
            </table>
        </div>
    </body>
</html>







