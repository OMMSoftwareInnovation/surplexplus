
<script src="<?php echo base_url(); ?>assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/global.css">
<script src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js"></script>
<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/smoothproducts.min.js"></script>
	<script type="text/javascript">
	/* wait for images to load */
	$(window).load(function() {
		$('.sp-wrap').smoothproducts();
	});
	</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/smoothproducts.css">
	<!-- Demo CSS (don't use) -->
	<style type="text/css">
	.button {
		text-decoration: none;
		color: #F0353A;
		border: 2px solid #F0353A;
		padding: 6px 10px;
		display: inline-block;
		font-size: 18px;
	}
	.button:hover {
		background: #F0353A;
		color: #fff;
	}
	.demo {
		text-align: center;
		padding: 30px 0
	}
	.clear {
		clear: both;
	}
	h1 {
		font-size: 2em;
		line-height: 1.5em;
		margin: 20px 0;
		font-weight: normal;
	}
	.td
	{
		font-size: 12px;
	    font-family: Verdana,Arial,Helvetica,sans-serif;
	    font-weight: bold;
	    width: 250px;
	    padding: 6px;
	}
	.td1
	{
		font-family: Verdana,Arial,Helvetica,sans-serif;
		font-size: 12px;
	}
	.td2
	{
		font-family: Verdana,Arial,Helvetica,sans-serif !important;
		font-size: 12px !important;
		color: #333 !important;
	}
	.sp-thumbs a:link
	{
		opacity: 0.8;
	}
	</style>
  <style type="text/css">
	/* carousel */
.media-carousel 
{
  margin-bottom: 0;
  padding: 0 40px 30px 40px;
  margin-top: 30px;
}
/* Previous button  */
.media-carousel .carousel-control.left 
{
  left: -12px;
  background-image: none;
  background: none repeat scroll 0 0 #222222;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 83px;
}
/* Next button  */
.media-carousel .carousel-control.right 
{
  right: -12px !important;
  background-image: none;
  background: none repeat scroll 0 0 #222222;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 83px;
}
/* Changes the position of the indicators */
.media-carousel .carousel-indicators 
{
  right: 50%;
  top: auto;
  bottom: 0px;
  margin-right: -19px;
}
/* Changes the colour of the indicators */
.media-carousel .carousel-indicators li 
{
  background: #c0c0c0;
}
.media-carousel .carousel-indicators .active 
{
  background: #333333;
}
.media-carousel img
{
  width: 250px;
  height: 100px
}
	.td
	{
		font-size: 12px;
	    font-family: Verdana,Arial,Helvetica,sans-serif;
	    font-weight: bold;
	    width: 250px;
	    padding: 6px;
	}
/* End carousel */
</style>
 <div class="main">
    <div class="content">

    	<div class="section group">
				<div class="cont-desc span_1_of_2" style="width: 100%;">
				  <div class="product-details">				

					<div class="sp-wrap">
					<?php
					$str = $productdata[0]['product_imgs'];
					$img = explode(",",$str);
					for ($i=1; $i <count($img) ; $i++)
					{
					?>

					<a href="<?php echo base_url(); ?>files/<?php echo $img[$i]; ?>" target="_blank"><img src="<?php echo base_url(); ?>files/thumbnail/<?php echo $img[$i]; ?>" alt=" " /></a>

					<?php
					}
					?>

				</div>

				<div class="desc span_3_of_2" align="center" style="border: 1px solid #dfdfdf;min-height: 310px;">
					<h2 style="font-size: 2em;"> <?php echo $productdata[0]['product_name']; ?> </h2>
					<p style="font-size: .9em;"> <?php echo $productdata[0]['product_summary']; ?> </p>

					<?php
						if ($this->session->userdata('username')) 
						{
					?>
					<form role="form" class="form-horizontal" method="post" action="<?php echo site_url('salecontroller/addorder'); ?>">
						<input type="text" name="id" value="<?php echo $productdata[0]['product_id']; ?>" style="display: none;">
						<input type="text" name="name" value="<?php echo $productdata[0]['product_name']; ?>" style="display: none;">
						<input type="text" name="price" value="00" style="display: none;">
						<input type="text" name="seller" value="<?php echo $productdata[0]['seller_id']; ?>" style="display: none;">
						<button type="submit" class="btn btn-primary btn-sm" id="seller_submit"  style="background:#1da01d;;color:#fff;padding:8px 30px;border-radius: 2px;border: none;font-size: 15px; font-weight: bold; text-decoration: none;">On Request!</button>
					</form>
					<?php
						}
						else
						{
					?>
					<h5 style="font-family: 'ambleregular';padding: 11px;background: #dfdfdf;">If u want to purchase the product,you have to LOGIN!</h5>
					<a href="#" >
						<span data-toggle="modal" data-target="#exampleModal" style="background:#1da01d;;color:#fff;padding:10px 30px;border-radius: 2px;border: none;font-size: 15px; font-weight: bold; text-decoration: none;">On Request
						</span>
					</a>
					
					<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title" style="" id="exampleModalLabel">To Purchase the item you have to <b>LOGIN</b></h4>
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
						      <div class="modal-footer" style="">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="button" id="login" class="btn btn-primary">Log In</button>
						      </div>
						    </div>
						  </div>
						</div>

					<?php
						}
					?>
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
                          <td class="td1"><?php echo $productdata[0]['product_name']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Manufacturer</td>
                          <td class="td1"><?php echo $productdata[0]['p_manufacturer']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Model/Type</td>
                          <td class="td1"><?php echo $productdata[0]['product_type']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Year of Manufacture</td>
                          <td class="td1"><?php echo $productdata[0]['p_year_of_manufacture']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Machine Condition</td>
                          <td class="td1"><?php echo $productdata[0]['p_machine_condition']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Machine Location</td>
                          <td class="td1"><?php echo $productdata[0]['p_machine_location']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Weight</td>
                          <td class="td1"><?php echo $productdata[0]['p_weight_approx']; ?></td>
                        </tr>
                        <tr>
                          <td class="td">Size/Dimensions</td>
                          <td class="td1"><?php echo $productdata[0]['p_size_dimensions_approx']; ?></td>
                        </tr>
                      </table>
					</div>
					<div class="product-desc">
						<p><?php echo $productdata[0]['product_description']; ?></p>
					</div>
				</div>
			</div>
		</div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
   <div class="content_bottom" style="padding: 0px;">
    		<div class="heading" style="text-align: center;float: none;">
    		<h3 style="margin-top: 9px;padding: 6px;">Related Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
 
<div class="section group">
<div class="container">
  <div class='row'>
    <div class='col-md-8' style="width: 89%;">
      <div class="carousel slide media-carousel" id="media">
        <div class="carousel-inner">
          
          <?php
                  $cnt=0;
                  $abc="";
            	for ($i=0; $i <(count($relateddata)) ; $i++) 
            	{
            		if($cnt==0){
                       $abc="active";
            		}else{
            			$abc=" ";
            		}
            	?>

				<div class="item <?php echo $abc; ?>">
                <?php 
                    if ($relateddata[$i]['product_type'] == '1') 
                    {
                ?>
                     <a href="<?php echo site_url('salecontroller/pricedsaleproduct');?>/<?php echo $relateddata[$i]['product_id']?>">

                <?php
                    }
                    else
                    {
                ?>
                    <a href="<?php echo site_url('salecontroller/onrequestsaleproduct');?>/<?php echo $relateddata[$i]['product_id']?>">

                <?php
                    }
                 ?>

                 <!-- related product -->
                  <div class="grid_1_of_4 images_1_of_4" style="margin-left: 150px;">
                
            	 <img src="<?php echo base_url(); ?>files/thumbnail/<?php echo $relateddata[0]['product_main_img'] ?>" alt=" ">
				 <h4><?php echo substr($relateddata[$i]['product_name'],0,15).'...'; ?></h4>
					 <div class="price" style="border:none">
					       		<div class="add-cart" style="float:none">								
									<h4 ><a href="#">View</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				</a>
				</div>
                
				<?php
				$cnt++;
				}
				?>
        </div>
        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
        <a data-slide="next" href="#media" class="right carousel-control">›</a>
      </div>                          
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() 
	{
	  $('#media').carousel({
	    pause: true,
	    interval: false,
	  });
	});
</script>
        </div>
 		</div>
 	</div>
    </div>
 </div>

<script type="text/javascript">
	$(document).ready(function() 
	{
    	$("#login").click(function()
    	{
			var username = $("#username").val();
			var password = $("#password").val();
			var type = $("#type").val();

            $.ajax({
                url: "<?php echo site_url('salecontroller/user_login');?>",
                dataType: 'json',
                type: 'POST',
                data:
                     {
                        username:username,password:password,type:type
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
	});
</script>