<?php
# include the bot __engine.php script
require('__engine.php');

# verify the page set tokem and page access token
$VERIFY_TOKEN = 'delino12';
$PAGE_ACCESS_TOKEN = 'EAAPqY1IUo8cBAFE9jpJftQh8mvp8l0mJfdqeZBjFFIqvWYmPYGXeZBNFjWVJLTeqF9D7BiVeG4NKrxukELbghVZCQGWDYM6i4daRhY3pNu8YAenXKgSBzyQbwjsazJ5aKg1C6rAkmUkNsdDqWs3abK8n2vgsCMtrzDkhm9gDwZDZD';

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