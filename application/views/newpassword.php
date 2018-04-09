<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" type="text/css" media="all"/>
<div class="main">
		<div class="container login-ui">
			<div class="col-md-4 login-ui1">
			    <div class="panel panel-default">
			  <div class="panel-heading">
			  	<h3 class="panel-title" align="center">
			  		<strong>Confirm Password!</strong>
			  	</h3>
			  </div>
			  <div class="panel-body">
			  	
			   <form role="form" method="post" action="<?php echo site_url('homecontroller/updatepassword'); ?>">

				  <div class="form-group" style="display: none;">
				    <label for="exampleInputEmail1">Type</label>
				    <input type="text" name="type"  class="form-control" id="type" value="<?php echo $type; ?>">
				  </div>
				  <div class="form-group" style="display: none;">
				    <label for="exampleInputEmail1">ID</label>
				    <input type="text" name="id"  class="form-control" id="id" value="<?php echo $id; ?>">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Password</label>
				    <input type="password" name="password"  class="form-control" id="password" placeholder="Password">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputPassword1">Confirm Password</label>
				    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
				  </div>

				  <div class="form-group">
				  		<button type="submit" class="btn btn-sm btn-default">Confirm</button>
				  </div>
			  
			</form>
			  </div>
			</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {

        var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
	});
</script>