<?php

include "../header.php";


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

	echo '<p><img src="' . $image . '" width="100" align="right" /></p>';
	echo '<p><strong>' . $name . '</strong><br />';
	echo '' . $description . '</p>';

	if(isset($ObjectResult['tags']))
		{

		$tags = $ObjectResult['tags'];
			
		if(isset($tags) && is_array($tags))
			{
			foreach($tags as $tag)
				{

				}
			}	
			
		//$created = $ObjectResult['name'];
		//$modified = $ObjectResult['name'];				

		$buildingblocks = array(); 
		$apidefinitions = array();
		$tags = array();

		$apis = $ObjectResult['apis'];
				
		foreach($apis as $api)
			{

			$api_name = $api['name'];
			
			$api_description = "";
			if(isset($api['description']))
				{
				$api_description = $api['description'];
				}
				
         $api_image = "";
			if(isset($api['image']))
				{
				$api_image = $api['image'];
				}

			$humanURL = "";
			if(isset($api['humanURL']))
				{
				$humanURL = $api['humanURL'];
				}
				
         $baseURL = "";
			if(isset($api['baseURL']))
				{
				$baseURL = $api['baseURL'];
				}

			$api_tags = "";
			if(isset($api['tags']))
				{
				$api_tags = $api['tags'];
				//$TagArray = explode(",",$api_tags);
				array_push($tags, $api_tags);
				}	
			
			$api_properties = "";
			if(isset($api['properties']))
				{
				$api_properties = $api['properties'];
				}									

   		//echo '<p><strong>' . $api_name . '</strong></p>';

			foreach($api_properties as $property)
				{
				$property_type = $property['type'];
				$property_url = $property['url'];

				//echo $property_type . ' - ' . $property_url . "<br />";

				if($property_type=='Swagger' || $property_type=='swagger')
					{
					$S = $property_url;
					array_push($apidefinitions, $S);
					}
				else
					{
					$buildingblocks[strtolower($property_type)] = $property_url;
					}

				}
			}					

		//$include = $ObjectResult['include'];
		//$maintainers = $ObjectResult['maintainers'];	
		foreach($buildingblocks as $key => $value)
			{
  			//echo $key . " = " . $value . "<br />";
			}
		?>
		<p><strong>Key Links</strong></p>
		<ul>       
        <?php if(isset($buildingblocks['x-portal'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-portal']; ?>" target="_blank">Portal</a>
            </li>
        <?php } ?>
        <?php if(isset($buildingblocks['x-documentation'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-documentation']; ?>" target="_blank">Documentation</a>
            </li>
        <?php } ?>
        <?php if(isset($buildingblocks['x-api-explorer'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-api-explorer']; ?>" target="_blank">API Explorer</a>
            </li>
        <?php } ?>        
        <?php if(isset($buildingblocks['x-authentication-overview'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-authentication-overview']; ?>" target="_blank">Authentication</a>
            </li>
        <?php } ?>          
        <?php if(isset($buildingblocks['x-blog'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-blog']; ?>" target="_blank">Blog</a>
               <?php if(isset($buildingblocks['x-blog-rss-feed'])) { ?>(<a href="<?php echo $buildingblocks['x-blog-rss-feed']; ?>" target="_blank">RSS</a>)<?php } ?>              
        		</li>
        <?php } ?>
        <?php if(isset($buildingblocks['x-twitter'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-twitter']; ?>" target="_blank">Twitter</a>
            </li>
        <?php } ?>  
        <?php if(isset($buildingblocks['x-github'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-github']; ?>" target="_blank">Github</a>
            </li>
        <?php } ?> 
        <?php if(isset($buildingblocks['x-forum'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-forum']; ?>" target="_blank">Form</a>
            </li> 
        <?php } ?> 
        <?php if(isset($buildingblocks['x-case-studies']) || isset($buildingblocks['x-webinars'])) { ?>
	         <li>
             	Resources
               <?php if(isset($buildingblocks['x-case-studies'])) { ?>(<a href="<?php echo $buildingblocks['x-case-studies']; ?>" target="_blank">Case Studies</a>)<?php } ?>              
               <?php if(isset($buildingblocks['x-webinars'])) { ?>(<a href="<?php echo $buildingblocks['x-webinars']; ?>" target="_blank">Webinars</a>)<?php } ?>
        		</li>
        <?php } ?>                
        <?php if(isset($buildingblocks['x-security-overview'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-security-overview']; ?>" target="_blank">Security Overview</a>
            </li>
        <?php } ?>  
        <?php if(isset($buildingblocks['x-php-library']) || isset($buildingblocks['x-python-library']) || isset($buildingblocks['x-ruby-library']) || isset($buildingblocks['x-nodejs-library']) || isset($buildingblocks['x-java-library']) || isset($buildingblocks['x-net-library'])) { ?>
	         <li>
             	Code Libraries
               <?php if(isset($buildingblocks['x-php-library'])) { ?>(<a href="<?php echo $buildingblocks['x-php-library']; ?>" target="_blank">PHP</a>)<?php } ?>              
               <?php if(isset($buildingblocks['x-python-library'])) { ?>(<a href="<?php echo $buildingblocks['x-python-library']; ?>" target="_blank">Python</a>)<?php } ?>
               <?php if(isset($buildingblocks['x-ruby-library'])) { ?>(<a href="<?php echo $buildingblocks['x-ruby-library']; ?>" target="_blank">Ruby</a>)<?php } ?>
               <?php if(isset($buildingblocks['x-nodejs-library'])) { ?>(<a href="<?php echo $buildingblocks['x-nodejs-library']; ?>" target="_blank">Node.js</a>)<?php } ?>              
               <?php if(isset($buildingblocks['x-net-library'])) { ?>(<a href="<?php echo $buildingblocks['x-net-library']; ?>" target="_blank">.NET</a>)<?php } ?>
               <?php if(isset($buildingblocks['x-java-library'])) { ?>(<a href="<?php echo $buildingblocks['x-java-library']; ?>" target="_blank">Java</a>)<?php } ?>              
        		</li>
        <?php } ?> 
        <?php if(isset($buildingblocks['x-status-dashboard'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-status-dashboard']; ?>" target="_blank">Status</a>
            </li>
        <?php } ?>  
        <?php if(isset($buildingblocks['x-terms-of-service'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-terms-of-service']; ?>" target="_blank">Terms of Service</a>
            </li>
        <?php } ?>  
        <?php if(isset($buildingblocks['x-partner-program'])) { ?>
	         <li>
             	<a href="<?php echo $buildingblocks['x-partner-program']; ?>" target="_blank">Partner Program</a>
            </li>
        <?php } ?>          
		</ul>
		<?php
		foreach($apidefinitions as $definition)
			{
			//echo "pull " . $definition . "<br />";
         $ObjectText = file_get_contents($definition);
         //echo $ObjectText;
         $ObjectResult = json_decode($ObjectText,true);	

			$SwaggerInfo = $ObjectResult['info'];

         $SwaggerInfo_Title = $SwaggerInfo['title'];
			$SwaggerInfo_Description = $SwaggerInfo['description'];
			$SwaggerAPIs = $ObjectResult['paths'];

          ?>
          <p><strong><?php echo $SwaggerInfo_Title; ?> (<?php echo count($SwaggerAPIs); ?> endpoints total)</strong></p>
          <ul>            
            <?php
             foreach($SwaggerAPIs as $key => $value)
                {

                $path = $key;
                //echo "<br />Path: " . $path . "<br />";		

                foreach($value as $key2 => $operation)
                   {
                   //var_dump($operation);
                   $method = $key2;
                   $type = $method;
                   if(isset($operation['tags']))
                      {
                      $api_tags = $operation['tags'];
                      array_push($tags, $api_tags);
                      }	
						 }

					 ?><li><?php echo $path; ?></li><?php
					}
 				?>
          </ul>
          <?php				
				//var_dump($tags);
			}
		}
	}  

include "../footer.php";
?>