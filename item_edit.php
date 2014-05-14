<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 


//Connect to a MySQL database using PHP PDO
$db = new CDatabase($alpha['database']);

//instantiate the film class
$item = new CItem($db);


// Get parameters
$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$title  = isset($_POST['title']) ? strip_tags($_POST['title']) : null;
$author  = isset($_POST['author']) ? strip_tags($_POST['author']) : null;
$year   = isset($_POST['year'])  ? strip_tags($_POST['year'])  : null;
$description = isset($_POST['description']) ? strip_tags($_POST['description'])  : null;
$image  = isset($_POST['image']) ? strip_tags($_POST['image']) : null;
$url = isset($_POST['url']) ? strip_tags($_POST['url'])  : null;
// $type  = isset($_POST['type']) ? $_POST['type'] : array();
$status   = isset($_POST['status'])  ? strip_tags($_POST['status'])  : null;

$created  = isset($_POST['created'])  ? strip_tags($_POST['created'])  : null;
$language   = isset($_POST['language'])  ? strip_tags($_POST['language'])  : null;
$test   = isset($_POST['test'])  ? strip_tags($_POST['test'])  : null;
$servertype   = isset($_POST['servertype'])  ? strip_tags($_POST['servertype'])  : null;
$production  = isset($_POST['production'])  ? strip_tags($_POST['production'])  : null;
$apptype   = isset($_POST['apptype'])  ? strip_tags($_POST['apptype'])  : null;
$save   = isset($_POST['save'])  ? true : false;
//check if user logged in
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
$showall = isset($_POST['showall']) ? strip_tags($_POST['showall']) : null;

// Check that incoming parameters are valid
isset($acronym) or die('Check: You must login to edit.');
is_numeric($id) or die('Check: Id must be numeric.');
//is_array($genre) or die('Check: Genre must be array.');


// Check if form was submitted
$output = null;


if($save){

   $output = $item->editItem($title, $author, $image, $year,  $description, $url, $status, $language, $production, $test, $servertype, $apptype,  $id);

}

if($showall){
   header('Location: showcase.php');
}

 //assign the specific item
 $myItem = $item -> selectItemId($id); 

// Sanitize content before using it.
$id  = htmlentities($myItem->id, null, 'UTF-8');
$title   = htmlentities($myItem->title, null, 'UTF-8');
$author   = htmlentities($myItem->author, null, 'UTF-8');
$image  = htmlentities($myItem->image, null, 'UTF-8');
$year = htmlentities($myItem->YEAR, null, 'UTF-8');
$description = htmlentities($myItem->description, null, 'UTF-8');
$url = htmlentities($myItem->url, null, 'UTF-8');
$status  = htmlentities($myItem->status, null, 'UTF-8');
$updated  = htmlentities($myItem->updated, null, 'UTF-8');

// $created  = htmlentities($myItem->created , null, 'UTF-8');
$language   = htmlentities($myItem->language, null, 'UTF-8');
$production  = htmlentities($myItem->production , null, 'UTF-8');
$test   = htmlentities($myItem->test, null, 'UTF-8');
$servertype   = htmlentities($myItem->servertype, null, 'UTF-8');
$apptype   = htmlentities($myItem->apptype, null, 'UTF-8');

	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Edit";
	$alpha ['meta_description'] = "this is the homepage";
	
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	
      <form method=post>
        <fieldset>
        <legend>Update item info</legend>
        <input type='hidden' name='id' value='{$id}'/>
        <p><label>Title:<br/><input type='text' name='title' value='{$title}'/></label></p>
        <p><label>Author:<br/><input type='text' name='author' value='{$author}'/></label></p>
        <p><label>Picture path:<br/><input type='text' name='image' value='{$image}'/></label></p>
        <p><label>Year path:<br/><input type='text' name='year' value='{$year}'/></label></p>
        <p><label>Description:<br/><textarea name='description'>{$description}</textarea></label></p>         
        <p><label>URL:<br/><input type='text' name='url' value='{$url}'/></label></p>
        <p><label>Status:<br/><input type='text' name='status' value='{$status}'/></label></p>
        <p><label>Updated:<br/><input type='text' name='updated' value='{$updated}'/></label></p>
        <p><label>Created:<br/><input type='text' name='updated' value='{$created}'/></label></p>
        <p><label>language:<br/><input type='text' name='updated' value='{$language}'/></label></p>
        <p><label>Production Server:<br/><input type='text' name='updated' value='{$production}'/></label></p>
        <p><label>Test Server:<br/><input type='text' name='updated' value='{$test}'/></label></p>
        <p><label>Server type:<br/><input type='text' name='updated' value='{$servertype}'/></label></p>
        <p><label>Application Type:<br/><input type='text' name='updated' value='{$apptype}'/></label></p>
        <p><input type='submit' name='save' value='Save' class ='button'/> <input type='reset' value='Reset' class ='button'/></p>
        <p><input type='submit' name='showall' value='Show all' class ='button'/> </p>
        <output>{$output}</output>
        </fieldset>
      </form>
EOD;
	
$alpha['footer3'] = <<<EOD

EOD;

	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 