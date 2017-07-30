<?php
# include the bot __engine.php script
require('__engine.php');

# verify the page set tokem and page access token
$VERIFY_TOKEN = 'delino12';
$PAGE_ACCESS_TOKEN = 'EAAPqY1IUo8cBAE6Sev039mH6uIZAdTnAar6dwr7WphlepgPFpaxtVWQdRA6X7n9sg8izl1J4wZBELax6U3XrFcUWDmfjMP3RMs8DY1EE7lziyErZCtawOkzijA3mVoUcsEUH9VhG8DQlzBAUrqac1JVpsBdjgSaZBO9Fm4nD8AZDZD';

# facebook init challange matchs
$challenge = $_REQUEST['hub_challenge'];
$verify_token = $_REQUEST['hub_verify_token'];
if ($verify_token === $VERIFY_TOKEN) {
  	//If the Verify token matches, return the challenge.
  	echo $challenge;
}else {
	# scan bot input for incomming request
	$input = json_decode(file_get_contents('php://input'), true);
	// Get the Senders Page Scoped ID
	$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
	// Get the message text sent
	$message = $input['entry'][0]['messaging'][0]['message']['text'];

	# custom define bot class for handling response
	$lizads_talks = new LizardTalk($message, $sender, $PAGE_ACCESS_TOKEN);
	$lizads_talks->talkback();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lizards Bot</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font/css/font-awesome.css">
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand active" href="index.php">Lizard Bot</a>
	    </div>

	    <div id="navbar" class="navbar-collapse collapse">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="privacy/"><i class="fa fa-lock"></i> Privacy</a></li>
	        <li><a href="contact/"><i class="fa fa-volume-control-phone"></i> Contact Us</a></li>
	        <li><a href="terms/termsfeed-terms-conditions-pdf-english.pdf"><i class="fa fa-file-pdf-o"></i> Terms and Conditions</a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	<div class="container">	
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="lead">Welcome to lizard Bot</h1>
				<hr />
				<div class="img">
					<img src="assets/img/lizards-bot.jpg" class="img-square" width="100%" height="100%">
				</div>
			</div>
		</div>
	</div>
	<hr />
	<div class="container">
		<div class="row">
			<div class="footer">
				<div> 
					Copyright protected &copy; <?= date("Y"); ?> Design and Developed by Ama Technology Team 
					<a href="https://www.amatechteam.com">www.amatechteam.com</a>
				</div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>