$(document).ready(function(){
    $("#icon-menu-responsive").click(function(){
        $("#site").toggleClass("open-respon-menu");
    });

    // Khi xoay ngang màn hình thì sẽ ẩn đi respon-menu
    $(window).resize(function(){
        // Nếu màn hình có độ rộng quá lớn khi xoay ngang sẽ ẩn đi
        if((window).width() >= 768){
            $("#site").removeClass("open-respon-menu");
        }
    });
});