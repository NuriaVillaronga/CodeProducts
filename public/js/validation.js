$(function() {

    $.validator.setDefaults({
        debug: true, 
        errorClass: 'text-danger',
        highlight: function(element) {
          $(element)
            .closest('.requiredInput')
            .addBack().css( "border-color", "red" );
        },
        unhighlight: function(element) {
          $(element)
            .closest('.requiredInput')
            .addBack().css( "border-color", "rgb(185, 185, 185)" ); //Cambiar al color necesario
        }
    });

    $.validator.addMethod("isbn13Option", function( value, element ) {
        return this.optional( element ) || 
        /^(?=[0-9]{13}$)97[89][]?[0-9]{1,5}?[0-9]?[0-9]+[]?$/.test( value );
    }, "ISBN13 must contain <u>13 digits</u> and start with <em>978</em> or <em>979</em>");
        
    $.validator.addMethod("isbn10Option", function( value, element ) {
        return this.optional( element ) || 
        /^(?=[0-9X]{10}$)[0-9]?[0-9]+[]?[0-9X]$/.test( value );
    }, "ISBN10 must contain <u>10 digits</u>");
        
    $.validator.addMethod("eanOption", function( value, element ) {
        return this.optional( element ) || 
        /^(?=[0-9X]{13}$)[0-9]?[0-9]+[]?[0-9X]$/.test( value );
    }, "EAN must contain <u>13 digits</u>");


    $("#basic_edition").validate({
        rules: {
            "basic_edition_form[recordReference]": {
                required : true
            },
            "basic_edition_form[ISBN13]": {
                required : true,
                isbn13Option : true
            },
            "basic_edition_form[EAN]": {
                required : true
            },
            "basic_edition_form[ISBN10]": {
                isbn10Option : true
            },
            "basic_edition_form[titleWithoutPrefix]": {
                required : true
            },
            "basic_edition_form[titleText]": {
                required : true
            }
        },
        messages: {
            "basic_edition_form[recordReference]": { 
                required : 'RecordRference is required'
            },
            "basic_edition_form[ISBN13]": {
                required : 'You must add at least one ISBN13 or one EAN'
            },
            "basic_edition_form[EAN]": {
                required : 'You must add at least one ISBN13 or one EAN'
            },
            "basic_edition_form[titleWithoutPrefix]": {
                required : "Title must contain a TitleText or TitleWithoutPrefix"
            },
            "basic_edition_form[titleText]": {
                required : "Title must contain a TitleText or TitleWithoutPrefix"
            }
        }
    });
    

    $('#general_information_form_tab').validate({
        ignore: '.select2-search__field, input[type=hidden]',
        rules: {
            "general_information_form[publishingDate]": {
                required : true
            },
            "general_information_form[editionNumber]": {
                digits: true
            },
            "general_information_form[numberOfPages]": {
                digits: true
            }
        },
        messages: {
            "general_information_form[publishingDate]": {
                required : 'Fecha de publicación es obligatorio'
            },
            "general_information_form[numberOfPages]": {
                digits: 'Introduce un número de páginas válido'
            },
            "general_information_form[editionNumber]": {
                digits: 'Introduce un número de edición válido'
            }
        },
    });
});