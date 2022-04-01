document.addEventListener("DOMContentLoaded", function (event) {

    var selectTS = document.getElementById("subject_audience_form_themaSubject");
    var inputTS = document.getElementById("input_definition_ts");

    var definitionTS = selectTS.options[selectTS.selectedIndex].value.split(" - ");
    inputTS.value = definitionTS[1].trim(); 

    var selectBR = document.getElementById("subject_audience_form_BISACregion");
    var inputBR = document.getElementById("input_definition_br");

    var definitionBR = selectBR.options[selectBR.selectedIndex].value.split(" - ");
    inputBR.value = definitionBR[1].trim(); 

    selectTS.addEventListener('change', () => {
        var definitionTS = selectTS.options[selectTS.selectedIndex].value.split(" - ");
        inputTS.value = definitionTS[1].trim(); 
    });

    selectBR.addEventListener('change', () => {
        var definitionBR = selectBR.options[selectBR.selectedIndex].value.split(" - ");
        inputBR.value = definitionBR[1].trim(); 
    });
    
});