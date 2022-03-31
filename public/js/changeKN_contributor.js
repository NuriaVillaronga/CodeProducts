document.addEventListener("DOMContentLoaded", function (event) {

    var contributorsTab = document.querySelectorAll('.contributor_own_tab');

    contributorsTab.forEach((tab) => {
        var tabChildrenNodes = tab.childNodes;
        tabChildrenNodes.forEach((tabChildren) => { 
            if(tabChildren.nodeName == "FORM") {
                
                var personNameInverted;
                var personName;
                var keyNames;
                var namesBeforeKey; 

                for (let i = 0; i < tabChildren.length; i++) {
                    console.log(tabChildren[i].id);
                    if(tabChildren[i].id == "contributor_form_personNameInverted") {
                        personNameInverted = tabChildren[i];
                    }
                    if(tabChildren[i].id == "contributor_form_personName") {
                        personName = tabChildren[i];
                    }
                    if(tabChildren[i].id == "contributor_form_keyNames") {
                        keyNames = tabChildren[i];
                    }
                    if(tabChildren[i].id == "contributor_form_namesBeforeKey") {
                        namesBeforeKey = tabChildren[i];
                    }
                }

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
            }
        });
    });
    
});