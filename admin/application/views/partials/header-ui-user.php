<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shail - International Group</title>
    <link rel="icon" type="image/png" href="<?php echo base_url("asset/image/favicon.png"); ?>"/>  



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url("asset/css/dash.css"); ?>"/>        

    <link rel="stylesheet" href="<?php echo base_url("asset/css/main.css"); ?>"/>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>

        $( function() {

            $.widget( "custom.combobox", {

                _create: function() {

                    this.wrapper = $( "<span>" ).addClass( "custom-combobox" ).insertAfter( this.element );

                    this.element.hide();

                    this._createAutocomplete();

                    this._createShowAllButton();

                },

                _createAutocomplete: function() {

                    var selected = this.element.children( ":selected" ),

                    value = selected.val() ? selected.text() : "";

         

                    this.input = $( "<input>" )

                    .appendTo( this.wrapper )

                    .val( value )

                    .attr( "title", "" )

                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )

                    .autocomplete({

                        delay: 0,

                        minLength: 0,

                        source: $.proxy( this, "_source" )

                    })

                    .tooltip({

                        classes: {

                            "ui-tooltip": "ui-state-highlight"

                        }

                    });

         

                    this._on( this.input, {

                      autocompleteselect: function( event, ui ) {

                        ui.item.option.selected = true;

                        this._trigger( "select", event, {

                          item: ui.item.option

                        });

                      },

             

                      autocompletechange: "_removeIfInvalid"

                    });

                },

                _createShowAllButton: function() {

                    var input = this.input,

                    wasOpen = false;

         

                    $( "<a>" )

                        .attr( "tabIndex", -1 )

                        .attr( "title", "Show All Items" )

                        .tooltip()

                        .appendTo( this.wrapper )

                        .button({

                            icons: {

                                primary: "ui-icon-triangle-1-s"

                            },

                            text: false

                        })

                        .removeClass( "ui-corner-all" )

                        .addClass( "custom-combobox-toggle ui-corner-right" )

                        .on( "mousedown", function() {

                            wasOpen = input.autocomplete( "widget" ).is( ":visible" );

                        })

                        .on( "click", function() {

                            input.trigger( "focus" );

                             // Close if already visible

                            if ( wasOpen ) {

                                return;

                            }

                 

                                // Pass empty string as value to search for, displaying all results

                                input.autocomplete( "search", "" );

                          });

                },

                _source: function( request, response ) {

                    var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );

                    response( this.element.children( "option" ).map(function() {

                        var text = $( this ).text();

                        if ( this.value && ( !request.term || matcher.test(text) ) )

                            return {

                            label: text,

                            value: text,

                            option: this

                        };

                    }) );

                },

                _removeIfInvalid: function( event, ui ) {

                    // Selected an item, nothing to do

                    if ( ui.item ) {

                        return;

                    }

         

                    // Search for a match (case-insensitive)

                    var value = this.input.val(),

                    valueLowerCase = value.toLowerCase(),

                    valid = false;

                    this.element.children( "option" ).each(function() {

                        if ( $( this ).text().toLowerCase() === valueLowerCase ) {

                            this.selected = valid = true;

                            return false;

                        }

                    });

                    // Found a match, nothing to do

                    if ( valid ) {

                      return;

                    }

         

                    // Remove invalid value

                    this.input.val( "" ).attr( "title", value + " didn't match any item" ).tooltip( "open" );

                    this.element.val( "" );

                    this._delay(function() {

                        this.input.tooltip( "close" ).attr( "title", "" );

                    }, 2500 );

                    this.input.autocomplete( "instance" ).term = "";

                },

                _destroy: function() {

                    this.wrapper.remove();

                    this.element.show();

                }

            });

        });

    </script>

    <style type="text/css">

        .custom-combobox {

            position: relative;

            display: inline-block;

            width: 100px;

        }

        .custom-combobox-toggle {

            position: absolute;

            top: 0;

            bottom: 0;

            margin-left: -1px;

            padding: 0;

        }

        .custom-combobox-input {

            margin: 0;

            padding: 6px 10px;

            width: 70px;

        }

        .success-msg{

            color:red;

        }

        select.form-control {

            border: none;

            background-color: transparent;

            color: #fff;

            border-bottom: 1px solid #fff;

            width: 75%;

            margin: 0px auto;

            transition: 1s;

        }

         

        .form-group select:focus {

            width: 100% !important;

            border: none;

            background-color: transparent;

        }

    </style>

</head>

<body class="">

    <div class="buyer-log">

        <div class="container buyrr">

            <div class="row">

                <div class="col-md-7">

                   
					
    <div class="col-9 d-block adminlogobg ui-logo">
        <a href="<?=str_replace('/admin', '', base_url())?>"> 
	    <img src="<?php echo base_url(); ?>asset/image/logo2.png" class="logo_image"></a>      
        </div>
                    

		<div class="social-link">

                    

                    <!--<ul class="tea-typ">

                        <li><i class="fa fa-cart-plus" aria-hidden="true"></i> Services</li>

                        <!--<li><i class="fa fa-leaf" aria-hidden="true"></i> Bidding</li>

                        <li><i class="fa fa-unlock-alt" aria-hidden="true"></i> Secure</li>

                    </ul>-->

                    <!--<p class="need-acc">Social Media<span><a href="https://www.instagram.com/akibaycontact/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></span>

                        <span><a href="https://www.facebook.com/Akibayfrance" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>

                        <span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>

                    </p>-->

                    <div class="footr">

                        <p class="secod-par">Copyrights © 2021, Shail - International Group. All Rights Reserved.</p>

                    </div>

                    </div>

					<div class="hom-cont">

					                    <a href="<?=str_replace('/admin', '', base_url())?>contact-us" class="check-link1">Contact Us</a>

                    <a href="<?=str_replace('/admin', '', base_url())?>" class="check-link1">Home</a>

                </div>

                </div>

                <div class="col-md-5 right-pt" style="margin-top: 96px;">