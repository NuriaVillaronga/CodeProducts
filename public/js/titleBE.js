document.addEventListener("DOMContentLoaded", function (event) {

    var buttonSubmit = document.getElementById('btn_save_BE');

    var titleWithoutPrefix = document.getElementById('basic_edition_form_titleWithoutPrefix');
    var titlePrefix = document.getElementById('basic_edition_form_titlePrefix');
    var title = document.getElementById('basic_edition_form_titleText');


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
        
        if(titleWithoutPrefix.value != "" && titlePrefix.value == "" && title.value == "") {
            titlePrefix.disabled = false; 
            title.disabled = true;
        }
        
        if(titleWithoutPrefix.value == "" && titlePrefix.value != "" && title.value == "") {
            titlePrefix.disabled = false;
            title.disabled = true;
        }
    
        if(titleWithoutPrefix.value == "" && titlePrefix.value == "" && title.value == "") {
            titlePrefix.disabled = false;
            title.disabled = false;
        }
    
        if(titleWithoutPrefix.value == "" && titlePrefix.value == "" && title.value != "") {
            titlePrefix.disabled = true;
            title.disabled = false; 
        }
    
    });
    

    titlePrefix.addEventListener('keyup', () => {
        
        titlePrefix.setAttribute('value', titlePrefix.value);
        
        if(titlePrefix.value != "" && titleWithoutPrefix.value == "" && title.value == "") {  
            titleWithoutPrefix.disabled = false;  
            title.disabled = true; 
        }
        
        if(titlePrefix.value == "" && titleWithoutPrefix.value != "" && title.value == "") {
            titleWithoutPrefix.disabled = false;
            title.disabled = true;
        }
    
        if(titlePrefix.value == "" && titleWithoutPrefix.value == "" && title.value == "") {
            titleWithoutPrefix.disabled = false;
            title.disabled = false;
        }
    
        if(titlePrefix.value == "" && titleWithoutPrefix.value == "" && title.value != "") {
            titleWithoutPrefix.disabled = true;
            title.disabled = false;
        }
    
    });


    buttonSubmit.addEventListener('click', () => {
        
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
                
                if(titlePrefix.value != "" && titleWithoutPrefix.value == "" && title.value == "") {  
                    errorTWP.style.display = "inline";
                    errorT.style.display = "none";  
                    styleTWP.setAttribute("style","border-color:red");
                    styleT.setAttribute("style","border-color: rgb(185, 185, 185)"); 
                }
                
                if(titlePrefix.value == "" && titleWithoutPrefix.value != "" && title.value == "") {
                    errorTWP.style.display = "inline";
                    errorT.style.display = "none";
                    styleTWP.setAttribute("style","border-color:red");
                    styleT.setAttribute("style","border-color: rgb(185, 185, 185)"); 
                }
            
                if(titlePrefix.value == "" && titleWithoutPrefix.value == "" && title.value == "") {
                    errorTWP.style.display = "inline";
                    errorT.style.display = "inline";
                    styleTWP.setAttribute("style","border-color:red");
                    styleT.setAttribute("style","border-color:red");
                }
            
                if(titlePrefix.value == "" && titleWithoutPrefix.value == "" && title.value != "") {
                    errorTWP.style.display = "none";
                    errorT.style.display = "inline";
                    styleTWP.setAttribute("style","border-color: rgb(185, 185, 185)");
                    styleT.setAttribute("style","border-color:red");
                }

                if(titlePrefix.value == "" && titleWithoutPrefix.value != "") {
                    styleTWP.setAttribute("style","border-color: rgb(185, 185, 185)");
                }
            
            });
    
    
            titleWithoutPrefix.addEventListener('keyup', () => {

                var errorT = document.getElementById('basic_edition_form_titleText-error');
                var errorTP = document.getElementById('basic_edition_form_titlePrefix-error');
                var styleTP = document.getElementById('basic_edition_form_titlePrefix');
                var styleT = document.getElementById('basic_edition_form_titleText');
            
                titleWithoutPrefix.setAttribute('value', titleWithoutPrefix.value);
                
                if(titleWithoutPrefix.value != "" && titlePrefix.value == "" && title.value == "") {
                    errorTP.style.display = "inline";
                    errorT.style.display = "none";
                    styleTP.setAttribute("style","border-color:red");
                    styleT.setAttribute("style","border-color: rgb(185, 185, 185)");
                }
                
                if(titleWithoutPrefix.value == "" && titlePrefix.value != "" && title.value == "") {
                    errorTP.style.display = "inline";
                    errorT.style.display = "none";
                    styleTP.setAttribute("style","border-color:red");
                    styleT.setAttribute("style","border-color: rgb(185, 185, 185)");    
                }
            
                if(titleWithoutPrefix.value == "" && titlePrefix.value == "" && title.value == "") {
                    errorTP.style.display = "inline";
                    errorT.style.display = "inline"; 
                    styleTP.setAttribute("style","border-color:red");
                    styleT.setAttribute("style","border-color:red");
                }
            
                if(titleWithoutPrefix.value == "" && titlePrefix.value == "" && title.value != "") {
                    errorTP.style.display = "none"; 
                    errorT.style.display = "inline";
                    styleTP.setAttribute("style","border-color: rgb(185, 185, 185)");
                    styleT.setAttribute("style","border-color:red");
                }

                if(titleWithoutPrefix.value == "" && titlePrefix.value != "") {
                    styleTP.setAttribute("style","border-color: rgb(185, 185, 185)");
                }
            
            });
        }

    });

});