$(document).ready(function () {
    $(".grid-container-profie-update").hide();
    $("#pu-btn").hover(function () {
        $(this).css("background-color", "rgb(36, 59, 128)");
    }, function () {
        $(this).css("background-color", "royalblue");
    });
    $("#pu-btn").click(function () {
        $(".grid-container-profie").hide();
        $(".grid-container-profie-update").show();
    });

    $("#cancel-u-btn").click(function () {
        $(".grid-container-profie-update").hide();
        $(".grid-container-profie").show();
    });




});
//cancel-u-btn
//fadeIn("slow");