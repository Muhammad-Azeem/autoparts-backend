 document.addEventListener("DOMContentLoaded", function() {
    var lazyloadImages = document.querySelectorAll("img.lazy");
    var lazyloadThrottleTimeout;

    function lazyload () {
    if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
    }

        lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
        if(img.offsetTop < (window.innerHeight + scrollTop)) {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
        }
        });
        if(lazyloadImages.length == 0) {
        document.removeEventListener("scroll", lazyload);
        window.removeEventListener("resize", lazyload);
        window.removeEventListener("orientationChange", lazyload);
    }
    }, 20);
    }
    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
});

 setTimeout(function(){
     $('#cover').fadeOut();
 },500);

 $(".alert-auth").click(function (){
     event.preventDefault();
     $.notify("Login First to Checkout","danger");
     return false;
 });

 $('#redirectToCategory').on('change', function (){
     if (this.value == "All Category"){
        window.location.href = '/';
     }
     else {
         window.location.href = this.value;
     }
    });

 $("#sortby").change(function () {
     var sort = $("#sortby").val();
     window.location = window.location.href.split('?')[0]+"?sort="+sort;
 });
