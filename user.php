<?php
	/**
 * An page to display the sourcecode.
 */
	// Include the essential config-file which also creates the $alpha variable with its defaults.
//     include(__DIR__.'/config.php'); 
include ("config.php");
	
    // Connect to a MySQL database using PHP PDO
    $db = new CDatabase($alpha['database']);
    
    //Add the style sheet
    $alpha['stylesheets'][] = 'css/user.css';
    
    //instantiate user
    $user = new CUser($db);
    
    
    if(isset($_GET['id'])){
    
    
       $id = strip_tags($_GET['id']);
    
    }
    
    //check if id is a numeric value
    
    is_numeric($id) or die('ID must be numeric!');
    
    $val = $user->selectUserID($id);
    
    if(!($val-> img_name == "" || $val->img_path == "")){
    
       $avatar = "<img src='img.php?src={$val->img_name}&amp;width=350&amp;height=350' alt='Picture with img' />";
    }else
    {
       if ($val->salute == strtolower ( "mr" )) {
          $avatar = "<img src='img.php?src=male_user_icon.jpg&amp;width=350&amp;height=350' alt='Picture with img' />";
       } else {
          $avatar = "<img src='img.php?src=female_user_icon.jpg&amp;width=350&amp;height=350' alt='Picture with img' />";
       }
    }
    
    
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "User";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

      <h1>{$alpha['title']}</h1>
      
      
      	<div id = 'userDataWrapper'>
      		<div id ='userItem'>{$avatar}</div> 
      	
      		<table border="1" width="350">
      		 <caption>User Data</caption>
      		<tr>
      		<td>Acronym</td>
      		<td>{$val->acronym}</td>
      		</tr>
      		<tr>
      		<td>Name</td>
      		<td>{$val->name}</td>
      		</tr>	
      		<tr>
      		<td>Credit</td>
      		<td>{$val->credit}</td>		
      		</tr>
      		</table> 	
      					
      	</div>
      			
      <div id= 'userEntry'>
       
      
      
      </div>
	

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 