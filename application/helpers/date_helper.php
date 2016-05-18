<?php

function dataPtBrParaMysql2($dataPtBr){
    $partes = explode("/", $dataPtBr);
    //return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}

function dataMysqlParaPtBr2($dataMysql = null){

    if(is_null($dataMysql)){
        return "";
    }

    $data = new DateTime($dataMysql);
    return $data->format("d/m/Y");
}