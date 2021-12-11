$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.header-bottom').addClass('fix');
    } else {
        $('.header-bottom').removeClass('fix');
    }
});
