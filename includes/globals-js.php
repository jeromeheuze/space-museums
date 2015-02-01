$("a.mapIt").colorbox({iframe:true,width:"70%",height:"70%"});
$("#state_id").selectbox();
$("#secondaryMenu").hide();
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#secondaryMenu').fadeIn();
        } else {
            $('#secondaryMenu').fadeOut();
        }
    });
});