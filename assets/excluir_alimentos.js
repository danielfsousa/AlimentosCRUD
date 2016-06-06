function getJSON() {
    var idNum = $('#id').val();

    $.ajax({
        url: "includes/json.php",
        type: "GET",
        data: {id: idNum},
        dataType: "json",
        success: function(json) {
            $('input[name="alimento"]').val(json['alimento']);
            $('input[name="medida"]').val(json['nome_medida']);
            $('input[name="energia"]').val(json['energia']);
            $('input[name="lipidios"]').val(json['lipidios']);
            $('input[name="ag_saturados"]').val(json['ag_saturados']);
            $('input[name="sodio"]').val(json['sodio']);
            $('input[name="calcio"]').val(json['calcio']);
            $('input[name="ferro"]').val(json['ferro']);
        },
        error: function(request, status, error) {
            console.error(error);
        }
    });
}

$(function() {

    getJSON();

    $('#id').on("change", function() {
        $('input[name="alimento"]').val('');
        $('input[name="medida"]').val('');
        $('input[name="energia"]').val('');
        $('input[name="lipidios"]').val('');
        $('input[name="ag_saturados"]').val('');
        $('input[name="sodio"]').val('');
        $('input[name="calcio"]').val('');
        $('input[name="ferro"]').val('');
        getJSON();
    });

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(0).addClass('active');

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