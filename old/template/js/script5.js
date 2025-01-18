$(document).ready(function(){

    // NAVBAR 
    $('.toggle').click(function(){        
        $('.itens').toggleClass('mobile');
        $(this).toggleClass('active');
    });


    // NAVBAR CLICK 
    $('header ul li a').on('click', function() {
       $('.itens').toggleClass('mobile');
       $('.toggle').toggleClass('active'); 
    });  


    // NAVBAR CHANGE COLOR DROP ON HOVER 
    // $('header ul li .color').on('mouseover', function() {
    //    $(this).addClass('blue');
    //    $('header ul .drop .link').addClass('white'); 
    // });  

    // $('header ul li .color').on('mouseleave', function() {
    //    $(this).removeClass('blue');
    //    $('header ul .drop .link').removeClass('white'); 
    // });  


    // HEADER CHANGE COLOR SCROLL 
    // $(function() {
    //     $(window).scroll(function(event) {
    //         var scroll = $(window).scrollTop();

    //         if (scroll > 30) {                 
    //             $('header').addClass('scroll');                  
    //         } else {
    //             $('header').removeClass('scroll');                        
    //         }
    //     });
    // });
    


    // NAVBAR DROP 
    $('.drop').on('click', function() {
        $(this).find('.dropdown').toggleClass('show');        
    }); 


    $('.drop-two').on('click', function() {
        $('header .navbar ul').toggleClass('scroll');
    }); 



    // POPUP FORMS CLOSE
    $('.popup-form-close').on('click', function() {
        $('.popup-form').css('display', 'none');        
    });  


    // FAQS ITENS SHOW/HIDE ANSWER
    $(".faq-question").on('click', function(e) {
        e.preventDefault();

        var faqanswer = $(this).next('.faq-answer');
        var faqclosed = $(this).find('.faq-closed');
        var faqopen = $(this).find('.faq-open');   
        var faqbackground = $(this); 
        var faqname = $(this).find('h2');    
                  
        if (faqanswer.is(":visible")) {
            faqanswer.hide()
        }  
        
        else {
            faqanswer.show();
        }

        if (faqclosed.is(":visible")) {
            faqclosed.hide()
        }  
        
        else {
            faqclosed.show();
        }

        if (faqopen.is(":visible")) {
            faqopen.hide()
        }  
        
        else {
            faqopen.show();
        }

        if (faqbackground.hasClass("active")) {
            faqbackground.removeClass('active')
        }  
        
        else {
            faqbackground.addClass('active');
        }

        if (faqname.hasClass("active")) {
            faqname.removeClass('active')
        }  
        
        else {
            faqname.addClass('active');
        }

    }); 
 

    // HOME SLIDER BANNER
    $('#home .slider-banner').slick({
        infinite: true,
        dots: true, 
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        speed: 5000,
        fade: true,
        cssEase: 'linear',
        adaptiveHeight: true,
        adaptiveWidth: true,  
        pauseOnHover: false,
        prevArrow:'<div class="arrow"><span class="prev"><img src="images/anterior-branco.png" alt="Ícone de anterior"></span></div>',
        nextArrow:'<div class="arrow"><span class="arrow next"><img src="images/seguinte-branco.png" alt="Ícone de seguinte"></span></div>',
    });   


    // SLIDER THREE
    $('.slider-three').slick({
        infinite: true,
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        adaptiveHeight: true,
        adaptiveWidth: true,
        pauseOnHover: false,
        prevArrow:'<div class="arrow"><span class="prev"><img src="images/anterior-azul.png" alt="Ícone de anterior"></span></div>',
        nextArrow:'<div class="arrow"><span class="arrow next"><img src="images/seguinte-azul.png" alt="Ícone de seguinte"></span></div>',
        responsive: [            
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 699,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });  


    // SLIDER FOUR
    $('.slider-four').slick({
        infinite: true,
        dots: false,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        adaptiveHeight: true,
        adaptiveWidth: true,
        pauseOnHover: false,
        prevArrow:'<div class="arrow"><span class="prev"><img src="images/anterior-azul.png" alt="Ícone de anterior"></span></div>',
        nextArrow:'<div class="arrow"><span class="arrow next"><img src="images/seguinte-azul.png" alt="Ícone de seguinte"></span></div>',
        responsive: [   
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },         
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 699,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    // O QUE FAZEMOS
    $('.slider-activities').slick({
        infinite: true,
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        adaptiveHeight: true,
        adaptiveWidth: true,
        pauseOnHover: false,
        prevArrow:'<div class="arrow"><span class="prev"><img src="images/anterior-azul.png" alt="Ícone de anterior"></span></div>',
        nextArrow:'<div class="arrow"><span class="arrow next"><img src="images/seguinte-azul.png" alt="Ícone de seguinte"></span></div>',       
    });
  
    
});    