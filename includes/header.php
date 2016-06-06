<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">
    <script src="assets/jQuery/jquery-2.2.4.min.js"></script>
    <script src="assets/semantic/semantic.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }
        .item {
            transition: .2s !important;

        }
        .item:hover {
            transition: .2s !important;
            border-bottom-color: #a0a0a0 !important;
        }
        th.medidas {
            width: 10%;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="ui two column centered grid">

        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>

        <div class="middle aligned row">

            <div class="column">

                <div class="ui secondary pointing menu">
                    <a href="alimentos.php" class="item">ALIMENTOS</a>
                    <a href="medidas.php" class="item">MEDIDAS</a>
                </div>