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

	Please find below the details of the buyers who want to purchase a Item which you had put up for sale.

	<a href=""><img src=""></a><!-- (Link to machine on website) -->    <?php echo $mname; ?>(Link to machine on website)

	<!-- <List of buyers with their details i.e. Name of the person, Company Name, Email Id, Phone Number, City, Country> -->
	<br>
	<span>Buyer Name-<b><?php echo $bname; ?></b></span>
	<br>
	<span>Company Name-<b><?php echo $cname; ?></b></span>
	<br>
	<span>Email<b><?php echo $email; ?></b></span>
	<br>
	<span>Contact Number<b><?php echo $contact; ?></b></span>
	<br>
	<span>City<b><?php echo $city; ?></b></span>
	<br>
	<span>Country<b><?php echo $country; ?></b></span>

	Your listing will be disabled on the website after 15 days. In case you wish to continue your listing, please click the link below or log in to your profile on the website, within the next 15 days.

	<a href=""><Link to website></a>
	<!-- {Log in else to his profile}
	{Should land to this machine in his profile where the option to continue listing is prominently displayed} -->

	Warm Regards,
	Team Surplex Plus
</p>
</body>
</html>