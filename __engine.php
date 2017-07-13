<?php
# include functions 
require('__core.php');
//require('__app.php');

# octa structure of A.I
# welcoming words
$words = array(
	'hi'		=> 	' Welcome to Ama Technology, we offer Assistance to PHP developer Bot using facebook messenger bot kit',
	'hey'		=> 	' Welcome to Ama Technology, we offer Assistance to PHP developer Bot using facebook messenger bot kit',
	'hello'		=> 	' Welcome to Ama Technology, we offer Assistance to PHP developer Bot using facebook messenger bot kit',
	'time' 		=> 	' The time is "'.date(' h:i:s').'" ',
	'joke' 		=> 	' Do you know that all redneck lizards in Nigeria always nod their head even when Nigeria economy is very bad!',
	'day' 		=> 	' Today: "'.date('D').'" ',
	'tips'		=> 	'  going to teach you some study tricks, how to dessolve complex learning materials',
	'ok'		=> 	' Thanks for using lizards service you can always come back for more.....',
	'proceed'	=>	' step 1 goes here........',
	'start'		=>	' learning tips to learn more quicly and more deeply 
					  \n, pay attention to how you pay attention, 
					  \n Think about how you think. 
					  \nLearn how you learn.',
	'one'		=>	' Here is step 1',
	'date'		=>	' Today Date is "'.date(' M D Y').'" ',
	'image'		=> 	' https://i.warosu.org/data/tg/img/0261/33/1374363369802.jpg '
);


/**
* Lizards Bot
*/
class LizardTalk
{
	protected $message;
	protected $sender;
	protected $page_access_token;
	
	public function __construct($message, $sender, $page_access_token)
	{
		# code...
		$this->message = strtolower($message);
		$this->sender = $sender;
		$this->page_access_token = $page_access_token;
	}

	public function talkback()
	{
		if(!empty($this->message)){
			// check if image response need image files 
			if(in_array($this->message, $words)){
				$response = $words[$this->message];
				send_text_message($this->sender, $response, $this->page_access_token);

			}

			/*
			if(in_array($this->message, $words))
			{
				$response = $words[$this->message];
				send_image_message($this->sender, $response, $this->page_access_token);
			}
			*/

			/*
			if($this->message == 'image'){
				$image_url = 'https://i.warosu.org/data/tg/img/0261/33/1374363369802.jpg';
				send_image_message($this->sender, $image_url, $this->page_access_token);
			}

			if($this->message == 'hi'){
				$web_url = 'http://www.amatechteam.com';
				$text = 'Welcome to Ama Technology, we provide Bot Assistance for your business';
				send_button_message($this->sender, $web_url, $text, $this->page_access_token);
			}

			if($this->message == 'generic'){
				$web_url = 'http://www.amatechteam.com';
				$image_url = 'https://i.warosu.org/data/tg/img/0261/33/1374363369802.jpg';
				$subtitle_text = 'Lizard Bot offers PHP Flexibility';
				$body_text = 'You can always ask for more lizard spy bot are everywhere. there is no wall above me. ';
				send_generic_message($sender, $subtitle_text, $image_url, $web_url, $this->page_access_token);
			}
			*/
		}
	}
}
?>