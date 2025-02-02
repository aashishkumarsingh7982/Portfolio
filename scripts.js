// Smooth scrolling for navigation links
$(document).ready(function(){
    $('a[href*="#"]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
        }, 800);
    });

    // Scroll animation
    $(window).on('scroll', function() {
        $('.about, .skills, .projects, .testimonials, .contact').each(function() {
            if ($(window).scrollTop() > $(this).offset().top - $(window).height() / 1.2) {
                $(this).addClass('animate');
            }
        });
    });
});
