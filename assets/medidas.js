$(function() {

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(1).addClass('active');

});