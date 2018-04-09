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

	A buyer wants to purchase a machine which you had put up for sale.

	<a href=""><img src=""></a><!-- (Link to machine on website) -->    <?php echo $mname; ?>(Link to machine on website)

	Please click below to receive the details of all the buyers who are interested in this machine.

	<button type="submit">View</button>
	{Once clicked, popup should be displayed saying
	“Dear Seller,
	Please check your email inbox or the notifications tab in your Surplex Plus profile for the buyer details.”}

	Warm Regards,
	Team Surplex Plus
</p>
</body>
</html>