$(function() {

    $.validator.setDefaults({
        debug: false, //if ( validator.settings.debug ) {event.preventDefault();}} --> si está activada la depuración para
        success: "valid",
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


    $("#basic_edition_form_pretab").validate({
        rules: {
            "basic_edition_form[recordReference]": {
                required : true
            },
            "basic_edition_form[ISBN13]": {
                required : true,
                isbn13Option : true
            },
            "basic_edition_form[EAN]": {
                required : true,
                eanOption : true
            },
            "basic_edition_form[ISBN10]": {
                isbn10Option : true
            },
            "basic_edition_form[titleWithoutPrefix]": {
                required : true
            },
            "basic_edition_form[titlePrefix]": {
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
                required : "Title must contain a TitleWithoutPrefix and a TitleText"
            },
            "basic_edition_form[titlePrefix]": {
                required : "Title must contain a TitleWithoutPrefix and a TitleText"
            },
            "basic_edition_form[titleText]": {
                required : "Title must contain a TitleText"
            }
        }
    });
    

    $.validator.addMethod("cityPublicationOption", function( value, element ) {
        return this.optional( element ) || 
        /^[a-zA-ZÀ-ÿ]+$/.test( value );
    }, "City of Publication must contain only letters");


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
            },
            "general_information_form[cityOfPublication]": {
                cityPublicationOption: true
            }
        },
        messages: {
            "general_information_form[publishingDate]": {
                required : 'PublishingDate is required'
            },
            "general_information_form[numberOfPages]": {
                digits: 'Insert a valid NumberOfPages (only integer numbers)'
            },
            "general_information_form[editionNumber]": {
                digits: 'Insert a valid EditionNumber (only integer numbers)'
            }
        },
    });


    $('#subject_audience_form_tab').validate({
        ignore: '.select2-search__field, input[type=hidden]',
        rules: {
            "subject_audience_form[BICversion]": {
                number: true
            },
            "subject_audience_form[audienceTo]": {
                number: true
            },
            "subject_audience_form[audienceFrom]": {
                number: true
            }
        },
        messages: {
            "subject_audience_form[BICversion]": {
                number: 'Insert a valid BICversion (only numbers)'
            },
            "subject_audience_form[audienceTo]": {
                number: 'Insert a valid To (only numbers)'
            },
            "subject_audience_form[audienceFrom]": {
                number: 'Insert a valid From (only numbers)'
            }
        },
    });


    $('#measure_extent_form_tab').validate({
        ignore: '.select2-search__field, input[type=hidden]',
        rules: {
            "measure_extent_form[heightMeasurement]": {
                number: true
            },
            "measure_extent_form[widthMeasurement]": {
                number: true
            },
            "measure_extent_form[thicknessMeasurement]": {
                number: true 
            },
            "measure_extent_form[weightMeasurement]": {
                number: true 
            },
            "measure_extent_form[fileSizeExtentValue]": {
                number: true 
            },
            "measure_extent_form[durationExtentValue]": {
                number: true 
            }
        },
        messages: {
            "measure_extent_form[heightMeasurement]": {
                number: 'Insert a valid Height value (only numbers)'
            },
            "measure_extent_form[widthMeasurement]": {
                number: 'Insert a valid Width value (only numbers)'
            },
            "measure_extent_form[thicknessMeasurement]": {
                number: 'Insert a valid Thickness value (only numbers)'
            },
            "measure_extent_form[weightMeasurement]": {
                number: 'Insert a valid Weight value (only numbers)'
            },
            "measure_extent_form[fileSizeExtentValue]": {
                number: 'Insert a valid File size value (only numbers)'
            },
            "measure_extent_form[durationExtentValue]": {
                number: 'Insert a valid Duration value (only numbers)'
            }
        },
    });

    $('#illustration_form_tab').validate({
        ignore: '.select2-search__field, input[type=hidden]',
        rules: {
            "illustration_form[numberILL]": {
                digits: true
            }
        },
        messages: {
            "illustration_form[numberILL]": {
                digits: 'Insert a valid Number of illustrations value (only integer numbers)'
            }
        },
    });

    /*
    $( "#supplier_form_tab" ).each(function( s_form ) {
        $(s_form).validate({
            rules: {
                "s_form[packQuantity]": {
                    digits: true
                }
            },
            messages: {
                "s_form[packQuantity]": {
                    digits: 'Insert a valid PackQuantity (only integer numbers)'
                }
            },
        });
    });
    */

    $("#supplier_form_tab").validate({
        rules: {
            "supplier_form_tab[packQuantity]": {
                digits: true
            },
            "supplier_form_tab[supplierRole]": {
                required: true 
            },
            "supplier_form_tab[productAvailability]": {
                required: true
            }
        },
        messages: {
            "supplier_form_tab[packQuantity]": {
                digits: 'Insert a valid PackQuantity (only integer numbers)'
            },
            "supplier_form_tab[supplierRole]": {
                required: 'SupplierRole is required'
            },
            "supplier_form_tab[productAvailability]": {
                required: 'ProductAvailability is required'
            }
        },
    });


    $("#contributor_form_tab").validate({
        rules: {
            "contributor_form_tab[contributorRole]": {
                required: true 
            }
        },
        messages: {
            "contributor_form_tab[contributorRole]": {
                required: 'ContributorRole is required'
            }
        },
    });


});