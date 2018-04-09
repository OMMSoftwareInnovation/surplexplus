<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" type="text/css" media="all"/>
<div class="main">
		<div class="container login-ui">
			<div class="col-md-4 login-ui1">
			    <div class="panel panel-default">
			  <div class="panel-heading">
			  	<h3 class="panel-title" align="center">
			  		<strong>Forgot Password?</strong>
			  	</h3>
			  </div>
			  <div class="panel-body">
			  	<?php 
			  	if (isset($error)) 
			  	{
			  		print_r($error);
			  	}
			  	?>

			   <form role="form" method="post" action="<?php echo site_url('homecontroller/checkforgotpass'); ?>">

				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="email" name="email"  class="form-control" id="email" placeholder="Email">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputPassword1">Mobile</label>
				    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
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
				  		<button type="submit" class="btn btn-sm btn-default">Validate</button>
				  </div>
			  
			</form>
			  </div>
			</div>
			</div>
		</div>
	</div>
</div>