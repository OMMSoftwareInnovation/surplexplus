<?php
if ($this->session->userdata('logged_in') == TRUE)
{
	header("Location: ".base_url()."");
}
?>
<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" type="text/css" media="all"/>
<div class="main">
		<div class="container login-ui">
			<div class="col-md-4 login-ui1">
			    <div class="panel panel-default">
			  <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
			  <div class="panel-body">
			  	<?php 
			  	if (isset($error)) 
			  	{
			  		print_r($error);
			  	}
			  	?>

			   <form role="form" method="post" action="<?php echo site_url('homecontroller/user_login'); ?>">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" name="username"  class="form-control" id="username" placeholder="Usename">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password <a href="<?php echo site_url('homecontroller/forgotpassword'); ?>">(forgot password)</a></label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
				  </div>
				  <div class="form-group">
				  	<div class="col-md-12">
				  	<div class="col-md-4 col-md-41">
				  		<label class="login-ui2">Buyer</label>
				  	</div>
				  	<div class="col-md-4">
					<label class="switch col-md-42">
					  <input type="checkbox"  name="type"  value="ON">
					  <span class="slider round"></span>
					</label>
					</div>
				  	<div class="col-md-4 col-md-41">
				  		<label class="login-ui2">Seller</label>
				  	</div>
				  	</div>
				  </div>
				  <div class="form-group">
				  		<button type="submit" class="btn btn-sm btn-default">Sign in</button>
				  </div>
			</form>
			<hr>
				<div class="form-group" align="center">
				    <label for="exampleInputEmail1">Not a customer yet?</label>
				    <br>
					<button type="submit" id="submit" class="btn btn-sm btn-default" style="margin-left: 0px;">To Registration</button>
				</div>

			  </div>
			</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() 
	{
    	$("#submit").click(function()
    	{
        	swal("", 
        	{
			  buttons: 
			  {
			    catch1: 
			    {
			      text: "Register As Buyer"
			    },
			    catch2: 
			    {
			      text: "Register As Seller"
			    }
			  },
			})

			.then((value) => 
			{
			  switch (value) 
			  {
			  
			    case "catch1":
			      window.location.href = "<?php echo site_url('homecontroller/buyer_registraion_view'); ?>";
			      break;
			    case "catch2":
			      window.location.href = "<?php echo site_url('homecontroller/seller_registraion_view'); ?>";
			      break;
			  }
			});
    	}); 
	});
</script>