<?php

require_once 'db.php';
include_once 'alertas.php';

define("ALIMENTO", "tb_alimento");
define("MEDIDA", "tb_medida_caseira");

function getID($alimentoOuMedida) {

    if($alimentoOuMedida == ALIMENTO) {
        $result = queryDB(ALIMENTO, CUSTOM, null, "SELECT id_alimento FROM tb_alimento ORDER BY id_alimento DESC LIMIT 1 ");

        while($linha = mysqli_fetch_assoc($result)) {
            $id = $linha['id_alimento'] + 1;
        }
    }

    else if($alimentoOuMedida == MEDIDA){
        $result = queryDB(MEDIDA, CUSTOM, null, "SELECT id_medida FROM tb_medida_caseira ORDER BY id_medida DESC LIMIT 1 ");

        while($linha = mysqli_fetch_assoc($result)) {
            $id = $linha['id_medida'] + 1;
        }
    }

    else {
        die("Você deve informar um parâmetro para a função getID()");
    }

    if(!isset($id)) {
        return 1;
    }

    return $id;
}

function getNomeMedida($id) {

    if(isset($id)) {

        $result = queryDB(MEDIDA, CUSTOM, null, "SELECT tx_medida FROM tb_medida_caseira WHERE id_medida = $id");
        $nome = mysqli_fetch_row($result);
        return $nome[0];

    }

}

function excluirAlimento() {

    if(isset($_POST['id'])) {

        $arrayDados = array( "id" => $_POST['id'] );

        if(queryDB(ALIMENTO, DELETE, $arrayDados)) {
            getAlerta(SUCESSO);
        }
    }

}

function excluirMedida() {

    if(isset($_POST['id'])) {

        $arrayDados = array( "id" => $_POST['id'] );

        if(queryDB(MEDIDA, DELETE, $arrayDados)) {
            getAlerta(SUCESSO);
        }
    }

}

function getAlimentos() {

    $tabela = "";
    $result = queryDB(ALIMENTO, SELECT);

    if(!mysqli_num_rows($result)) {
        echo "<td colspan='10' class='center aligned'>Nenhum registro encontrado</td>";
    }

    while($linha = mysqli_fetch_assoc($result)) {

        $medida = getNomeMedida($linha['id_medida']);

        $tabela .= "<tr>";
        $tabela .= "<td>$linha[tx_alimento]</td>";
        $tabela .= "<td>$medida</td>";
        $tabela .= "<td>$linha[nf_energia]</td>";
        $tabela .= "<td>$linha[nf_lipidios]</td>";
        $tabela .= "<td>$linha[nf_ag_saturados]</td>";
        $tabela .= "<td>$linha[nf_sodio]</td>";
        $tabela .= "<td>$linha[nf_calcio]</td>";
        $tabela .= "<td>$linha[nf_ferro]</td>";
        $tabela .= "<td><a href='alterar_alimentos.php?id=$linha[id_alimento]'>Alterar</a></td>";
        $tabela .= "<td><a href='excluir_alimentos.php?id=$linha[id_alimento]' style='color: red' >Excluir</a></td>";
        $tabela .= "</tr>";

    }

    echo $tabela;
}

function getMedidas() {

    $tabela = "";
    $result = queryDB(MEDIDA, SELECT);

    if(!mysqli_num_rows($result)) {
        echo "<td colspan='3' class='center aligned'>Nenhum registro encontrado</td>";
    }

    while($linha = mysqli_fetch_assoc($result)) {

        $tabela .= "<tr>";
        $tabela .= "<td>$linha[tx_medida]</td>";
        $tabela .= "<td><a href='alterar_medidas.php?id_m=$linha[id_medida]'>Alterar</a></td>";
        $tabela .= "<td><a href='excluir_medidas.php?id_m=$linha[id_medida]' style='color: red' >Excluir</a></td>";
        $tabela .= "</tr>";

    }

    echo $tabela;
}

function getOptions($alimentoOuMedida) {

    $options = "";
    $id = "";
    $id_m = "";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if(isset($_GET['id_m'])) {
        $id_m = $_GET['id_m'];
    }

    if($alimentoOuMedida == ALIMENTO) {

        $result = queryDB(ALIMENTO, SELECT);

        while($linha = mysqli_fetch_assoc($result)) {

            if($linha['id_alimento'] == $id) {
                $options .= "<option value='$linha[id_alimento]' selected>$linha[tx_alimento]</option>";
            } else {
                $options .= "<option value='$linha[id_alimento]'>$linha[tx_alimento]</option>";
            }
        }

    } else if($alimentoOuMedida == MEDIDA) {

        $result = queryDB(MEDIDA, SELECT);

        while($linha = mysqli_fetch_assoc($result)) {

            if($linha['id_medida'] == $id_m) {
                $options .= "<option value='$linha[id_medida]' selected>$linha[tx_medida]</option>";
            } else {
                $options .= "<option value='$linha[id_medida]'>$linha[tx_medida]</option>";
            }

        }

    } else {
        die("Você deve informar um parâmetro para a função getOptions()");
    }

    if(!mysqli_num_rows($result)) {
        getAlerta(AVISO, $alimentoOuMedida);
    }

    echo $options;

}

function alterarAlimento() {

    if(isset($_POST['alterar'])) {

        $id = $_POST['id'];

        $arrayDados = array(
            'id'   => $id,
            'alimento' => $_POST['alimento'],
            'medida' => $_POST['medida'],
            'energia' => $_POST['energia'],
            'lipidios' => $_POST['lipidios'],
            'ag_saturados' => $_POST['ag_saturados'],
            'sodio' => $_POST['sodio'],
            'calcio' => $_POST['calcio'],
            'ferro' => $_POST['ferro']
        );

        if(queryDB(ALIMENTO, UPDATE, $arrayDados)) {
            getAlerta(SUCESSO);
        }

    }

}

function alterarMedida() {

    if(isset($_POST['alterar'])) {

        $id = $_POST['id'];

        $arrayDados = array(
            'id'   => $id,
            'medida' => $_POST['medida'],
        );

        if(queryDB(MEDIDA, UPDATE, $arrayDados)) {
            getAlerta(SUCESSO);
        }

    }

}

function incluirAlimento() {

    if(isset($_POST['incluir'])) {

        $arrayDados = array(
            'id'   => getID(ALIMENTO),
            'alimento' => $_POST['alimento'],
            'medida' => $_POST['medida'],
            'energia' => $_POST['energia'],
            'lipidios' => $_POST['lipidios'],
            'ag_saturados' => $_POST['ag_saturados'],
            'sodio' => $_POST['sodio'],
            'calcio' => $_POST['calcio'],
            'ferro' => $_POST['ferro']
        );

        if(queryDB(ALIMENTO, INSERT, $arrayDados)) {
            getAlerta(SUCESSO);
        }
    }

}

function incluirMedida() {

    if(isset($_POST['incluir'])) {

        $arrayDados = array(
            'id'   => getID(MEDIDA),
            'medida' => $_POST['medida'],
        );

        if(queryDB(MEDIDA, INSERT, $arrayDados)) {
            getAlerta(SUCESSO);
        }
    }

}