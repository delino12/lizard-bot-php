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
			
			# word list arrays
			$word_lists = array(
				'hi','hey','hello','generic','image','info','date','location','details','help','jokes'
			);
			
			# jokes list arrays
			$jokes = array(
				'3 men eating breakfast with their wives, 1st man sed, pass the honey honey 2nd man sed, pass the sugar sugar & 3rd man sed,pass the milk,you big fat cow!',
				'TEACHER: Mary, why are you doing your math multiplication on the floor? MARY: You told me to do it without using tables.',
				'Your 100% beautiful Your 100% lovely Your 100% sweet Your 100% nice & your 100% stupid to believe these words!',
				'What kind of streets do zombies like the best?… Dead ends',
				'My girlfriend always complains that I do not take her anywhere expensive.. So I took her to the Petrol Station.'
			);
			# create a random jokes
			$jokes_total = count($jokes);
			$jokes_total = $jokes_total - 1;
			$shuffle_jokes = rand(0, $jokes_total);

			# compare message before processing it
			if(in_array($this->message, $word_lists)){
				# start response
				if($this->message == 'hi' || $this->message == 'hello' || $this->message == 'hey'){
					$response = 'Welcome to Ama Technology, we offer Assistance to PHP developer, Developing Bot using facebook messenger bot kit ';
					send_text_message($sender, $response, $this->page_access_token);
				}

				# start response
				if($this->message == 'jokes'){
					$response = $jokes[$shuffle_jokes];
					send_text_message($this->sender, $response, $this->page_access_token);
				}

				if($this->message == 'image'){
					$image_url = 'https://i.warosu.org/data/tg/img/0261/33/1374363369802.jpg';
					send_image_message($this->sender, $image_url, $this->page_access_token);
				}

				if($this->message == 'date')
				{
					$response = 'Today date is: '.date(" F D h:i:s a");
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
				$response = 'Lizardsbot is having hard time understanding ';
				//$response .= 'what you type: {{$this->message}} \n you can type (details) or (help) for Assistance ';
				return send_text_message($this->sender, $response, $this->page_access_token);
			}	
		}
	}
}
?>