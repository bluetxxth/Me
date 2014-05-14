<?php

/**
 * This is a Alpha pagecontroller.
 *
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 

$db = new CDatabase($alpha['database']);

// Get parameters 
$title  = isset($_POST['title']) ? strip_tags($_POST['title']) : null;
$create = isset($_POST['create'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

// Check that incoming parameters are valid
// isset($acronym) or die('Check: You must login to edit.');

	isset($acronym) or header('Location: login.php');
	
// Check if form was submitted
if($create) {
	$sql = 'INSERT INTO aItem (title) VALUES (?)';
	$db->ExecuteQuery($sql, array($title));
	$db->SaveDebug();
	header('Location: item_edit.php?id=' . $db->LastInsertId());
	exit;
}
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Empty";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

      <form method=post>
        <fieldset>
        <legend>Create new Movie</legend>
        <p><label>Title:<br/><input type='text' name='title'/></label></p>
        <p><input type='submit' name='create' value='Create' id='button'/></p>
        </fieldset>
      </form>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 