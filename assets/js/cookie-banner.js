(function ($) {

    function bonesCookieBannerCreateCookie(name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
    }

    $(function () {
        $('#bones-cookie-banner-button').on('click', function () {
            bonesCookieBannerCreateCookie("cookie-banner-hide-banner", 1, 30);
            $('#bones-cookie-banner').fadeOut();
        });
    });

})(jQuery);