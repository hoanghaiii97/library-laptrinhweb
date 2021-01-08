
$(document).ready(function () {
    // ============= Menu Responsive ============
    $("#icon-menu-responsive").click(function () {
        $("#respon-menu").slideToggle();
    });

    $(window).resize(function () {
        if ((window).width() >= 992) {
            $("#respon-menu").css("display", "none");
        }
    });

    $(".drop-down").click(function () {
        $("#respon-menu #list-item").slideToggle();
    });

    // ==============  Box chat ===========
    $(".inbox").click(function () {
        $(".inbox-us ").css("display", "block")
    });

    $(".title-inbox a").click(function () {
        $(".inbox-us").css("display", "none")
    });
    
});