<?php include 'includes/header.php' ?>
<?php include 'includes/functions.php' ?>
<?php incluirMedida(); ?>

<div class="ui success message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Medida incluída com sucesso!</p>
</div>

<form action="" method="post" class="ui form segment">
        <div class="field">
            <label for="nome">Medida:</label>
            <input type="text" name="medida" id="medida">
        </div>

        <button type="submit" name="incluir" class="ui blue submit button">Incluir</button>
        <button class="ui clear button">Limpar</button>

</form>

<script src="assets/incluir_medidas.js"></script>

<?php include 'includes/footer.php' ?>
