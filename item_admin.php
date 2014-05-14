<?php

/**
 * An page to display the sourcecode.
 */
// Include the essential config-file which also creates the $alpha variable with its defaults.
include (__DIR__ . '/config.php');

// Connect to a MySQL database using PHP PDO
$db = new CDatabase ( $alpha ['database'] );
// instantiate blog
$blog = new CBlog ( $db );
// instantiate user
$user = new CUser ( $db );
// instantiate item
$item = new CItem ( $db );
// instantiate text filter
$filter = new CTextFilter ();
// instantiate content class for pagination
$content = new CContent ( $db );
// Instantiate navigation
$navigation = new CNavigation ();

// get id
$id = isset ( $_POST ['id'] ) ? strip_tags ( $_POST ['id'] ) : (isset ( $_GET ['id'] ) ? strip_tags ( $_GET ['id'] ) : null);

// Get parameters for sorting
$hits = isset ( $_GET ['hits'] ) ? $_GET ['hits'] : 8;
$page = isset ( $_GET ['page'] ) ? $_GET ['page'] : 1;
$orderby = isset ( $_GET ['orderby'] ) ? strtolower ( $_GET ['orderby'] ) : 'id';
$order = isset ( $_GET ['order'] ) ? strtolower ( $_GET ['order'] ) : 'asc';

$continue   = isset($_GET['continue']) ? $_GET['continue'] : null;
$create   = isset($_GET['create']) ? $_GET['create'] : null;

// Check that incoming is valid
is_numeric ( $hits ) or die ( 'Check: Hits must be numeric.' );
is_numeric ( $page ) or die ( 'Check: Page must be numeric.' );

// Get max pages for current query, for navigation
$sql = "SELECT COUNT(id) AS rows FROM aItem";

$res = $db->ExecuteSelectQueryAndFetchAll ( $sql );
$rows = $res [0]->rows;
$max = ceil ( $rows / $hits );

// query result
$res = $blog->getPaginatedBlogContent ( $hits, $page, $orderby, $order );

$output = null;

// test if there is anything
if ($res == null) {
   
   $output = "no items to show";
}

$hitsPerPage = $content->getHitsPerPage ( array (
      2,
      4,
      8 
), $hits );

$navigatePage = $content->getPageNavigation ( $hits, $page, $max );

// Get max pages for current query, for navigation
$sql = "SELECT * FROM aItem ORDER BY $orderby $order LIMIT $hits OFFSET " . (($page - 1) * $hits);

$res = $db->ExecuteSelectQueryAndFetchAll ( $sql );



if (isset ( $_SESSION ['user'] )) {
   
   // Put results into a HTML-table (table header) - WITH edit and delete options
   $tr = "<tr><th>Id " . $item->orderby ( 'id' ) . "</th><th>Name" . $item->orderby ( 'title' ) . "</th><th>edit</th><th>delete</th></tr>";
   
   foreach ( $res as $key => $val ) {
      
      // $synopsis = truncate_string($val->synopsis, 50);
      // Put results into a HTML-table (table cells) - WITH edit and delete options
      $tr .= "<tr><td>{$val->id}</td><td>{$val->title}</td><td><a href='item_edit.php?id={$val->id}'>edit </a></td><td><a href='item_delete.php?id={$val->id}'> remove</a></td></tr>";
   }
   
  ///$create .= "<a href='item_create.php?id={$val->id}'>create </a>";
   
} else {
   header ( 'Location: login.php' );
}

//if click continue
if($continue){

   header('Location: showcase.php');
}

if ($create) {
   header('Location: item_create.php?id='.$val->id);
}

// Create the data array which is to be used in the template file.
$alpha ['title'] = "Empty";
$alpha ['meta_description'] = "this is the homepage";
$alpha ['main'] = <<<EOD

	<h1>{$alpha ['title']}</h1>

	<div id = 'mainWrapper'>
		
         	<div class='dbtable'>
              <div class='rows'>{$rows} Hits. {$hitsPerPage}</div>
              <table>
               {$tr}
              </table>
            
              {$output}
            </div>
   
     <br/>
         <div class = "buttonHolder">
           <div class = "buttons">
                <form method="get">
         			<input type ="submit" name="create" value ="Create" class="button" /> 
         			<input type ="submit" name="continue" value ="Continue" class="button" />  
         		</form>
         	</div>
          </div>
          
     
         		
           	 <div class='pagination'>{$navigatePage}</div>

   </div>

EOD;

$alpha ['footer3'] = <<<EOD

EOD;

// Hand over to the template engine.
include (__DIR__ . "/theme/template.php");