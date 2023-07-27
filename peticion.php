<?php
header("Content-type: application/json");


$documento = isset($_GET['documento']) && trim($_GET['documento']) != '' 
            ? $_GET['documento'] 
            : '';

$texto = json_encode([]);
if (!!$documento) {
    # code...
    $texto = file_get_contents("https://www.tupi.com.py/inventiva/identidad.php?ci={$documento}");

    include 'abm.php';

    $estructuraJson = json_decode($texto);

    $estructuraJson->guardado = guardar(
        'registros', 
        [
            'nombre',
            'documento',
            'ruc',
            'fecha_nac'
        ],
        [
            $estructuraJson->NOMBRE,
            $estructuraJson->CI,
            $estructuraJson->RUC ?? 'nada',
            $estructuraJson->FEC_NACIMIENTO
        ]
    );

    $texto = json_encode($estructuraJson);



}
echo $texto;