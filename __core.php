<?php
// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL & ~E_NOTICE);

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


/*
 * Send a Structured Message (Generic Message template) using Json Converted.
 * Sample of a Generic Structure PHP build template with Bubble.
 */
function build_send_generic_message($sender, $subtitle_text, $image_url, $web_url) {
  	$jsonData = '{
	    recipient: {
	      id: "'.$sender.'"
	    },
	    message: {
	      attachment: {
	        type: "template",
	        payload: {
	          template_type: "generic",
	          elements: [{
	            title: "rift",
	            subtitle: "'.$subtitle_text.'",
	            item_url: "'.$web_url.'",               
	            image_url: "'.$image_url.'",
	            buttons: [{
	              type: "web_url",
	              url: "'.$web_url.'",
	              title: "Open Web URL"
	            }, {
	              type: "postback",
	              title: "Buy Lizard Bot",
	              payload: "Payload for first bubble",
	            }],
	          }, {
	            title: "touch",
	            subtitle: "Your Hands, Now in VR",
	            item_url: "'.$web_url.'",               
	            image_url: "'.$image_url.'",
	            buttons: [{
	              type: "web_url",
	              url: "'.$web_url.'",
	              title: "Visit Lizard Home"
	            }, {
	              type: "postback",
	              title: "Buy Lizard Bot",
	              payload: "Payload for second bubble",
	            }]
	          }]
	        }
	      }
	    }
	}'; 

  return $jsonData;
}

# compile json build
function send_generic_message($sender, $subtitle_text, $image_url, $web_url, $access_token){
	$jsonData = build_send_generic_message($sender, $subtitle_text, $image_url, $web_url);
	$result = send_message($access_token, $jsonData);
	return $result;
}

?>