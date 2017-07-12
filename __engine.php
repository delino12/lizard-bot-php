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
				send_image_message($this->sender,'http://thecatapi.com/api/images/get?format=src&type=gif', $this->page_access_token);
			}

			if($this->message == 'hi'){
				$web_url = 'http://www.amatechteam.com';
				$text = 'Welcome to Ama Technology, we provide Bot Assistance for your business';
				send_button_message($this->sender, $web_url, $text, $this->page_access_token);
			}
		}
	}
}
?>