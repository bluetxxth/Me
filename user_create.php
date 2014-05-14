<?php
	/**
 * An page to display the sourcecode.
 */
   	// Include the essential config-file which also creates the $alpha variable with its defaults.
//    include(__DIR__.'/config.php'); 
include ("config.php");
   
   $db = new CDatabase($alpha['database']);
   $cuser = new CUser($db);
   
   
   
   //get parameters
   $acronym = isset($_POST['user']) ? $_POST['user'] : null;
   $name = isset($_POST['name']) ? $_POST['name'] : null;
   $password1 = isset($_POST['password1']) ? $_POST['password1'] : null;
   $password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
   
   
   $submittedValue = "";
   $value0 = " ";
   $value1 = "mr";
   $value2 = "ms";
   $value3 = "mrs";
   if (isset($_POST["salute"])) {
      $submittedValue = $_POST["salute"];
   
   }
   
   
   $html =null;
   $output=null;
   
   
   
   $ouput = null;
   $encryptedPassword = null;
   if($password1 && $password2){
   
      if($password1 == $password2){
   
         //$encryptedPassword = md5($password1);
   
         $output = $cuser->createUser($acronym, $name, $password1, $submittedValue);
      }else {
         $output = "Passwords do not match try again!";
      }
   }
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Create User";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

      <h1>{$alpha['title']}</h1>
      
      
      
      			<form name = 'salute' method = 'post'>
      				Salute: <select project='salute' id='salute' name='salute'>
      			        <option value = '$value0'($value0 == $submittedValue)?' SELECTED':''>$value0</option>
      			        <option value = '$value1'($value0 == $submittedValue)?' SELECTED':''>$value1</option>
      			        <option value = '$value2'($value0 == $submittedValue)?' SELECTED':''>$value2</option>
      			        <option value = '$value3'($value0 == $submittedValue)?' SELECTED':''>$value3</option>
      		        </select>
      		
      				<p>User name: <input type='text' name='user' placeholder = 'acronym'></p>
      				<p>First name: <input type='text' name='name' placeholder = 'name'></p>
      				<p>Password: <input type='password' name='password1' placeholder = 'password'></p>
      				<p>Password: <input type='password' name='password2' placeholder = 're-enter password'></p>
      				
      				<input type='submit' value='Submit' class='button'/>
      		 </form>
      
      <h4>{$output}</h4>
      		
      		
      
      <article class="justify border" style="width:80%">
      	
      
      </article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 