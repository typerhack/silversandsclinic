// custom-script.js
let j = $.noConflict(true);

// This custom code adds a class to header based on the url
// It makes sure that the last "/" is being removed in other to find a match
// after findeing a match adds a class called "nav_active" to the match
j(document).ready(function() {
    // Use j instead of $ here
    console.log("Jquery is working!");
    let currentUrl = window.location.href;
    currentUrl = currentUrl.endsWith('/') ? currentUrl.slice(0, -1) : currentUrl;
    j('.header_navigation a').each(function() {
        let linkUrl = j(this).attr('href');
        if (currentUrl === linkUrl) {
            j(this).addClass('nav_active');
        }
    })
});

// This part is for animating mega menu
j(document).ready(function() {
    var megaMenu = j('.header_navigation_mega_menu');
    var timer;

    // Function to show the mega menu
    function showMegaMenu() {
        clearTimeout(timer);
        megaMenu.css('display', 'flex').hide().stop(true, true).fadeIn(300);
        megaMenu.stop(true, true).fadeIn(300);
    }

    // Function to hide the mega menu
    function startHideMegaMenu() {
        // Only start the timer to hide the mega menu if it's not already set
        if (!timer) {
            timer = setTimeout(function() {
                megaMenu.stop(true, true).fadeOut(300);
            }, 300); // Delay of 300ms
        }
    }

    // Function to cancel hiding the mega menu
    function cancelHideMegaMenu() {
        clearTimeout(timer);
        timer = null;
        showMegaMenu();
    }

    // Mouse enter event for the navigation container
    j('.header_navigation_container').mouseenter(cancelHideMegaMenu);

    // Mouse leave event for the navigation container
    j('.header_navigation_container').mouseleave(startHideMegaMenu);

    // Mouse enter event for the mega menu itself to cancel hiding
    megaMenu.mouseenter(cancelHideMegaMenu);

    // Mouse leave event for the mega menu itself to start hiding
    megaMenu.mouseleave(startHideMegaMenu);
});

