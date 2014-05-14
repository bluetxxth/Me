<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 
 
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Email confirmation";
	$alpha ['meta_description'] = "Email confirmation";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	<article class="justify border" style="width:80%">

	      
	      <p>your email was sent, I will get back to you as soon as possible!! </p>
 
	</article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 