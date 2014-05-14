<?php
	/**
 * An page to display the sourcecode.
 */
	// Include the essential config-file which also creates the $alpha variable with its defaults.
	
//  include ("config.php");
include(__DIR__.'/config.php'); 
// include(__DIR__.'/filter.php'); 
	
	$alpha['stylesheets'][] = 'css/blog.css';

	// Connect to a MySQL database using PHP PDO
	$db = new CDatabase($alpha['database']);
	//instantiate blog
	$blog = new CBlog($db);
	//instantiate user
	$user = new CUser($db);
	//instantiate text filter
	$filter = new CTextFilter();
	//instantiate content class for pagination
	$content = new CContent($db);
	
	//truncation
	$specialActions= new CSpecialActions();
	
	
	// Get parameters
	$slug    = isset($_GET['slug']) ? $_GET['slug'] : null;
	$slugSql = $slug ? 'slug = ?' : '1';
	$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
	$update   = isset($_GET['update']) ? $_GET['update'] : null;
	$create    = isset($_GET['create']) ? $_GET['create'] : null;
	$delete = isset($_GET['delete']) ? $_GET['delete'] : null;
	$editall   = isset($_GET['editall']) ? $_GET['editall'] : null;
	$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
	$btnUpdate   = isset($_GET['update']) ? $_GET['update'] : null;
	$btnCreate   = isset($_GET['create']) ? $_GET['create'] : null;
	$btnEditall   = isset($_GET['editall']) ? $_GET['editall'] : null;
	$btnDelete   = isset($_GET['delete']) ? $_GET['delete'] : null;
	
	
	// Get parameters for sorting
	$hits  = isset($_GET['hits']) ? $_GET['hits'] : 8;
	$page  = isset($_GET['page']) ? $_GET['page'] : 1;
	
	//get parameters for order
	$orderby  = isset($_GET['orderby']) ? strtolower($_GET['orderby']) : 'updated';
	$order    = isset($_GET['order'])   ? strtolower($_GET['order'])   : 'desc';
	
	
	// Check that incoming is valid
	is_numeric($hits) or die('Check: Hits must be numeric.');
	is_numeric($page) or die('Check: Page must be numeric.');
	
	// Get max pages for current query, for navigation
	//$sql = "SELECT COUNT(id) AS rows FROM aContent";
	// Get all content
	$sql = 'SELECT *, (published <= NOW()) AS rows FROM aContent;';
	
	$res = $db->ExecuteSelectQueryAndFetchAll($sql);
	$rows = $res[0]->rows;
	$max = ceil($rows / $hits);
	
	
	//set blogContent
	$blog-> setSlug($slug);
	$blog-> setSlugSql($slugSql);
	
	//query result
	$res = $blog -> getPaginatedBlogContent($hits, $page, $orderby, $order);
	$hitsPerPage = $content->getHitsPerPage(array(2, 4, 8), $hits);
	$navigatePage = $content->getPageNavigation($hits, $page, $max);
	
	
   $btnUpdate = '<input type="submit" name="update" value="Update" class="button"/>';
   $btnEditAll= '<input type="submit" name="editall" value="Edit all" class="button"/>';
   $btnCreate = '<input type="submit" name="create" value="Create" class="button"/>';
   $btnDelete = '<input type="submit" name="delete" value="Delete" class="button"/>';


	
$output = null;
 

	if (isset($_SESSION['user'])){
	   
	   foreach($res as $key  => $c) {
	   
	      // Sanitize content before using it.
	      $title  = htmlentities($c->title, null, 'UTF-8');
	      $author = htmlentities($c->user, null, 'UTF-8');
	      $created=htmlentities($c->created, null, 'UTF-8');
	      $data   = $filter->doFilter(htmlentities($c->DATA, null, 'UTF-8'), $c->FILTER);
	      $published = htmlentities($c->published, null, 'UTF-8');
	      $created = htmlentities($c->created, null, 'UTF-8');
	      $updated = htmlentities($c->updated, null, 'UTF-8');
	      $content_id    = htmlentities($c->id, null, 'UTF-8');
	   
	      //truncate text string
	      $excerpt = $specialActions->truncate_string($c->DATA, 200);
	      
	      $excerptPurified = htmlentities($excerpt);
	      $output .= " <div class = 'newsResult'><div class = 'title'><a href = 'blog_view_full.php?slug={$c -> slug}'>{$title}</a></div> <div class='updated'>{$updated}</div> <div class  ='user'><a href='user.php?id={$id}'> {$author}</a></div><div class = 'data'>{$excerptPurified} <a href = 'blog_view_full.php?slug={$c -> slug}'>...(more)</a></div> <div class = 'btn btn-default' ><a href='blog_edit_single.php?id={$c->id}'>Update</a></div> <div class = 'btn btn-default' ><a href='create.php?id={$c->id}'>Create</a> </div><div class = 'btn btn-default' ><a href='blog_edit_multi.php?id={$c->id}'>Edit all</a></div><div class = 'btn btn-default' ><a href='delete.php?id={$c->id}'>Delete </a></div></div> ";
	   }
	}else {
	
	
	foreach($res as $key  => $c) {
	
	   // Sanitize content before using it.
	   $title  = htmlentities($c->title, null, 'UTF-8');
	   $author = htmlentities($c->user, null, 'UTF-8');
	   $created=htmlentities($c->created, null, 'UTF-8');
	   $data   = $filter->doFilter(htmlentities($c->DATA, null, 'UTF-8'), $c->FILTER);
	   $published = htmlentities($c->published, null, 'UTF-8');
	   $created = htmlentities($c->created, null, 'UTF-8');
	   $updated = htmlentities($c->updated, null, 'UTF-8');
	   $content_id    = htmlentities($c->id, null, 'UTF-8');
	
	   //truncate text string
	   $excerpt = $specialActions->truncate_string($c->DATA, 200);
	   $output .= " <div class = 'newsResult'><div class = 'title'><a href = 'blog_view_full.php?slug={$c -> slug}'>{$title}</a></div> <div class='updated'>{$updated}</div> <div class  ='user'><a href='user.php?id={$id}'> {$author}</a></div><div class = 'data'>{$excerpt} <a href = 'blog_view_full.php?slug={$c -> slug}'>...(more)</a></div> </div>";
	    
	}
	
	}
	
	// Create the data array which is to be used in the template file.
	$alpha ['title'] = "News";
	$alpha ['meta_description'] = "this is the homepage";
	$alpha ['main'] = <<<EOD

 <h1>{$alpha['title']}</h1>

	  <section>	
		<article class="justify border" style="width:80%">
				 {$hitsPerPage} 
					{$output}
					{$navigatePage}		
				</article>
	     </section>
					      
EOD;
	
$alpha['footer3'] = <<<EOD

EOD;

	// Hand over to the template engine.
	include (__DIR__ . "/theme/template.php"); 