// (function($) { "use strict";

// $(function() {
//     var header = $(".start-style");
//     $(window).scroll(function() {
//         var scroll = $(window).scrollTop();

//         if (scroll >= 10) {
//             header.removeClass('start-style').addClass("scroll-on");
//         } else {
//             header.removeClass("scroll-on").addClass('start-style');
//         }
//     });
// });



// $('body').on('mouseenter mouseleave','.nav-item',function(e){
//         if ($(window).width() > 750) {
//             var _d=$(e.target).closest('.nav-item');_d.addClass('show');
//             // $(this).closest('.nav-link').attr("aria-expanded","true");
//             var d2=$(e.target).next('.dropdown-menu');

//             setTimeout(function(){
//             _d[_d.is(':hover')?'addClass':'removeClass']('show');

//             },1);
//             if(_d.is(':hover')){
//                 d2.addClass('show');
//             }
//             else{
//                 d2.removeClass('show');
//             }

//             // setTimeout2(function(){
//             // $(this).closest('.dropdown-menu').removeClass('show');
//             // },1);
//         }
// });


$(document).ready(function () {
    $(document).on('click', '.dropdown-menu', function (e) {
        e.stopPropagation();
    });

    if ($(window).width() < 992) {
        $('li .nav-link ').click(function () {
            if($(this).closest("li").children("ul").children("li").children("ul").length) {
                $(this).closest("li").children("ul").children("li").children("ul").css("display", "none");
            }
        });

        $('.dropdown-menu a').click(function (e) {
            e.preventDefault();
            if ($(this).next('.submenu').length) {
                $(this).next('.submenu').toggle();

            }

            $('.dropdown').on('hide.bs.dropdown', function () {
                $(this).find('.submenu').hide();
            })
        });
    } else {
        $(".dropdown-menu").css('margin-top', 0);
        $(".dropdown")
            .mouseover(function () {
                $(this).addClass('show').attr('aria-expanded', "true");
                $(this).find('.dropdown-menu').addClass('show');
            })
            .mouseout(function () {
                $(this).removeClass('show').attr('aria-expanded', "false");
                $(this).find('.dropdown-menu').removeClass('show');
            });

    }

});
