<?php
# include functions 
require('__core.php');
require('__app.php');

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
				send_generic_message($sender, $subtitle_text, $body_text, $image_url, $web_url, $this->page_access_token)
			}
		}
	}
}
?>