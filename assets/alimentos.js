$(function() {

    var $menu = $('.ui.menu');
    $menu.find('.item.active').removeClass('active');
    $menu.find('.item').eq(0).addClass('active');

});