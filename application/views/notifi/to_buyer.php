<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<p>
	Hello <?php echo $user; ?>,
	<br>

	Thank you for your interest in the Item!
	<br>
	<a href="<?php echo site_url('salecontroller/onrequestsaleproduct/') ?><?php echo $pid ?>"><img src="<?php echo base_url()?>files/thumbnail/<?php echo $img ?>" style="width:100;height:100px";><?php echo $pname; ?></a>
	<br>

	We have sent your purchase request to the seller. We will get back to you shortly with the selling price of this Item as decided by the seller.
	<br>

	Meanwhile, you can check out the following Items that you may be interested in 
	<br>
	Warm Regards,
	<br>
	Team Surplex Plus
</p>
</body>
</html>