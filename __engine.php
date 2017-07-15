<?php
# include functions 
require('__core.php');

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
			
			$word_lists = array('hi','hey','hello','generic','image','info','date','location','details','help');

			if(in_array($this->message, $word_lists)){
				# start response
				if($this->message == 'hi' || $this->message == 'hello' || $this->message == 'hey'){
					$response = 'Welcome to Ama Technology, we offer Assistance to PHP developer, Developing Bot using facebook messenger bot kit ';
					send_text_message($this->sender, $response, $this->page_access_token);
				}

				if($this->message == 'image'){
					$image_url = 'https://i.warosu.org/data/tg/img/0261/33/1374363369802.jpg';
					send_image_message($this->sender, $image_url, $this->page_access_token);
				}

				if($this->message == 'date')
				{
					$response = 'Today\'s date is: "'.date(" F D h:i:s a").'" ';
					send_text_message($this->sender, $response, $this->page_access_token);
				}

				if($this->message == 'info'){
					$web_url = 'http://www.amatechteam.com';
					$text = 'Welcome to Ama Technology, we provide Bot Assistance for your business';
					send_button_message($this->sender, $web_url, $text, $this->page_access_token);
				}

				if($this->message == 'generic'){
					$web_url = 'http://www.amatechteam.com';
					$image_url = 'https://i.warosu.org/data/tg/img/0261/33/1374363369802.jpg';
					$subtitle_text = 'Lizard Bot offers PHP Flexibility';
					send_generic_message($this->sender, $subtitle_text, $image_url, $web_url, $this->page_access_token);
				}

				if($this->message == 'details' || $this->message == 'help')
				{
					$response = 'Welcome to the help section. \n ';
					$response .= 'here are the list of what i can do for you (hi), (details), (image), (info), (generic) for generic template. Thanks ';
					send_text_message($this->sender, $response, $this->page_access_token);
				}
				# end of response
			}else{
				$response = 'Lizardsbot is having hard time understanding what you type:("'.$this->message.'") \n you can type (details) or (help) for Assistance ';
				send_text_message($this->sender, $response, $this->page_access_token);
			}	
		}
	}
}

?>