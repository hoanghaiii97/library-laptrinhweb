$(document).ready(function () {
    // RESPONSIVE

    $("#icon-menu-responsive").click(function () {
        $("#respon-menu").slideToggle();
    });

    $(window).resize(function () {
        if ((window).width() >= 768) {
            $("#respon-menu").css("display", "none");
        }
    });

    
    // SLIDE

    // Hiển thị hình ảnh đầu tiên
    var src_img_first;
    src_img_first = $("ul#list-slide li:first-child img").attr("src");
    $("#show img").attr("src", src_img_first);

    // Tạo border cho h.a đầu tiên
    $("ul#list-slide li:first-child").addClass("active");

    var src_img_click;
    $("ul#list-slide li a").click(function () {
        // Lấy src từ hình ảnh được click
        src_img_click = $(this).children("img").attr("src");

        // Hiển thị h.a vừa đc click
        $("#show img").attr("src", src_img_click);
        $("#show img").width("100%");

        // Thêm border cho h.a vừa đc click
        $("ul#list-slide li").removeClass("active");
        $(this).parent("li").addClass("active");
        return false;
    });
});