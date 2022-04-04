document.addEventListener("DOMContentLoaded", function (event) {

    var buttonSubmit = document.getElementById('btn_save_BE');

    var titleWithoutPrefix = document.getElementById('basic_edition_form_titleWithoutPrefix');
    var titlePrefix = document.getElementById('basic_edition_form_titlePrefix');
    var title = document.getElementById('basic_edition_form_titleText');


    function disable_enable_TTW_TP(option1, option2, title) {
        if(option1.value != "" && option2.value == "" && title.value == "") {
            option2.disabled = false;  
            title.disabled = true;
        }
        
        if(option1.value == "" && option2.value != "" && title.value == "") {
            option2.disabled = false;
            title.disabled = true;
        }
    
        if(option1.value == "" && option2.value == "" && title.value == "") {
            option2.disabled = false;
            title.disabled = false;
        }
    
        if(option1.value == "" && option2.value == "" && title.value != "") {
            option2.disabled = true;
            title.disabled = false; 
        }
    }


    if(title.value == "" && (titlePrefix.value == "" || titleWithoutPrefix == "")) {
        titleWithoutPrefix.disabled = false;
        titlePrefix.disabled = false;
    }
    
    if(title.value != "" && (titlePrefix.value == "" || titleWithoutPrefix == "")) {
        titleWithoutPrefix.disabled = true;
        titlePrefix.disabled = true;
    }

    if(title.value == "" && (titlePrefix.value != "" || titleWithoutPrefix != "")) {
        title.disabled = true;
    }

    
    title.addEventListener('keyup', () => {
        
        title.setAttribute('value', title.value);
        
        if(title.value == "" && (titlePrefix.value == "" || titleWithoutPrefix == "")) {
            titleWithoutPrefix.disabled = false;
            titlePrefix.disabled = false;
        }
        
        if(title.value != "" && (titlePrefix.value == "" || titleWithoutPrefix == "")) {
            titleWithoutPrefix.disabled = true;
            titlePrefix.disabled = true;
        }

    });


    titleWithoutPrefix.addEventListener('keyup', () => {
        
        titleWithoutPrefix.setAttribute('value', titleWithoutPrefix.value);
        disable_enable_TTW_TP.call(this.disable_enable_TTW_TP, titleWithoutPrefix, titlePrefix, title);
    
    });
    

    titlePrefix.addEventListener('keyup', () => {
        
        titlePrefix.setAttribute('value', titlePrefix.value);
        disable_enable_TTW_TP.call(this.disable_enable_TTW_TP, titlePrefix, titleWithoutPrefix, title);
    
    });


    buttonSubmit.addEventListener('click', () => {

        function styling_TWP_TP(option1, option2, errorOption2, styleOption2, title, errorT, styleT) {
            if(option1.value != "" && option2.value == "" && title.value == "") {    
                errorOption2.style.display = "inline";
                errorT.style.display = "none";  
                styleOption2.setAttribute("style","border-color:red");
                styleT.setAttribute("style","border-color: rgb(185, 185, 185)");  
            }
            
            if(option1.value == "" && option2.value != "" && title.value == "") {
                errorOption2.style.display = "inline";
                errorT.style.display = "none";
                styleOption2.setAttribute("style","border-color:red");
                styleT.setAttribute("style","border-color: rgb(185, 185, 185)"); 
            }
        
            if(option1.value == "" && option2.value == "" && title.value == "") {
                errorOption2.style.display = "inline";
                errorT.style.display = "inline";
                styleOption2.setAttribute("style","border-color:red");
                styleT.setAttribute("style","border-color:red");
            }
        
            if(option1.value == "" && option2.value == "" && title.value != "") {
                errorOption2.style.display = "none";
                errorT.style.display = "inline";
                styleOption2.setAttribute("style","border-color: rgb(185, 185, 185)");
                styleT.setAttribute("style","border-color:red");
            }

            if(option1.value == "" && option2.value != "") {
                styleOption2.setAttribute("style","border-color: rgb(185, 185, 185)");
            }
        }
        
        if(titlePrefix.value == "" && title.value == "" && titleWithoutPrefix.value == "") {

            title.addEventListener('keyup', () => {

                var errorTWP = document.getElementById('basic_edition_form_titleWithoutPrefix-error');
                var errorTP = document.getElementById('basic_edition_form_titlePrefix-error');
                var styleTWP = document.getElementById('basic_edition_form_titleWithoutPrefix');
                var styleTP = document.getElementById('basic_edition_form_titlePrefix');
        
                title.setAttribute('value', title.value);
                
                if(title.value == "" && (titlePrefix.value == "" || titleWithoutPrefix == "")) {
                    errorTP.style.display = "inline";
                    errorTWP.style.display = "inline";
                    styleTWP.setAttribute("style","border-color:red");
                    styleTP.setAttribute("style","border-color:red");
                }
                
                if(title.value != "" && (titlePrefix.value == "" || titleWithoutPrefix == "")) {
                    errorTP.style.display = "none"; 
                    errorTWP.style.display = "none";
                    styleTWP.setAttribute("style","border-color: rgb(185, 185, 185)");
                    styleTP.setAttribute("style","border-color: rgb(185, 185, 185)");
                }
        
            });

            
            titlePrefix.addEventListener('keyup', () => {

                var errorT = document.getElementById('basic_edition_form_titleText-error');
                var errorTWP = document.getElementById('basic_edition_form_titleWithoutPrefix-error');
                var styleTWP = document.getElementById('basic_edition_form_titleWithoutPrefix');
                var styleT = document.getElementById('basic_edition_form_titleText');
        
                titlePrefix.setAttribute('value', titlePrefix.value);
                styling_TWP_TP.call(this.styling_TWP_TP, titlePrefix, titleWithoutPrefix, errorTWP, styleTWP, title, errorT, styleT);

            });
    
    
            titleWithoutPrefix.addEventListener('keyup', () => {

                var errorT = document.getElementById('basic_edition_form_titleText-error');
                var errorTP = document.getElementById('basic_edition_form_titlePrefix-error');
                var styleTP = document.getElementById('basic_edition_form_titlePrefix');
                var styleT = document.getElementById('basic_edition_form_titleText');
            
                titleWithoutPrefix.setAttribute('value', titleWithoutPrefix.value);
                styling_TWP_TP.call(this.styling_TWP_TP, titleWithoutPrefix, titlePrefix, errorTP, styleTP, title, errorT, styleT);

            });
        }

    });

});