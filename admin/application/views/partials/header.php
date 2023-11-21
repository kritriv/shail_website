<?php

    $login_id = $this->session->userdata('login_id');

    $user_id = $this->session->userdata('user_id');

    $role_id = $this->session->userdata('role_id');

    $user_email = $this->session->userdata('user_email');

    $user_name = $this->session->userdata('user_name');

    $user_type = $this->session->userdata('usertype');

    $user_status = $this->session->userdata('userstatus');

    $user_role_name = $this->session->userdata('user_role_name');

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Shail - International Group | <?=ucwords($this->uri->segment(1));?></title>

  <link rel="icon" type="image/png" href="<?php echo base_url("asset/image/favicon.png"); ?>"/>

	<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />

    

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("asset/css/bootstrap-datetimepicker.min.css"); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("asset/css/main.css"); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("asset/css/creat.css"); ?>"/>        

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("asset/css/detail.css"); ?>"/> 

    <script type="text/javascript" src="<?php echo base_url("asset//js/bootstrap-datetimepicker.js"); ?>"></script>



    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>





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

        input[disabled], select[disabled], textarea[disabled], input[readonly], select[readonly], textarea[readonly] {

            cursor: not-allowed!important;

            background-color: #eeeeee;

        }

        .input-append .add-on, .input-append .btn, .input-append .btn-group {

            margin-left: -4px;

        }

        .input-append .add-on, .input-prepend .add-on {

            padding: 7px;

            background-color: #eeeeee;

            border: 1px solid #ccc;

        }

        .form-control-calender {

            width: 74%;

            height: calc(2.30rem + 1px);

            padding: .375rem .75rem;

            font-size: 1rem;

            color: #495057;

            background-color: #fff;

            background-clip: padding-box;

            border: 1px solid #ced4da;

            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;

        }

        .custom-combobox {

            position: relative;

            display: inline-block;

            width: 100px;

        }

        .custom-combobox-toggle {

            position: absolute;

            top: 0;

            bottom: 0px;

            margin-left: -1px;

            padding: 0;

        }

        .custom-combobox-input {

            margin: 0;

            padding: 6px 10px;

            width: 70px;

        }

    </style>



    <style type="text/css">

        li a{

            color:#fff;

        }

        .success-msg {

            width: auto;

            color: #009900;

            font-weight: bold;

        }

        .error-msg,.validationErrorMsg {

            width: auto;

            color: #990000;

            font-weight: bold;

        }

    </style> 

    <style type="text/css">

        #pass-info{

            height: 35px;

            /* margin-bottom: 20px; */

            /* border-radius: 4px; */

            color: #829CBD;

            padding: 5px;

            text-align: center;

            font: 12px/25px Arial, Helvetica, sans-serif;

        }

        #pass-info.weakpass{

            border: 1px solid #FF9191;

            background: #FFC7C7;

            color: #94546E;

            text-shadow: 1px 1px 1px #FFF;

        }

        #pass-info.stillweakpass {

            border: 1px solid #FBB;

            background: #FDD;

            color: #945870;

            text-shadow: 1px 1px 1px #FFF;

        }

        #pass-info.goodpass {

            border: 1px solid #C4EEC8;

            background: #E4FFE4;

            color: #51926E;

            text-shadow: 1px 1px 1px #FFF;

        }

        #pass-info.strongpass {

            border: 1px solid #6ED66E;

            background: #79F079;

            color: #348F34;

            text-shadow: 1px 1px 1px #FFF;

        }

        #pass-info.vrystrongpass {

            border: 1px solid #379137;

            background: #48B448;

            color: #CDFFCD;

            text-shadow: 1px 1px 1px #296429;

        }

    </style> 

    <style type="text/css"> .line-through{ text-decoration: line-through!important; } </style>

    <script type="text/javascript">

        function fire(col) {

            var v = col || 0;

            $('.table tr > *:nth-child('+v+')').toggle();

            $('#toggleTrough'+col).toggleClass('line-through');

        }

    </script>       

</head>

