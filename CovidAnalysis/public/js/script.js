var MAIN = {};
MAIN.DESIGN = {};

$(document).ready(function(){
    MAIN.DESIGN.headerScrolls();
    MAIN.DESIGN.goBackNow();
});


MAIN.DESIGN.headerScrolls = function(){

    $(window).scroll(function() {
        let scroll = $(window).scrollTop();
        if (scroll > 0) {
            $('.site-header').css('background-color', '#fff');
            $('.site-header').addClass('scroll')
        }else{
            $('.site-header').css('background-color', 'transparent');
            $('.site-header').removeClass('scroll')
        }

    });

    let scroll = $(window).scrollTop();
    if (scroll > 0) {
        $('.site-header').css('background-color', '#fff');
        $('.site-header').addClass('scroll')
    }else{
        $('.site-header').css('background-color', 'transparent');
        $('.site-header').removeClass('scroll')
    }

};

MAIN.DESIGN.goBackNow = function (){
    $('.go-back').on('click', function(){
        window.history.back()
    })
};
