<?php

define('DB_SERVIDOR', 'localhost');
define('DB_LOGIN', 'root');
define('DB_SENHA', '');
define('DB_NOME', 'bd_nutricao');

define('SELECT', 0);
define('INSERT', 1);
define('UPDATE', 2);
define('DELETE', 3);
define('CUSTOM', 4);

$conexao = mysqli_connect(DB_SERVIDOR, DB_LOGIN, DB_SENHA, DB_NOME);

if(!$conexao) {
    die("Não foi possível se conectar ao Banco de Dados");
}

/**
 *
 *  arrayDados['id'] = id_alimento
 *  arrayDados['alimento'] = tx_alimento
 *  arrayDados['medida'] = id_medida
 *  arrayDados['energia'] = nf_energia
 *  arrayDados['lipidios'] = nf_lipidios
 *  arrayDados['ag_saturados'] = nf_ag_saturados
 *  arrayDados['sodio'] = nf_sodio
 *  arrayDados['calcio'] = nf_calcio
 *  arrayDados['ferro'] = nf_ferro
 *
 *  arrayDados['id'] = id_medida
 *  arrayDados['medida'] = tx_medida
 *
 *  Retorna $result
 *
 **/
function queryDB($tabela, $func, $arrayDados = null, $Query = null) {

    global $conexao;

    for($i = 0; $i < count($arrayDados); $i++) {
        if(isset($arrayDados[$i])) {
            $arrayDados[$i] = mysqli_real_escape_string($conexao, $arrayDados[$i]);
        }
    }

    switch($func) {

        case SELECT:

            $idOrder = ($tabela == "tb_alimento") ? "tx_alimento" : "tx_medida";

            if(isset($tabela)) {
                $query = "SELECT * FROM $tabela ORDER BY $idOrder";
            }
            break;

        case INSERT:

            if(isset($arrayDados) && isset($tabela)) {
                if($tabela == ALIMENTO) {
                    $id_alimento = getID($tabela);
                    $tx_alimento = $arrayDados['alimento'];
                    $id_medida = $arrayDados['medida'];
                    $nf_energia = $arrayDados['energia'];
                    $nf_lipidios = $arrayDados['lipidios'];
                    $nf_ag_saturados = $arrayDados['ag_saturados'];
                    $nf_sodio = $arrayDados['sodio'];
                    $nf_calcio = $arrayDados['calcio'];
                    $nf_ferro = $arrayDados['ferro'];
                    $query  = "INSERT INTO $tabela(id_alimento, tx_alimento, id_medida, nf_energia, nf_lipidios,
                                                   nf_ag_saturados, nf_sodio, nf_calcio, nf_ferro)";
                    $query .= "VALUES('$id_alimento', '$tx_alimento', '$id_medida', '$nf_energia', '$nf_lipidios',
                                      '$nf_ag_saturados', '$nf_sodio', '$nf_calcio', '$nf_ferro')";
                }

                if($tabela == MEDIDA) {
                    $id_medida = $arrayDados['id'];
                    $tx_medida = $arrayDados['medida'];
                    $query  = "INSERT INTO $tabela(id_medida, tx_medida) ";
                    $query .= "VALUES('$id_medida', '$tx_medida') ";
                }

            } else {
                die("Você deve enviar um arrayDados como argumento da função queryDB().");
            }
            break;

        case UPDATE:

            if(isset($arrayDados)) {
                $query  = "UPDATE $tabela SET ";

                if($tabela == ALIMENTO) {
                    $query .= "id_alimento      = '$arrayDados[id]', ";
                    $query .= "tx_alimento      = '$arrayDados[alimento]', ";
                    $query .= "id_medida        = '$arrayDados[medida]', ";
                    $query .= "nf_energia       = '$arrayDados[energia]', ";
                    $query .= "nf_lipidios      = '$arrayDados[lipidios]', ";
                    $query .= "nf_ag_saturados  = '$arrayDados[ag_saturados]', ";
                    $query .= "nf_sodio         = '$arrayDados[sodio]', ";
                    $query .= "nf_calcio        = '$arrayDados[calcio]', ";
                    $query .= "nf_ferro         = '$arrayDados[ferro]' ";
                    $query .= "WHERE id_alimento = $arrayDados[id] ";
                }

                if($tabela == MEDIDA) {
                    $query .= "id_medida      = '$arrayDados[id]', ";
                    $query .= "tx_medida     = '$arrayDados[medida]' ";
                    $query .= "WHERE id_medida = $arrayDados[id] ";
                }

            } else {
                die("Você deve enviar um arrayDados como argumento da função queryDB().");
            }
            break;

        case DELETE:

            $idDelete = ($tabela == "tb_alimento") ? "id_alimento" : "id_medida";

            if(isset($arrayDados)) {
                $query  = "DELETE FROM $tabela ";
                $query .= "WHERE $idDelete = $arrayDados[id] ";
            } else {
                die("Você deve enviar um arrayDados como argumento da função queryDB().");
            }
            break;

        case CUSTOM:

            if(isset($Query)) {
                $query = $Query;
            } else {
                die("Você deve enviar uma Query como argumento da função queryDB().");
            }
            break;

        default:
            die("Você não informou o comando para o banco de dados");
    }

    $result = mysqli_query($conexao, $query);

    if (!$result) {

        if(mysqli_errno($conexao) == 1451) {
            getAlerta(2);
        } else {
            die("<b>Houve algum erro na Query:</b> " . mysqli_error($conexao));

        }

    } else {
        if($func == SELECT || $func == CUSTOM) {
            return $result;
        }
        return true;
    }

}
