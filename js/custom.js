// Home Page Slider
//$('.home-slider').slick();
$(document).ready(function(){
    // Home Slider
    $('.home-slider').slick({
      arrows: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true
    });
   
    // Testimonial Slider
    $('.testimonial-slider').slick({
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true
    });
    
    // Service Image Slider
    $('.service-img-slider').slick({
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true
    });
    // Image Slider
    $('.image-slider').slick({
      arrows: true,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true
    });
    
    // Website Slider
    $('.websites-slider').slick({
      arrows: true,
      slidesToShow: 7,
      slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 1280,
          settings: {
            slidesToShow: 6,
          }
        },    
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 5,
          }
        },    
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 414,
          settings: {
            slidesToShow:2,
          }
        },
      ]        
    });
    // Sub Menu Toggler
    
    $('.btn-menuToggler').click(function(){
        $(this).toggleClass('active');
        $('.menu').slideToggle();
    });
    $('.sub-menu-toggler').click(function(){
        $(this).parent().toggleClass('active');
        $(this).next('.mega-menu').slideToggle();
    });
    
    /*$(".project-funding").hide();
    $(".fine-instruments").hide();
    
    $(".bootstrap-select .dropdown-menu ul li").click(function(){
        
        if($("a#bs-select-3-2").parent().hasClass("selected")){
            $(".project-funding").show();
       }
        
    });*/
    /*$(".imageOne").hover(function () {
        $(".column-bg-image").toggleClass("imageOneBg"); // CHANGE IMAGE PROPERTY HERE
    });
    $(".imageTwo").hover(function () {
        $(".column-bg-image").toggleClass("imageTwoBg"); // CHANGE IMAGE PROPERTY HERE
    });
    $(".imageThree").hover(function () {
        $(".column-bg-image").toggleClass("imageThreeBg"); // CHANGE IMAGE PROPERTY HERE
    });
    $(".imageFour").hover(function () {
        $(".column-bg-image").toggleClass("imageFourBg"); // CHANGE IMAGE PROPERTY HERE
    });
    $(".imageFive").hover(function () {
        $(".column-bg-image").toggleClass("imageFiveBg"); // CHANGE IMAGE PROPERTY HERE
    });
    $(".imageSix").hover(function () {
        $(".column-bg-image").toggleClass("imageSixBg"); // CHANGE IMAGE PROPERTY HERE
    });*/
    
    $(".six-columns li a").hover(function() {
        $this = $(this);
        $(".column-bg-image").css('background-color', function() {
            return $this.data('bgcolor');
        });
        $(".column-bg-image").css("background-image", "url(" + $(this).data("bg") + ")");
    });
});
		