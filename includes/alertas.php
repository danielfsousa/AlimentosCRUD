<?php

define("SUCESSO", 0);
define("AVISO", 1);
define("ERRO", 2);

function getAlerta($opcao, $alimentoOuMedida = null) {

    $alerta = "";

    if($opcao == SUCESSO) {

        $alerta  = "<script>";
        $alerta .= "$(function() { ";
        $alerta .=     "$('.ui.message.success').transition('scale').removeClass('hidden');";
        $alerta .=     "$('.message .close').on('click', function() {";
        $alerta .=          "$(this).closest('.message').transition('scale').addClass('hidden');";
        $alerta .=     "});";
        $alerta .= "});";
        $alerta .= "</script>";


    }

    if($opcao == AVISO) {

        $alimentoOuMedida = ($alimentoOuMedida == ALIMENTO) ? ".alimento" : ".medida";

        $alerta  = "<script>";
        $alerta .= "$(function() { ";
        $alerta .=     "$('.ui.message.warning{$alimentoOuMedida}').transition('scale').removeClass('hidden');";
        $alerta .=     "$('.message .close').on('click', function() {";
        $alerta .=          "$(this).closest('.message').transition('scale').addClass('hidden');";
        $alerta .=     "});";
        $alerta .= "});";
        $alerta .= "</script>";

    }

    if($opcao == ERRO) {

        $alerta  = "<script>";
        $alerta .= "$(function() { ";
        $alerta .=     "$('.ui.message.error').transition('scale').removeClass('hidden');";
        $alerta .=     "$('.message .close').on('click', function() {";
        $alerta .=          "$(this).closest('.message').transition('scale').addClass('hidden');";
        $alerta .=     "});";
        $alerta .= "});";
        $alerta .= "</script>";

    }

    echo $alerta;

}