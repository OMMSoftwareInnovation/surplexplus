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

	A buyer wants to purchase a Item which you had put up for sale.

	<a href=""><img src=""></a><!-- (Link to machine on website) -->    <?php echo $mname; ?>(Link to machine on website)   <Selling Price>

	Please click below to pay the <get percent> commission fee plus <get percent> GST and receive the details of all the buyers who are interested in this Item.

	<show calculation of amount to be paid>
	<commission fee % of selling price + GST % of the calculated commission value>

	<button type="submit">Pay</button>
	{Once paid, popup should be displayed saying
	“Thanks for the payment! Please check your email inbox or the notifications tab in your Surplex Plus profile for the buyer details.”}

	Warm Regards,
	Team Surplex Plus
</p>
</body>
</html>