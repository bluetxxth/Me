<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include(__DIR__.'/config.php'); 
 


header("Content-Type: application/octet-stream");

$file = $_GET["file"] .".pdf";
header("Content-Disposition: attachment; filename=" . urlencode($file));
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.
$fp = fopen($file, "r");
while (!feof($fp))
{
   echo fread($fp, 65536);
   flush(); // this is essential for large downloads
}
fclose($fp);


	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Empty";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
	<article class="justify border" style="width:80%">

 
	</article>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 