<?php include 'includes/header.php' ?>
<?php include 'includes/functions.php' ?>
<?php alterarMedida(); ?>

<div class="ui success message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Medida alterada com sucesso!</p>
</div>

<div class="ui warning message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Não há nenhuma medida registrada.<br>
    <a href="incluir_medidas.php">Adicionar medida</a></p>
</div>

<form action="" method="post" class="ui form segment">
    <div class="field">
        <div class="field">
            <select class="ui dropdown" name="id" id="id">
                <?php getOptions(MEDIDA); ?>
            </select>
        </div>
        <div class="field">
            <label for="medida">Nome:</label>
            <input type="text" name="medida">
        </div>

        <button type="submit" class="ui blue submit button" name="alterar">Salvar</button>
        <button class="ui clear button">Limpar</button>

    </div>
</form>

<script src="assets/alterar_medidas.js"></script>

<?php include 'includes/footer.php' ?>
