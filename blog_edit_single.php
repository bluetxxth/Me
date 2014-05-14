<?php
	/**
 * An page to display the sourcecode.
 */
	include ("config.php");
	
	isset($_SESSION['user']) or header('Location: login.php');
	
	//connect to a MySQL database using PHP PDO
	$db = new CDatabase($alpha['database']);
	$content = new CContent($db);
	
	
	// Get parameters ad set to null if iset returns false
	$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
	$title  = isset($_POST['title']) ? $_POST['title'] : null;
	$slug   = isset($_POST['slug'])  ? $_POST['slug']  : null;
	$url    = isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
	$data   = isset($_POST['data'])  ? $_POST['data'] : array();
	$type   = isset($_POST['type'])  ? strip_tags($_POST['type']) : array();
	$filter = isset($_POST['filter']) ? $_POST['filter'] : array();
	$published = isset($_POST['published'])  ? strip_tags($_POST['published']) : array();
	$created = isset($_POST['created'])  ? strip_tags($_POST['created']) : array();
	$save   = isset($_POST['save'])  ? true : false;
	$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
	
	isset($acronym) or die('Check: You must login to edit.');
	is_numeric($id) or die('Check: id must be numeric');
	
	$output = null;
	
	//check if the form was submitted
	if($save){
	   $output= $content->updateDatabase();
	}
	
	$c = $content->selectFromDB($id);
	
	
	// Sanitize content before using it.
	$title  = htmlentities($c->title, null, 'UTF-8');
	$slug   = htmlentities($c->slug, null, 'UTF-8');
	$url    = htmlentities($c->url, null, 'UTF-8');
	$data   = htmlentities($c->DATA, null, 'UTF-8');
	$type   = $c->TYPE;
	$filter = htmlentities($c->FILTER, null, 'UTF-8');
	$published = $c->published;
	$created = $c ->created;
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Empty";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
      <form method=post>
        <fieldset>
        <legend>Update content</legend>
        <input type='hidden' name='id' value='{$id}'/>
        <p><label>Title:<br/><input type='text' name='title' value='{$title}'/></label></p>
        <p><label>Slug:<br/><input type='text' name='slug' value='{$slug}'/></label></p>
        
        <p><label>Text:<br/><textarea name='data'>{$data}</textarea></label></p>
        <p><label>Type:<br/><input type='text' name='type' value='{$type}'/></label></p>
        <p><label>Filter:<br/><input type='text' name='filter' value='{$filter}'/></label></p>
        <p><label>Publishing date:<br/><input type='text' name='published' value='{$published}'/></label></p>
        <p><label>Creation date:<br/><input type='text' name='created' value='{$created}'/></label></p>
        <p><label>Updated date:<br/><input type='text' name='updated' value='{$updated}'/></label></p>
        <p class=buttons><input type='submit' name='save' value='Spara'/> <input type='reset' value='Reset'/></p>
        <p><a href='view.php'>Show all</a></p>
        <output>{$output}</output>
        </fieldset>
      </form>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 