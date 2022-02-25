$(function() {
    
    console.log("----------------------------");

    $.validator.setDefaults({
        errorClass: 'text-danger',
        highlight: function(element) {
          $(element)
            .closest('.requiredInputs')
            .addBack().css( "border-color", "red" );
        },
        unhighlight: function(element) {
          $(element)
            .closest('.requiredInput')
            .addBack().css( "border-color", "rgb(185, 185, 185)" ); //Cambiar al color necesario
        },
    });

    $.validator.addMethod("publishingDateFormat", function( value, element ) {
        return this.optional( element ) || 
            /^(?:(0{2,3}[1-9]|0{1,2}[1-9]\d|0[1-9]\d{2}|[1-9]\d{3})(?:(0[1-9]|1[0-2])(0[1-9]|1\d|2[0-8])|(0[13-9]|1[0-2])(29|30)|(0[13578]|1[02])(31))|(\d{1,2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[13579][26]|[2468][048])00)(0?2)(29))$/.test( value );
    }, "Introduce una fecha válida en formato AAAAMMDD");

    $.validator.addMethod("editionNumberType", function( value, element ) {
        return this.optional( element ) || value >= 0 && Number.isInteger(Number(value));
    }, "Introduce un número de edición válido");

    $.validator.addMethod("numberPagesType", function( value, element ) {
        return this.optional( element ) || value >= 0 && Number.isInteger(Number(value));
    }, "Introduce un número de páginas válido");

    $(".dataForm").validate({
        rules: {
            "general_information_form[publishingDate]": {
                required : true,
                publishingDateFormat : true
            },
            "general_information_form[editionNumber]": {
                editionNumberType : true
            },
            "general_information_form[numberOfPages]": {
                numberPagesType : true
            }
        },
        messages: {
            "general_information_form[publishingDate]": {
                required : 'Fecha de publicación es obligatorio'
            },
        }
    });
});