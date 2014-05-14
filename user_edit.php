<?php
	/**
 * An page to display the sourcecode.
 */
   // Include the essential config-file which also creates the $alpha variable with its defaults.
//    include(__DIR__.'/config.php'); 
include ("config.php");
   
   //Add the style sheet
   $alpha['stylesheets'][] = 'css/tables.css';
   $alpha['stylesheets'][] = 'css/style.css';
   
   // Connect to a MySQL database using PHP PDO
   $db = new CDatabase($alpha['database']);
   //instantiate blog
   $blog = new CBlog($db);
   //instantiate user
   $user = new CUser($db);
   //instantiate text filter
   $filter = new CTextFilter();
   //instantiate content class for pagination
   $content = new CContent($db);
   
   
   // Get parameters
   $id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
   $save   = isset($_POST['save'])  ? true : false;
   // Get parameters
   $password = isset($_POST['password']) ? $_POST['password'] : null;
   $acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
   $newacronym  = isset($_POST['acronym']) ? strip_tags($_POST['acronym']) : null;
   $logedUser = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
   $name = isset($_POST['name']) ? strip_tags($_POST['name'])  : null;
   $img_path  = isset($_POST['image_path'])  ? strip_tags($_POST['price'])  : null;
   $img_name  = isset($_POST['img_name']) ? strip_tags($_POST['img_name']) : null;
   $showall = isset($_POST['showall']) ? $_POST['showall'] : null;
   
   if($showall){
      header('Location: user_admin.php');
   }
   
   if(isset($_POST['logout'])):
   $user->logoutUser();
   header('Location: login.php');
   endif;
   
   // Check that incoming parameters are valid
   isset($acronym) or die('Check: You must login to edit.');
   is_numeric($id) or die('Check: Id must be numeric.');
   
   $logedInUser = $user -> selectUserID($id);
   
   // echo $logedInUser->acronym;
   // echo $acronym. " now logged in ";
   
   $output = null;
   // Check if form was submitted
   if($save){
   
      $acronym = $newacronym;
   
      //provide access only for admin or the user in question
      if(($_SESSION['user']->acronym  == $logedInUser->acronym) || ($_SESSION['user']->acronym  == "admin") ){
   
         $output = $user-> updateUser($acronym,  $name, $password, $id);
   
      }else{
         $output = "<br/><h3>Unable to proceed with your request you are signed in as: </h3>" . $_SESSION['user']->acronym;
         $output .= " logout and re-log in with  appropriate user name" . '<form method=post>
		
			  <p><input type="submit" name="logout" value="Logout"/></p>
		</form>';
   
         //output user info
         //output user info
         //$myuser = $user -> selectUserID($id);
         //header('Location: user_admin.php');
      }
   
      //header('Location: user_admin.php');
   }else {
      //output user info
      $myuser = $user -> selectUserID($id);
   
      // Sanitize content before using it.
      $id  = htmlentities($myuser->id, null, 'UTF-8');
      $acronym   = htmlentities($myuser->acronym, null, 'UTF-8');
      $name    = htmlentities($myuser->name, null, 'UTF-8');
      $password   = htmlentities($myuser->password, null, 'UTF-8');
   
   }
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Edit User";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

<h1>{$alpha['title']}</h1>


      <form method=post>
        <fieldset>
        <legend>Update user data</legend>
        <input type='hidden' name='id' value='{$id}'/>
        <p><label>Acronym:<br/><input type='text' name='acronym' value='{$acronym}'/></label></p>
        <p><label>Name:<br/><input type='text' name='name' value='{$name}'/></label></p>
        <p><label>Password:<br/><input type='password' name='password' value='{$password}'/></label></p>
        <p><input type='submit' name='save' value='Save' class= 'button'/> <input type='reset' value='Reset' class= 'button'/></p>
        <p><input type='submit' name='showall' value='Show all' class= 'button'/></p>
        <h4><output>{$output}</output></h4>
        </fieldset>
      </form>
EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 