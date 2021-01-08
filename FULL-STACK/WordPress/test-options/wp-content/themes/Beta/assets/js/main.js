(function($){"use strict";$('.backtotop').on('click',function(){$('html, body').animate({scrollTop:0},800);return false;});$(window).on('scroll',function(){if($(this).scrollTop()>100){$('.backtotop').fadeIn(1000,function(){$('span',this).fadeIn(100);});}else{$('.backtotop').fadeOut(1000,function(){$('span',this).fadeOut(100);});}});$('.mobile-menu .menu-item-has-children, .vertical-mega-mobile-menu .menu-item-has-children').prepend('<i class="fa fa-angle-down"></i>');$('.mobile-menu .menu-item-has-children > i, .vertical-mega-mobile-menu .menu-item-has-children > i').click(function(event){$(this).parent().toggleClass('active');});$('#menu-toggle, .mobile-menu-container .close-menu').click(function(event){$('.site').toggleClass('mobile-menu-active');});$('#mega-menu-toggle, .vertical-mega-mobile-menu .close-menu').click(function(event){$('.site').toggleClass('vertical-mega-mobile-menu-active');});$('.site .overlay').click(function(event){$('.site').removeClass('vertical-mega-mobile-menu-active');});$('.site .overlay').click(function(event){$('.site').removeClass('mobile-menu-active');});var MenuChildren=$('.sidebar .menu-item-has-children');MenuChildren.children('a').after('<div class="touch"><i class="fa fa-angle-down"></i></div>');MenuChildren.on('click','.touch',function(e){e.stopPropagation();$(this).parent('.menu-item').toggleClass('active');});jQuery(document).on('click','.qty-plus',function(e){e.preventDefault();var quantityInput=jQuery(this).parents('.quantity').find('input.qty'),newValue=parseInt(quantityInput.val(),10)+1,maxValue=quantityInput.data('max')?parseInt(quantityInput.data('min'),10):9999999999;if(newValue<=maxValue){quantityInput.val(newValue);quantityInput.change();}});jQuery(document).on('click','.qty-minus',function(e){e.preventDefault();var quantityInput=jQuery(this).parents('.quantity').find('input.qty'),newValue=parseInt(quantityInput.val(),10)-1,minValue=quantityInput.data('min')?parseInt(quantityInput.data('min'),10):1;if(newValue>=minValue){quantityInput.val(newValue);quantityInput.change();}});if(rt_main.tooltip_on_off){$('.site-main').tooltip({track:true,items:'[data-tooltip]',content:function(){var tooltip_json=$(this).data('tooltip');var title=$(this).parent('.product_item').find('.rt_woocommerce-loop-product__title a').text();var price=$(this).parent('.product_item').find('.price').html();var html='';if(rt_main.tooltip_image){html+='<div class="tooltip_image"><img src="'+tooltip_json.image+'" alt=""></div>';}if(rt_main.tooltip_title){html+='<div class="tooltip_title">'+title+'</div>';}if(rt_main.tooltip_price){html+='<div class="tooltip_price">'+price+'</div>';}return html;}});}
	$(".xzoom").xzoom({tint:'#333',Xoffset:15});

    jQuery('.rt-woocommerce-product-gallery-figure .xzoom-thumbs').slick({
        infinite: false,
        speed: 300,
        slidesToShow:4,
        slidesToScroll: 1,

        autoplay:true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1
            }
          }

        ]
      });

  jQuery("document").ready(function($){
    
    var nav = $('.main-navigation');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 115) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
 
});

})(jQuery);