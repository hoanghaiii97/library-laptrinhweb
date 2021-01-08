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