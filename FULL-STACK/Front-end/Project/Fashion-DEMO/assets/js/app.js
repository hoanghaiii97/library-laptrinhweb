$(document).ready(function() {
    $('.responsive').slick({
        dots: true,
        infinite: false,
        nav: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
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
})


// Toggle Menu 

$(document).ready(function() {
  $(".header__navbar--icon i").click(function() {
      var toggle__menu = document.querySelector(".nav__mobile");
      toggle__menu.classList.toggle("active");
  })
})

// function toggleMenu() {
  
//   var toggle__menu = document.querySelector(".nav__mobile");
//   toggle__menu.classList.toggle("active");

// }