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

	$includes = $ObjectResult['includes'];
	
	echo '<p><img src="' . $image . '" width="100" align="right" /></p>';
	echo '<p><strong>' . $name . '</strong><br />';
	echo '' . $description . '</p>';

	?>
	<p><strong><?php echo $name; ?></strong></p>
	<ul>            
	<?php
	 foreach($includes as $include)
	    {
		 $name = $include['name'];
		 $slug = str_replace(" ","-",$name);
		 $url = $include['url'];
		 ?><li><a href="/<?php echo $slug; ?>/"><?php echo $name; ?></a></li><?php
		}
		?>
	  </ul>
	  <?php				
	}  

include "footer.php";
?>