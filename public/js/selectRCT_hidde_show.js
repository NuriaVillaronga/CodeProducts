document.addEventListener("DOMContentLoaded", function (event) {

    var URL_RC04 = window.location.origin.concat("/api/codelist/returnsCode04");
    var URL_RC03 = window.location.origin.concat("/api/codelist/BICsubject");
    var URL_RC02 = window.location.origin.concat("/api/codelist/returnsCode02");

    var suppliersTab = document.querySelectorAll('.supplier_own_tab');

    suppliersTab.forEach((tab) => { 
        var tabChildrenNodes = tab.childNodes;
        tabChildrenNodes.forEach((tabChildren) => { 
            if(tabChildren.nodeName == "FORM") {
                
                var tabGrandchildrenNodes = tabChildren.childNodes;

                var gicNode;

                tabGrandchildrenNodes.forEach((tabGrandchildren)=> {
                    if(tabGrandchildren.id == "container_1") {
                        gicNode = tabGrandchildren.childNodes;
                    }
                });

                var container_2_Node;

                gicNode.forEach((gicChildren)=> {
                    if(gicChildren.id == "container_2") {
                        container_2_Node = gicChildren.childNodes;
                    } 
                });

                var container_3_Node;

                container_2_Node.forEach((cont2Children)=> {
                    if(cont2Children.id == "container_3") {
                        container_3_Node = cont2Children.childNodes;
                    } 
                });

                var returnsCodeGrid;

                container_3_Node.forEach((cont3Children)=> {
                    if(cont3Children.id == "returnsCodeGrid") {
                        returnsCodeGrid = cont3Children;
                    } 
                });

                var input00;
                var input01; 
                var select02;
                var select03;
                var select04;
            
                var selectRCT;
                var returnsCode;
                for (let i = 0; i < tabChildren.length; i++) {
                    if(tabChildren[i].id == "supplier_form_returnsCodeType") {
                        selectRCT = tabChildren[i];
                    }
                    if(tabChildren[i].id == "supplier_form_returnsCode") {
                        returnsCode = tabChildren[i];
                    }
                }

                optionsRCTselected.call(this.optionsRCTselected, selectRCT.options[selectRCT.selectedIndex].value, returnsCodeGrid);

                selectRCT.addEventListener('change',
                    () => {
                            showValuesReturnsCodeChange.call(this.showValuesReturnsCodeChange, selectRCT.options[selectRCT.selectedIndex].value);
                        }
                );

                function optionsRCTselected(selectedOptionRCT, returnsCodeGrid) { 
            
                    createInput.call(this.createInput, returnsCodeGrid, "input00");
                    createInput.call(this.createInput, returnsCodeGrid, "input01");
                    loadReturnsCodeData.call(this.loadReturnsCodeData, returnsCodeGrid, "select02", URL_RC02, selectedOptionRCT);
                    loadReturnsCodeData.call(this.loadReturnsCodeData, returnsCodeGrid, "select03", URL_RC03, selectedOptionRCT);
                    loadReturnsCodeData.call(this.loadReturnsCodeData, returnsCodeGrid, "select04", URL_RC04, selectedOptionRCT);
            
                }

                function loadReturnsCodeData(returnsCodeGrid, selectID, URL, selectedOptionRCT) {
                    var arrayDataRC = []; 
            
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("GET", URL, true);
                    xhttp.send();
            
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
                    select.setAttribute("style","display:none"); //cambiar despues a display none
            
                    returnsCodeGrid.appendChild(select);

                    select.addEventListener('change',
                        () => {
                            var selectedOptionRC = select.options[select.selectedIndex].value;
                            var returnsCode_hidden = returnsCode;
                            returnsCode_hidden.setAttribute('value', selectedOptionRC);
                        }
                    );
                }
            
                function createInput(returnsCodeGrid, inputID) {
                    var input = document.createElement("input");
                    input.setAttribute("class", "form-control");
                    input.setAttribute("id", inputID); 
                    input.setAttribute("style","display:none"); //cambiar despues a display none
            
                    returnsCodeGrid.appendChild(input);

                    input.addEventListener('keyup',
                        () => {
                            var returnsCode_hidden = returnsCode; 
                            returnsCode_hidden.setAttribute('value', input.value);
                        }
                    );
                }

                function showValuesReturnsCodeChange(selectedOptionRCT) {
                    returnsCodeGrid.childNodes.forEach((rcgChild)=> {
                        if(rcgChild.id == "input00") {
                            input00 = rcgChild
                        }
                        if(rcgChild.id == "input01") {
                            input01 = rcgChild
                        }
                        if(rcgChild.id == "select02") {
                            select02 = rcgChild
                        }
                        if(rcgChild.id == "select03") {
                            select03 = rcgChild
                        }
                        if(rcgChild.id == "select04") {
                            select04 = rcgChild
                        }
                    });
                    
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

                function showValuesReturnsCode(selectedOptionRCT) {
                    returnsCodeGrid.childNodes.forEach((rcgChild)=> {
                        if(rcgChild.id == "input00") {
                            input00 = rcgChild
                        }
                        if(rcgChild.id == "input01") {
                            input01 = rcgChild
                        }
                        if(rcgChild.id == "select02") {
                            select02 = rcgChild
                        }
                        if(rcgChild.id == "select03") {
                            select03 = rcgChild
                        }
                        if(rcgChild.id == "select04") {
                            select04 = rcgChild
                        }
                    });
            
                    var returnsCode_hidden = returnsCode;
                    
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
            }
        });
    });
});