document.addEventListener('click', function(e) {
    if (e.target.id === 'toggleMenu') {
        toggleMenu();
    }
    if (e.target.id === 'toggleShopByPart') {
        toggleShopType(e.target);
    }
});


/*
=========================
TOGGLE SITE MENU
=========================
*/
function toggleMenu() {
    // REMOVE THE OPEN CLASS AND BAIL
    if (document.body.classList.contains('header-menu-open')) {
        document.body.classList.remove('header-menu-open');
        return;
    }
    // ADD CLASS TO DISPLAY MENUS
    document.body.classList.add('header-menu-open');

    // DYNAMICALLY ASSIGN TOP VALUE FOR MENU
    var siteHeader = document.querySelector('.site-header-container');
    var menuContainer = document.querySelector('.site-navigation--header');
    menuContainer.style.top = siteHeader.offsetHeight + 'px';

    if (!document.body.classList.contains('header-menu-fixed')) {
        var eyebrowContainer = document.querySelector('.eyebrow');
        menuContainer.style.top = siteHeader.offsetHeight + eyebrowContainer.offsetHeight + 'px';
    }
}



/*
=========================
TOGGLE SHOPPING TYPE
=========================
*/
function toggleShopType(elem) {
    if (elem.classList.contains('active')) {
        elem.classList.remove('active');
        elem.nextElementSibling.classList.remove('active');
        return;
    }
    elem.classList.add('active');
    elem.nextElementSibling.classList.add('active');
}



/*
=========================
STICKY HEADER
=========================
*/
var eyebrowWrapper = document.querySelector('.eyebrow');
var eyebrowHeight = eyebrowWrapper.offsetHeight;
var headerWrapper = document.querySelector('.site-header-container');
var headerHeight = headerWrapper.offsetHeight;

window.addEventListener('scroll', function() {
    stickyHeader();
});

function stickyHeader() {
    if (window.scrollY > eyebrowHeight) {
        document.body.classList.add('header-menu-fixed');
        document.body.style.paddingTop = headerHeight + 'px';
    } else {
        document.body.classList.remove('header-menu-fixed');
        document.body.style.paddingTop = 0;
    }
}  