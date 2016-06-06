function getJSON() {
    var idNum = $('#id').val();
    console.log(idNum)

    $.ajax({
        url: "includes/json.php",
        type: "GET",
        data: {id: idNum},
        dataType: "json",
        success: function(json) {
            $('input[name="alimento"]').val(json['alimento']);
            $('input[name="energia"]').val(json['energia']);
            $('input[name="lipidios"]').val(json['lipidios']);
            $('input[name="ag_saturados"]').val(json['ag_saturados']);
            $('input[name="sodio"]').val(json['sodio']);
            $('input[name="calcio"]').val(json['calcio']);
            $('input[name="ferro"]').val(json['ferro']);
            $('#medida').dropdown('set selected', json['id_medida']);
        },
        error: function(request, status) {
            console.error(status);
        }
    });
}

$(function() {

    getJSON();

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(0).addClass('active');

    $('#id').on("change", function() {
        $('input[name="alimento"]').val('');
        $('#medida').dropdown('clear');
        $('input[name="energia"]').val('');
        $('input[name="lipidios"]').val('');
        $('input[name="ag_saturados"]').val('');
        $('input[name="sodio"]').val('');
        $('input[name="calcio"]').val('');
        $('input[name="ferro"]').val('');
        getJSON();
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
            alimento: {
                identifier: 'alimento',
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