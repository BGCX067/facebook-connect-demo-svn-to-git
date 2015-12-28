<div id="wrapper">
	<h2>What's going on?</h2>
    <textarea rows="3" cols="70"></textarea>
    <br/><br/><br/>
	<?PHP foreach($data["feed"]["entry"] as $key=>$value)
	{
	?>
    	
        <div class="row">
            <div class="name">
                <a href="<?PHP echo $value['author']['uri']["#text"]?>"><?PHP echo $value['author']['name']["#text"];?></a>
            </div>
            <div class="content">
                <?PHP if (isset($value['object']['content'])) echo utf8_encode($value['object']['content']["#text"]);?>	
                <br/>
                  <span style="color:#999999; font-style:italic; font-size:11px; font-family:Georgia, serif;">posted at <?PHP echo $value['published']['#text'];?></span>
            </div>
            <div class="clear"></div> 
        </div>   
	<?PHP 
	}
	?>
</div>