$(function() {

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(1).addClass('active');

    $('.ui.clear').on('click', function() {
        $('form').form('clear');
    });

    $('.ui.form').form({
        fields : {
            medida: {
                identifier: 'medida',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Esse campo é obrigatório'
                    }
                ]
            }
        },
        inline : true,
        on     : 'blur'
    });
});