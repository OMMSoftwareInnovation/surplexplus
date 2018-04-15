<style type="text/css">
.ab:hover 
{
    background-color: #f1f1f1 !important;
}
.thumbnail
{
    box-shadow: 0 1px 4px rgba(41,51,57,.5);
    font-family: Verdana,Arial,Helvetica,sans-serif;
}
</style><style type="text/css">
        
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
              .thumbnail:hover{
   /*opacity: 1;
    box-shadow: 0px -1px 12px 3px #d4d4d4;*/
    box-shadow: 0 3px 10px rgba(41,51,57,.55);
  }
  .item.list-group-item {
    float: none;
    width: 96.2%;
    background-color: #fff;
    margin-bottom: 10px;
    margin-left: 16px;
}
.item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover {
    background: #eeeeee;
}
  hr
  {
    border-top: 1px solid #d4d4d4;
  }
</style>
 <div class="main">

<div class="row">
	<div class="col-md-12">

			<div class="header_bottom_left">				
				<div class="categories">
				  <ul style="margin-top: -20px;    margin-bottom: 0px;">
				  	<h3 align="center" style="letter-spacing: 1px;">Auction Catagories</h3>
            <div class="dropdown open" style="width: 263px;">
                <?php echo $this->multi_menu->render('Item-0', array('Item-3', 'Item-5')); ?>
            </div>
				  </ul>
				</div>					
	  	     </div>

		<div class="col-md-9">

 
		<div>
			<!-- <div class="well well-sm" style="border-radius: 1px;">
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
		    </div> -->
		    <div id="products" class="row list-group" style="">
          <?php 
          for ($i=0; $i <count($items) ; $i++)
          {
              $mm="";
              $img = $items[$i]['product_imgs'];
              $img1 = explode(",",$img);
                if(count($img1)>1)
                {
                if( $img1[1]==$items[$i]['product_main_img'])
                {
                    $mm=(isset($img1[2]))? $img1[2]:$img1[1]; 
                }else{
                   $mm=$img1[1]; 
    
                 }
                }
          ?>
          	<a href="<?php echo site_url('auctioncontroller/auctionproduct') ?>/<?php echo $items[$i]['auction_item_id'] ?>">
      	        <div class="item  col-xs-4 col-lg-4" style="width: 33.333333%;">
      	            <div class="thumbnail" >
      	                <img class="group list-group-image" src="<?php echo base_url(); ?>/files/<?php echo $items[$i]['product_main_img'] ?>" onMouseOver="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $mm; ?>');" onMouseOut="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $items[$i]['product_main_img'] ?>');" alt="" />
                        
      	                <div class="caption">
      	                    <h4 class="group inner list-group-item-heading" style="font-size: 13px; font-family: Verdana,Arial,Helvetica,sans-serif;">
      	                        <?php  
                                $length=strlen($items[$i]['product_name']);
                                            if ($length>35)
                                            {
                                               // echo word_limiter($name, 4);
                                                echo substr($items[$i]['product_name'],0,40)."...";
                                            }
                                            else
                                            {
                                                echo $items[$i]['product_name'];
                                            }?></h4>
      	                    <hr style="margin-top: 0px;margin-bottom: 0px;">
      	                    <div class="row">
                                <?php
                                if ($items[$i]['bidcount'] == '0')
                                {
                                ?>
                                    <div class="col-xs-12 col-md-12" align="center" style="padding-top: 4px;">
                                        <p class="lead" style="margin: 0px; font-size: 18px;color: #b81d22;color: #b81d22;">
                                          <span style="font-size: 13px;float: left;color: #3ac13a;font-family: Verdana,Arial,Helvetica,sans-serif;letter-spacing: 0.5px;">
                                            Starting Bid:
                                          </span>
                                          <span style="float: right;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;">
                                           Rs.<?php echo $items[$i]['strating_bid_price']; ?>
                                          </span>
                                        </p>
                                    </div>
                                    <div class="col-xs-8 col-md-8" align="center">
                                      <h6 style="float: left;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        <?php
                                            $str = $items[$i]['auction_ed_time'];
                                            $str1 = explode(" ",$str);
                                            echo $str1[0]." &nbsp";
                                            $str2 = explode(":",$str1[1]);
                                            echo $str2[0].":".$str2[1];
                                        ?>
                                      </h6>
                                    </div>
                                    <div class="col-xs-4 col-md-4" align="center">
                                      <h6 style="float: right;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        0 Bid
                                      </h6>
                                    </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <div class="col-xs-12 col-md-12" align="center" style="padding-top: 4px;">
                                        <p class="lead" style="margin: 0px; font-size: 18px;color: #b81d22;color: #b81d22;">
                                          <span style="font-size: 13px;float: left;color: #3ac13a;font-family: Verdana,Arial,Helvetica,sans-serif;letter-spacing: 0.5px;">
                                          Highest Bid:
                                        </span>
                                        <span style="float: right;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;">
                                         Rs.<?php echo $items[$i]['maxbid']; ?>
                                         </span>
                                        </p>
                                    </div>
                                    <div class="col-xs-8 col-md-8" align="center">
                                      <h6 style="float: left;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        <?php
                                            $str = $items[$i]['auction_ed_time'];
                                            $str1 = explode(" ",$str);
                                            echo $str1[0]." &nbsp";
                                            $str2 = explode(":",$str1[1]);
                                            echo $str2[0].":".$str2[1];
                                        ?>
                                      </h6>
                                    </div>
                                    <div class="col-xs-4 col-md-4" align="center">
                                      <h6 style="float: right;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        <?php echo $items[$i]['bidcount']; ?><?php echo  ($items[$i]['bidcount']>1) ? " Bids" : " Bid" ;?>
                                      </h6>
                                    </div>
                                <?php
                                }
                                ?>
        			              </div>
      	                </div>
      	            </div>
      	        </div>
              </a>
          <?php
          }
          ?>
        </div>
</div>
</div>
</div>
</div>

 </div>
</div>