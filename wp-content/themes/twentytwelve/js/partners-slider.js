( function( $ ) {
    $( document ).ready(function() {
    $('#main-slick').slick({
        dots: false,
        infinite: true,
        speed: 300,
           prevArrow: "<img class='a-left control-c prev slick-prev shape-left' src='http://olymp.local/wp-content/themes/twentytwelve/img/Shape-left.png'>",
           nextArrow: "<img class='a-right control-c next slick-next shape-right' src='http://olymp.local/wp-content/themes/twentytwelve/img/Shape-right.png'>",
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    });
} )( jQuery );



