$(document).ready(function(){
    $("#icon-menu-responsive").click(function(){
        $("#site").toggleClass("open-respon-menu");
    });

    $(window).resize(function(){
        if((window).width() >= 768){
            $("#site").removeClass("open-respon-menu");
        }
    });
});