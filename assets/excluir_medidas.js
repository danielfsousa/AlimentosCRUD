$(function() {

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(1).addClass('active');

    $('.ui.dropdown').dropdown();

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
            }
        },
        inline : true,
        on     : 'blur'
    });
});