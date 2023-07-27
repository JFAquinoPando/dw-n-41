<?php
    require 'conexion.php';
    function guardar(string $tabla, array $columnas, array $valores){
        global $conexion;
        $columnas = implode(",", $columnas);
        $valores = implode("','", $valores);
        $valores = "'".$valores."'";
        $sql = "INSERT INTO $tabla ({$columnas}) values ($valores)";
        return $conexion->query($sql);
    }