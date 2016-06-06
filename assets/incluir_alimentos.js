$(function() {

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(0).addClass('active');

    $('.ui.dropdown').dropdown();

    $('.ui.clear').on('click', function() {
        $('form').form('clear');
    });

    $('.ui.form').form({
        fields : {
            alimento: {
                identifier: 'alimento',
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
            energia: {
                identifier: 'energia',
                rules: [
                    {
                        type   : 'number',
                        prompt : 'Esse campo deve conter apenas números'
                    }
                ]
            },
            lipidios: {
                identifier: 'lipidios',
                rules: [
                    {
                        type   : 'number',
                        prompt : 'Esse campo deve conter apenas números'
                    }
                ]
            },
            ag_saturados: {
                identifier: 'ag_saturados',
                rules: [
                    {
                        type   : 'number',
                        prompt : 'Esse campo deve conter apenas números'
                    }
                ]
            },
            sodio: {
                identifier: 'sodio',
                rules: [
                    {
                        type   : 'number',
                        prompt : 'Esse campo deve conter apenas números'
                    }
                ]
            },
            calcio: {
                identifier: 'calcio',
                rules: [
                    {
                        type   : 'number',
                        prompt : 'Esse campo deve conter apenas números'
                    }
                ]
            },
            ferro: {
                identifier: 'ferro',
                rules: [
                    {
                        type   : 'number',
                        prompt : 'Esse campo deve conter apenas números'
                    }
                ]
            }
        },
        inline : true,
        on     : 'blur'
    });
});