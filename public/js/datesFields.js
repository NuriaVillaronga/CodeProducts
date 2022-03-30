document.addEventListener("DOMContentLoaded", function (event) {

    $(document).ready(function() {
        $('.js-datepicker').datepicker({
            format: 'yyyymmdd'
        });
    });

    var publishingDate = document.getElementById('general_information_form_publishingDate');
    var publishingDateYear = document.getElementById('general_information_form_yearPublishingDate');
        
    publishingDateYear.value = publishingDate.value.substring(0,4); //Se actualiza al incio al cargar
    
    publishingDate.addEventListener('keyup', () => {
        updatePDYear.call(this.updatePDYear);
    }); 

    publishingDate.addEventListener('blur', () => {
        updatePDYear.call(this.updatePDYear);
    });

    function updatePDYear() {
        let publishingDateYear = document.getElementById('general_information_form_yearPublishingDate');
        publishingDateYear.value = publishingDate.value.substring(0,4);
    }

});