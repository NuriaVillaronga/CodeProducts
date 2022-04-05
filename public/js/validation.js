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
            .addBack().css( "border-color", "rgb(185, 185, 185) !important" ); //Cambiar al color necesario
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

    $.validator.addMethod("year", function( value, element ) {
        return this.optional( element ) || 
        /^\d{4}$/.test( value );
    }, "Insert a valid Year (only numbers in format AAAA)");

    $.validator.addMethod("number_greater_0_Option", function( value, element ) {
        return this.optional( element ) || 
        /^([1-9]\d*(\.\d*)?)|(0\.\d*[1-9][0-9])|(0\.\d*[1-9])$/.test( value );
    }, "Insert a valid value (only numbers greater than 0)");


    /**
     * BASIC EDITION FORM
     */

    var buttonSubmit = document.getElementById('btn_save_BE');

    var isbn13 = document.getElementById("basic_edition_form_ISBN13");
    var ean = document.getElementById("basic_edition_form_EAN");
    
    buttonSubmit.addEventListener('click', () => {

        function setVisibilityErrors(visibilityEAN, visibilityISBN13, colorEAN, colorISBN13) {
            if (document.getElementById("basic_edition_form_ISBN13-error") != null) {
                document.getElementById("basic_edition_form_ISBN13-error").style.display = visibilityISBN13;
                document.getElementById("basic_edition_form_ISBN13").setAttribute("style",colorISBN13);
            }
            if (document.getElementById("basic_edition_form_EAN-error") != null) {
                document.getElementById("basic_edition_form_EAN-error").style.display = visibilityEAN;
                document.getElementById("basic_edition_form_EAN").setAttribute("style",colorEAN);
            }
        }

        function setRequired(isbn13Value, eanValue) {
            if (isbn13Value == "" && eanValue == "") {  

                jQuery.validator.addClassRules("isbn13_validation", {
                    required: true       
                });
        
                jQuery.validator.addClassRules("ean_validation", {
                    required: true       
                });
                
                setVisibilityErrors.call(this.visibilityEAN, "inline", "inline", "border-color: red !important", "border-color: red !important");
            }
            if (isbn13Value != "" && eanValue == "") {
        
                jQuery.validator.addClassRules("ean_validation", {
                    required: false       
                });

                setVisibilityErrors.call(this.visibilityEAN, "none", "inline", "border-color: rgb(185, 185, 185) !important", "border-color: red !important");
            }
            if (isbn13Value == "" && eanValue != "") {
        
                jQuery.validator.addClassRules("isbn13_validation", {
                    required: false       
                });
                
                setVisibilityErrors.call(this.visibilityEAN, "inline", "none", "border-color: red !important", "border-color: rgb(185, 185, 185) !important");
            }

            $.validator.messages.required = 'You must add at least one ISBN13 or one EAN';
        }
    
        setRequired.call(this.setRequired, isbn13.value, ean.value);

        isbn13.addEventListener('keyup', () => {
            isbn13.setAttribute('value', isbn13.value);
            setRequired.call(this.setRequired, isbn13.value, ean.value);
        });
        
        ean.addEventListener('keyup', () => {
            ean.setAttribute('value', ean.value); 
            setRequired.call(this.setRequired, isbn13.value, ean.value);
        });

    });


    $("#basic_edition_form_pretab").validate({
        rules: {
            "basic_edition_form[recordReference]": {
                required : true
            },
            "basic_edition_form[ISBN13]": {
                isbn13Option : true
            },
            "basic_edition_form[EAN]": {
                ean_digits : true
            },
            "basic_edition_form[ISBN10]": {
                isbn10Option : true
            },
            "basic_edition_form[titleWithoutPrefix]": {
                required : true
            },
            "basic_edition_form[ean]": {
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
            "basic_edition_form[EAN]": {
                ean_digits : 'EAN must contain <u>13 digits</u>'
            },
            "basic_edition_form[titleWithoutPrefix]": {
                required : "Title must contain a TitleWithoutPrefix and a TitleText"
            },
            "basic_edition_form[ean]": {
                required : "Title must contain a TitleWithoutPrefix and a TitleText"
            },
            "basic_edition_form[titleText]": {
                required : "Title must contain a TitleText"
            }
        }
    });


    /**
     * GENERAL INFORMATION TAB
     */

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


    /**
     * SUBJECT & AUDIENCE TAB
     */

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


    /**
     * MEASURE & EXTENT TAB
     */

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


    /**
     * ILLUSTRATION TAB
     */

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


    /**
     * CONTRIBUTOR TAB
     */

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


    /**
     * RELATED PRODUCT CARD
     */

    $('.card-body').each(function() {

        tabChildrenNodes = $(this).children();

        tabChildrenNodes.each(function() {

            if ($(this).prop("nodeName") == "FORM") {
                
                $(this).validate({
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
            }
        });
    });


    /**
     * WEBSITE TAB
     */

    jQuery.validator.addClassRules("link_contributor", {
        url: true       
    });
    
    $.validator.messages.url = 'Insert a valid URL';

    $('#website_form_tab').validate({
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


    /**
     * SUPPLIER TAB (SUPPLIER + PRICE)
     */

    jQuery.validator.addClassRules("tax_amount_validation", {
        number: true       
    });

    jQuery.validator.addClassRules("tax_rate_percent_validation", {
        number: true       
    });

    jQuery.validator.addClassRules("taxable_amount_validation", {
        number_greater_0_Option: true       
    });

    jQuery.validator.addClassRules("price_amount_validation", {
        number_greater_0_Option: true       
    });
    
    $.validator.messages.number = 'Insert a valid value (only numbers)';

    $('.supplier_own_tab').each(function() {

        tabChildrenNodes = $(this).children();

        tabChildrenNodes.each(function() {

            if ($(this).prop("nodeName") == "FORM") {
                
                $(this).validate({
                    rules: {
                        "supplier_form[packQuantity]": {
                            digits: true
                        },
                        "supplier_form[supplierRole]": {
                            required: true 
                        },
                        "supplier_form[productAvailability]": {
                            required: true
                        }
                    },
                    messages: {
                        "supplier_form[packQuantity]": {
                            digits: 'Insert a valid PackQuantity (only integer numbers)'
                        },
                        "supplier_form[supplierRole]": {
                            required: 'SupplierRole is required'
                        },
                        "supplier_form[productAvailability]": { 
                            required: 'ProductAvailability is required'
                        }
                    },
                });
            }
        });
    });


    /**
     * PROMOTION && PRIZE TAB
     */

    var yearsPrize = document.querySelectorAll(".year_prize_validation");
     yearsPrize.forEach((yearPrize) => {
         
        $(yearPrize.id).rules("add", {
            year: true
        });
    });

    /*
    jQuery.validator.addClassRules("year_prize_validation", {
        year: true       
    });
    */

});