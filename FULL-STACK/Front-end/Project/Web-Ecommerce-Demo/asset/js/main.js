// click icon header
$(document).ready(function() {
  $('.header__logo--icon').click(function() {
    $('.header__logo--minus').css({'display':'block'});
    // $('.header__logo--icon').css({'display':'none'});
  });
  $('.fa-minus').click(function(){
    $('.header__logo--minus').css({'display':'none'});
  });

});


// slick product slide
$(document).ready(function() {
  $('.responsive').slick({
    //   dots: true,
      infinite: false,
      nav: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [{
          breakpoint: 1024,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
          }
      }, {
          breakpoint: 600,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 2
          }
      }, {
          breakpoint: 480,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }]
  });
})


// carousel slide
$(document).ready(function() {
  $('.carousel').carousel({
      interval: 2000
  });
});



// products2
$(document).ready(function() {
  $('input.input-qty').each(function() {
      var $this = $(this),
          qty = $this.parent().find('.is-form'),
          min = Number($this.attr('min')),
          max = Number($this.attr('max'))
      if (min == 0) {
          var d = 0
      } else d = min
      $(qty).on('click', function() {
          if ($(this).hasClass('minus')) {
              if (d > min) d += -1
          } else if ($(this).hasClass('plus')) {
              var x = Number($this.val()) + 1
              if (x <= max) d += 1
          }
          $this.attr('value', d).val(d)
      })
  })
});


// cart
$(document).ready(function() {
  $('.cart__delete--1').click(function() {
      $('.cart__item--1').slideToggle();
  });
  $('.cart__delete--2').click(function() {
      $('.cart__item--2').slideToggle();
  });
});