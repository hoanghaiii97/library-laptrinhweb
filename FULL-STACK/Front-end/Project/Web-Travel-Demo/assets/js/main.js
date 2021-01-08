$(document).ready(function(){
    $(".img-list-number").click(function(){
        $(".header-list-number").slideToggle();
    });
});


    // Back-top-top
$(document).ready(function () {
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 600);
        return false;
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() <= 200) {
            $('.back-to-top').stop(false, true).fadeOut(600);
        } else {
            $('.back-to-top').stop(false, true).fadeIn(600);
        }
    });
});

    // Menu-responsive
$(document).ready(function(){
    $("#icon-menu-responsive").click(function(){
        $("#site").toggleClass("open-respon-menu");
        $("#icon-menu-responsive").toggleClass("fa-bars fa-times");
    });

    $(window).resize(function(){
        if((window).width() >= 768){
            $("#site").removeClass("open-respon-menu");
            $("#icon-menu-responsive").removeClass("fa-times").addClass("fa-bars");
        }
    });

});