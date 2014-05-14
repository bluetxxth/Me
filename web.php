<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include (__DIR__ . '/config.php');

// Create the data array which is to be used in the template file.
$alpha ['title'] = "About this web";
$alpha ['meta_description'] = "about this web";
$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>

	      
<article class="justify border" style="width:80%">
	    
<div class ="container">
   <div class ="row">
      <div class ="col-md-5">
	      <h3> What I have done: </h3>
         <p>Not much to say, here is a list of things which I use: </p>
         <ul>
            <li>HTML5 Boilerplate</li>
            <li>PHP 5.3</li>
            <li>MySQL Database</li>
            <li>Tweeter Bootrap</li>
         </ul>
      </div>
      <div class ="col-md-5">
	      <h3>  @TODO: </h3>
         <p>These are the things that I would like and are left @TODO: </p>
         <ul>
            <li>Refactor code and use MVC framwork</li>
            <li>Migrate to SqlLite</li>
            <li>Purifier</li>
            <li>Typography</li>
            <li>Webshop connected to at least paypal</li>
            <li>Rearrange database</li>
         </ul>
      </div>
   </div>
</div>

EOD;

$alpha ['footer3'] = <<<EOD

EOD;

// Hand over to the template engine.
include (__DIR__ . "/theme/template.php"); 