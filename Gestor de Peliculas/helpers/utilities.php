<?php

$tipo = [1 => "Accion", 2=> "Terror", 3=> "Comedia", 4=> "Suspenso", 5=> "Documentales"];
$GLOBALS["companyList"] = $tipo;


function GetCompanyName($tipoId){

    foreach($GLOBALS["companyList"] as $key => $value){

        if($key == $tipoId){
            return $value;
            break;
        }
    }

}

function getLastElement($list){

$countList = count($list);

$lastElement = $list[$countList -1];

return $lastElement;

}

function searchProperty($list, $property, $value){

    $filter=[];
    
        foreach($list as $item){
            if($item[$property]== $value){
                array_push($filter, $item);
    
            }
    
        }
    
        return $filter;
    }

    function getIndexElement($list, $property, $value){

        $index=0;
    
        foreach($list as $key => $item){
    
            if($item[$property] == $value){
    
                $index = $key;
            }
    
        }
    
            return $index;
    
    
    }
?>