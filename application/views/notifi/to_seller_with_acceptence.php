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

	Congratulations! A buyer has accepted the quote for your Item.

	<a href=""><img src=""></a><!-- (Link to machine on website) -->    <?php echo $mname; ?>(Link to machine on website)
	<Quote>

	Please click below to pay the <get percent> commission fee plus <get percent> GST and receive the details of all the buyers who are interested in this Item.

	<show calculation of amount to be paid>
	<commission fee % of selling price + GST % of the calculated commission value*>
	{*Your commission could have changed if another buyer has accepted a higher quote sent by you. In such a case, on payment of commission, you shall receive details of all buyers that have accepted a quote from you.}

	<button type="button">Pay</button>
	{Once paid, popup should be displayed saying
	“Thank You! Please check your email inbox or the notifications tab in your Surplex Plus profile for the buyer details.”}

	Warm Regards,
	Team Surplex Plus
</p>
</body>
</html>