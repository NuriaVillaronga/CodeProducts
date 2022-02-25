document.addEventListener("DOMContentLoaded", function (event) {
    var selectPages = document.querySelector('.selectPages');
    var formSelectPage = document.querySelector('.formSelectPage');

    selectPages.addEventListener('change', (event) => {
        formSelectPage.submit();
    });
});