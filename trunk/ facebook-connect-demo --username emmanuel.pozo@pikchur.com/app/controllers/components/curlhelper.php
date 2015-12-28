<?PHP 
 uses('xml'); App::import('Core', array('HttpSocket'));
class CurlhelperComponent extends Object
{
	
	var $Http = null;
	
	function __construct() 
	{
    	$this->Http =& new HttpSocket();
	}
	
	function get($url,$params=array())
	{
		return $this->__process($this->Http->get($url,$params));
	}
	
	function __process($response) {
		
			if($response != 'Could not authenticate you.')
			{
            	$xml = new XML($response);
            	return $this->__xmlToArray($xml);
			}
			else
			{
				return 'error';
			}
        }
		
	 function __xmlToArray($node) {
            $array = array();
            foreach ($node->children as $child) {
                if (empty($child->children)) {
                    $value = $child->value;
                } else {
                    $value = $this->__xmlToArray($child);
                }
    
                $key = $child->name;
                if (!isset($array[$key])) {
                    $array[$key] = $value;
                } else {
                    if (!is_array($array[$key]) || !isset($array[$key][0])) {
                        $array[$key] = array($array[$key]);
                    }
                    $array[$key][] = $value;
                }
            }
    
            return $array;
        }      
	
	

}
?>