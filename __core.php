<?php
// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL & ~E_NOTICE);

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

function send_text_message($sender, $message, $access_token){
	$jsonData = build_text_message_payload($sender, $message);
	$result = send_message($access_token, $jsonData);
	return $result;
}

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

function send_image_message($sender, $image_url, $access_token){
	$jsonData = build_image_message_payload($sender, $image_url);
	$result = send_message($access_token, $jsonData);
	return $result;
}


function build_send_button_message($sender, $web_url, $text) {
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
	            title: "Open Web URL"
	          }, {
	            type: "postback",
	            title: "Trigger Postback",
	            payload: "DEVELOPER_DEFINED_PAYLOAD"
	          }, {
	            type: "phone_number",
	            title: "Call Phone Number",
	            payload: "+16505551234"
	          }]
	        }
	    }
	}';
}

function send_button_message($sender, $web_url, $text, $access_token){
	$jsonData = build_send_button_message($sender, $web_url, $text);
	$result = send_message($access_token, $jsonData);
	return $result;
}

?>