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

        
    ?>

    <body>
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
                    </tr>
                    <?php  
                }
            ?>
            </table>
        </div>
    </body>
</html>







