$('.chata-left-inner > .chatonline').slimScroll({
    height: '100%',
    position: 'right',
    size: "0px",
    color: '#dcdcdc',

});
 $(function(){
            $(window).load(function(){ // On load
                $('.chata-list').css({'height':(($(window).height())-470)+'px'});
            });
            $(window).resize(function(){ // On resize
                $('.chata-list').css({'height':(($(window).height())-470)+'px'});
            });
    });

// this is for the left-aside-fix in content area with scroll

$(function() {
    $(window).load(function() { // On load
        $('.chata-left-inner').css({
            'height': (($(window).height()) - 240) + 'px'
        });
    });
    $(window).resize(function() { // On resize
        $('.chata-left-inner').css({
            'height': (($(window).height()) - 240) + 'px'
        });
    });
});


$(".open-panel").click(function() {
    $(".chata-left-aside").toggleClass("open-pnl");
    $(".open-panel i").toggleClass("ti-angle-left");
});

