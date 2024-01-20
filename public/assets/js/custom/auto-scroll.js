$(function () {
    let $scroll = $('.menu-inner');
    $('.menu-item').each(function () {
       if ($(this).hasClass('active')) {
          $scroll.scrollTop(($(this).position().top-100) + $scroll.scrollTop())
       }
    });
});
