<style type="text/css">
.ab:hover 
{
    background-color: #f1f1f1 !important;
}

</style>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -6px;
                margin-left: -1px;
                -webkit-border-radius: 0 6px 6px 6px;
                -moz-border-radius: 0 6px 6px;
                border-radius: 0 6px 6px 6px;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>a:after {
                display: block;
                content: " ";
                float: right;
                width: 0;
                height: 0;
                border-color: transparent;
                border-style: solid;
                border-width: 5px 0 5px 5px;
                border-left-color: #ccc;
                margin-top: 5px;
                margin-right: -10px;
            }

            .dropdown-submenu:hover>a:after {
                border-left-color: #fff;
            }

            .dropdown-submenu.pull-left {
                float: none;
            }

            .dropdown-submenu.pull-left>.dropdown-menu {
                left: -100%;
                margin-left: 10px;
                -webkit-border-radius: 6px 0 6px 6px;
                -moz-border-radius: 6px 0 6px 6px;
                border-radius: 6px 0 6px 6px;
            }
        </style>
 <div class="main">

<div class="row">
	<div class="col-md-12">

			<div class="header_bottom_left">				
				<div class="categories">
				  <ul style="margin-top: -20px;    margin-bottom: 0px;">
				  	<h3 align="center" style="letter-spacing: 1px;">Catagories</h3>

                <div class="dropdown open" style="width: 263px;">
            <?php echo $this->multi_menu->render('Item-0', array('Item-3', 'Item-5')); ?>
        </div>
				  </ul>
				</div>					
	    </div>

		<div class="col-md-9">
 
		<div>
			<div class="well well-sm" style="border-radius: 1px;">
			<div class="container" style=" width: 304px; float: left;">
				<div class="row">
					<div class="dropdown">
					   <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 160px;">
					    <span style="float: left;">Sort By</span>
					    <span class="caret" style="float: right; margin-top: 8px;"></span>
					   </button>
					   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="#">Name</a></li>
					    <li><a href="#">Location</a></li>
					    <li><a href="#">Number Of Bids</a></li>
					    <!-- <li role="separator" class="divider"></li> -->
					    <li><a href="#">Current Bid</a></li>
					    <li><a href="#">Closing Time</a></li>
					   </ul>
					</div>
				</div>
			</div>
		        <strong>View: </strong>
		        <div class="btn-group">
		            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
		            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
		                class="glyphicon glyphicon-th"></span>Grid</a>
		        </div>
		    </div>
    
		    <div id="products" class="row list-group" style="    width: 832px; margin-left: 13px;">
    	<a href="<?php echo site_url('salecontroller/pricedsaleproduct') ?>">
	        <div class="item  col-xs-4 col-lg-4" style="width: 30.333333%;">
	            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">
	                <img class="group list-group-image" src="<?php echo base_url(); ?>assets/images/pic8.jpg" alt="" />
	                <div class="caption">
	                	
	                    <h4 class="group inner list-group-item-heading" style="font-size: 12px; font-family: Verdana,Arial,Helvetica,sans-serif;">
	                        WALDRICH-SIEGEN WST IV H80 x 12000 Roll Grinding Machine</h4>
	                    <hr style="margin-top: 0px;margin-bottom: 0px;">
	                    <div class="row">
	                        <div class="col-xs-12 col-md-12" align="center">
	                            <p class="lead" style="margin: 0px; font-size: 18px;">
	                                <span style="font-size: 15px;color: #3ac13a;">Selling Price:</span> Rs.5620.00
	                            </p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </a>
                <a href="<?php echo site_url('salecontroller/onrequestsaleproduct') ?>">
        <div class="item  col-xs-4 col-lg-4" style="width: 30.333333%;">
            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">
                <img class="group list-group-image" src="<?php echo base_url(); ?>assets/images/pic9.jpg" alt="" />
                <div class="caption">
                	
                    <h4 class="group inner list-group-item-heading" style="font-size: 12px; font-family: Verdana,Arial,Helvetica,sans-serif;">
                        WALDRICH-SIEGEN WST IV H80 x 12000 Roll Grinding Machine</h4>
                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" align="center">
                            <p class="lead" style="margin: 0px; font-size: 18px;">
                                Price On Request!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div></a>
        <div class="item  col-xs-4 col-lg-4" style="width: 30.333333%;">
            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">
                <img class="group list-group-image" src="<?php echo base_url(); ?>assets/images/pic8.jpg" alt="" />
                <div class="caption">
                	
                    <h4 class="group inner list-group-item-heading" style="font-size: 12px; font-family: Verdana,Arial,Helvetica,sans-serif;">
                        WALDRICH-SIEGEN WST IV H80 x 12000 Roll Grinding Machine</h4>
                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" align="center">
                            <p class="lead" style="margin: 0px; font-size: 18px;">
                                <span style="font-size: 15px;color: #3ac13a;">Selling Price:</span> Rs.5620.00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item  col-xs-4 col-lg-4" style="width: 30.333333%;">
            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">
                <img class="group list-group-image" src="<?php echo base_url(); ?>assets/images/pic9.jpg" alt="" />
                <div class="caption">
                	
                    <h4 class="group inner list-group-item-heading" style="font-size: 12px; font-family: Verdana,Arial,Helvetica,sans-serif;">
                        WALDRICH-SIEGEN WST IV H80 x 12000 Roll Grinding Machine</h4>
                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" align="center">
                            <p class="lead" style="margin: 0px; font-size: 18px;">
                                Price On Request!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item  col-xs-4 col-lg-4" style="width: 30.333333%;">
            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">
                <img class="group list-group-image" src="<?php echo base_url(); ?>assets/images/pic8.jpg" alt="" />
                <div class="caption">
                	
                    <h4 class="group inner list-group-item-heading" style="font-size: 12px; font-family: Verdana,Arial,Helvetica,sans-serif;">
                        WALDRICH-SIEGEN WST IV H80 x 12000 Roll Grinding Machine</h4>
                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" align="center">
                            <p class="lead" style="margin: 0px; font-size: 18px;">
                                <span style="font-size: 15px;color: #3ac13a;">Selling Price:</span> Rs.5620.00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item  col-xs-4 col-lg-4" style="width: 30.333333%;">
            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">
                <img class="group list-group-image" src="<?php echo base_url(); ?>assets/images/pic9.jpg" alt="" />
                <div class="caption">
                	
                    <h4 class="group inner list-group-item-heading" style="font-size: 12px; font-family: Verdana,Arial,Helvetica,sans-serif;">
                        WALDRICH-SIEGEN WST IV H80 x 12000 Roll Grinding Machine</h4>
                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" align="center">
                            <p class="lead" style="margin: 0px; font-size: 18px;">
                                Price On Request!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

 </div>
</div>