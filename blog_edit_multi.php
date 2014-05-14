<?php
	/**
 * An page to display the sourcecode.
 */
	include ("config.php");
	
	isset($_SESSION['user']) or header('Location: login.php');
	
	/**
	 * Create a link to the content, based on its type.
	 *
	 * @param object $content
	 *        	to link to.
	 * @return string with url to display content.
	*/
	function getUrlToContent($content) {
	   switch ($content->TYPE) {
	   	case 'page' :
	   	   return "page.php?url={$content->url}";
	   	   break;
		case 'post' :
			return "blog.php?slug={$content->slug}";
			break;
			default :
			return null;
			break;
	}
	}
	
	// Connect to a MySQL database using PHP PDO
	$db = new CDatabase ( $alpha ['database'] );
	
	// Get all content
	$sql = '
  SELECT *, (published <= NOW()) AS available FROM aContent;';
	
	$res = $db->ExecuteSelectQueryAndFetchAll ( $sql );
	
	
	// Put results into a list
	$items = null;
	foreach ($res as $key => $val ){
	   $items .= "<li>{$val->TYPE} (" . (! $val->available ? 'not ' : null) . "published): " . htmlentities ($val->title, null, 'UTF-8') .
	         " (<a href='blog_edit_single.php?id={$val->id}'>edit</a> <a href='" . getUrlToContent ( $val ) . "'>show</a>
			 <a href='delete.php?id={$val->id}'>delete</a>) </li>\n" ;
	}
	
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "Empty";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>
      <p>A list of all the content in the database</p>
      
      <ul>
      	{$items}
      </ul>
      
      <p><a href ='blog_view.php'>Show all the blog posts. </a></p>
      <p><a href ='reset.php'>Reset. </a></p>
      <p><a href ='create.php'>Create a new page </a></p>

EOD;
	
$alpha['footer3'] = <<<EOD

EOD;


	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 