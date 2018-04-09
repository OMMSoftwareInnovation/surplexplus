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

	The seller has responded to your request for the Item you had selected with the quote given below –
	<br>
	<a href="<?php echo site_url('salecontroller/onrequestsaleproduct/') ?><?php echo $pid ?>"><img src="<?php echo base_url()?>files/thumbnail/<?php echo $img ?>" style="width:100;height:100px";></a><?php echo $mname; ?>
	<br>
	<b>Rs.<?php echo $price; ?></b>
	<br>

	Please click the button given below to accept this price and the seller will get in touch with you to take it further.
	<br>

	<form role="form" id="form1" method="post" action='<?php echo site_url('sellercontroller/updateorderstatusbybuyer1')?>'>
	<button type="submit"  name="id" value='<?php echo $oid ?>' form="form1">Accept </button> <?php echo $oid ?><br>
	</form>
	<br>
	Thank You! We will inform the seller of your acceptance of the quote.
	<br>
	Warm Regards,
	<br>
	Team Surplex Plus
</p>
</body>
</html>