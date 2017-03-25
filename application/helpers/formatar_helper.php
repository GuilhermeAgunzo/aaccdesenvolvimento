<?php

function dataPtBrParaMysql($dataPtBr = null){

    if(is_null($dataPtBr) || $dataPtBr == 0 || $dataPtBr == ""){
        return null;
    }


    $partes = explode("/", $dataPtBr);
    return "{$partes[2]}-{$partes[1]}-{$partes[0]}";

    //return "2016-05-27";
}

function dataMysqlParaPtBr($dataMysql = null){

    if(is_null($dataMysql) || $dataMysql == 0 || $dataMysql == ""){
        return null;
    }

    $data = new DateTime($dataMysql);
    return $data->format("d/m/Y");
}