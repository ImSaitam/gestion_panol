document.addEventListener("DOMContentLoaded", function() {
    var lazyImages = document.querySelectorAll('.imagen');

    var lazyLoad = function() {
        lazyImages.forEach(function(img) {
            if (img.getBoundingClientRect().top < window.innerHeight && !img.classList.contains('loaded')) {
                img.style.backgroundImage = 'url(' + img.getAttribute('data-src') + ')';
                img.classList.add('loaded');
            }
        });
    };

    window.addEventListener('scroll', lazyLoad);
    window.addEventListener('resize', lazyLoad);
    lazyLoad();
});
