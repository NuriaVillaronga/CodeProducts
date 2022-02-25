document.addEventListener("DOMContentLoaded", function (event) {
    var shadowMenu = document.getElementById('menuItems');
    var menuIconContainer = document.querySelector('.hamburguerIcon');
 
    menuIconContainer.addEventListener('click', () => {
        shadowMenu.setAttribute("class", "collapse navbar-collapse shadow-lg");
    });

    window.addEventListener('resize', () => {
        document.getElementById('menuItems').setAttribute("class", "collapse navbar-collapse");
    });
});