// CÁCH 1:
// $(document).ready(function () {
//     $('.next').click(function () {
//         const imgSelectVisible = $('img.slide-item:visible');
//         let imgVisible = parseInt(imgSelectVisible.attr('number'));
//         let eqNumber = imgVisible + 1;

//         $('img.slide-item').eq(eqNumber).fadeIn();

//         imgSelectVisible.fadeOut();
//         return false;
//     });

//     $('.prev').click(function () {
//         const imgSelectVisible = $('img.slide-item:visible');
//         let imgVisible = parseInt(imgSelectVisible.attr('number'));
//         let eqNumber = imgVisible - 1;

//         $('img.slide-item').eq(eqNumber).fadeIn();

//         imgSelectVisible.fadeOut();
//         return false;
//     });

// });