<body>	

	<div id="loading-img"></div>	

    <div id="dialog_message" style="display: none; position: relative;"></div>

    <div class="buyr-listt">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-1 col-sm-1">

                    <div class="side-barr" id="mobiiu">

					 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                        <h1> <i class="fa fa-bars" onclick="openNav()"></i></h1>

                        <ul>

                            <!--<li class="hov"><a href="<?=base_url('dashboard');?>">

                                <img src="<?=base_url('asset/image/headerimage/Dashboard.png') ?>" width="30px" height="30px"/>  <span class="shw">Dashboard</span></a>

                            </li>-->

                            <?php  $menuArray = $this->session->userdata('displayModule'); ?>
                            <?php  $packexpire = $this->session->userdata('packexpire');?>
                            <?php if($role_id !='1'){ ?>
                            <?php   foreach ($menuArray as $key => $value) { ?>

                                <?php if($value['presence'] =='1'){ ?>

                                        <li class="hov4"><img src="<?=base_url('asset/image/headerimage/'.$value['icon']) ?>" width="30px" height="30px"/></i> 

                                            <span class="shw4"><?=$value['modulelabel']?></span>

                                            <ul class="inn-ord">

                                            <?php   $subMenuArray = $this->session->userdata('displaySubModule'); //var_dump($subMenuArray)?>

                                            <?php   foreach ($subMenuArray as $keySubMenu => $valueSubmenu) { ?>

												<?php   if($value['moduleid'] == $valueSubmenu['moduleid']){ ?>

														<li><a href="<?=base_url($value['modulename'].'/'.$valueSubmenu['slug']);?>"> 

                                                            <img src="<?=base_url('asset/image/headerimage/'.$valueSubmenu['icon'])?>" width="30px" height="30px"/>

                                                            <?=$valueSubmenu['submodule']?>

                                                            </a>

                                                        </li>

														<?php   } ?>

												<?php   }   ?>

                                            

                                            <?php $subModulearray = $this->session->userdata('subModule'); //var_dump($SubModulearray )?>

                                            <?php   foreach ($subModulearray as $keySubModule => $valueSubmodule) { //var_dump($valueSubmodule)?>

                            					<?php   if($value['moduleid'] == $valueSubmodule['parentid']){ ?>

                            				        <li><a href="<?=base_url($valueSubmodule['modulename']);?>">

                                                        <img src="<?=base_url('asset/image/headerimage/'.$valueSubmodule['icon']) ?>" width="30px" height="30px"/>

                                                        <?=$valueSubmodule['modulelabel']?>

                                                        </a>

                                                    </li>

                            					<?php   } ?>

                            				<?php   }   ?>

                                            </ul>

                                        </li>

                                <?php   }else{  ?>

                                    <li class="hov3"><a href="<?=base_url($value['modulename']);?>">

                                        <img src="<?=base_url('asset/image/headerimage/'.$value['icon']) ?>" width="30px" height="30px"/><span class="shw3"><?=$value['modulelabel']?></span></a></li>

                                <?php   } ?>

                            <?php   }  ?>
                            <?php }else{ ?>
                             <?php   foreach ($menuArray as $key => $value) { ?>

                                <?php if($value['presence'] =='1'){ ?>

                                        <li class="hov4"><img src="<?=base_url('asset/image/headerimage/'.$value['icon']) ?>" width="30px" height="30px"/></i> 

                                            <span class="shw4"><?=$value['modulelabel']?></span>

                                            <ul class="inn-ord">

                                            <?php   $subMenuArray = $this->session->userdata('displaySubModule'); //var_dump($subMenuArray)?>

                                            <?php   foreach ($subMenuArray as $keySubMenu => $valueSubmenu) { ?>

												<?php   if($value['moduleid'] == $valueSubmenu['moduleid']){ ?>

														<li><a href="<?=base_url($value['modulename'].'/'.$valueSubmenu['slug']);?>"> 

                                                            <img src="<?=base_url('asset/image/headerimage/'.$valueSubmenu['icon'])?>" width="30px" height="30px"/>

                                                            <?=$valueSubmenu['submodule']?>

                                                            </a>

                                                        </li>

														<?php   } ?>

												<?php   }   ?>

                                            

                                            <?php $subModulearray = $this->session->userdata('subModule'); //var_dump($SubModulearray )?>

                                            <?php   foreach ($subModulearray as $keySubModule => $valueSubmodule) { //var_dump($valueSubmodule)?>

                            					<?php   if($value['moduleid'] == $valueSubmodule['parentid']){ ?>

                            				        <li><a href="<?=base_url($valueSubmodule['modulename']);?>">

                                                        <img src="<?=base_url('asset/image/headerimage/'.$valueSubmodule['icon']) ?>" width="30px" height="30px"/>

                                                        <?=$valueSubmodule['modulelabel']?>

                                                        </a>

                                                    </li>

                            					<?php   } ?>

                            				<?php   }   ?>

                                            </ul>

                                        </li>

                                <?php   }else{  ?>

                                    <li class="hov3"><a href="<?=base_url($value['modulename']);?>">

                                        <img src="<?=base_url('asset/image/headerimage/'.$value['icon']) ?>" width="30px" height="30px"/><span class="shw3"><?=$value['modulelabel']?></span></a></li>

                                <?php   } ?>

                            <?php   }  ?>
                            <?php } ?>
                        </ul>

                    </div>

                </div>

                <div class="col-md-11">

                    <div class="banner">

                        <ul><?php if(isset($user_name) && !empty($user_name)){ ?>

                            <li><a  href="#"><?=$user_name;?></a></li>

                            <!--<li><a href="<?=str_replace('/admin', '', base_url())?>">View Site</a></li>--> 

                            <li><a href="<?=str_replace('/admin', '', base_url()).'login-redirect.php?login_id='.$login_id.'&key='.$user_id.'&email='.$user_email.'&role_id='.$role_id?>">View Site</a></li>

                            <?php } ?>

                            <li><a href="<?=base_url('profile')?>"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
                           
                            <li><a href="<?=base_url('logout')?>"><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a></li>
                        </ul>
                        <h3><a href="<?=str_replace('/admin', '', base_url())?>"> 
	                        <img src="<?php echo base_url(); ?>asset/image/logo2.png" style="width: 180px;"></a>
                    </div>

                    <script>

                        function openNav() {

                          document.getElementById("mobiiu").style.width = "80px",

                          document.getElementById("mobiiu").style.opacity= "1";

                        }



                        function closeNav() {

                          document.getElementById("mobiiu").style.width = "0",

                           document.getElementById("mobiiu").style.opacity = "0";

                        }

                    </script>