<?php

include '../layout/layout.php';
include '../helpers/utilities.php';
include 'serviceSession.php';




if(isset($_GET['id'])){

    $pelicula = GetById($_GET["id"]);
   
    delete($pelicula);

     

}

header("Location: ../index.php");
exit();



?>
