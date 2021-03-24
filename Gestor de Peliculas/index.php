<?php

include 'helpers/utilities.php';
include 'layout/layout.php';
include 'peliculas/serviceSession.php';

$peliculas = GetList();



if (!empty($peliculas)) {



  if (isset($_GET['pelisId'])) {
    



    $peliculas = searchProperty($peliculas, 'pelisId', $_GET['pelisId']);
    


  }

}





?>




<?php printHeader(true) ?>




<div class="row">



  <div class="col-md-10"></div>
  <div class="col-md-2">



  
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-heroe-modal">
      Nueva Pelicula
    </button>

  </div>
</div>


<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">

    <div class="btn-group margen-izq-12">

      <a href="index.php" class="btn btn-primary">Todos</a>
      <a href="index.php?pelisId=1" class="btn btn-primary">Accion</a>
      <a href="index.php?pelisId=2" class="btn btn-primary">Terror</a>
      <a href="index.php?pelisId=3" class="btn btn-primary">Comedia</a>
      <a href="index.php?pelisId=4" class="btn btn-primary">Suspenso</a>
      <a href="index.php?pelisId=5" class="btn btn-primary">Documentales</a>

    </div>


  </div>



  <div class="row">

    <?php if (count($peliculas) == 0) : ?>

  

      <h2>No hay peliculas, Inserte alguna</h2>

    <?php else : ?>


      <?php foreach ($peliculas as $pelicula) : ?>

        <div class="col-md-3">

          <div class="card">

            <div class="card-body">
              <h5 class="card-title"><?= $pelicula["name"] ?></h5>
              <p class="card-text"><?= $pelicula["description"] ?></p>
              <p class="card-text"><?= GetCompanyName($pelicula["pelisId"]) ?></p>

              <?php if(isset($pelicula["checked"]) ): ?>

              <input checked disabled type="checkbox" id="activo" name="Check" >
                <label for="activo" class="bg-success text-white">Estado Activo</label><br>

              <?php else: ?>

                <input  disabled type="checkbox" id="activo" name="Check" >
                <label for="activo" class="bg-danger text-white">Estado Inactivo</label><br>


              <?php endif; ?>
                

            </div>

            <div class="card-body">
              <a href="peliculas/edit.php?id=<?= $pelicula["id"] ?>" class="btn btn-primary">Editar</a>
              <a href="peliculas/delete.php?id=<?= $pelicula["id"] ?>" class="btn btn-danger">Eliminar</a>
            </div>
          </div>

        </div>
      <?php endforeach; ?>

    <?php endif; ?>





  </div>











  <div class="modal fade" id="nuevo-heroe-modal" tabindex="-1" aria-labelledby="nuevo-heroe-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header back">
          <h5 class="modal-title" id="nuevo-heroe-modal">Agrege su Pelicula</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="peliculas/add.php" method="POST">

            <div class="mb-3">
              <label for="pelis-name" class="form-label">Nombre de la Pelicula</label>
              <input name="PelisName" type="text" class="form-control" id="pelis-name" placeholder="Nombre de la pelicula">

            </div>

            <div class="mb-3">
              <label for="pelis-description" class="form-label">Descripcion</label>
              <input name="PelisDescription" type="text" class="form-control" id="pelis-description" placeholder="Descripcion de la pelicula">
            </div>

            <div class="mb-3">
              <input checked  type="checkbox" id="activo" name="Check" value="1">
              <label for="activo">Estado</label><br>
            </div>

            <div class="mb-3">
              <label for="pelis" class="form-label">Genero</label>
              <select name="PelisId" class="form-select" id="pelis">
                <option value="">Seleccione una opcion</option>
                <?php foreach ($tipo as $value => $text) : ?>

                  <option value="<?= $value ?>"><?= $text ?></option>

                <?php endforeach ?>
              </select>
            </div>

        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
          <button type="subtmit" class="btn btn-primary">Guardar Peliculas</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php printFooter(true) ?>