function atualizaNome(select) {
    var nome = select.find('option:selected').text();
    $('input[name="medida"]').val(nome);
}

$(function() {

    var idSelect = $('#id');
    atualizaNome(idSelect);

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(1).addClass('active');

    idSelect.on("change", function() {
        atualizaNome(idSelect);
    });

    $('.ui.dropdown').dropdown();

    $('.ui.clear').on('click', function() {
        $('form').form('clear');
    });

    $('.ui.form').form({
        fields : {
            id: {
                identifier: 'id',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Esse campo é obrigatório'
                    }
                ]
            },
            medida: {
                identifier: 'medida',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Esse campo é obrigatório'
                    }
                ]
            },
        },
        inline : true,
        on     : 'blur'
    });
});