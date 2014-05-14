<?php
/**
 * An page to display the sourcecode.
 */
   // Include the essential config-file which also creates the $alpha variable with its defaults.
    include(__DIR__.'/config.php'); 
//   include ("config.php");

    
    
   $db = new CDatabase($alpha['database']);
   $user = new CUser($db);
   $isLogin = true;
   $html = null;
   
   $logout = isset ( $_POST ['btnLogout'] ) ? $_POST ['btnLogout'] : null;
   $login = isset ( $_POST ['btnLogin'] ) ? $_POST ['btnLogin'] : null;
   
   if(!$user->isAuthenticated()){
      if(isset($_POST['acronym'] , $_POST['password'])){
         //$isLogin = $user->myLogin($_POST['acronym'], $_POST['password']);
   
         $isLogin = $user->checkUserAndPassword($_POST['acronym'], $_POST['password']);
      }
   }
   
   if(!$isLogin){
   
      $output = "Login failed!";
     
   }else {
   
      $output = $user->myOutput();
   }
   
   if($logout){
   
      header('Location: logout.php');
   }
   
   if($login){
      header('Location: '.$_SERVER['PHP_SELF']);
      die;
   }
   
   $html .=   '<form method=post>
	  <fieldset>
		  <legend>Login</legend>
		  <p><em>This login panel is just for administration purposes</em></p>
		  <p><label>User:<br/><input type="text" name="acronym" value=""/></label></p>
		  <p><label>Password:<br/><input type="password"  name="password" value=""/></label></p>
		  <p><input type="submit" name="btnLogin" value="Login" class="button"/></p>
		  <p><input type="submit" name="btnLogout" value="Logout" class="button"/></p>
		<br/><br/><br/>
		  <p><b>'.$output.'</b></p>
	  </fieldset>
   </form> ';
   	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Login";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	
      {$html}


EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 