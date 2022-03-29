document.addEventListener("DOMContentLoaded", function (event) {

    var personNameInverted = document.getElementById('contributor_form_personNameInverted');
    var personName = document.getElementById('contributor_form_personName');
    var keyNames = document.getElementById('contributor_form_keyNames');
    var namesBeforeKey = document.getElementById('contributor_form_namesBeforeKey'); 


    namesBeforeKey.addEventListener('keyup', () => { changeValues.call(this.changeValues); });

    keyNames.addEventListener('keyup', () => { changeValues.call(this.changeValues); });

    function changeValues() {
        if(personName.value != null) {
            personName.value = namesBeforeKey.value+" "+keyNames.value;
        }
        if(personNameInverted.value != null) {
            personNameInverted.value = keyNames.value+", "+namesBeforeKey.value;
        }
        if(keyNames.value == null || namesBeforeKey.value == null) {
            personNameInverted.value = keyNames.value+namesBeforeKey.value;
        }
    }

});