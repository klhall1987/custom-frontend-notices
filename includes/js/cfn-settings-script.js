jQuery(document).ready(function ($){

    $("#cfn-body p").css("margin", "0");

    var height = $("#cfn-body").outerHeight();

    /*
     * The site-footer and widget-area values may need to be changed based on the theme you are using.
     */
    $(".site-footer").css("padding-bottom", height + "px");
    $(".widget-area").css("padding-bottom", height + "px");

});
