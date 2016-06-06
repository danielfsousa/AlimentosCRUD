<?php require_once 'includes/functions.php' ?>
<?php include 'includes/header.php' ?>

<table class="ui selectable celled table">
    <thead>
    <tr>
        <th>Alimento</th>
        <th>Medida</th>
        <th>Energia</th>
        <th>Lipídios</th>
        <th>A.g. Saturados</th>
        <th>Sódio</th>
        <th>Cálcio</th>
        <th>Ferro</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php getAlimentos(); ?>

    </tbody>
</table>

<a href="incluir_alimentos.php"><button class="ui primary button">Inserir Alimento</button></a>

<script src="assets/alimentos.js"></script>

<?php include 'includes/footer.php' ?>
