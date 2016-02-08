jQuery(document).ready(function ($){
    $("#cfn-body p").css("margin", "0");

    var height = $("#cfn-body").outerHeight();

    $(".site-footer").css("padding-bottom", height + "px");
    $(".widget-area").css("padding-bottom", height + "px");

});
