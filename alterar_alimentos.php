<?php require_once 'includes/functions.php' ?>
<?php include 'includes/header.php' ?>
<?php alterarAlimento(); ?>

<div class="ui success message transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Alimento alterado com sucesso!</p>
</div>

<div class="ui warning message alimento transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Não há nenhum alimento registrado<br>
    <a href="incluir_alimentos.php">Adicionar alimento</a></p>
</div>

<div class="ui warning message medida transition hidden">
    <i class="close icon"></i>
    <div class="header">
    </div>
    <p>Não há nenhuma medida registrada<br>
    <a href="incluir_medidas.php">Adicionar medida</a></p>
</div>

<form action="" method="post" class="ui form segment">
    <div class="field">
        <div class="field">
            <select class="ui dropdown" name="id" id="id">
                <?php getOptions(ALIMENTO); ?>
            </select>
        </div>
        <div class="field">
            <label for="alimento">Nome:</label>
            <input type="text" name="alimento">
        </div>
            <div class="field">
                <label>Medida:</label>
                <select class="ui dropdown" name="medida" id="medida">
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


        <button type="submit" class="ui blue submit button" name="alterar">Salvar</button>
        <button class="ui clear button">Limpar</button>

    </div>
</form>

<script src="assets/alterar_alimentos.js"></script>

<?php include 'includes/footer.php' ?>
