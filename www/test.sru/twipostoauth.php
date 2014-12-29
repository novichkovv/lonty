<?php

require_once "twitteroauth/twitteroauth.php"; // Файл из библиотеки для работы с api


define("CONSUMER_KEY", "YlQp5UOJiVlZrKqFhrlGXGJew");
define("CONSUMER_SECRET", "IO6jHJ6x0bbmXch9EVortGN7Fm7csb0fgHNBNq1OJVTlCzmaQl");
define("OAUTH_TOKEN", "267305619-xBZin9btNruCo4BVe9IUUXpp4t2Jzbc0xiV21G4Q");
define("OAUTH_SECRET", "T42bPeBSmbkrTJ9OhMa4Ec3iXHDm6bf0SJGIDP56kRE9q");


$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
$content = $connection->get('account/verify_credentials');
print_r($content);

//$file = file_get_contents(dirname(__FILE__).'/data.txt'); // Получаем список сообщений для отправки


//$array = explode("\n",$file);


//$text = ''; $array[mt_rand(0,sizeof($array) - 1)];

//echo $text;
$text = 'Перешли в фейсбук!';


$connection->post('statuses/update', array('status' => $text)); // Отправляем пост
/*error_reporting(E^ALL);
session_start();
session_destroy();
session_start();
$page = 'http://lonty.ru'; // Страница, на котороый будет использоваться автопостинг

DEFINE('ROOT', realpath(dirname(__FILE__)).'/'); 
function win2utf($s) 
{ 
   for($i=0, $m=strlen($s); $i<$m; $i++) 
   { 
       $c=ord($s[$i]); 
       if ($c<=127) {$t.=chr($c); continue; } 
       if ($c>=192 && $c<=207)    {$t.=chr(208).chr($c-48); continue; } 
       if ($c>=208 && $c<=239) {$t.=chr(208).chr($c-48); continue; } 
       if ($c>=240 && $c<=255) {$t.=chr(209).chr($c-112); continue; } 
       if ($c==184) { $t.=chr(209).chr(209); continue; }; 
   if ($c==168) { $t.=chr(208).chr(129);  continue; }; 
   } 
   return $t; 
} 

	require_once 'options.php';
	require_once 'twitteroauth/twitteroauth.php';
	set_time_limit(0);
	$connection = new TwitterOAuth($options['CONSUMER_KEY'], $options['CONSUMER_SECRET']);//, $options['OAUTH_TOKEN'], $options['OAUTH_SECRET']);
	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
$url = $connection->getAuthorizeURL($token);
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
$_SESSION['access_token'] = $access_token;



unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
	
	$connection->format = 'xml';
print_r($_SESSION);
$lines = array(' активно использует cookies. Прежде чем войти, пожалуйста, включите хранение cookie-файлов в свом браузере.');//file(ROOT.'inc/posts.txt'); 
$index = mt_rand(0, count($lines)-1); 
$status  = win2utf($lines[$index]);
print_r($status);
$connection->post('statuses/update', array('status'=>$_GET['post']));
*/
?>