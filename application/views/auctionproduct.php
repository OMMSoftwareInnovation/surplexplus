<style type="text/css">
	.product-details
	{
		margin: 0px 0;
	}
	.btn.btn-flat
	{
    	border-radius: 0;
	}
	.btn-danger
	{
		cursor: text;
	}
	.displaySection
	{
		border-right: 5px solid #f1f1f1 !important;
	}
    .labelformat
    {
        margin-left: -30px;
        margin-top: -20px;
    }
    .numberDisplay
    {
        font-size: 17px !important;
    }
	.td
	{
		font-size: 12px;
	    font-family: Verdana,Arial,Helvetica,sans-serif;
	    font-weight: bold;
	    width: 250px;
	    padding: 6px;
	}
</style>
<script src="<?php echo base_url(); ?>assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/global.css">
<script src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js"></script>
<link href="<?php echo base_url(); ?>assets/timer/css/jQuery.countdownTimer.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/timer/js/jQuery.countdownTimer.min.js"></script>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc" style="padding-right: 15px;padding-left: 15px; ">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container" style="display: block;">
									<a><img id="mainpic" src="<?php echo base_url(); ?>/files/<?php echo $product[0]['product_main_img'] ?>" alt=" " /></a>
								</div>
								<ul class="pagination">
									<?php 
									$imgs=$product[0]['product_imgs'];
									$img = explode(',',$imgs);
									for ($i=1; $i <count($img) ; $i++)
									{
									?>
									<li><a href="#"><img class="navigate" src="<?php echo base_url(); ?>/files/thumbnail/<?php echo $img[$i] ?>" alt=" " /></a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2" align="center" style="border: 1px solid #dfdfdf; margin-bottom: 5px;">
					<h2 style="font-size: 2em;"> <?php echo $product[0]['product_name']; ?> </h2>
					<p style="font-size: .9em;"> <?php echo $product[0]['product_summary']; ?> </p>
				</div>
			<div class="desc span_3_of_2">
                <div class="share-desc" style="padding: 34px 0 20px 0px;;min-height: 122px;border: 1px solid #d4d4d4;background-color: #f1f1f1;border-radius: 2px;">
                        <ul>
                            <li>
                                <div class="col-md-12">
                                    <div class="col-md-4" style="font-size: 14px;">    
                                        Current highest bid:
                                    </div>
                                    <div class="col-md-4" style="font-weight: bold;">    
                                         <span id="chb"></span>
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">    
                                        <span class="btn btn-danger btn-xs btn-flat"><span id="bidcount"></span> Bids</span>
                                    </div>
                                </div>
                            </li>
                            <br>
                            <br>
                            <li>
                                <div class="col-md-12">
                                    <div class="col-md-4" style="font-size: 14px;">    
                                        Your bid:
                                    </div>
                                    <div class="col-md-4" style="font-size: 14px;padding: 6px;margin-bottom: 6px;">
                                    	<input type="text" class="col-md-12 yourbid" placeholder="" name="number">
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">

									<?php
										if ($this->session->userdata('username')) 
										{
									?>
				                    <button class="btn btn-success btn-flat" id="addbid" style="background:#1da01d;;color:#fff;">Bid Now</button>
									<?php
									}
									else
									{
									?>
				                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-flat" style="background:#1da01d;;color:#fff;">Log In</button>
									<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content" style="text-align: left;">
										      <div class="modal-header" style="height: 52px;">
										        <h4 class="modal-title" style="text-align: center;" id="exampleModalLabel">To Purchase the item you have to <b>LOGIN</b></h4>
										        <button type="button" class="close" data-dismiss="modal" style="margin-top: -24px;" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      <div class="form-group">
											    <label for="exampleInputEmail1">Username</label>
											    <input type="text" name="username"  class="form-control" id="username" placeholder="Usename">
											  </div>
											  <div class="form-group">
											    <label for="exampleInputPassword1">Password</label>
											    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
											  </div>
											
										      </div>
										      <div class="modal-footer" style="margin-top: 46px;">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="button" id="login" class="btn btn-primary">Log In</button>
										      </div>
										    </div>
										  </div>
										</div>
				                    <?php } ?>

                                    </div>
                                    <div class="col-md-12 text-center" style="letter-spacing: 1px;font-style: italic;">[ Your next bid minimum Rs.<span id="nextbid"></span>]</div>
                                </div>
                            </li>                      
                        </ul>
                    <div class="clear"></div>
                <!-- </div>  

                <div class="share-desc" style="padding: 15px 0 20px 0px;min-height: 122px;border: 1px solid #d4d4d4;background-color: #f1f1f1;border-radius: 2px;"> -->
                	<hr/>
                        <ul>
                            <li>
                                <div class="col-md-12">
                                    <div class="col-md-7" style="font-size: 14px;">    
                                        <span>Closing time</span>
                                        <br>
                                        <br>
                                        <span style="display: none;font-size: 14px;font-weight: bold;padding: 0 12px 0 0;color: #b83636;font-family: Verdana,Arial,Helvetica,sans-serif;"><?php  $product[0]['auction_ed_time']; $aid=$product[0]['auction_id']; $pid=$product[0]['auction_item_id']; ?></span>
                            			<div id="countdowntimer"><span id="label_timer"></span></div>
                                    </div>
                                    <div class="col-md-5" style="text-align: right;margin-top: 35px;">
                                        <a href="#" id="refresh"><span style="background:#1da01d;;color:#fff;padding:10px 30px;border: none;font-size: 15px; font-weight: bold;">
                                        <i class="fa fa-refresh"></i> Refresh</span></a>
                                    </div>
                                </div>
                            </li>                
                        </ul>      
                    <div class="clear"></div>
                </div>
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li>Item Details</li>
					<li>Description</li>
					<div class="clear"></div>
				</ul>
				<div class="resp-tabs-container" style="margin-top: -11px;">
					<div class="product-tags">
                      <table class="">
                        <tr>
                          <td class="td">Item Name</td>
                          <td><?php echo $product[0]['p_name']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Manufacturer</td>
                          <td><?php echo $product[0]['p_manufacturer']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Model/Type</td>
                          <td><?php echo $product[0]['p_model_type']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Year of Manufacture</td>
                          <td><?php echo $product[0]['p_year_of_manufacture']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Machine Condition</td>
                          <td><?php echo $product[0]['p_machine_condition']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Machine Location</td>
                          <td><?php echo $product[0]['p_machine_location']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Weight</td>
                          <td><?php echo $product[0]['p_weight_approx']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Size/Dimensions</td>
                          <td><?php echo $product[0]['p_size_dimensions_approx']; ?></td>
                        </tr>
                      </table>
					</div>
					<div class="product-desc">
						<p><?php echo $product[0]['product_description']; ?></p>
					</div>
				</div>
			</div>
		</div>
   <div class="content_bottom">
    		<div class="heading">
    		<h3>Related Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
   <div class="section group">
   					    <div id="products" class="row list-group" style="    width: 832px; margin-left: 11.5%;">
                <?php
                // print_r($relateddata);
                // die();
                for ($i=0; $i <count($relateddata) ; $i++)
                {
                	if ($product[0]['product_id'] != $relateddata[$i]['product_id']) {
                  $mm="";
                  $img = $relateddata[$i]['product_imgs'];
                  $img1 = explode(",",$img);
                    if(count($img1)>1)
                    {
                    if( $img1[1]==$relateddata[$i]['product_main_img'])
                    {
                        $mm=(isset($img1[2]))? $img1[2]:$img1[1]; 
                    }else{
                       $mm=$img1[1]; 
        
                     }
                    }
                   //echo $img1[1];
                ?>
                <a href="<?php echo site_url('auctioncontroller/auctionproduct') ?>/<?php echo $relateddata[$i]['auction_item_id'] ?>">
			        <div class="item  col-xs-4 col-lg-4" style="width: 33.333333%;">
			            <div class="thumbnail" style="box-shadow: 0 1px 4px rgba(41,51,57,.5);">

			                <img class="group list-group-image" src="<?php echo base_url(); ?>/files/<?php echo $relateddata[$i]['product_main_img'] ?>" onMouseOver="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $mm; ?>');" onMouseOut="this.setAttribute('src', '<?php echo base_url(); ?>/files/<?php echo $relateddata[$i]['product_main_img'] ?>');" alt="" />

			                <div class="caption">
                            <h4 class="group inner list-group-item-heading" style="font-size: 13px; font-family: Verdana,Arial,Helvetica,sans-serif;">
                                <?php echo $relateddata[$i]['product_name']; ?></h4>
                            <hr style="margin-top: 0px;margin-bottom: 0px;">
                            <div class="row">
                                <?php
                                if ($relateddata[$i]['bidcount'] == '0')
                                {
                                ?>
                                    <div class="col-xs-12 col-md-12" align="center" style="padding-top: 4px;">
                                        <p class="lead" style="margin: 0px; font-size: 18px;color: #b81d22;color: #b81d22;">
                                          <span style="font-size: 13px;float: left;color: #3ac13a;font-family: Verdana,Arial,Helvetica,sans-serif;letter-spacing: 0.5px;">
                                            Starting Bid:
                                          </span>
                                          <span style="float: right;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;">
                                           Rs.<?php echo $relateddata[$i]['strating_bid_price']; ?>
                                          </span>
                                        </p>
                                    </div>
                                    <div class="col-xs-8 col-md-8" align="center">
                                      <h6 style="float: left;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        <?php
                                            $str = $product[0]['auction_ed_time'];
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
                                         Rs.<?php echo $relateddata[$i]['maxbid']; ?>
                                         </span>
                                        </p>
                                    </div>
                                    <div class="col-xs-8 col-md-8" align="center">
                                      <h6 style="float: left;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        <?php
                                            $str = $product[0]['auction_ed_time'];
                                            $str1 = explode(" ",$str);
                                            echo $str1[0]." &nbsp";
                                            $str2 = explode(":",$str1[1]);
                                            echo $str2[0].":".$str2[1];
                                        ?>
                                      </h6>
                                    </div>
                                    <div class="col-xs-4 col-md-4" align="center">
                                      <h6 style="float: right;margin-bottom: 0px;margin-top: 4px;font-family: Verdana,Arial,Helvetica,sans-serif;">
                                        <?php echo $relateddata[$i]['bidcount']; ?><?php echo  ($relateddata[$i]['bidcount']>1) ? " Bids" : " Bid" ;?>
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
            }
                ?>
            </div>
				<!-- <div class="grid_1_of_4 images_1_of_4">
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/pic2.jpg" alt=""></a>
					 <div class="price" style="border:none">
					       		<div class="add-cart" style="float:none">								
									<h4><a href="#">selling Price: Rs.5620.00</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/pic4.jpg" alt=""></a>
					<div class="price" style="border:none">
					       		<div class="add-cart" style="float:none">								
									<h4><a href="#">selling Price: Rs.5620.00</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="<?php echo base_url(); ?>assets/images/pic3.jpg" alt="">
					 <div class="price" style="border:none">
					       		<div class="add-cart" style="float:none">								
									<h4><a href="#">selling Price: Rs.5620.00</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div> -->
			</div>
        </div>
 	</div>
    </div>
 </div></div>


	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>

<span id="aaa" style="display: none;">
	<?php 
	$date = date_create($product[0]['auction_ed_time']);
	echo date_format($date, 'Y/m/d H:i:s') ;?>
</span>

<script type="text/javascript">
      
    $(function()
    {
        var ed = $("#aaa").text();
        
          $(function(){
      $("#label_timer").countdowntimer({
       dateAndTime : ed,
          labelsFormat : true,
          displayFormat : "DHMS",
          padZeroes : false,
          timeZone : +5.50,
          beforeExpiryTime : "00:00:03:25",
          beforeExpiryTimeFunction :  beforeExpiryFunc,
          timeUp : timeIsUp,
          borderColor:"#f1f1f1",
          backgroundColor:"#f1f1f1",
          size:"xs",
          fontColor:"#cd1f25"
          });
      function beforeExpiryFunc() {
          //Your code
             console.log("sdss");
      }
      function timeIsUp() {
     
          //Your code
      }                             
  });
    });
</script>

<script type="text/javascript">
$(document).ready(function() 
{
	$("#refresh").click(function()
	{
		location.reload();
	});
	$("#login").click(function()
	{
		var username = $("#username").val();
		var password = $("#password").val();
	
        $.ajax({
            url: "<?php echo site_url('salecontroller/user_login');?>",
            dataType: 'json',
            type: 'POST',
            data:
                 {
                    username:username,password:password
                 },
            success: function(dat) 
                {
                    if(dat=='false')
                    {
                    	alert('Authentication Failed!');
                    }
                    else
                    {
                     	window.setTimeout(function(){location.reload()},500);
                    }
                }
         });
	});

	var aid = <?php echo $aid; ?>;
	var pid = <?php echo $pid; ?>;
	//alert(inc+'--'+pid+'--'+aid);
    $.ajax({
        url: "<?php echo site_url('auctioncontroller/fetchbiddetails');?>",
        dataType: 'json',
        type: 'POST',
        data:
		{
			aid:aid,pid:pid
		},
        success: function(dat) 
        {
            $('#bidcount').text(dat.bidcount);
           	$('#chb').text('Rs.'+dat.chb);
           	var nextbid=parseInt(dat.chb)+parseInt(dat.inc);
           	$('#nextbid').text(+nextbid);
   		}
    });

	setInterval(function()
	{
	    $.ajax({
	        url: "<?php echo site_url('auctioncontroller/fetchbiddetails');?>",
	        dataType: 'json',
	        type: 'POST',
	        data:
			{
				aid:aid,pid:pid
			},
	        success: function(dat) 
	        {
            if (dat != "")
            {
              $('#bidcount').text(dat.bidcount);
              $('#chb').text('Rs.'+dat.chb);
              var nextbid=parseInt(dat.chb)+parseInt(dat.inc);
              $('#nextbid').text(+nextbid);
            }
	   		}
	    });
    },50000);

    $('input[name="number"]').keyup(function(e)
	{
	  if (/\D/g.test(this.value))
	  {
	    // Filter non-digits from input value.
	    this.value = this.value.replace(/\D/g, '');
	  }
	});

	$("#addbid").click(function()
	{
		var cbid=$('.yourbid').val();
		var mbid=$('#nextbid').text();
		var cnt =$('#bidcount').text()
		//alert(aid+'--'+pid);

		if (parseInt(cbid) >= parseInt(mbid))
		{
			swal({
			  title: "Are you sure?",
			  text: "Are you sure, you want to bid this item for Rs."+cbid+" ?",
			  icon: "success",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) =>
			{
			  if (willDelete)
			  {
				$.ajax({
					url: "<?php echo site_url('auctioncontroller/addbid');?>",
					dataType: 'json',
					type: 'POST',
					data:
					{
						aid:aid,pid:pid,cbid:cbid,cnt:cnt
					},
					success: function(dat) 
					{
						 console.log(dat);
						if (dat == "FALSE")
						{
							swal("Sorry! Current highest bid has been CHANGED!")
							.then((value) =>
							{
								$('.yourbid').text(mbid);
								$('.yourbid').focus();
							});
						}
						else
						{
							location.reload();
						}
					}
				});
			  }
			  else
			  {}
			});
		}
		else
		{
			swal("Your next bid minimum Rs." +mbid);
		}
	});

	$(".navigate").on('click',(function(e) 
    {
		var src=$(this).attr("src");
		$("#mainpic").attr("src", src);
    }));
});
</script>