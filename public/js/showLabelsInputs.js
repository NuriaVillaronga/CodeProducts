document.addEventListener("DOMContentLoaded", function (event) {
    var body = document.querySelector('body');
    var inputs = document.querySelectorAll('.form-control');
    //var form = document.querySelector('form');
    var labels = document.querySelectorAll(".form-label");

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value === "") {
            labels[i].style.visibility = 'hidden';
        }
        else {
            labels[i].style.visibility = 'visible';
        }
    }

    body.addEventListener('keyup',
        () => {
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    labels[i].style.visibility = 'hidden';
                }
                else {
                    labels[i].style.visibility = 'visible';
                }
            }
        }
    );

    /*
    form.addEventListener('reset', () => {
        labels.forEach((label) => {
            label.setAttribute("style", "visibility: hidden;");
        });
    });
    */
});