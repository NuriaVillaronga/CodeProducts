function sortTable() {
    var table = document.getElementById("tableList");
    var switching = true;
    while (switching) //El bucle continuará hasta que no se realice ningún cambio
    { 
        switching = false; 
        rows = table.rows;
        for (var i = 1; i < (rows.length - 1); i++) //Se excluye la primera fila (contiene titulos)
        {
            shouldSwitch = false; 
            //Elementos a comparar (elemento actual con el siguiente)
            x = rows[i].getElementsByTagName("td")[3];
            y = rows[i + 1].getElementsByTagName("td")[3];
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) { 
                shouldSwitch = true; 
                break;
            }
        }
        if (shouldSwitch) { 
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}