<?php
# include the bot __engine.php script
error_reporting(E_ALL & ~E_NOTICE);

# verify the page set tokem and page access token
$VERIFY_TOKEN = 'test';
$PAGE_ACCESS_TOKEN = 'EAAPqY1IUo8cBAGm1Oc02wT3pomLDy8NwrovbNrbk89B5LDCPWRtkhdZC1xxwBYtuIjdSaSPimMkHPeL38JTlJVB9vdgX366eiw3v12sMtEwe857cCXJeWwI77ljg8VRofVLIZAdLOTzkAcsZAZAVKRXZBGS1Ru2H6dT4uZCknxNAZDZD';

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
	//$lizads_talks = new LizardTalk($message, $sender, $PAGE_ACCESS_TOKEN);
	//$lizads_talks->talkback();
}

# send all already build messages
function send_message($access_token, $payload) {
	// Send/Recieve API
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token=' . $access_token;
	// Initiate the curl
	$ch = curl_init($url);
	// Set the curl to POST
	curl_setopt($ch, CURLOPT_POST, 1);
	// Add the json payload
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	// Set the header type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	// SSL Settings
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request
	$result  = curl_exec($ch);
	//Return the result
	return $result;
}

# build a simple text message
function build_text_message_payload($sender, $message){
	// Build the json payload data
	$jsonData = '{
	    "recipient":{
	        "id":"' . $sender . '"
	    }, 
	    "message":{
	        "text": "'. $message .'"
	    }

	}';
	return $jsonData;
}
# compile json build
function send_text_message($sender, $message, $access_token){
	$jsonData = build_text_message_payload($sender, $message);
	$result = send_message($access_token, $jsonData);
	return $result;
}


# build an image message
function build_image_message_payload($sender, $image_url){
	// Build the json payload data
	$jsonData = '{
	    "recipient":{
	        "id":"' . $sender . '"
	    }, 
	    "message":{
	    	"text": "",
	        "attachment":{
		      "type":"image",
		      "payload":{
		        "url": "' . $image_url . '"
		      }
		    }
	    }
	}';
	return $jsonData;
}
# compile json build
function send_image_message($sender, $image_url, $access_token){
	$jsonData = build_image_message_payload($sender, $image_url);
	$result = send_message($access_token, $jsonData);
	return $result;
}


# build a button message with url and text response
function build_send_button_message($sender, $web_url, $text) {
	// build a send button payload.
  	$jsonData = '{
	    recipient: {
	      id: "'.$sender.'"
	    },
	    message: {
	      attachment: {
	        type: "template",
	        payload: {
	          template_type: "button",
	          text: "'.$text.'",
	          buttons:[{
	            type: "web_url",
	            url: "'.$web_url.'",
	            title: "visit Ama Technology"
	          }, {
	            type: "postback",
	            title: "Lizards Bot Design by Ama Technology",
	            payload: "image"
	          }, {
	            type: "phone_number",
	            title: "Contact Ama Technology",
	            payload: "+2348127160258"
	          }]
	        }
	       }
	    }
	}';
	return $jsonData;
}
# compile json build
function send_button_message($sender, $web_url, $text, $access_token){
	$jsonData = build_send_button_message($sender, $web_url, $text);
	$result = send_message($access_token, $jsonData);
	return $result;
}
?>