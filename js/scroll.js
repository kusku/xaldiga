// ===== Scroll to Top ==== 
$(window).scroll(function() {
    // If page is scrolled more than 50px
    if ($(this).scrollTop() >= 50) {
        // Fade in the arrow
        $('#return-to-top-button').fadeIn(200);
    } else {
        // fade out the arrow
        $('#return-to-top-button').fadeOut(200);
    }
});

function returnToTop() {
    // Scroll to top of body
    $('body,html').animate({
        scrollTop : 0
    }, 500);
}