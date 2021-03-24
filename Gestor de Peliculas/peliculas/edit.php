<?php

include '../layout/layout.php';
include '../helpers/utilities.php';
include 'serviceSession.php';
$peli = GetList();

$pelicula = null;
if (isset($_GET["id"])) {

    $pelicula = GetById($_GET["id"]);

    if (isset($_POST["PelisName"]) && isset($_POST["PelisDescription"]) && isset($_POST["PelisId"])) {


        $pelicula = ["id" => $_GET["id"], "name" => $_POST["PelisName"], "description" => $_POST["PelisDescription"], "pelisId" => $_POST["PelisId"], "checked" =>$_POST["Check"]];

        edit($pelicula);

        

        header("Location: ../index.php");

    }



}

  


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php printHeader() ?>

    <?php if ($pelicula == null || count($pelicula) == 0) : ?>

        <h2>No existe Pelicula</h2>

    <?php else : ?>

        <form action="edit.php?id=<?= $pelicula["id"] ?>" method="POST">

            <div class="mb-3">
                <label for="pelis-name" class="form-label">Nombre de la Pelicula</label>
                <input name="PelisName" value="<?php echo $pelicula["name"] ?>" type="text" class="form-control" id="pelis-name">

            </div>

            <div class="mb-3">
                <label for="pelis-description" class="form-label">Descripcion</label>
                <input name="PelisDescription" value="<?php echo $pelicula["description"] ?>" type="text" class="form-control" id="pelis-description">
            </div>

            <div class="mb-3">
                <input checked type="checkbox" id="activo" name="Check" value="1">
                <label for="activo">Marque su Estado</label><br>
            </div>

            <div class="mb-3">
                <label for="pelis" class="form-label">Genero</label>
                <select name="PelisId" class="form-select" id="pelis">
                    <option value="">Seleccione una opcion</option>
                    <?php foreach ($tipo as $value => $text) : ?>

                        <?php if ($value == $pelicula["pelisId"]) : ?>

                            <option selected value="<?= $value ?>"><?= $text ?></option>


                        <?php else : ?>

                            <option value="<?= $value ?>"><?= $text ?></option>

                        <?php endif; ?>


                    <?php endforeach ?>
                </select>
            </div>

            <a href="../index.php" class="btn btn-secondary">Volver</a>
            <button type="subtmit" class="btn btn-primary">Guardar Peliculas</button>

        </form>
        

    <?php endif ?>


    <?php printFooter() ?>



</body>

</html>