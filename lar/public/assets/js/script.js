/* Slider About us */
var owl = $("#slider_about_us");
owl.owlCarousel({itemsCustom: [[0, 1],], autoPlay: true,});

/* Product Tab */
$('.tab-item').on('click', function () {
    if ($(this).attr('data-id') != 0) {
        var id_load = $(this).attr('href');
        var loaded = 0;
        loaded = $(id_load).attr('loaded');
        if (loaded != 1) {
            var data = {
                cat_id: $(this).attr('data-id'),
            };
            $(id_load).attr('loaded', 1);
            var url = '/api/getProductByCategory/' + data.cat_id;
            nh_functions.loadContentBlockAjax(url, data, id_load);
        }
    }
});

/* Click first loading*/
$(document).ready(function () {
    var firstTab = $('.tab-item').first();
    firstTab.click();
});
/* Partner Slide*/
$("#Box_brand").owlCarousel({
    itemsCustom: [[0, 2], [767, 3], [992, 4],],
    navigation: true,
    autoPlay: true,
});

