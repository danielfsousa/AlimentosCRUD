<?php include 'includes/header.php' ?>
<?php include 'includes/functions.php' ?>
<?php excluirMedida(); ?>

<div class="ui success message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Medida excluída com sucesso!</p>
</div>

<div class="ui warning message medida transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Não há nenhuma medida registrada.<br>
    <a href="incluir_medidas.php">Adicionar medida</a></p>
</div>

<div class="ui error message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <strong>Não foi possível excluir a medida.</strong>
    <p>Você deve excluir os alimentos que contém essa medida.<br>
    <a href="excluir_alimentos.php">Excluir alimentos</a></p>
</div>

<form action="" method="post" class="ui form segment">
    <div class="field">
        <div class="field">
            <label>Medida:</label>
            <select class="ui dropdown" name="id" id="id">
                <?php getOptions(MEDIDA); ?>
            </select>
        </div>

        <button type="submit" class="ui red submit button">Excluir</button>

    </div>
</form>

<script src="assets/excluir_medidas.js"></script>

<?php include 'includes/footer.php' ?>
