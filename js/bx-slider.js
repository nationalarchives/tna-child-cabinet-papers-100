jQuery(document).ready(function($) {
    var dslider=  $('.bxslider').bxSlider({
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 200,
        slideMargin: 10,
        pager: false,
        responsive:true,
        preloadImages:'visible',
        controls:true,
        infiniteLoop:false,
        hideControlOnEnd:false,
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '<i class="fa fa-chevron-right fa-4x"></i>',
        prevText: '<i class="fa fa-chevron-left fa-4x"></i>'
    });

});