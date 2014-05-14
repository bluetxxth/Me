<?php
	/**
 * An page to display the sourcecode.
 */
// 	include ("config.php");
	
	// Include the essential config-file which also creates the $alpha variable with its defaults.
	include(__DIR__.'/config.php');
	
	
	//send unauthenticied user to the login page
	isset($_SESSION['user']) or header('Location: login.php');
	
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Administration";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

      <h1>{$alpha['title']}</h1>
      
      		<div id = 'optionWrapper'>
      		
      			<div id = 'itemAdmin'>
      				<a href='item_admin.php?p=movies'><img src='img.php?src=film_reel.jpg&amp;width=110&amp;height=100' alt='Picture'/> </a>
      		
      				<div id = 'title'>
      					Items
      				</div>
      			</div>
      		
      		
      			<div id = 'blogAdmin'>
      				<a href='blog_edit_multi.php'><img src='img.php?src=blog.jpg&amp;width=100&amp;height=100' alt='Picture' /> </a>
      		
      				<div id = 'title'>
      					Blog
      				</div>
      			</div>
      		
      
      			<div id = 'userAdmin'>
      				<a href='user_admin.php'><img src='img.php?src=admin.jpg&amp;width=100&amp;height=100' alt='Picture' /> </a>
      		
      				<div id = 'title'>
      					User
      				</div>		
      			</div>
      		
      	
      		
      		</div>
EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 