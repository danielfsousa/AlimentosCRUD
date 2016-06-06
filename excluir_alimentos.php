<?php require_once 'includes/functions.php' ?>
<?php include 'includes/header.php' ?>
<?php excluirAlimento(); ?>

<div class="ui success message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Alimento excluído com sucesso!</p>
</div>

<div class="ui warning message alimento transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Não há nenhum alimento registrado.<br>
    <a href="incluir_alimentos.php">Adicionar alimento</a></p>
</div>

<form action="" method="post" class="ui form segment">
    <div class="field">
        <div class="field">
            <label>Alimento:</label>
            <select class="ui dropdown" name="id" id="id">
                <?php getOptions(ALIMENTO); ?>
            </select>
        </div>
        <div class="field">
            <label>Medida:</label>
            <input type="text" name="medida" id="medida" disabled>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="energia">Energia:</label>
                <input type="text" name="energia" id="energia" disabled>
            </div>
            <div class="field">
                <label for="lipidios">Lipídios:</label>
                <input type="text" name="lipidios" id="lipidios" disabled>
            </div>
            <div class="field">
                <label for="ag_saturados">A.g. Saturados:</label>
                <input type="text" name="ag_saturados" id="ag_saturados" disabled>
            </div>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="sodio">Sódio:</label>
                <input type="text" name="sodio" id="sodio" disabled>
            </div>
            <div class="field">
                <label for="calcio">Cálcio:</label>
                <input type="text" name="calcio" id="calcio" disabled>
            </div>
            <div class="field">
                <label for="ferro">Ferro:</label>
                <input type="text" name="ferro" id="ferro" disabled>
            </div>
        </div>

        <button type="submit" class="ui red submit button">Excluir</button>

    </div>
</form>

<script src="assets/excluir_alimentos.js"></script>

<?php include 'includes/footer.php' ?>
