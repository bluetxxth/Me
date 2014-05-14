<?php
	/**
 * An page to display the sourcecode.
 */
	// Include the essential config-file which also creates the $alpha variable with its defaults.
  // include(__DIR__.'/config.php'); 
   include ("config.php");
   
   $db = new CDatabase($alpha['database']);
   $user = new CUser($db);
   
   $html = null;
   
   if(isset($_POST['logout'])):
   $user->logoutUser();
    
   header('Location: '.$_SERVER['PHP_SELF']);
   die;
    
   endif;
    
   $output=$user->myOutput();
   
   $html.=  '<form method=post>
			  <fieldset>
			  <legend>Logout</legend>
			  <p><input type="submit" name="logout" value="Logout" class="button"/></p>
			<br/><br/><br/>
			  <output><b>'.$output.'</b></output>
			  </fieldset>
		</form>';
   
   
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Logout";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>


       {$html}


EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 