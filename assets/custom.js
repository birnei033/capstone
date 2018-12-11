jQuery(document).ready(function ($) {
    var url = window.location.href;
    $('nav ul.pcoded-item li  a').each(function (index, element) {
        if (this.href == url) {
            $(this).parent().addClass('active');
            if ($(this).parent().parent().parent().hasClass('pcoded-hasmenu')) {
                $(this).parent().parent().parent().addClass('active pcoded-trigger');
            }
        }
    });
});