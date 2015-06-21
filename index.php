<?php

include "header.php";


$ThisFile = fopen("apis.json", "r");
$ObjectText =  fread($ThisFile,filesize("apis.json"));

$ObjectResult = json_decode($ObjectText,true);

if(is_array($ObjectResult))
  {

	$name = "";
	if(isset($ObjectResult['name']))
		{
   	$name = $ObjectResult['name'];
   	}
	
	$description = "";
	if(isset($ObjectResult['description']))
   	{
     	$description = $ObjectResult['description'];
     	}		

	if(isset($ObjectResult['image']))
		{
		$image = $ObjectResult['image'];
		}			
			
	if(isset($ObjectResult['url']))
		{
		$url = $ObjectResult['url'];  // add as APIs.json - Authoritative
		}

	$includes = $ObjectResult['include'];
	
	echo '<p><img src="' . $image . '" width="100" align="right" /></p>';
	echo '<p><strong>' . $name . '</strong><br />';
	echo '' . $description . '</p>';

	?>
	<ul>            
	<?php
	 foreach($includes as $include)
	    {
		 $name = $include['name'];
		 $slug = str_replace(" ","-",$name);
		 $slug = strtolower($slug);
		 $url = $include['url'];
		 ?><li><a href="/<?php echo $slug; ?>/"><?php echo $name; ?></a> - View the API details for the <?php echo $name; ?> platform.</li><?php
		}
		?>
	  </ul>
	  <?php				
	}  
	?>
	<p>This is all still work in progress for me. I am still trying to find the right balance of resources to provider across all aggregated APIs, and provide a caching mechanism.</p>
	<?php
include "footer.php";
?>