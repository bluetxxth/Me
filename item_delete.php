<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 
 
	
// Connect to a MySQL database using PHP PDO
$db = new CDatabase($alpha['database']);


// Get parameters
$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$delete = isset($_POST['delete'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

// Check that incoming parameters are valid
isset($acronym) or die('Check: You must login to delete.');


// Check if form was submitted
$output = null;
if($delete) {
   $sql = 'DELETE FROM aItem WHERE id = ?';
   $db->ExecuteQuery($sql, array($id));
   $db->SaveDebug("Deleted " . $db->RowCount() . " rows from the database.");
   header('Location: showcase.php');
}


// Select information on the movie
$sql = 'SELECT * FROM aItem WHERE id = ?';
$params = array($id);
$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);

if(isset($res[0])) {
   $item= $res[0];
}
else {
   die('Failed: There is no item with that id');
}


	// Create the data array which is to be used in the template file.
	$alpha ['title'] = Delete;
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	<article class="justify border" style="width:80%">

     <form method=post>
        <fieldset>
           <legend>Delete Movie: {$item->title}</legend>
           <input type='hidden' name='id' value='{$id}'/>
           <p><input type='submit' name='delete' value='Delete Item'/></p>
        </fieldset>
      </form>
    
	</article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 