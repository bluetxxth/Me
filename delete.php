<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include (__DIR__ . '/config.php');


$db = new CDatabase ($alpha['database']);
$content = new CContent ( $db );

///get the id
$id = strip_tags($_GET['id']);



//user
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

isset($acronym) or header('Location: login.php');

// get parameters
$delete = isset ( $_POST ['delete'] ) ? $_POST ['delete'] : null;

//output string
$output="";


// check if delete is set
if ($delete) {

   //set title
   $title = isset($_POST['delete']);

   try {

      $output=$content->deleteFromDB($id);
      $title = isset($_POST['delete']);

   } catch ( Exception $ex ) {

      $output = "database error";
   }

} else if(!$delete) {
   $output = "deleting !!!";
}



if (!isset($_POST['delete']))
{
   $c=$content->selectFromDB($id);
   $title  = htmlentities($c->title, null, 'UTF-8');
}
else
{
   $output=$content->deleteFromDB($id);
   $title="";
   if ($output==null)
      $output="Det fungerade inte!";
}

	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Empty";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD


      <article>
      <header>
   	<h1>{$alpha ['title']}</h1>
      </header>
      <form method=post>
      <p><input type='submit' name='delete' value='Delete'/></p>
      </form>
      <p1>{$output}</p1>
      
      <footer>
      <p><a href='blog_view.php'>Show all</a></p>
      </footer
      </article> 

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 