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
                var container_2_Node;
                var container_3_Node;
                var returnsCodeGrid;
                var input00;
                var input01; 
                var select02;
                var select03;
                var select04;
                var selectRCT;
                var returnsCode;
                
                tabGrandchildrenNodes.forEach((tabGrandchildren)=> {
                    if(tabGrandchildren.id == "container_1") {
                        gicNode = tabGrandchildren.childNodes;
                    }
                });

                gicNode.forEach((gicChildren)=> {
                    if(gicChildren.id == "container_2") {
                        container_2_Node = gicChildren.childNodes;
                    } 
                });

                container_2_Node.forEach((cont2Children)=> {
                    if(cont2Children.id == "container_3") {
                        container_3_Node = cont2Children.childNodes;
                    } 
                });

                container_3_Node.forEach((cont3Children)=> {
                    if(cont3Children.id == "returnsCodeGrid") {
                        returnsCodeGrid = cont3Children;
                    } 
                });

                for (let i = 0; i < tabChildren.length; i++) {
                    if(tabChildren[i].id == "supplier_form_returnsCodeType") {
                        selectRCT = tabChildren[i];
                    }
                    if(tabChildren[i].id == "supplier_form_returnsCode") {
                        returnsCode = tabChildren[i];
                    }
                }

                optionsRCTselected.call(this.optionsRCTselected, selectRCT.options[selectRCT.selectedIndex].value, returnsCodeGrid);

                selectRCT.addEventListener('change', () => {
                    showValues_on_Change.call(this.showValues_on_Change, selectRCT.options[selectRCT.selectedIndex].value);
                });

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
                            showValues_on_Init.call(this.showValues_on_Init, selectedOptionRCT);
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
            
                    setBasicOptionsNewElements.call(this.setBasicOptionsNewElements, select, selectID, "form-select");
            
                    returnsCodeGrid.appendChild(select);

                    select.addEventListener('change', () => {
                            var selectedOptionRC = select.options[select.selectedIndex].value;
                            var returnsCodeHidden = returnsCode;
                            returnsCodeHidden.setAttribute('value', selectedOptionRC);
                    });
                }
            
                function createInput(returnsCodeGrid, inputID) {
                    var input = document.createElement("input");
                    setBasicOptionsNewElements.call(this.setBasicOptionsNewElements, input, inputID, "form-control");
            
                    returnsCodeGrid.appendChild(input);

                    input.addEventListener('keyup', () => {
                            var returnsCodeHidden = returnsCode; 
                            returnsCodeHidden.setAttribute('value', input.value);
                    });
                }

                function setBasicOptionsNewElements(element, elementID, boots_class) {
                    element.setAttribute("class", boots_class);
                    element.setAttribute("id", elementID); 
                    element.setAttribute("style","display:none"); 
                }

                function showValues_on_Change(selectedOptionRCT) { 
                    
                    setNodeValue.call(this.setNodeValue);
                    
                    if(selectedOptionRCT == 00) {
                        hiddeRestNodes.call(this.hiddeRestNodes, select02, select03, select04, input01, input00); 
                    }
                    else if(selectedOptionRCT == 01) {
                        hiddeRestNodes.call(this.hiddeRestNodes, select02, select03, select04, input00, input01);
                    }
                    else if(selectedOptionRCT == 02) {
                        hiddeRestNodes.call(this.hiddeRestNodes, select03, select04, input00, input01, select02);
                    }
                    else if(selectedOptionRCT == 03) {
                        hiddeRestNodes.call(this.hiddeRestNodes, select02, select04, input00, input01, select03);
                    }
                    else if(selectedOptionRCT == 04) {
                        hiddeRestNodes.call(this.hiddeRestNodes, select02, select03, input00, input01, select04); 
                    }
                }

                function showValues_on_Init(selectedOptionRCT) { 
            
                    var returnsCodeHidden = returnsCode; 

                    setNodeValue.call(this.setNodeValue);
                    
                    if(selectedOptionRCT == 00) {
                        display_save_SelectedOption.call(this.display_save_SelectedOption, input00, returnsCodeHidden);
                    }
                    else if(selectedOptionRCT == 01) {
                        display_save_SelectedOption.call(this.display_save_SelectedOption, input01, returnsCodeHidden);
                    }
                    else if(selectedOptionRCT == 02) {
                        display_save_SelectedOption.call(this.display_save_SelectedOption, select02, returnsCodeHidden);
                    }
                    else if(selectedOptionRCT == 03) {
                        display_save_SelectedOption.call(this.display_save_SelectedOption, select03, returnsCodeHidden);
                    }
                    else if(selectedOptionRCT == 04) {
                        display_save_SelectedOption.call(this.display_save_SelectedOption, select04, returnsCodeHidden);
                    }
                }

                function setNodeValue() {
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
                }

                function display_save_SelectedOption(node, returnsCodeHidden) {
                    if(node != null) {
                        node.style.display='block'; 
                        node.value = returnsCodeHidden.value;
                    }
                }

                function hiddeRestNodes(node1, node2, node3, node4, node5) {
                    if (node1 != null) {
                        node1.setAttribute("style","display:none;"); 
                    }
                    if (node2 != null) {
                        node2.setAttribute("style","display:none;");
                    }
                    if (node3 != null) {
                        node3.setAttribute("style","display:none;");
                    }
                    if (node4 != null) {
                        node4.setAttribute("style","display:none;");
                    } 
                    node5.style.display='block';
                }
            }
        });
    });
});