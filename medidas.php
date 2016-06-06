<?php require_once 'includes/functions.php' ?>
<?php include 'includes/header.php' ?>
<?php excluirMedida(); ?>

<table class="ui selectable celled table">
    <thead>
    <tr>
        <th>Medida</th>
        <th class="medidas"></th>
        <th class="medidas"></th>
    </tr>
    </thead>
    <tbody>

    <?php getMedidas(); ?>

    </tbody>
</table>

<a href="incluir_medidas.php"><button class="ui primary button">Inserir Medida</button></a>

<script src="assets/medidas.js"></script>

<?php include 'includes/footer.php' ?>
