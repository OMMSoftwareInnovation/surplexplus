<!DOCTYPE HTML>
<head>
<title>Surplex Plus</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">

<!-- CSS -->
<link href="<?php echo base_url(); ?>assets/css/common.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui.css" type="text/css">
<!-- JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/alert.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
            .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/
 
            /* workarounds */
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
 
            /* Menu
            ----------------------------------*/
            .ui-menu {
                list-style:none;
                padding: 2px;
                margin: 0;
                display:block;
                font-size: 13px !important;
            }
            .ui-menu .ui-menu {
                margin-top: -3px;
            }
            .ui-menu .ui-menu-item {
                margin:0;
                padding: 0;
                zoom: 1;
                float: left;
                clear: left;
                width: 100%;
                font-size:80%;
            }
            .ui-menu .ui-menu-item a {
                text-decoration:none;
                display:block;
                padding:.2em .4em;
                line-height:1.5;
                zoom:1;
            }
            .ui-menu .ui-menu-item a.ui-state-hover,
            .ui-menu .ui-menu-item a.ui-state-active {
                font-weight: normal;
                margin: -1px;
            }

            .ui-autocomplete {
                 z-index: 9999 !important;
            }
        </style>
</head>

<body>

                          
  <div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call" >
                 <p class="help"><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
            </div>
            <div class="account_desc">
                <div class="dropdown" style="float:right;">
                    <button class="dropbtn" style="height: unset;width: unset;padding: 0px;border: none;">
                        <i class="fa fa-bell-o"></i>
                    </button>
                    <div class="dropdown-content" style="right: 0;">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="<?php echo site_url('homecontroller/index'); ?>"><img class="logo-dime" src="<?php echo base_url(); ?>assets/images/logo.jpg" alt=""></a>
            </div>
              <div class="cart">
            
                <div class="container">
                    <div class="row">
                        <div id="custom-search-input">
                            <div class="input-group col-md-3 search-div">
                                <!-- <input type="text" class="  search-query form-control" placeholder="Search" /> -->
                                <input type="text" class="form-control" id="search-box" placeholder="Search ...">
                                <!-- <div style="width:520px;margin:3px -55px;">
                                  <select class="itemName form-control" style="width:500px" name="itemName"></select>
                                </div>
 -->                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <script type="text/javascript">
            function DropDown(el) {
                this.dd = el;
                this.initEvents();
            }
            DropDown.prototype = {
                initEvents : function() {
                    var obj = this;

                    obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        event.stopPropagation();
                    }); 
                }
            }

            $(function() {

                var dd = new DropDown( $('#dd') );

                $(document).click(function() {
                    // all dropdowns
                    $('.wrapper-dropdown-2').removeClass('active');
                });

            });

        </script>
     <div class="clear"></div>
  </div>
    <div class="header_bottom">
            <div class="menu" style="    width: 100%;margin-left: 0px;">
                <ul>
                    <li class="menu-li1">
                        <a class="menu-a1" style="border-left: none;" href="<?php echo site_url('homecontroller/index'); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i> &nbsp; Home
                        </a>
                    </li>

                    <li>
                        <div class="dropdown">
                          <button class="dropbtn"><i class="fa fa-gavel" aria-hidden="true"></i> &nbsp; Auctions</button>
                          <div class="dropdown-content">
                            <a href="<?php echo site_url('auctioncontroller/auction'); ?>">Industrial Auctions</a>
                            <a href="<?php echo site_url('auctioncontroller/auctionbycategory'); ?>">Auctions By Category</a>
                            <!-- <a href="<?php echo site_url('auctioncontroller/auctionbycategory'); ?>">Auctions By Category</a> -->
                            <a href="<?php echo site_url('auctioncontroller/closedauctions'); ?>">Closed Auctions</a>
                          </div>
                        </div>
                    </li>


                    <li class="menu-li1">
                        <a href="<?php echo site_url('salecontroller/saleproductlist'); ?>" align="center"><i class="fa fa-shopping-bag" aria-hidden="true"></i> &nbsp; For Sale
                        </a>
                    </li>
             

                    <?php
                    if($this->session->userdata('username'))
                    {
                    ?>

                    <li style="float: right;">
                        <div class="dropdown">
                          <button class="dropbtn" style="border-right: none;"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; My Account</button>
                          <div class="dropdown-content">
                            <a href="<?php echo site_url('homecontroller/profile'); ?>">My Profile</a>
                            <a href="<?php echo site_url('homecontroller/logout'); ?>">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>  &nbsp; Logout</a>
                          </div>
                        </div>
                    </li>  

                    <?php 
                    }
                    else
                    {
                    ?>
                    <li style="float: right;">
                        <a style="border: 0px !important;" href="<?php echo site_url('homecontroller/login'); ?>" align="center" class="menu-a2">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Login
                        </a>
                    </li>

                    <?php
                    }
                    ?>

                    <li style="float: right;"><a style="border-left: 1px solid #D4D4D4;" href="#" align="center" class="menu-a2"><i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; How it Works</a></li>

                    <div class="clear"></div>
                </ul>
            </div>
            <div class="clear"></div>
         </div>      
    
   </div>