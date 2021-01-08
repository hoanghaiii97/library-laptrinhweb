$(document).ready(function(){
    $("#icon-menu-responsive").click(function(){
        $("#respon-menu").slideToggle();
    });

    // Khi xoay ngang màn hình thì sẽ ẩn đi respon-menu
    $(window).resize(function(){
        // Nếu màn hình có độ rộng >=768px thì respon-menu phải ẩn đi
        if((window).width() >= 768){
            $("#respon-menu").css("display", "none");
        }
    });
});