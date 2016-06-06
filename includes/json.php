<?php

include_once "db.php";

header('Content-Type: application/json');

if(!empty($_GET['id'])) {

    $id = $_GET['id'];

    $resultAlimento = queryDB("tb_alimento", CUSTOM, null, "SELECT * FROM tb_alimento WHERE id_alimento = {$id}");

    if (!mysqli_num_rows($resultAlimento)) {
        die();
    }

    $alimento = mysqli_fetch_array($resultAlimento);

    $data = array(
        'alimento'     =>  $alimento['tx_alimento'],
        'id_medida'    =>  $alimento['id_medida'],
        'energia'      =>  $alimento['nf_energia'],
        'lipidios'     =>  $alimento['nf_lipidios'],
        'ag_saturados' =>  $alimento['nf_ag_saturados'],
        'sodio'        =>  $alimento['nf_sodio'],
        'calcio'       =>  $alimento['nf_calcio'],
        'ferro'        =>  $alimento['nf_ferro']
    );

    $resultIdMedida = queryDB("tb_medida", CUSTOM, null, "SELECT tx_medida FROM tb_medida_caseira WHERE id_medida = {$data['id_medida']}");

    $medida = mysqli_fetch_array($resultIdMedida);

    $data['nome_medida'] = $medida['tx_medida'];

    echo json_encode($data);

}

