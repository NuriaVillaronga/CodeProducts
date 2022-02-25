document.addEventListener("DOMContentLoaded", function(event) {
    var buttonsOnGrey = document.querySelectorAll('.changeOnGrey');
    var buttonOnBlue = document.querySelector('.changeOnBlue');
    var buttonOnRed = document.querySelector('.changeOnRed');
    var buttonsOnMenu = document.querySelectorAll('.changeOnMenu');

    buttonsOnGrey.forEach((button) => {
        button.addEventListener('mousedown',
            () => {
                button.setAttribute("style", "background-color: rgba(211, 207, 207, 0.644);");
            });
        button.addEventListener('mouseup',
            () => {
                button.setAttribute("style", "background-color:rgba(230, 227, 227, 0.644);");
            });
        button.addEventListener('mousemove',
            () => {
                button.setAttribute("style", "background-color:rgba(230, 227, 227, 0.644);");
            });
        button.addEventListener('mouseleave',
            () => {
                button.setAttribute("style", "background-color: white;");
            });
    });

    buttonsOnMenu.forEach((button) => { 
        button.addEventListener('mousedown',
            () => {
                button.setAttribute("style", "background-color: rgba(8, 78, 110, 0.445);");
            });
        button.addEventListener('mouseup',
            () => {
                button.setAttribute("style", "background-color: rgba(211, 207, 207, 0.377);");
            });
        button.addEventListener('mousemove',
            () => {
                button.setAttribute("style", "background-color: rgba(211, 207, 207, 0.377);");
            });
        button.addEventListener('mouseleave',
            () => {
                button.setAttribute("style", "background-color: rgb(76, 137, 165);");
            });
    });

    buttonOnBlue.addEventListener('mousedown',
        () => {
            buttonOnBlue.setAttribute("style", "background-color: rgb(37, 76, 94);");
        });
    buttonOnBlue.addEventListener('mouseup',
        () => {
            buttonOnBlue.setAttribute("style", "background-color: rgb(50, 102, 126);");
        });
    buttonOnBlue.addEventListener('mousemove',
        () => {
            buttonOnBlue.setAttribute("style", "background-color: rgb(50, 102, 126);");
        });
    buttonOnBlue.addEventListener('mouseleave',
        () => {
            buttonOnBlue.setAttribute("style", "background-color: rgb(76, 137, 165);");
        });

    buttonOnRed.addEventListener('mousedown',
        () => {
            buttonOnRed.setAttribute("style", "background-color: rgb(148, 40, 40);");
        });
    buttonOnRed.addEventListener('mouseup',
        () => {
            buttonOnRed.setAttribute("style", "background-color: rgb(197, 58, 58);");
        });
    buttonOnRed.addEventListener('mousemove',
        () => {
            buttonOnRed.setAttribute("style", "background-color: rgb(197, 58, 58);");
        });
    buttonOnRed.addEventListener('mouseleave',
        () => {
            buttonOnRed.setAttribute("style", "background-color: rgb(255, 71, 71)");
        });
});
