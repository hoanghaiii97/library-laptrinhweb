$(document).ready(function(){
    // code ứng dụng
    //alert("Nội dung đc hiển thị bởi jquery");

    $("a#change_color").click(function(){
        $("h1").css('color', 'red');
        return false;
    });
});