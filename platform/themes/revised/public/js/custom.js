$( document ).ready(function() {
    $('.carousel').flickity({
        groupCells: 1,
        wrapAround: true,
        autoPlay: true
    });
    
    $('.btn_scrollup').bind('click',function () {
        $("html, body").animate({scrollTop: 0}, 1000);
    })
});