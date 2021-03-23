(function ($) {
    $(window).on("load", function () {
        $(".chat-hist, .messages-line").mCustomScrollbar();
        axis:"yx";
        //$(".chat-hist, .messages-line").mCustomScrollbar('setTop', '2890');
    });
})(jQuery);
