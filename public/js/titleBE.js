//basic_edition_form_titlePrefix
//basic_edition_form_titleWithoutPrefix
//basic_edition_form_titleText

document.addEventListener("DOMContentLoaded", function (event) {

    var basicEditionForm = document.getElementById('basic_edition_form_pretab');

    var titleWithoutPrefix = document.getElementById('basic_edition_form_titleWithoutPrefix');
    var titlePrefix = document.getElementById('basic_edition_form_titlePrefix');
    var title = document.getElementById('basic_edition_form_titleText');

    var errorT = document.getElementById('basic_edition_form_titleText-error');
    var errorTWP = document.getElementById('basic_edition_form_titleWithoutPrefix-error');
    var errorTP = document.getElementById('basic_edition_form_titlePrefix-error');


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


    //formulario --> cuando se envía

});