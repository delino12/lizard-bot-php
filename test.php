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
?>