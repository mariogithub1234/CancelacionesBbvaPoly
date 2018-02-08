$(document).ready(function () {



    $("form").validationEngine({
        //promptPosition: 'inline',
        autoHidePrompt: true
    });
    $("#signout").click(function () {
        $.ajax({
            url: $('#url').val()+"/index/logout/",
            data: {'logout': 'salir'},
            type: 'POST',
            dataType: 'json'
        }).done(function (res) {
            if (res === true) {
                $(location).attr('href', "/appmovil");
            }

        }).fail(function (res) {
        });
    });
});

var isAndroid = navigator.userAgent.match(/Android/i) !== null;
var isiOS = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)/i) !== null;
var isMobile = (isiOS || isAndroid);
if (isMobile) {

$(window).on("resize", function () {
    var height = $( window ).height();
    if(height < 400){
        $(".noshowthis").hide();
    }else{
        $(".noshowthis").show();
    }
    });
} else {

    
}



