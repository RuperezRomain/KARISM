$(document).ready(function () {
    /*****header*****/
    $(window).on('resize', function () {});
//    $(".sizeScreen").css("height", window.innerHeight - 100 + "px");

    $(document).ready(function () {
        $(".sizeScreen").css("height", window.innerHeight);
    });

//    Init SlickCarousel

    $('.your-class').slick({

        infinite: true,
        speed: 300,
        slidesToShow: 7,
        slidesToScroll: 2,
   
        

        responsive: [
            {
                breakpoint: 1050,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                    arrows : false

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                     arrows : false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                     arrows : false
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });
    
    
  
    /*******Video****/
    $(".vid").css({
      position:'relative',
      height : window.innerHeight,
      paddingTop :100,
      paddingBottom :100

    });





});

