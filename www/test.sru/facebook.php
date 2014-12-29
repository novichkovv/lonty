<?php
require 'libs/fb/src/facebook.php';

define('FACEBOOK_APP_ID',"788945274461581"); // идентификатор приложения AppId
define('FACEBOOK_SECRET',"4b3b846b21f12fa178986a5b56f4a2b6"); // секретный ключ App Secret
define('PAGE_ID',"712487952164567"); // идентификатор страницы (пользователя, группы, события)
define('UID',"712487952164567"); // идентификатор страницы или пользователя от имени которого будет опубликована новость
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  //require_once('php-sdk/facebook.php');

  $config = array(
    'appId' => '788945274461581',
    'secret' => '4b3b846b21f12fa178986a5b56f4a2b6',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );
//	$facebook = new Facebook(array(
//'appId' => FACEBOOK_APP_ID,
//'secret' => FACEBOOK_SECRET,
//'cookie' => true
//));
 $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
  echo $user_id;
?>
<html>
  <head></head>
  <body>

  <?php
    if($user_id) {
	$photo = 'images/pictures/big/23/76.jpg';
      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
        $ret_obj = $facebook->api('/'.PAGE_ID.'/feed/', 'POST',
                                    array(									
										'type' => 'status',
                                      'message' => 'РќРµ РїРѕР»СѓС‡Р°РµС‚СЃСЏ!'
                                 ));
        echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';
		print_r($ret_obj);
        // Give the user a logout link 
        echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'publish_actions,user_status'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, so print a link for the user to login
      // To post to a user's wall, we need publish_actions permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_status' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    } 

  ?>      

  </body> 
</html> 
<?php 
/*
$user = null;

$facebook = new Facebook(array(
'appId' => FACEBOOK_APP_ID,
'secret' => FACEBOOK_SECRET,
'cookie' => true
));

$user = $facebook->getUser(); // Получаем UID залогиненого пользователя, или 0.
var_dump($user);
/**
* - redirect_uri: URL для редиректа после удачной авторизации
* - scope: определяет доступные действия для подключения

if($user == 0) {
$login_url = $facebook->getLoginUrl($params = array('scope' => 'manage_pages,offline_access,publish_stream, read_stream'));

// перебрасываем пользователя на $login_url
echo '<a href="'.$login_url.'">login</a>';

}


  $url = "https://graph.facebook.com/".PAGE_ID."/feed";

  $attachment =  array(
    'access_token' => 'CAALNiqLU3Y0BACE5n013CL7j1jmbbJmmxCKhi8M2LqYHSr5nWguQuX3kSZAKfppWCgYWQ8EinBRhxoY0hG7QCkepbu4Rb4trqilLelhk87EMnHiBbVm8FXiV5pBBZB2PnHZBWWZC1WLrQqHB5ZB0Q6ibsjPDuwFc8FtzEj9ZBCLr5tmcoFjZA1Cj13GVULWhqBgSrvEw5M4D4yvoeWNIHXX',
    'message' => 'hello world',
    'name' => 'hello',
    'link' => $url,
    //'description' => '',
    //'picture'=>$pic,
    'actions' => json_encode(array('name' => 'publish_stream'	,'link' => $url))
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $attachment);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  echo  $result;
  curl_close ($ch);
  */