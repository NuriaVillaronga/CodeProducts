document.addEventListener("DOMContentLoaded", function (event) {

    var URL_RC04 = window.location.origin.concat("/api/codelist/returnsCode04");
    var URL_RC03 = window.location.origin.concat("/api/codelist/BICsubject");
    var URL_RC02 = window.location.origin.concat("/api/codelist/returnsCode02");

    //var selectsRCT = document.querySelectorAll('.returns_code_type_supplier');

    //selectsRCT.forEach((selectRCT) => {

        var selectRCT = document.getElementById('supplier_form_returnsCodeType');
        var selectedOptionRCT = selectRCT.options[selectRCT.selectedIndex].value;

        optionsRCTselected.call(this.optionsRCTselected, selectedOptionRCT);

        selectRCT.addEventListener('change',
            () => {
                    var selectedOption = selectRCT.options[selectRCT.selectedIndex].value; //Se actualiza cada vez que cambia la opcion del select
                    showValuesReturnsCodeChange.call(this.showValuesReturnsCodeChange, selectedOption);
                }
        );
        

        function showValuesReturnsCode(selectedOptionRCT) {
            var input00 = document.getElementById('input00');
            var input01 = document.getElementById('input01'); 
            var select02 = document.getElementById('select02');
            var select03 = document.getElementById('select03');
            var select04 = document.getElementById('select04');

            var returnsCode_hidden = document.getElementById('supplier_form_returnsCode');
            
            if(selectedOptionRCT == 00) {
                if(input00 != null) {
                    input00.style.display='block';
                    input00.value = returnsCode_hidden.value;
                }
            }
            else if(selectedOptionRCT == 01) {
                if(input01 != null) {
                    input01.style.display='block';
                    input01.value = returnsCode_hidden.value;
                }
            }
            else if(selectedOptionRCT == 02) {
                if(select02 != null) {
                    select02.style.display='block';
                    select02.value = returnsCode_hidden.value;
                }
            }
            else if(selectedOptionRCT == 03) {
                if(select03 != null) {
                    select03.style.display='block';
                    select03.value = returnsCode_hidden.value;
                }
            }
            else if(selectedOptionRCT == 04) {
                if(select04 != null) {
                    select04.style.display='block'; 
                    select04.value = returnsCode_hidden.value;
                }
            }
        }

        function showValuesReturnsCodeChange(selectedOptionRCT) {
            var input00 = document.getElementById('input00');
            var input01 = document.getElementById('input01'); 
            var select02 = document.getElementById('select02');
            var select03 = document.getElementById('select03');
            var select04 = document.getElementById('select04');
            
            if(selectedOptionRCT == 00) {
                hiddeNodes_whileInput.call(this.hiddeNodes_whileInput, select02, select03, select04, input01); 
                input00.style.display='block';
            }
            else if(selectedOptionRCT == 01) {
                hiddeNodes_whileInput.call(this.hiddeNodes_whileInput, select02, select03, select04, input00); 
                input01.style.display='block';
            }
            else if(selectedOptionRCT == 02) {
                hiddeNodes_whileSelect.call(this.hiddeNodes_whileSelect, select03, select04, input00, input01);
                select02.style.display='block';
            }
            else if(selectedOptionRCT == 03) {
                hiddeNodes_whileSelect.call(this.hiddeNodes_whileSelect, select02, select04, input00, input01);
                select03.style.display='block';
            }
            else if(selectedOptionRCT == 04) {
                hiddeNodes_whileSelect.call(this.hiddeNodes_whileSelect, select02, select03, input00, input01);
                select04.style.display='block'; 
            }
        }

        function getArrayReturnsCodeData(returnsCodeGrid, selectID, URL, selectedOptionRCT) {
            var arrayDataRC = []; 

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", URL, true);
            xhttp.send();

            //obtener respuesta
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    dataRC = JSON.parse(this.responseText); //this.responseText devuelve el contenido en modo texto, con JSON se interpretan los datos como json y se recibirá un array
                    
                    for(var i in dataRC) {
                        arrayDataRC.push([i,dataRC[i]]);
                    }

                    createSelect.call(this.createSelect, returnsCodeGrid, selectID, arrayDataRC);
                    showValuesReturnsCode.call(this.showValuesReturnsCode, selectedOptionRCT);
                }
            };
        }

        function optionsRCTselected(selectedOptionRCT) {

            var returnsCodeGrid = document.getElementById('returnsCodeGrid');

            createInput.call(this.createInput, returnsCodeGrid, "input00");
            createInput.call(this.createInput, returnsCodeGrid, "input01");
            getArrayReturnsCodeData.call(this.getArrayReturnsCodeData, returnsCodeGrid, "select02", URL_RC02, selectedOptionRCT);
            getArrayReturnsCodeData.call(this.getArrayReturnsCodeData, returnsCodeGrid, "select03", URL_RC03, selectedOptionRCT);
            getArrayReturnsCodeData.call(this.getArrayReturnsCodeData, returnsCodeGrid, "select04", URL_RC04, selectedOptionRCT);

        }


        function createSelect(returnsCodeGrid, selectID, arrayOptions) {
            var select = document.createElement("select");

            for (let item of arrayOptions) {
                var option = document.createElement("option");
                option.setAttribute("value", item[0]);
                var optionText = document.createTextNode(item[1]);
                option.appendChild(optionText);
                select.appendChild(option);
            }

            select.setAttribute("class", "form-select");
            select.setAttribute("id", selectID);
            select.setAttribute("style","display:none");

            returnsCodeGrid.appendChild(select);

            //Según la opción que se seleccione en el select, el campo hidden (returns code) del formulario supplier, tomará un valoro otro
            select.addEventListener('change',
                () => {
                    var selectedOptionRC = select.options[select.selectedIndex].value;
                    var returnsCode_hidden = document.getElementById('supplier_form_returnsCode');
                    returnsCode_hidden.setAttribute('value', selectedOptionRC);
                }
            );
        }

        function createInput(returnsCodeGrid, inputID) {
            let input = document.createElement("input");
            input.setAttribute("class", "form-control");
            input.setAttribute("id", inputID); 
            input.setAttribute("style","display:none");

            input.addEventListener('keyup',
                () => {
                    var returnsCode_hidden = document.getElementById('supplier_form_returnsCode');
                    returnsCode_hidden.setAttribute('value', input.value);
                }
            );

            returnsCodeGrid.appendChild(input);
        }

        function hiddeNodes_whileInput(selectX, selectY, selectZ, inputX) {
            if (selectX != null) {
                selectX.setAttribute("style","display:none;");
            }
            if (selectY != null) {
                selectY.setAttribute("style","display:none;");
            }
            if (selectZ != null) {
                selectZ.setAttribute("style","display:none;");
            }
            if (inputX != null) {
                inputX.setAttribute("style","display:none;");
            }
        }

        function hiddeNodes_whileSelect(selectX, selectY, inputX, inputY) {
            if (inputX != null) {
                inputX.setAttribute("style","display:none;"); 
            }
            if (inputY != null) {
                inputY.setAttribute("style","display:none;");
            }
            if (selectX != null) {
                selectX.setAttribute("style","display:none;");
            }
            if (selectY != null) {
                selectY.setAttribute("style","display:none;");
            }
        }

    //});
    
});