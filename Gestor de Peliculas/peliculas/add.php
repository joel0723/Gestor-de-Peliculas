<?php
include 'serviceSession.php';
include '../helpers/utilities.php';


if(isset($_POST["PelisName"]) && isset($_POST["PelisDescription"]) && isset($_POST["PelisId"]) && isset($_POST["Check"])){

    $pelicula = ["name" => $_POST["PelisName"],"description"=>$_POST["PelisDescription"],"pelisId"=>$_POST["PelisId"], "checked" =>$_POST["Check"]];
    
        Add($pelicula);


    header("Location: ../index.php");
}
