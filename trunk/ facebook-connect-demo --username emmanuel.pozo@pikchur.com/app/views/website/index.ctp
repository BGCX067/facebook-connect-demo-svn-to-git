<div id="wrapper">
    <?PHP if(!isset($_SESSION['User']))
	{?>
    	<a href="##" onclick="return fbLogin();"><img src="http://wiki.developers.facebook.com/images/f/f5/Connect_white_large_long.gif" /></a>
    <?PHP 
	}
	else
	{
	?>
    	<a href="<?PHP echo $this->webroot?>stream">Go to my stream</a>
    <?PHP
	}
	?>	
</div>