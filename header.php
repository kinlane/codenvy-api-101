<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-us">

  <!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link href="http://gmpg.org/xfn/11" rel="profile">

  <title>
    Containers &middot; 
    
  </title>

  <!-- CSS -->
  <link rel="stylesheet" href="https://s3.amazonaws.com/kinlane-productions/css/hyde.css">
  <link rel="stylesheet" href="https://s3.amazonaws.com/kinlane-productions/css/syntax.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700|Abril+Fatface">

  	<!-- Icons -->
  	<link rel="shortcut icon" type="image/x-icon" href="http://apievangelist.com/favicon.ico">
	<link rel="icon" type="image/x-icon" href="http://apievangelist.com/favicon.ico">

  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
  <script src="https://s3.amazonaws.com/kinlane-productions/js/mustache.js" type="text/javascript"></script>
   
  <!-- RSS -->
  <link rel="alternate" type="application/rss+xml" title="RSS" href="/blog.xml">
  
</head>


  <body>

    <header class="masthead">
      <div class="masthead-inner" align="center">  	      	
		<h2><a href="http://containers.apievangelist.com">{"API":"101"}</a></h2>      		                 	      	
        <div class="colophon">
          <br />
          <ul class="colophon-links">
            <li>
              <a href="/">Home</a>
            </li>
          </ul>
          <br />
          <ul class="colophon-links">
            <?php
            $filename = $_SERVER['SCRIPT_FILENAME'];
            $folderArray = explode("/",$filename);
            echo count($folderArray) . "<br />";
            echo $_SERVER['HTTP_HOST'] . "<br />";
            if($_SERVER['HTTP_HOST']=='codenvy-api-101.apievangelist.com')
              	{
               $break = 7;  
               }
				else
    				{
        			$break = 5;
      			}
      		echo $break . "<br />";
				if(count($folderArray) > $break)
					{
					$apisjsonurl = "../apis.json";
					}
				else
					{
					$apisjsonurl = "apis.json";
					}
				//echo $apisjsonurl;

            $ThisFile = fopen($apisjsonurl,"r");
            $ObjectText =  fread($ThisFile,filesize("apis.json"));
            $ObjectResult = json_decode($ObjectText,true);

            if(is_array($ObjectResult))
              {
              $includes = $ObjectResult['include'];
              foreach($includes as $include)
              		{
                   $name = $include['name'];
                   $slug = str_replace(" ","-",$name);
                   $slug = strtolower($slug);
                   $url = $include['url'];
                  ?>
                  <li>
                    <a href="/<?php echo $slug; ?>"><?php echo $name; ?></a>
                  </li>            
            		<?php
                  }				
               }  
               ?> 
          </ul>
          <br />
          <ul class="colophon-links">  
            <li>
              <a href="/editor.php">Editor</a>
            </li>  
           </ul> 
          <br /><br />
           <ul class="colophon-links">
            <li style="padding-top: 15px;">
              <a href="http://apievangelist.com"><< Return to API Evangelist</a>
            </li>                                                                       
          </ul>
        </div>         
        <script id="parterListingTemplate" type="text/template"> 
              
            <a href="{{url}}" target="_blank" title="{{title}}">
           		<img src="{{logo}}" width="{{width}}" style="padding: 4px;" />
            </a>   
                                                                                                                                
        </script>          
        
        <script type="text/javascript">
        function listSponsors()
            {
            $.getJSON('https://s3.amazonaws.com/kinlane-productions/json/sponsors.json', function(data) {               
                $.each(data['sponsors'], function(key, val) {                  
                var template = $('#parterListingTemplate').html();
                var html = Mustache.to_html(template, val);
                $('#partnerListingContainer').append(html);
                });         
            });             
        }    
        </script>

        <div id="partnerListingContainer" align="center" style="background-color:#FFF; margin-top: 45px; padding-top: 10px; width: 60%; border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border: 3px solid #FFFFFF; margin-bottom: 7px;">
		
		</div>
        
        <script type="text/javascript">
            listSponsors();
        </script>        
        
      </div>
    </header>

    <div class="content container">
    	
    	<p align="center">
    		<a href="http://apievangelist.com">
    			<img src="https://s3.amazonaws.com/kinlane-productions/api-evangelist/api-evangelist-codenvy-menu-logo.png" align="center" width="90%" style="padding-bottom: 10px;" />
    		</a>
    	</p>
    	
      	<div class="page">
          <?php //var_dump($_SERVER); ?>