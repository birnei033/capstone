

jQuery(document).ready(function ($) {
    var url = location.href;
    // console.log(url);
    
    $('nav ul.pcoded-item li  a').each(function (index, element) {
        // console.log(url.replace(/\/|#.*$/g,""));
        if ( this.href.replace(/\/|#.*$|/g,"") == url.replace(/\/|#.*$/g,"")) {
            $(this).parent().addClass('active');
            if ($(this).parent().parent().parent().hasClass('pcoded-hasmenu')) {
                $(this).parent().parent().parent().addClass('active pcoded-trigger');
            }
        }
    });
});
