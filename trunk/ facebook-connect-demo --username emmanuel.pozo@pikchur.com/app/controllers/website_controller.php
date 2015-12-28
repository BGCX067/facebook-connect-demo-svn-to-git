<?php 
class WebsiteController extends AppController
{
	var $name = 'website';
	var $layout = 'main';
	var $components = array('facebook','curlhelper');
	var $uses = '';
	
	/**
	 * Function index
	 * Root of app
	 *
	 */
	function index()
	{
		
	}
	
	/**
	 * Function stream
	 * Given a valid facebook session is set this function 
	 * sets openStream data and makes it available to the view for display.
	 *
	 */
	function stream()
	{
		$fb_id = $this->facebook->get_loggedin_user();
		$fb_session_key = $this->facebook->api_client->session_key;
		$fb_secret = $this->facebook->api_client->secret;
		$sig= $this->get_sig($fb_id,$fb_session_key,$fb_secret);
		if($fb_id)
		{
			$stream = $this->get_stream($fb_id,$fb_session_key,$sig);
			$this->Session->write('User',$fb_id);
			$this->set('data',$stream);
		}
	}
	
	/**
	 * Function logout
	 * Destroys session var and redirects to index.
	 *
	 */
	function logout()
	{
		$this->layout='ajax';
		$this->Session->destroy('User');
		$this->redirect('/');
		exit();
	}
	
	/**
	  * Private helper function get_stream
	  * @param $fb_id: A valid facebook id.
	  * @param $session_key: A valid app session key.
	  * @param $sig: A signature generated by get_sig helper function.	
	  * Makes an http socket get request for an FB openStream atom feed and returns xml data in form of an array.
	  *
	  */
	private function get_stream($fb_id,$session_key,$sig)
	{
		$url = "http://www.facebook.com/activitystreams/feed.php?source_id=".$fb_id."&app_id=108595874691&session_key=".$session_key."&sig=".$sig."&v=0.7&read";
		
		return $this->curlhelper->get($url);
	}
	
	/**
	  * Private helper function get_sig
	  * @param $fb_id: A valid facebook id.
	  * @param $session: A valid app session key.
	  * @param $fb_secret: A valid app secret key.	
	  * returns an md5 hash according to FB specs.
	  *
	  */
	private function get_sig($fb_id,$session_key,$fb_secret)
	{
		return md5("app_id=108595874691session_key=".$session_key."source_id=".$fb_id.$fb_secret);
	}
}
?>