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
        
    $.validator.addMethod("ean_digits", function( value, element ) {
        return this.optional( element ) || 
        /^(?=[0-9X]{13}$)[0-9]?[0-9]+[]?[0-9X]$/.test( value );
    });

    $.validator.addMethod("letters", function( value, element ) {
        return this.optional( element ) || 
        /^[a-zA-ZÀ-ÿ]+$/.test( value );
    });

    /**
     * ---------------- Prize (Year) validador -------------------
     */
    $.validator.addMethod("year_Option", function( value, element ) {
        return this.optional( element ) || 
        /^\d{4}$/.test( value );
    }, "Insert a valid Year (only numbers in format AAAA)");

    /**
     * ------ Price Amount/ Taxable Amount validador --------
     */
     $.validator.addMethod("number_greater_0_Option", function( value, element ) {
        return this.optional( element ) || 
        /^([1-9]\d*(\.\d*)?)|(0\.\d*[1-9][0-9])|(0\.\d*[1-9])$/.test( value );
    }, "Insert a valid value (only numbers greater than 0)");


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
                ean_digits : true
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
                required : 'You must add at least one ISBN13 or one EAN',
                ean_digits : 'EAN must contain <u>13 digits</u>'
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
                letters: true
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
            },
            "general_information_form[cityOfPublication]": {
                letters: 'CityOfPublication must contain only letters'
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


    $('.contributor_own_tab').each(function() {

        tabChildrenNodes = $(this).children();

        tabChildrenNodes.each(function() {

            if ($(this).prop("nodeName") == "FORM") {
                
                $(this).validate({
                    rules: {
                        "contributor_form[contributorRole][]": {
                            required: true 
                        },
                        "contributor_form[namesBeforeKey]": {
                            letters: true 
                        },
                        "contributor_form[keyNames]": {
                            letters: true 
                        }
                    },
                    messages: {
                        "contributor_form[contributorRole][]": {
                            required: 'ContributorRole is required'
                        },
                        "contributor_form[namesBeforeKey]": {
                            letters: 'NamesBeforeKey must contain only letters'
                        },
                        "contributor_form[keyNames]": {
                            letters: 'KeyNames must contain only letters'
                        }
                    },
                });

            }
        });
    });

    //--------------------------------------------TO FIX-----------------------------------------
    $('#website_form_tab').validate({
        ignore: '.select2-search__field, input[type=hidden]',
        rules: {
            "website_form[websiteLink]": {
                url: true
            }
        },
        messages: {
            "website_form[websiteLink]": {
                url: 'Insert a valid URL'
            }
        },
    });
    
    $('#related_product_form_card').each(function() {
        $(this).validate({
            ignore: '.select2-search__field, input[type=hidden]',
            rules: {
                "related_product_form[relatedProductISBN]": {
                    ean_digits: true
                }
            },
            messages: {
                "related_product_form[relatedProductISBN]": {
                    ean_digits: '<b>ISBN13</b> must contain <u>13 digits</u> and start with <em>978</em> or <em>979</em><br><b>EAN</b> only must contain <u>13 digits</u>'
                }
            },
        });
    });

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

});