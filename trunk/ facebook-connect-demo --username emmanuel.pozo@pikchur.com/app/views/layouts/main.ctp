<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Facebook Demo Client </title>
        <link rel="stylesheet" type="text/css" href="<?PHP echo $this->webroot?>css/layout.css" />
    </head>
    
    <body>
        <?PHP echo $this->renderElement('header');?>
        <?PHP echo $content_for_layout ?>
    </body>
    
    <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php"></script>
    
    <script type="text/javascript">  
        var root = "/fb_demo/";
        var xd = "http://localhost:8888/fb_demo/xd_receiver.htm";
        FB.Bootstrap.requireFeatures(["Connect"], function()
        {
            FB.init("app key goes here",xd);
        });
            
        function fbLogout()
        {
            FB.Connect.logout(gologout());
        }
     
        function gologout()
        {
            window.location.href = root+'logout/';
        }
     
        function fbLogin() 
        {
         FB.Connect.requireSession(function() 
         { 
            FB.Connect.showPermissionDialog("read_stream",function(accepted) { goto_stream(accepted); } );
             
         }); 
         return false;
        }
     
        function goto_stream(accepted)
        {
         if(accepted)
            window.location.href = root+'stream/';
        }
    </script>
</html>