<?php
# include the bot __engine.php script
require('__engine.php');

# verify the page set tokem and page access token
# this test page exit for testing webhook when programming your bots
$word_lists = array('hi','hey','hello','generic','image','info','date','location','details','help');
$words = 'john';
if(in_array($words, $word_lists)){
	echo $words.' found';
}else{
	echo $words.' not found';
}
echo '<br />';
echo date(" F D h:i:s a");


echo '<br />';

$jokes = array(
	'3 men eating breakfast with their wives, 1st man sed, pass the honey honey 2nd man sed, pass the sugar sugar & 3rd man sed,pass the milk,you big fat cow!',
	'TEACHER: Mary, why are you doing your math multiplication on the floor? MARY: You told me to do it without using tables.',
	'Your 100% beautiful Your 100% lovely Your 100% sweet Your 100% nice & your 100% stupid to believe these words!',
	'What kind of streets do zombies like the best?… Dead ends',
	'My girlfriend always complains that I do not take her anywhere expensive.. So I took her to the Petrol Station.'
);


$jokes_total = count($jokes);
$jokes_total = $jokes_total - 1;
$shuffle_jokes = rand(0, $jokes_total);

echo $jokes[$shuffle_jokes];

echo '<br /> shuffle no: '.$shuffle_jokes;


?>