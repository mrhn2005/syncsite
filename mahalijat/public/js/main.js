(function ($) {
 "use strict";

    /*----------------------------
    jQuery MeanMenu
    ------------------------------ */
        $('nav#dropdown').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu",
    });	
    
    
    // tooltip
     $('.ratings a').tooltip();
    $('[data-toggle="tooltip"]').tooltip();
    
    /*----------------------------
    wow js active
    ------------------------------ */
        new WOW().init();

    /*------------------------------------
    nivoSlider active
    ------------------------------------- */  
    $('#topSlider').nivoSlider({
        effect: 'random',
        slices: 15,
        boxCols: 12,
        boxRows: 4,
        animSpeed: 600,
        pauseTime: 500000,
        startSlide: 0,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false,
        prevText: '',
        nextText: '',
    });
    /*--------------------------
    collapse
    ---------------------------- */	
    $('.panel-heading a').on('click', function(){
        $('.panel-heading a').removeClass('active');
        $(this).addClass('active');
    });
    /*---------------------
    countdown
    --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });
    
    /*------------------------------------
    single-carousel
    ------------------------------------- */  
    $(".single-carousel").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });

    /*------------------------------------
    single-carousel
    ------------------------------------- */  
        $(".single-carousel7").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,1],
        itemsMobile : [479,1],
    });
    /*------------------------------------
    single-carousel
    ------------------------------------- */  
        $(".single-carousel8").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,1],
        itemsMobile : [479,1],
    });
    /*------------------------------------
    single-carousel
    ------------------------------------- */  
        $(".single-carousel9").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,1],
        itemsMobile : [479,1],
    });
    /*------------------------------------
    single-carousel
    ------------------------------------- */  
        $(".single-carousel21").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 2,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
    
    /*------------------------------------
    single-carousel
    ------------------------------------- */  
        $(".single-carousel33").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        navigation:true,	  
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
    
    $(".single-carousel55").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        navigation:false,	  
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });

    /*------------------------------------
    special-products-carousel
    ------------------------------------- */  
        $(".special-products-carousel").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:true,
        navigationText: ["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"],  
        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,3],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
    /*------------------------------------
    top-sales-products-carousel
    ------------------------------------- */  
        $(".top-sales-products-carousel").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 5
    });
    /*------------------------------------
    brand-carousel
    ------------------------------------- */  
        $(".brans-carousel").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 6,
        itemsDesktop : [1199,6],
        itemsDesktopSmall : [980,6],
        itemsTablet: [768,3],
        itemsMobile : [479,2],
    });
    /*------------------------------------
    blogpost
    ------------------------------------- */  
        $(".blogpost-carousel").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:false,
        navigation:false,	  
        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,2],
        itemsMobile : [479,1],
    });
    /*------------------------------------
    testimonial
    ------------------------------------- */  
        $(".testimonial-inner").owlCarousel({
        autoPlay: false, 
        slideSpeed:2000,
        pagination:true,
        paginationText: ["<span><i class='fa fa-angle-left'></i></span>","<span><i class='fa fa-angle-right'></i></span>"], 
        navigation:false,	  
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,1],
        itemsMobile : [479,1],
    });
    /*----------------------------
     price-slider active
    ------------------------------ */  
    $( "#slider-range" ).slider({
        range: true,
        min: 40,
        max: 600,
        values: [ 60, 570 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );  

    /*--------------------------
    scrollUp
    ---------------------------- */	
    $.scrollUp({
        scrollText: '.',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    /*--
    // Pro Slider for Pro Details
    // ------------------------*/
        $(".pro-img-tab-slider").owlCarousel({
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [768,4],
        itemsTablet: [767,3],
        itemsMobile : [479,2],
        slideSpeed : 1500,
        paginationSpeed : 1500,
        rewindSpeed : 1500,
        navigation : true,
        navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        pagination : false,
        addClassActive: true,
    });
    
    /*--
    Simple Lens and Lightbox
    ------------------------*/
    $('.simpleLens-lens-image').simpleLens({
        loading_image: 'img/loading.gif'
    });    
    
  
 
})(jQuery); 