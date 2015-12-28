<?php
/**
* Facebook Component
* @author Matt Savarino
* @license MIT
* @version 0.1
*/
$GLOBALS['facebook_config']['debug'] = NULL;
App::import('Vendor', 'facebook/facebook'); // .php is automatically appended
define('USER_COOKIE_NAME','fb_cookie');


class FacebookComponent extends Object
{
    var $api_key = "your api key";
    var $secret = "your app secret";
   
    function startup(&$controller)
    {
        $controller->facebook =& new Facebook($this->api_key, $this->secret);
        $controller->set('facebook', $controller->facebook);
    }
	
	
      
}
?>