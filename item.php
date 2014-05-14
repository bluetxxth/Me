<?php

/**
 * This is a Alpha pagecontroller.
 *
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php');

$alpha['stylesheets'][] = 'css/product.css';

//initialize database
$db = new CDatabase($alpha['database']);

//initialize item
$item = new CItem($db);

$specialActions = new CSpecialActions();

//get some parameters
$title  = isset($_GET['title']) ? $_GET['title'] : null;
$author  = isset($_GET['author']) ? $_GET['author'] : null;
$image  = isset($_GET['image']) ? $_GET['image'] : null;
$year = isset($_GET['year']) ? $_GET['year'] : null;
$description = isset($_GET['description']) ? $_GET['description'] : null;
$github = isset($_GET['url']) ? $_GET['url'] : null;
$test = isset($_GET['test']) ? $_GET['test'] : null;
$production = isset($_GET['production']) ? $_GET['production'] : null;
$servertype = isset($_GET['servertype ']) ? $_GET['servertype '] : null;
$apptype = isset($_GET['apptype ']) ? $_GET['apptype '] : null;
$language = isset($_GET['language ']) ? $_GET['language '] : null;
$status = isset($_GET['status']) ? $_GET['status'] : null;
$continue  = isset($_GET['continue']) ? $_GET['continue'] : null;

//initialize output message
$output = null;

//get the id for the item to show
if(isset($_GET['id'])){

   $_SESSION['id'] = $id = strip_tags($_GET['id']);
}

$itemToView = $_SESSION['id'];

//if click continue
if($continue){

   header('Location: showcase.php');
}


   //now get all from aItem
      $sql = "SELECT * FROM aItem WHERE id = ?";
      
      //pass the itemToView to the array
      $params = array(
            $itemToView,
      );

    //get the query result
   $res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);
   
   //show output message if no result
   if($res == null){
      
      $ouput = "no content";
   }

   //get from database
   foreach($res AS $key => $val) {

      //sanitize before assignment
      $myId= strip_tags($val->id);
      $title = strip_tags($val->title);
      $author = strip_tags($val->author);
      $image = strip_tags($val->image);
      $year = strip_tags($val->YEAR);
      $description = strip_tags($val->description);
      $github = strip_tags($val->url);
      $test = strip_tags($val->test);
      $production = strip_tags($val->production);
      $servertype = strip_tags($val->servertype);
      $status = strip_tags($val->status);
      $year = strip_tags($val->YEAR);

   }
   

   //check if id is a numeric value
   is_numeric($itemToView) or die('ID must be numeric!');
    
   //valuye from db
   $val = $item->selectItemID($itemToView);
   
   $gitUrl = $val->url;
   $testUrl = $val->test;
   $productionUrl = $val->production;

   $github =      $specialActions -> makeClickableLinks($gitUrl);
   $test =        $specialActions -> makeClickableLinks($testUrl);
   $production =  $specialActions -> makeClickableLinks($productionUrl);
   

   $string = "{$val->status}";
   $htmlStatus = $specialActions-> statusMarker($string , 'statusProgressShowcase' , 'statusFinishedShowcase' );
   
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = $val->title;
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha['title']}</h1>
<div id ="product">
  
            <div class = "productImage"><img src='img.php?src={$val->image}&amp;width=100&amp;height=100' alt='Picture with img' id='movieimg'/></div> 
       
</div>
<hr class = "productInstructionsHeading"/>

<div id ="productinfo">

	<b>Created:</b>  {$val->YEAR}
	     <hr class = "topHorizontalHeading"/>
	<b>Name:</b> {$val->title}
         <hr class = "topHorizontalHeading"/>
    <b>Application Type: </b> {$val->apptype}
         <hr class = "topHorizontalHeading"/>
    <b>Application Language: </b> {$val->language}
         <hr class = "topHorizontalHeading"/>         
	<b>Author:</b> {$val->author}
		<hr class = "topHorizontalHeading"/>
	<b>Updated:</b> {$val->updated}
		<hr class = "topHorizontalHeading"/>
	<b>Status:</b> <b> $htmlStatus</b>
		<hr class = "topHorizontalHeading"/>
	<b>GitHub URL:</b> $github
		<hr class = "topHorizontalHeading"/>
	<b>Test Server Url:</b> $test	
		<hr class = "topHorizontalHeading"/>
	<b>Production Server URL:</b> $production	
    <hr class = "topHorizontalHeading"/>
    <b>Server type: </b>{$val->servertype}		
		<hr class = "topHorizontalHeading"/>
    <div id = 'description'>{$val->description}</div>
	<hr class = "bottomHorizontalHeading"/>

	 		
</div>	

		<form method="get">
			<!--<input type ="submit" name="github" value ="GitHub" class="button" /> 
			<input type ="submit" name="cart" value ="Cart" class="button" />-->
			<input type ="submit" name="continue" value ="Showcase" class="btn btn-default" />  
		</form>
	
			<br/><br/><h3>{$output}</h3>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 