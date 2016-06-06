<?php include 'includes/header.php' ?>
<?php include 'includes/functions.php' ?>
<?php incluirAlimento(); ?>

<div class="ui success message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Alimento inserido com sucesso!</p>
</div>

<div class="ui warning message medida transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Não há nenhuma medida registrada.<br>
    <a href="incluir_medidas.php">Adicionar medida</a></p>
</div>

<form action="" method="post" class="ui form segment">
        <div class="field">
            <label for="alimento">Nome:</label>
            <input type="text" name="alimento">
        </div>
        <div class="field">
            <label>Medida:</label>
            <select class="ui dropdown" name="medida" id="medida">
                <option value="">Medida</option>
                <?php getOptions(MEDIDA); ?>
            </select>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="energia">Energia:</label>
                <input type="text" name="energia" id="energia">
            </div>
            <div class="field">
                <label for="lipidios">Lipídios:</label>
                <input type="text" name="lipidios" id="lipidios">
            </div>
            <div class="field">
                <label for="ag_saturados">A.g. Saturados:</label>
                <input type="text" name="ag_saturados" id="ag_saturados">
            </div>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="sodio">Sódio:</label>
                <input type="text" name="sodio" id="sodio">
            </div>
            <div class="field">
                <label for="calcio">Cálcio:</label>
                <input type="text" name="calcio" id="calcio">
            </div>
            <div class="field">
                <label for="ferro">Ferro:</label>
                <input type="text" name="ferro" id="ferro">
            </div>
        </div>

        <button type="submit" name="incluir" class="ui blue submit button">Inserir</button>
        <button class="ui clear button">Limpar</button>

    </div>
</form>

<script src="assets/incluir_alimentos.js"></script>

<?php include 'includes/footer.php' ?>
